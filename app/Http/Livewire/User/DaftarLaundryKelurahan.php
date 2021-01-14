<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DaftarLaundryKelurahan extends Component
{
    public $tanya = FALSE;
    public $datas;

    public function render()
    {
        $this -> datas();
        return view('livewire.user.daftar-laundry-kelurahan');
    }

    public function datas()
    {
        $this -> datas = User::select('users.id', 'users.name', 'users.email', 'users.profile_photo_path', 'laundries.id AS laundry_id', 'laundries.nama_laundry', 'laundries.provinsi', 'laundries.kota', 'laundries.kecamatan', 'laundries.kelurahan', 'laundries.deskripsi')
        ->selectRaw('avg(ratings.bintang) AS bintang')
        ->where('laundries.id_kelurahan', '=', Auth::user()->lokasi_kelurahan)
        ->where('users.role', '=', 'laundry')
        ->join('laundries', 'users.id', '=', 'laundries.id_user')
        ->leftJoin('ratings', 'laundries.id', '=', 'ratings.id_laundry')
        ->distinct()
        ->groupBy('laundries.id')
        ->get();
    }


    public function gantiLokasi()
    {
        $this -> tanya = FALSE;
        $lokasi = User::find(Auth::user()->id);
        $lokasi -> lokasi_kelurahan = '';
        $lokasi -> save();
        return redirect('/');
    }

    public function tanya()
    {
        $this -> tanya = TRUE;
    }

    public function batal()
    {
        $this -> tanya = FALSE;
    }
}
