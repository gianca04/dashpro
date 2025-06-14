<x-filament::page>
    <div class="p-4">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-2 text-left">Código</th>
                    <th class="px-2 text-left">Nombre</th>
                    <th class="px-2 text-left">Sexo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr class="border-b">
                        <td class="px-2">{{ $student->codigo_estudiante }}</td>
                        <td class="px-2">{{ $student->nombre_apellido }}</td>
                        <td class="px-2">{{ $student->sexo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-filament::page>
