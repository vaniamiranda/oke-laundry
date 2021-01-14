<div class="px-3 md:px-5 lg:px-48">
  <div class="flex justify-center py-8">
    <table class="w-full sm:w-1/2 my-10 rounded-xl overflow-hidden">
        <thead>
            <tr>
                <th class="px-2 py-1 text-2xl bg-blue-700 text-white" colspan="2">{{ $laundry->nama_laundry }}</th>
            </tr>
        </thead>
        <tbody class="text-left px-2 py-1 bg-gradient-to-br from-custom-green to-teal-600 text-white">
            <tr>
                <th class="px-2 py-2 text-lg">Provinsi</th>
                <td class="px-2 py-2 text-lg">{{ $laundry->provinsi }}</td>
            </tr>
            <tr>
                <th class="px-2 py-2 text-lg">Kota</th>
                <td class="px-2 py-2 text-lg">{{ $laundry->kota }}</td>
            </tr>
            <tr>
                <th class="px-2 py-2 text-lg">Kecamatan</th>
                <td class="px-2 py-2 text-lg">{{ $laundry->kecamatan }}</td>
            </tr>
            <tr>
                <th class="px-2 py-2 text-lg">Kelurahan</th>
                <td class="px-2 py-2 text-lg">{{ $laundry->kelurahan }}</td>
            </tr>
            <tr>
                <td class="px-2 py-2 text-lg" colspan="2">
                    <div class="border-2 px-2 py-1 rounded-xl text-white text-center">Status Anda Masih Pending</div>
                </td>
            </tr>
        </tbody>
    </table>
  </div>
</div>