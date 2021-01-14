<div class="px-3 md:px-5 lg:px-48 mt-5">
  <div class="px-1">
    @if ($menu == 0)    
    <button wire:click="menu(1)" class="flex items-center mb-5 bg-blue-500 text-white text-sm font-bold px-4 py-3 rounded-lg w-full">
      <h1 class="text-lg">Menu</h1>
    </button>
    @else
    <button wire:click="menu(0)" class="flex items-center mb-5 bg-blue-500 text-white text-sm font-bold px-4 py-3 rounded-lg w-full">
      <h1 class="text-lg">Menu</h1>
    </button>
    @endif
  </div>
  @if ($menu != 0)
  <div class="flex flex-wrap md:flex-no-wrap w-full menu">
    <div class="w-1/2 md:w-auto px-1 mb-3">
      <div class="h-48 md:h-36 border-b-4 border-yellow-800 bg-yellow-400 text-white text-center px-10 py-5 rounded-lg">
        <div class="text-4xl block md:inline-block">{{ $cucianPending }} </div> <i class="fas fa-shopping-cart text-4xl"></i>
        <p class="text-xl">Orderan Baru</p>
      </div>
    </div>
    <div class="w-1/2 md:w-auto px-1 mb-3">
      <div class="h-48 md:h-36 border-b-4 border-blue-900 bg-blue-500 text-white text-center px-10 py-5 rounded-lg">
        <div class="text-4xl block md:inline-block">{{ $cucianSedangDiCuci }} </div> <i class="fas fa-spinner text-4xl"></i>
        <p class="text-xl">Sedang di Cuci</p>
      </div>
    </div>
    <div class="w-1/2 md:w-auto px-1 mb-3">
      <div class="h-48 md:h-36 border-b-4 border-green-900 bg-green-500 text-white text-center px-10 py-5 rounded-lg">
        <div class="text-4xl block md:inline-block">{{ $cucianSelesai }} </div> <i class="fas fa-check-circle text-4xl"></i>
        <p class="text-xl">Orderan Selesai</p>
      </div>
    </div>
    <div class="w-1/2 md:w-auto px-1 mb-3">
      <div class="h-48 md:h-36 border-b-4 border-gray-900 bg-blue-800 text-white text-center px-10 py-5 rounded-lg">
        <div class="text-4xl block md:inline-block">{{ $jumlahPelanggan }} </div> <i class="fas fa-user text-4xl"></i>
        <p class="text-xl">Pelanggan</p>
      </div>
    </div>
  </div>
  @endif
</div>