<div class="p-3 md:p-6">
    <div class="bg-white p-3 rounded-lg">
        <div class="flex flex-wrap justify-center gap-1">
            <div class="w-full md:w-1/2 mb-3 px-2 py-1 rounded-lg flex justify-center">
                <button wire:click="paginateKurang"><i class="fas fa-minus"></i></button>
                <span class="mx-2">Menampilkan {{ $paginate }} data</span>
                <button wire:click="paginateTambah"><i class="fas fa-plus"></i></button>
            </div>
            <input type="range" min="1" max="100" wire:model="paginate" class="w-full md:w-1/2 mb-3 px-2 py-1 rounded-lg">
            <input type="text" class="w-full md:w-1/2 mb-3 px-2 py-1 rounded-lg" wire:model="search" placeholder="Cari...">
        </div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($data as $item)
                                <tr class="hover:bg-gray-100">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="{{ $item -> profile_photo_url }}" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $item -> name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $item->email }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $data->links() }}
    </div>
</div>