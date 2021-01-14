<div class="p-3 md:p-6">
    <div class="px-3 md:px-5 py-5 rounded-lg lg:px-48">
        <div class="flex flex-wrap">

            @foreach ($allProducts as $index => $item)
            <div class="px-2 py-1 w-full md:w-1/3 lg:w-1/4">
                <div class="bg-white rounded-lg px-2 py-1">
                    <h1>{{ $item -> jenis_pakaian }}</h1>
                    <h1>Rp.{{ $item -> harga }}</h1>
                    <div class="flex justify-end">
                        <button class="bg-green-500 px-2 rounded-lg text-white mx-1" wire:click="kurang_pakaian({{ $item -> id }}, {{ $index }})">-</button>
                        {{ $order[$index]['quantity'] }}
                        <button class="bg-green-500 px-2 rounded-lg text-white mx-1" wire:click="tambah_pakaian({{ $item -> id }}, {{ $index }})">+</button>
                    </div>
                </div>
            </div>
            @php($total+= $order[$index]['quantity'])
            @endforeach
        </div>
        <div class="w-full px-2 ">
            <label class="text-white" for="deskripsi">Deskripsi</label>
            <textarea wire:model="deskripsi" id="deskripsi" class="px-2 py-1 rounded w-full h-36"></textarea>
            @if ($total == 0)
            <button wire:click="kosong" class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded">order</button>
            @else
            <button wire:click="order" class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded">order</button>
            @endif
        </div>
    </div>
    @if ($error == 1)
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!--
        Background overlay, show/hide based on modal state.
  
        Entering: "ease-out duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100"
          To: "opacity-0"
      -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <!--
        Modal panel, show/hide based on modal state.
  
        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Heroicon name: exclamation -->
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                Pakaian Masih Kosong
                            </h3>
                            <div class="mt-2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button wire:click="tutup" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>