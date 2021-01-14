<?php

namespace App\Http\Livewire\Laundry;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public $jumlahPelanggan;
    public $cucianPending;
    public $cucianSedangDiCuci;
    public $cucianSelesai;
    public $search;
    public $paginate = 10;
    protected $queryString = ['search'];
    public $edit = 0;
    public $statusPembayaran;
    public $statusCucian;
    public $harga;
    public $berat;
    public $alertUpdate = 0;
    public $tanggalMasuk;
    public $tanggalSelesai;

    

    public function render()
    {
        $this -> ambilJumlahCucianPending();
        $this -> ambilJumlahCucianSedangDiCuci();
        $this -> ambilJumlahCucianSelesai();
        $this -> ambilJumlahPelanggan();

        $invoices = User::
        select('invoices.id AS invoice_id', 'laundries.id_user', 'users.name', 'users.email', 'laundries.id', 'laundries.nama_laundry', 'invoices.antrian', 'invoices.id_pelanggan', 'invoices.tanggal_masuk', 'invoices.tanggal_selesai', 'invoices.berat', 'invoices.total_harga', 'invoices.status_pembayaran', 'invoices.status_cucian', 'users.profile_photo_path')
        ->join('invoices', 'invoices.id_pelanggan', '=', 'users.id')
        ->join('laundries', 'invoices.id_laundry', '=', 'laundries.id')
        ->where('laundries.id_user', '=', Auth::user()->id)
        ->where('invoices.antrian', 'like', '%'.$this -> search.'%')
        ->orWhere('users.name', 'like', '%'.$this -> search.'%')
        ->orWhere('users.email', 'like', '%'.$this -> search.'%')
        ->orderBy('invoices.created_at', 'desc')
        ->paginate($this -> paginate);
        return view('livewire.laundry.dashboard', [
            'invoices' => $invoices
        ]);
    }

    public function ambilJumlahPelanggan()
    {
        $pelanggan = Invoice::
        select('invoices.id_pelanggan')
        ->join('laundries', 'invoices.id_laundry', '=', 'laundries.id')
        ->join('users', 'laundries.id_user', '=', 'users.id')
        ->where('users.id', '=', Auth::user()->id)
        ->distinct()
        ->get();
        $jumlah_pelanggan = 0;
        foreach ($pelanggan as $cucian) {
            $jumlah_pelanggan++;
        }
        $this -> jumlahPelanggan = $jumlah_pelanggan;
    }

    public function ambilJumlahCucianPending()
    {
        $cucians = Invoice::
        select('invoices.id')
        ->join('laundries', 'invoices.id_laundry', '=', 'laundries.id')
        ->join('users', 'laundries.id_user', '=', 'users.id')
        ->where('invoices.status_cucian', '=', 'pending')
        ->where('users.id', '=', Auth::user()->id)
        ->get();
        $jumlah_cucian = 0;
        foreach ($cucians as $cucian) {
            $jumlah_cucian++;
        }
        $this -> cucianPending = $jumlah_cucian;
    }

    public function ambilJumlahCucianSedangDiCuci()
    {
        $cucians = Invoice::
        select('invoices.id')
        ->join('laundries', 'invoices.id_laundry', '=', 'laundries.id')
        ->join('users', 'laundries.id_user', '=', 'users.id')
        ->where('invoices.status_cucian', '=', 'sedang dicuci')
        ->where('users.id', '=', Auth::user()->id)
        ->get();
        $jumlah_cucian = 0;
        foreach ($cucians as $cucian) {
            $jumlah_cucian++;
        }
        $this -> cucianSedangDiCuci = $jumlah_cucian;
    }

    public function ambilJumlahCucianSelesai()
    {
        $cucians = Invoice::
        select('invoices.id')
        ->join('laundries', 'invoices.id_laundry', '=', 'laundries.id')
        ->join('users', 'laundries.id_user', '=', 'users.id')
        ->where('invoices.status_cucian', '=', 'selesai')
        ->where('users.id', '=', Auth::user()->id)
        ->get();
        $jumlah_cucian = 0;
        foreach ($cucians as $cucian) {
            $jumlah_cucian++;
        }
        $this -> cucianSelesai = $jumlah_cucian;
    }

    public function paginateKurang()
    {
        if ($this -> paginate == 1) {
            $this -> paginate == 1;
        }else{
            $this -> paginate--;
        }
    }
    public function paginateTambah()
    {
        if ($this -> paginate == 100) {
            $this -> paginate == 100;
        }else{
            $this -> paginate++;
        }
    }

    public function edit($id)
    {
        $invoice = Invoice::find($id);
        $this -> berat = $invoice -> berat;
        $this -> harga = $invoice -> total_harga;
        $this -> statusPembayaran = $invoice -> status_pembayaran;
        $this -> statusCucian = $invoice -> status_cucian;
        $this -> tanggalMasuk = $invoice -> tanggal_masuk;
        $this -> tanggalSelesai = $invoice -> tanggal_selesai;
        $this -> edit = $id;
        
    }

    public function batal()
    {
        $this -> berat = '';
        $this -> harga = '';
        $this -> statusPembayaran = '';
        $this -> statusCucian = '';
        $this -> tanggalMasuk = '';
        $this -> tanggalSelesai = '';
        $this -> edit = 0;
    }

    public function tanya($id)
    {
        $this -> alertUpdate = $id;
    }

    public function batalUpdate()
    {
        $this -> berat = '';
        $this -> harga = '';
        $this -> statusPembayaran = '';
        $this -> statusCucian = '';
        $this -> tanggalMasuk = '';
        $this -> tanggalSelesai = '';
        $this -> edit = 0;
        $this -> alertUpdate = 0;
    }

    public function update($id)
    {
        $invoice = Invoice::find($id);
        $invoice -> berat = $this -> berat;
        $invoice -> total_harga = $this -> harga;
        $invoice -> status_pembayaran = $this -> statusPembayaran;
        $invoice -> status_cucian = $this -> statusCucian;
        $invoice -> tanggal_masuk = $this -> tanggalMasuk;
        $invoice -> tanggal_selesai = $this -> tanggalSelesai;
        $invoice -> save();
        $this -> edit = 0;
        $this -> alertUpdate = 0;
    }
}
