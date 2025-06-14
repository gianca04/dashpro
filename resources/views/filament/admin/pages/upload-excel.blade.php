<x-filament::page>
    <form wire:submit.prevent="submit" class="p-4 space-y-4">
        {{ $this->form }}
        <x-filament::button type="submit">Procesar</x-filament::button>
    </form>
</x-filament::page>
