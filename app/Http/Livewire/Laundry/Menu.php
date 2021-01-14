<?php

namespace App\Http\Livewire\Laundry;

use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Menu extends Component
{
    public $jumlahPelanggan;
    public $cucianPending;
    public $cucianSedangDiCuci;
    public $cucianSelesai;
    public $menu = 0;

    public function render()
    {
        $this -> ambilJumlahCucianPending();
        $this -> ambilJumlahCucianSedangDiCuci();
        $this -> ambilJumlahCucianSelesai();
        $this -> ambilJumlahPelanggan();
        return view('livewire.laundry.menu');
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

    public function menu($id)
    {
        $this -> menu = $id;
    }
}
