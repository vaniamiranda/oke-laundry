<?php

namespace App\Http\Livewire\Laundry;

use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LaundryCreatePakaian extends Component
{
    public $jenis;
    public $harga;

    public function render()
    {
        return view('livewire.laundry.laundry-create-pakaian');
    }

    public function tambah()
    {
        Type::create([
            'id_laundry' => Auth::user()->id,
            'jenis_pakaian' => $this -> jenis,
            'harga' => $this -> harga
        ]);
        $this -> jenis = '';
        $this -> harga = '';
        $this -> emit('jenis-terbuat');
    }
}
