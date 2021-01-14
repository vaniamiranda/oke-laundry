<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    @if ( Auth::user()->lokasi_kelurahan == '' )
    @livewire('user.pilih-lokasi-laundry')
    @else
    @livewire('user.daftar-laundry-kelurahan')
    @endif
</x-app-layout>