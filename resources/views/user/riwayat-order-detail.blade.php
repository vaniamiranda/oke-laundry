<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Order') }}
        </h2>
    </x-slot>
    @livewire('user.riwayat-order-detail', [
        'antrian' => $antrian
    ])
</x-app-layout>