<div class="p-3 md:p-6">
  <div class="px-3 md:px-5 py-5 rounded-lg lg:px-48">
    <h1 class="text-center text-2xl font-bold text-white">Daftar Laundry di Sekitar Anda</h1>
    <h1 class="text-center text-lg font-bold mt-3">
      <button class="px-2 py-1 rounded-lg bg-blue-500 hover:bg-blue-700 text-white" wire:click="tanya"><i class="fas fa-map-marker-alt"></i> Ganti Lokasi</button>
    </h1>

    <div class="flex-wrap md:flex rounded mt-5">
      @foreach ($datas as $data)
      <div class="mb-5 w-full px-2 py-3 p-4 rounded-lg border-2 border-white hover:bg-blue-800">
        <div class="flex gap-3">
          <div class="w-1/2 md:w-1/4">
            <img src="{{ $data->profile_photo_url }}" alt="">
          </div>
          <div class="ml-3">
            <h6 class="text-xl font-bold text-white">{{ $data->nama_laundry }}</h6>
            <h6 class="text-white">{{ $data->kota}}, {{ $data->kecamatan}}, {{ $data->kelurahan}}</h6>
            <span class="text-white text-md"><i class="fas fa-star text-yellow-300"></i>{{ number_format($data->bintang,2) }}</span>
            <div class="mt-1">
              <a href="{{ route('detail-laundry', $data -> laundry_id) }}" class="bg-yellow-500 hover:bg-yellow-600 px-2 py-1 rounded-lg text-white mt-2">Detail</a>
              <a href="{{ route('order-laundry', $data -> laundry_id) }}" class="bg-green-500 hover:bg-green-700 px-2 py-1 rounded-lg text-white mt-2">Order</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    @if ($tanya)
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
                  Ganti Lokasi Saat Ini?
                </h3>
                <div class="mt-2">
                  <p class="text-sm text-gray-500">
                    Apakah Anda Ingin Yakin Ingin Mengganti Lokasi Anda Saat Ini?
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button wire:click="gantiLokasi" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
              Ya
            </button>
            <button wire:click="batal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
              Batal
            </button>
          </div>
        </div>
      </div>
    </div>

    @endif
    @if (session()->has('status'))
    <!-- component -->
    <!-- Toast Container -->
    <!-- put taost notification in here , to cope when the toast more than one -->
    <div class="fixed right-0 top-0 m-5 tailwind-toast">

      <!-- Toast Notification Success-->
      <div class="flex items-center bg-green-500 border-l-4 border-green-700 py-2 px-3 shadow-md mb-2">
        <!-- icons -->
        <div class="text-green-500 rounded-full bg-white mr-3">
          <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
          </svg>
        </div>
        <!-- message -->
        <div class="text-white max-w-xs ">
          {{ session('status') }}
        </div>
      </div>
    </div>

    <style>
      .tailwind-toast {
        animation: tailwind-toast forwards;
        animation-duration: 4s;
      }

      @keyframes tailwind-toast {
        0% {
          right: -100em;
          transform: rotate(-90deg);
        }

        20% {
          right: 0;
          transform: rotate(0deg);
        }

        90% {
          right: 0;
        }

        100% {
          right: -100em;
        }
      }
    </style>
    @endif
  </div>
</div>