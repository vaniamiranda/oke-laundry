<div class="p-3 md:p-6">
    <div class="px-3 md:px-5 py-5 rounded-lg lg:px-48">
        <div class="w-full flex justify-center">
            <div class="h-48 w-48 overflow-hidden rounded-lg flex items-center bg-cover bg-center" style="background-image: url('{{ $laundry->profile_photo_url }}')">
            </div>
        </div>
        <h1 class="w-full text-center text-white text-4xl font-bold">{{ $laundry->name }}</h1>
        <h1 class="w-full text-center text-white text-xl">{{ $laundry->email }}</h1>
        <h1 class="w-full text-center text-white text-xl">{{ $laundry->provinsi }} | {{ $laundry->kota }} | {{ $laundry->kecamatan }} | {{ $laundry->kelurahan }}</h1>
        <h1 class="w-full text-center text-white text-xl">
            <a class="px-2 py-1 rounded-lg bg-green-500 hover:bg-green-600 text-white" href="https://wa.me/{{ $laundry -> no_hp }}" target="_blank"><i class="fab fa-whatsapp"></i> {{ $laundry -> no_hp }}</a>
        </h1>
        <p class="w-full text-center text-white text-lg">{!! nl2br(e($laundry->deskripsi)) !!}</p>
        <table class="w-full">
            <tbody>
                @foreach ($table as $item)
                <tr class="border-b text-white">
                    <td class="px-2 py-1 text-left">{{ $item -> jenis_pakaian }}</td>
                    <td class="px-2 py-1 text-left">: Rp.{{ $item -> harga }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>