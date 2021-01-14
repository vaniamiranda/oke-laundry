<div class="p-3 md:p-6">
    <div class="px-3 md:px-5 py-5 rounded-lg lg:px-48">
        <div class="flex flex-col text-center justify-center">
            <div class="w-full mb-3">
                <input wire:model="nama" class="px-2 py-1 rounded bg-white w-full" type="text" placeholder="Nama Laundry">
            </div>
            <div class="w-full mb-3 flex gap-3">
                <select class="px-3 py-2 text-md rounded bg-white w-full" wire:model="provinsi">
                    <option value="0">Pilih Provinsi</option>
                    @foreach ($dataprovinsi as $data)
                    <option value="{{ $data['id'] }}">{{ $data['nama'] }}</option>
                    @endforeach
                </select>
            </div>
            @if ($provinsi != 0)
            <div class="w-full mb-3 flex gap-3">
                <select class="px-3 py-2 text-md rounded bg-white w-full" wire:model="kota">
                    <option value="0">Pilih Kota/Kabupaten</option>
                    @foreach ($datakota as $data)
                    <option value="{{ $data['id'] }}">{{ $data['nama'] }}</option>
                    @endforeach
                </select>
            </div>
            @endif

            @if ($kota != 0)
            <div class="w-full mb-3 flex gap-3">
                <select class="px-3 py-2 text-md rounded bg-white w-full" wire:model="kecamatan">
                    <option value="0">Pilih Kecamatan</option>
                    @foreach ($datakecamatan as $data)
                    <option value="{{ $data['id'] }}">{{ $data['nama'] }}</option>
                    @endforeach
                </select>
            </div>
            @endif

            @if ($kecamatan != 0)
            <div class="w-full mb-3 flex gap-3">
                <select class="px-3 py-2 text-md rounded bg-white w-full" wire:model="kelurahan">
                    <option value="0">Pilih Kelurahan</option>
                    @foreach ($datakelurahan as $data)
                    <option value="{{ $data['id'] }}">{{ $data['nama'] }}</option>
                    @endforeach
                </select>
            </div>
            @endif
            <div class="w-full mb-3">
                <textarea wire:model="deskripsi" class="px-2 py-1 rounded bg-white w-full h-40" name="" id="" placeholder="Deskripsikan laundry anda dan sertakan alamat lengkap"></textarea>
            </div>
            @if ($nama != '' && $deskripsi != '' && $provinsi != 0 && $kota != 0 && $kecamatan != 0 && $kelurahan != 0)
            <div class="flex gap-3">
                <div class="w-1/2 px-1">
                    <button class="mt-3 text-white px-2 py-1 w-full rounded bg-green-500 hover:bg-green-600" wire:click="daftar">Daftar</button>
                </div>
                <div class="w-1/2 px-1">
                    <button class="text-center mt-3 text-white px-2 py-1 w-full rounded bg-gradient-to-br from-gray-800 to-gray-900 hover:from-gray-700 hover:to-gray-800" wire:click="resetsemua">Reset</button>
                </div>
            </div>
            @else
            <div class="w-full mb-3">
                <div class="flex gap-3">
                    <div class="w-1/2 px-1">
                        <input disabled class="text-center mt-3 text-white px-2 py-1 w-full rounded bg-green-900" value="Daftar">
                    </div>
                    <div class="w-1/2 px-1">
                        <button class="text-center mt-3 text-white px-2 py-1 w-full rounded bg-gradient-to-br from-gray-800 to-gray-900 hover:from-gray-700 hover:to-gray-800" wire:click="resetsemua">Reset</button>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>