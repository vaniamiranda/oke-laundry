<?php

namespace App\Http\Livewire\User;

use App\Models\Type;
use App\Models\User;
use Livewire\Component;

class DetailLaundry extends Component
{
    public $id_laundry;
    public function render()
    {
        $table = Type::select('types.*', 'laundries.id AS laundry_id')
            ->where('laundries.id', '=', $this -> id_laundry)
            ->join('laundries', 'types.id_laundry', '=', 'laundries.id_user')->get();

        $ambil = User::select('users.id', 'users.name', 'users.email', 'users.no_hp', 'users.profile_photo_path', 'laundries.id AS laundry_id', 'laundries.nama_laundry', 'laundries.provinsi', 'laundries.kota', 'laundries.kecamatan', 'laundries.kelurahan', 'laundries.deskripsi')
            ->where('laundries.id', '=', $this -> id_laundry)
            ->join('laundries', 'users.id', '=', 'laundries.id_user')->get();
            
        return view('livewire.user.detail-laundry', [
            'laundry' => json_decode($ambil[0]),
            'table' => $table
        ]);
    }
}
