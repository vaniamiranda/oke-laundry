<div class="p-3 md:p-6">
  <div class="px-3 md:px-5 py-5 rounded-lg lg:px-48 bg-gradient-to-br from-gray-900 via-blue-700 to-blue-300 min-h-screen">
	<div class="flex flex-wrap text-center text-lg mb-5 px-2 py-3 rounded-lg">
		<div class="flex bg-white rounded-lg p-6 w-full">
			<img class="h-24 w-24 rounded-full mx-0 mr-6" src="{{ $invoices->profile_photo_url }}">
			<div class="text-center text-left">
				<h2 class="text-lg text-left">{{ $invoices->name }}</h2>
				<div class="text-gray-600 text-left">{{ $invoices->email }}</div>
				<div class="text-gray-600 text-left">
					<a class="px-2 py-1 rounded-lg bg-green-500 hover:bg-green-600 text-white text-left" target="_blank" href="https://wa.me/{{ $invoices->no_hp }}">
						<i class="fab fa-whatsapp"></i> {{ $invoices->no_hp }}
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="flex flex-wrap text-lg mb-5 bg-white px-2 py-1 rounded-lg justify-around">
		<span class="w-full md:w-auto">Tanggal Masuk : 
			@if (isset($invoices->tanggal_masuk))
				{{ date("d-m-Y", strtotime($invoices->tanggal_masuk)) }}
			@endif
		</span>
		<span class="w-full md:w-auto">Tanggal Selesai : 
			@if (isset($invoices->tanggal_selesai))
				{{ date("d-m-Y", strtotime($invoices->tanggal_selesai)) }}
			@endif
		</span>
	</div>

	<!-- table -->
	<div class="flex flex-col">
		<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
			<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
				<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
					<table class="min-w-full divide-y divide-gray-200">
						<thead class="bg-green-500 text-white">
							<tr>
								<th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
									Jenis
								</th>
								<th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-center">
									Jumlah
								</th>
							</tr>
						</thead>
						<tbody class="bg-white divide-y divide-gray-200">
							@php($jumlah = 0)
							@foreach ($pakaian as $pakai)
							<tr>
								<td class="px-6 py-4 whitespace-nowrap text-sm">
									{{ $pakai -> jenis_pakaian }}
								</td>
								<td class="px-6 py-4 whitespace-nowrap text-sm text-center">
									{{ $pakai -> quantity }}
								</td>
							</tr>
							@php($jumlah += $pakai -> quantity)
							@endforeach
							<tr>
								<td class="font-bold px-6 py-4 whitespace-nowrap text-sm">
									Total Pakaian
								</td>
								<td class="font-bold px-6 py-4 whitespace-nowrap text-sm text-center">
									{{ $jumlah }}
								</td>
							</tr>
							<tr>
								<td colspan="2" class="px-6 py-4 whitespace-nowrap text-sm">
									<h1>Keterangan : </h1>
									{!! nl2br(e($invoices->deskripsi_pakaian)) !!}
								</td>
							</tr>
						</tbody>
						<tfoot class="bg-green-500 text-white">
							<tr>
								<th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
									Berat
								</th>
								<th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-center">
									{{ $invoices->berat }} Kg
								</th>
							</tr>
							<tr>
								<th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
									Total Harga
								</th>
								<th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-center">
									Rp. {{ $invoices->total_harga }}
								</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- table/ -->

	<pre>
	{{-- {{ print_r($pakaian) }} --}}
	{{-- {{ $invoices->invoice_id }}
	{{ $invoices->name }}
	{{ $invoices->email }}
	{{ $invoices->id }}
	{{ $invoices->nama_laundry }}
	{{ $invoices->antrian }}
	{{ $invoices->id_pelanggan }}
	{{ $invoices->tanggal_masuk }}
	{{ $invoices->tanggal_selesai }}
	{{ $invoices->berat }}
	{{ $invoices->total_harga }}
	{{ $invoices->status_pembayaran }}
	{{ $invoices->status_cucian }}
	{{ $invoices->pakaian }}
	{{ $invoices->profile_photo_url }} --}}
	</pre>

</div>
</div>