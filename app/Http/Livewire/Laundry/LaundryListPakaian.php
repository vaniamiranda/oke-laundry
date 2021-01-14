<?php

namespace App\Http\Livewire\Laundry;

use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LaundryListPakaian extends Component
{
    public $jenis, $harga;
    public $updateId = 0;
    public $hapusId = 0;
    public $kosong = FALSE;
    protected $listeners = [
        'jenis-terbuat' => '$refresh'
    ];

    public function render()
    {
        $id = Auth::user()->id;
        $data = Type::where('id_laundry', '=', $id)->get();
        return view('livewire.laundry.laundry-list-pakaian', [
            'datas' => $data
        ]);
    }

    public function edit($idJenis)
    {
        $this -> kosong = FALSE;
        $jenis = Type::find($idJenis);
        $this -> updateId = $idJenis;
        $this -> jenis = $jenis -> jenis_pakaian;
        $this -> harga = $jenis -> harga;
    }
    public function update($idJenis)
    {
        if ($this -> jenis == '' || $this -> harga == '') {
            $this -> kosong = TRUE;
        }else{
            $this -> kosong = FALSE;
            $jenis = Type::find($idJenis);
            $jenis -> jenis_pakaian = $this -> jenis;
            $jenis -> harga = $this -> harga;
            $jenis -> save();
            $this -> updateId = 0;
        }
    }

    public function batal()
    {
        $this -> kosong = FALSE;
        $this -> updateId = 0;
    }

    public function hapus($id)
    {
        $this -> kosong = FALSE;
        $this -> hapusId = $id;
    }

    public function batal2()
    {
        $this -> kosong = FALSE;
        $this -> hapusId = 0;
    }

    public function delete($id)
    {
        $jenis = Type::find($id);
        $jenis -> delete();
        $this -> hapusId = 0;
    }
}
