<div class="p-3 md:p-6">
    <div class="px-3 md:px-5 py-5 rounded-lg lg:px-48">
        <div class="flex flex-wrap justify-center gap-1">
            <div class="w-full md:w-1/2 mb-3 px-2 py-1 rounded-lg flex justify-center text-white">
                <button wire:click="paginateKurang"><i class="fas fa-minus"></i></button>
                <span class="mx-2">Menampilkan {{ $paginate }} data</span>
                <button wire:click="paginateTambah"><i class="fas fa-plus"></i></button>
            </div>
            <input class="w-full md:w-1/2 -mt-5" type="range" wire:model="paginate" min="1" max="100">
            <input wire:model="search" type="search" class="w-full md:w-1/2 px-2 py-1 rounded-lg mb-3" placeholder="Cari...">
        </div>
        @foreach ($invoices as $invoice)
        @if ($invoice -> id_pelanggan == Auth::user()->id)
        @if ($invoice -> status_cucian == 'pending')
        <a href="{{ route('user.riwayat-orderan-detail', $invoice -> antrian) }}">
            <div class="bg-white border-l-4 border-yellow-500 text-yellow-700 p-4 mb-3" role="alert">
                <p class="font-bold">{{ $invoice -> nama_laundry }}</p>
                <p>Status: {{ $invoice -> status_cucian }}</p>
            </div>
        </a>
        @elseif ($invoice -> status_cucian == 'sedang dicuci')
        <a href="{{ route('user.riwayat-orderan-detail', $invoice -> antrian) }}">
            <div class="bg-white border-l-4 border-blue-500 text-blue-700 p-4 mb-3" role="alert">
                <p class="font-bold">{{ $invoice -> nama_laundry }}</p>
                <p>Tanggal Masuk: {{ $invoice -> tanggal_masuk }}</p>
                <p>Tanggal Selesai: {{ date("d-m-Y", strtotime($invoice -> tanggal_selesai)) }}</p>
                <p>Status: {{ $invoice -> status_cucian }}</p>
                <div class="flex justify-end">
                    @if ($invoice -> status_pembayaran == 'lunas')
                    <div class="font-bold bg-green-500 text-white px-2 py-1">Lunas</div>
                    @elseif ($invoice -> status_pembayaran == 'belum lunas')
                    <div class="font-bold bg-red-500 text-white px-2 py-1">Belum Lunas</div>
                    @elseif ($invoice -> status_pembayaran == 'pending')
                    <div class="font-bold bg-yellow-400 text-white px-2 py-1">Pending</div>
                    @endif
                </div>
            </div>
        </a>
        @elseif ($invoice -> status_cucian == 'selesai')
        <a href="{{ route('user.riwayat-orderan-detail', $invoice -> antrian) }}">
            <div class="bg-white border-l-4 border-green-500 text-green-700 p-4 mb-3" role="alert">
                <p class="font-bold">{{ $invoice -> nama_laundry }}</p>
                <p>Tanggal Masuk: {{ $invoice -> tanggal_masuk }}</p>
                <p>Tanggal Selesai: {{ date("d-m-Y", strtotime($invoice -> tanggal_selesai)) }}</p>
                <p>Status: {{ $invoice -> status_cucian }}</p>
                <div class="flex justify-end">
                    @if ($invoice -> status_pembayaran == 'lunas')
                    <div class="font-bold bg-green-500 text-white px-2 py-1">Lunas</div>
                    @elseif ($invoice -> status_pembayaran == 'belum lunas')
                    <div class="font-bold bg-red-500 text-white px-2 py-1">Belum Lunas</div>
                    @elseif ($invoice -> status_pembayaran == 'pending')
                    <div class="font-bold bg-yellow-400 text-white px-2 py-1">Pending</div>
                    @endif
                </div>
            </div>
        </a>
        @elseif ($invoice -> status_cucian == 'batal')
        <div class="bg-white border-l-4 border-red-500 text-red-700 p-4 mb-3" role="alert">
            <p class="font-bold">{{ $invoice -> nama_laundry }}</p>
            <p>Status: {{ $invoice -> status_cucian }}</p>
        </div>
        @endif
        @endif
        @endforeach
        {{ $invoices -> links() }}
    </div>
</div>