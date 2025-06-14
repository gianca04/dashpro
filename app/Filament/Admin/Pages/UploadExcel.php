<?php

namespace App\Filament\Admin\Pages;

use Filament\Forms; 
use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Csv as CsvWriter;
use App\Models\DimensionEstudiante;

class UploadExcel extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-up-tray';

    protected static string $view = 'filament.admin.pages.upload-excel';

    public ?string $excel = null;

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('excel')
                ->label('Archivo Excel')
                ->acceptedFileTypes(['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'])
                ->required(),
        ];
    }

    public function submit()
    {
        $path = $this->form->getState()['excel'];
        if (! $path) {
            $this->dispatch('notify', ['type' => 'danger', 'message' => 'Debe seleccionar un archivo.']);
            return;
        }

        $stored = Storage::path($path);

        $spreadsheet = IOFactory::load($stored);
        $writer = new CsvWriter($spreadsheet);
        $writer->setDelimiter(';');
        $csvPath = Storage::path('uploads/'.basename($stored, '.xlsx').'.csv');
        $writer->save($csvPath);

        // Leer CSV e insertar valores en la base de datos
        $rows = array_map(fn($row) => str_getcsv($row, ';'), file($csvPath));
        // Comienza desde la fila que contiene los datos de estudiantes
        foreach ($rows as $row) {
            if (! isset($row[0]) || ! is_numeric(trim($row[0]))) {
                continue;
            }
            DimensionEstudiante::updateOrCreate(
                ['codigo_estudiante' => trim($row[0])],
                [
                    'nombre_apellido' => trim($row[2] ?? ''),
                    'sexo' => trim($row[5] ?? ''),
                ]
            );
        }

        $this->dispatch('notify', ['type' => 'success', 'message' => 'Archivo procesado correctamente.']);
    }
}
