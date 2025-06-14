<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Page;
use App\Models\DimensionEstudiante;

class ImportList extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-table-cells';

    protected static string $view = 'filament.admin.pages.import-list';

    public function getViewData(): array
    {
        return [
            'students' => DimensionEstudiante::all(),
        ];
    }
}
