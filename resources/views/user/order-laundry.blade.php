<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Laundry') }}
        </h2>
    </x-slot>
    @livewire('user.order-laundry', [
        'id_laundry' => $id_laundry
    ])
</x-app-layout>