<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pakaian') }}
        </h2>
    </x-slot>
    <div class="p-5">
        @livewire('laundry.laundry-create-pakaian')
        @livewire('laundry.laundry-list-pakaian')
    </div>
</x-app-layout>