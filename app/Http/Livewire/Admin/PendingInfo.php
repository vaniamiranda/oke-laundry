<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class PendingInfo extends Component
{
    public $id_laundry;
    public $pilihOke = 0;
    
    public function render()
    {
        $ambil = User::select('users.id', 'users.name', 'users.email', 'users.profile_photo_path', 'laundries.id AS laundry_id', 'laundries.nama_laundry', 'laundries.provinsi', 'laundries.kota', 'laundries.kecamatan', 'laundries.kelurahan', 'laundries.deskripsi')
            ->where('laundries.id', '=', $this -> id_laundry)
            ->join('laundries', 'users.id', '=', 'laundries.id_user')->get();
        return view('livewire.admin.pending-info', [
            'laundry' => json_decode($ambil[0]),
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
