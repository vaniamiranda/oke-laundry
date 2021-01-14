<div class="">
  <div class="flex flex-wrap md:flex-no-wrap gap-1">
    <input
      wire:model="jenis"
      class="w-full w-1/2 mb-2 px-2 py-1 rounded-lg"
      type="text"
      placeholder="Jenis"
    />
    <input
      wire:model="harga"
      class="w-full w-1/2 mb-2 px-2 py-1 rounded-lg"
      type="text"
      placeholder="Harga"
    />
    <input
      wire:click="tambah"
      class="w-full w-1/2 mb-2 px-2 py-1 rounded-lg text-white bg-green-500 hover:bg-green-600"
      type="submit"
      value="Tambah"
    />
  </div>
</div>
