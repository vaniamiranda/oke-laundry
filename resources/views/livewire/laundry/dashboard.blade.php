<div class="p-3 md:p-6">
  <div class="px-3 md:px-5 py-5 rounded-lg lg:px-48">
    <div class="flex flex-wrap justify-center gap-1">
      <div class="w-full md:w-1/2 mb-3 px-2 py-1 rounded-lg flex justify-center text-white">
        <button wire:click="paginateKurang"><i class="fas fa-minus"></i></button>
        <span class="mx-2">Menampilkan {{ $paginate }} data</span>
        <button wire:click="paginateTambah"><i class="fas fa-plus"></i></button>
      </div>
      <input type="range" min="1" max="100" wire:model="paginate" class="w-full md:w-1/2 mb-3 px-2 py-1 rounded-lg">
      <input type="text" class="w-full md:w-1/2 mb-3 px-2 py-1 rounded-lg" wire:model="search" placeholder="Cari...">
    </div>
    <!-- Alert -->
    @if ($alertUpdate != 0)
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
                  @if ($berat == '' || $harga == '' || $tanggalMasuk== '' || $tanggalSelesai == '')
                  Harga, Berat, Tanggal Wajib di Isi
                  @elseif ($berat < 0 || $harga < 0) Berat Atau Harga Tidak Bisa Kurang Dari 0 @else Yakin Ingin Mengubah? @endif </h3> </div> </div> </div> <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    @if ($berat == '' || $harga == '' || $berat < 0 || $harga < 0 || $tanggalMasuk=='' || $tanggalSelesai=='' ) <button wire:click="batalUpdate" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-500 hover:gray-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                      Kembali
                      </button>
                      @else
                      {{-- <button class="px-2 py-1 rounded-lg bg-blue-500 hover:blue-600 text-white" wire:click="update({{ $alertUpdate }})">Ya</button>
                      <button class="px-2 py-1 rounded-lg bg-gray-500 hover:gray-600 text-white" wire:click="batalUpdate">Tidak</button> --}}
                      <button wire:click="update({{ $alertUpdate }})" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 hover:blue-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Ya
                      </button>
                      <button wire:click="batalUpdate" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-500 hover:gray-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Tidak
                      </button>
                      @endif
              </div>
            </div>
          </div>
        </div>

        @endif
        <!-- Alert/ -->

        @if ($edit != 0)
        <div class="flex flex-wrap justify-between">
          <div class="px-3 py-1 w-full md:w-1/2 bg-white">
            <span class="w-full md:w-1/2 px-2 py-1">Tanggal Masuk : <input id="tanggalMasuk" class="w-full md:w-full px-2 py-1 border rounded-lg" type="date" wire:model="tanggalMasuk"></span>
          </div>
          <div class="px-3 py-1 w-full md:w-1/2 bg-white">
            <span class="w-full md:w-1/2 px-2 py-1">Tanggal Selesai : <input id="tanggalKeluar" class="w-full md:w-full px-2 py-1 border rounded-lg" type="date" wire:model="tanggalSelesai"></span>
          </div>
        </div>
        @endif

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col mt-5">
          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50">
                    <tr>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        Pelanggan
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        Pembayaran
                      </th>
                      <th scope="col" class="px-16 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        Status
                      </th>
                      <th scope="col" class="px-2 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        Berat(Kg)
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        Harga(Rp)
                      </th>
                      <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">
                        @if ($edit != 0)
                        <button wire:click="batal" class="bg-red-600 text-white rounded-lg px-1">BATAL</button>
                        @else
                        <span class="bg-red-400 text-white rounded-lg px-1">BATAL</span>
                        @endif
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($invoices as $invoice)
                    @if ($invoice -> id_user == Auth::user()->id)
                    <tr>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                          <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full" src="{{ $invoice -> profile_photo_url }}" alt="">
                          </div>
                          <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                              {{ $invoice -> name }}
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-center">
                        @if ($invoice -> status_pembayaran == "pending")
                        @if ($edit == $invoice -> invoice_id)
                        <select wire:model="statusPembayaran" class="bg-white rounded-full border">
                          <option value="pending">Pending</option>
                          <option value="lunas">Lunas</option>
                          <option value="belum lunas">Belum Lunas</option>
                        </select>
                        @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-400 text-white">
                          {{ $invoice -> status_pembayaran }}
                        </span>
                        @endif
                        @elseif ($invoice -> status_pembayaran == "lunas")
                        @if ($edit == $invoice -> invoice_id)
                        <select wire:model="statusPembayaran" class="bg-white rounded-full border">
                          <option value="lunas">Lunas</option>
                          <option value="pending">Pending</option>
                          <option value="belum lunas">Belum Lunas</option>
                        </select>
                        @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">
                          {{ $invoice -> status_pembayaran }}
                        </span>
                        @endif
                        @elseif ($invoice -> status_pembayaran == "belum lunas")
                        @if ($edit == $invoice -> invoice_id)
                        <select wire:model="statusPembayaran" class="bg-white rounded-full border">
                          <option value="belum lunas">Belum Lunas</option>
                          <option value="pending">Pending</option>
                          <option value="lunas">Lunas</option>
                        </select>
                        @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white">
                          {{ $invoice -> status_pembayaran }}
                        </span>
                        @endif

                        @endif
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-center">
                        @if ($invoice -> status_cucian == "pending")
                        @if ($edit == $invoice -> invoice_id)
                        <select wire:model="statusCucian" class="bg-white rounded-full border">
                          <option value="pending">Pending</option>
                          <option value="sedang dicuci">Sedang dicuci</option>
                          <option value="selesai">Selesai</option>
                          <option value="batal">Batal</option>
                        </select>
                        @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-400 text-white">
                          {{ $invoice -> status_cucian }}
                        </span>
                        @endif

                        @elseif ($invoice -> status_cucian == "sedang dicuci")
                        @if ($edit == $invoice -> invoice_id)
                        <select wire:model="statusCucian" class="bg-white rounded-full border">
                          <option value="sedang dicuci">Sedang dicuci</option>
                          <option value="pending">Pending</option>
                          <option value="selesai">Selesai</option>
                          <option value="batal">Batal</option>
                        </select>
                        @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-500 text-white">
                          {{ $invoice -> status_cucian }}
                        </span>
                        @endif

                        @elseif ($invoice -> status_cucian == "selesai")
                        @if ($edit == $invoice -> invoice_id)
                        <select wire:model="statusCucian" class="bg-white rounded-full border">
                          <option value="selesai">Selesai</option>
                          <option value="pending">Pending</option>
                          <option value="sedang dicuci">Sedang dicuci</option>
                          <option value="batal">Batal</option>
                        </select>
                        @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">
                          {{ $invoice -> status_cucian }}
                        </span>
                        @endif

                        @elseif ($invoice -> status_cucian == "batal")
                        @if ($edit == $invoice -> invoice_id)
                        <select wire:model="statusCucian" class="bg-white rounded-full border">
                          <option value="batal">Batal</option>
                          <option value="pending">Pending</option>
                          <option value="sedang dicuci">Sedang dicuci</option>
                          <option value="selesai">Selesai</option>
                        </select>
                        @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white">
                          {{ $invoice -> status_cucian }}
                        </span>
                        @endif

                        @endif
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        @if ($edit == $invoice -> invoice_id)
                        <input type="number" wire:model="berat" class="border px-1 rounded-lg w-16" placeholder="Berat...">
                        @else
                        @if (isset($invoice -> total_harga))
                        {{ $invoice -> berat }}
                        @else
                        <div class="text-center">
                          -
                        </div>
                        @endif
                        @endif
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        @if ($edit == $invoice -> invoice_id)
                        <input type="number" wire:model="harga" class="border px-1 rounded-lg w-16" placeholder="Harga...">
                        @else
                        @if (isset($invoice -> total_harga))
                        Rp.{{ $invoice -> total_harga }}
                        @else
                        <div class="text-center">
                          -
                        </div>
                        @endif
                        @endif
                      </td>
                      <td class="flex px-6 py-4 whitespace-nowrap justify-center text-sm font-medium">
                        @if ($edit == $invoice -> invoice_id)
                        <button wire:click="tanya({{ $invoice -> invoice_id }})" class="bg-green-500 hover:bg-green-900  border h-8 w-8 flex items-center justify-center rounded-full text-white">
                          <i class="fas fa-check-circle"></i>
                        </button>
                        @else
                        <a href="{{ route('laundry.nota', $invoice -> antrian) }}" class="mx-1 bg-blue-600 hover:bg-blue-900 border h-8 w-8 flex items-center justify-center rounded-full text-white">
                          <i class="fas fa-info-circle"></i>
                        </a>
                        <button wire:click="edit({{ $invoice -> invoice_id }})" class="mx-1 bg-blue-600 hover:bg-blue-900 border h-8 w-8 flex items-center justify-center rounded-full text-white">
                          <i class="fas fa-pen"></i>
                        </button>
                        @endif
                      </td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="px-2 py-1 mt-3">
          {{ $invoices->links() }}
        </div>
      </div>
    </div>