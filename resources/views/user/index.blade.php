<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('??') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-5 md:px-48 lg:px-64">
                    <div class="flex flex-wrap bg-gradient-to-br from-teal-600 to-green-500 p-5 text-center text-4xl">
                        <div class="w-1/2 mb-3">
                            <a class="bg-white px-3 py-1 rounded-full">
                                <i class="fas fa-plus-square"></i>
                            </a>
                        </div>
                        <div class="w-1/2 mb-3">
                            <a class="bg-white px-3 py-1 rounded-full">
                                <i class="fas fa-history"></i>
                            </a>
                        </div>
                        <div class="w-1/2 mb-3">
                            <a class="bg-white px-3 py-1 rounded-full">
                                <i class="fas fa-info-circle"></i>
                            </a>
                        </div>
                        <div class="w-1/2 mb-3">
                            <a class="bg-white px-3 py-1 rounded-full">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>