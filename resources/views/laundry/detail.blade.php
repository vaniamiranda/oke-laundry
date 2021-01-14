<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail') }}
        </h2>
    </x-slot>
    @livewire('laundry.laundry-create-pakaian')
    @livewire('laundry.laundry-list-pakaian')
</x-app-layout>