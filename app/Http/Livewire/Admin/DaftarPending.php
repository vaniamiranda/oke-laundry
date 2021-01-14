<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class DaftarPending extends Component
{
    public $pilihOke = 0;
    public function render()
    {
        $ambil = User::select('users.id', 'users.name', 'users.email','laundries.id AS id_laundry', 'laundries.provinsi','laundries.kota','laundries.kecamatan','laundries.kelurahan', 'laundries.nama_laundry', 'laundries.deskripsi', 'users.profile_photo_path')
            ->where('users.role', '=', 'pending_laundry')
            ->join('laundries', 'users.id', '=', 'laundries.id_user')->paginate(10);
        return view('livewire.admin.daftar-pending', [
            'data' => $ambil
        ]);
        
    }

    public function setuju($id)
    {
        $user = User::find($id);
        $user -> role = "laundry";
        $user -> save();
        return redirect('/');
    }

    public function confirm($id)
    {
        $this -> pilihOke = $id;
    }
    public function batal()
    {
        $this -> pilihOke = 0;
    }
}
