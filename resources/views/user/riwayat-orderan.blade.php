<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Order') }}
        </h2>
    </x-slot>
    @livewire('user.riwayat-orderan')
</x-app-layout>