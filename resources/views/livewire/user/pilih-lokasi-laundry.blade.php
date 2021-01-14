<div class="justify-center items-center mt-5 px-4 py-2 md:px-12">
    <div class="rounded py-5 md:p-5 justify-center items-center">
        <div class="flex flex-col text-center justify-center">
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
            @if ($provinsi != 0 && $kota != 0 && $kecamatan != 0 && $kelurahan != 0)
            <div class="flex gap-3">
                    <div class="w-1/2 px-1">
                        <button class="mt-3 text-white px-2 py-1 w-full rounded bg-green-600 hover:bg-green-700" wire:click="daftar">Konfirmasi</button>
                    </div>
                    <div class="w-1/2 px-1">
                        <button class="text-center mt-3 text-white px-2 py-1 w-full rounded bg-gradient-to-r from-gray-800 to-gray-900 hover:from-gray-700 hover:to-gray-800" wire:click="resetsemua">Reset</button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
    