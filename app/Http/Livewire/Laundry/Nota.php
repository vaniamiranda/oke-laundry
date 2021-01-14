<?php

namespace App\Http\Livewire\Laundry;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Nota extends Component
{
    public $antrian;
    public $invoices = [];
    public $pakaian = [];

    public function render()
    {
        $this -> invoice();        
        return view('livewire.laundry.nota');
    }

    public function invoice()
    {
        $invoice = User::
        select('invoices.id AS invoice_id', 'invoices.deskripsi_pakaian', 'users.name', 'users.email', 'no_hp', 'laundries.id', 'laundries.nama_laundry', 'invoices.antrian', 'invoices.id_pelanggan', 'invoices.tanggal_masuk', 'invoices.tanggal_selesai', 'invoices.berat', 'invoices.total_harga', 'invoices.status_pembayaran', 'invoices.status_cucian', 'invoices.pakaian',  'users.profile_photo_path')
        ->join('invoices', 'invoices.id_pelanggan', '=', 'users.id')
        ->join('laundries', 'invoices.id_laundry', '=', 'laundries.id')
        ->where('laundries.id_user', '=', Auth::user()->id)
        ->where('invoices.antrian', '=', $this -> antrian)
        ->get();
        foreach ($invoice as $index => $data) {
            $this -> invoices = $data;
        }
        $this -> pakaian = json_decode($this -> invoices -> pakaian);

    }
}
