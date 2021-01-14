<?php

namespace App\Http\Livewire\User;

use App\Models\Rating;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RiwayatOrderDetail extends Component
{
    public $antrian;
    public $invoices = [];
    public $pakaian = [];
    public $id_laundry;
    public $id_pelanggan;
    public $detailLaundry;
    public $cekSudah;
    public $sudah = FALSE;
    public $bintang = 0;

    protected $listeners = [
        'terbuat' => '$refresh'
    ];

    public function render()
    {
        $this -> invoice();
        $this -> detailLaundry();  
        $this -> cekSudah();
        $this -> bintang();

        return view('livewire.user.riwayat-order-detail');
    }

    public function invoice()
    {
        $invoice = User::
        select('invoices.id AS invoice_id', 'invoices.deskripsi_pakaian', 'users.name', 'users.email', 'no_hp', 'laundries.id', 'laundries.nama_laundry', 'invoices.antrian', 'invoices.id_pelanggan', 'invoices.tanggal_masuk', 'invoices.tanggal_selesai', 'invoices.berat', 'invoices.total_harga', 'invoices.status_pembayaran', 'invoices.status_cucian', 'invoices.pakaian',  'users.profile_photo_path')
        ->join('invoices', 'invoices.id_pelanggan', '=', 'users.id')
        ->join('laundries', 'invoices.id_laundry', '=', 'laundries.id')
        ->where('invoices.id_pelanggan', '=', Auth::user()->id)
        ->where('invoices.antrian', '=', $this -> antrian)
        ->get();

        foreach ($invoice as $index => $data) {
            $this -> invoices = $data;
        }
        $this -> pakaian = json_decode($this -> invoices -> pakaian);
        $this -> id_laundry = $this -> invoices -> id;
        $this -> id_pelanggan = $this -> invoices -> id_pelanggan;

    }
    public function detailLaundry()
    {
        $this -> detailLaundry = User::select('users.id', 'users.name', 'users.email', 'users.no_hp', 'users.profile_photo_path', 'laundries.id AS laundry_id', 'laundries.nama_laundry', 'laundries.provinsi', 'laundries.kota', 'laundries.kecamatan', 'laundries.kelurahan', 'laundries.deskripsi')
            ->where('laundries.id', '=', $this -> id_laundry)
            ->join('laundries', 'users.id', '=', 'laundries.id_user')->get();

    }

    public function cekSudah()
    {
        $this -> cekSudah = Rating::
        select('antrian')
        ->where('antrian', '=', $this -> antrian)
        ->get();
        $a = 0;
        foreach ($this -> cekSudah as $ada) {
            $a = 1;
        }
        if ($a) {
            $this -> sudah = TRUE;
        }else{
            $this -> sudah = FALSE;
        }

    }

    public function star($star)
    {
        Rating::create([
            'id_laundry' => $this -> id_laundry,
            'id_pelanggan' => $this -> id_pelanggan,
            'bintang' => $star,
            'antrian' => $this -> antrian
        ]);
        $this -> emit('terbuat');

    }

    public function bintang()
    {
        $this -> bintang = Rating::
        select('bintang')
        ->where('antrian', '=', $this -> antrian)
        ->get();
        $a = 0;
        $b = 0;
        foreach ($this -> bintang as $ada) {
            $a += $ada['bintang'];
            $b++;
        }
        if ($b > 0) {
            $this -> bintang = $a;
        }else{
            $this -> bintang = 0;
        }
        
    }
}
