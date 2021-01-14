<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PilihLokasiLaundry extends Component
{
    public $provinsi = 0;
    public $kota = 0;
    public $kecamatan = 0;
    public $kelurahan = 0;

    public function render()
    {
        $responseprovinsi = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
        $dataprovinsi = $responseprovinsi -> json();

        $responsekota = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi='.$this -> provinsi);
        $datakota = $responsekota -> json();

        $responsekecamatan = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota='.$this -> kota);
        $datakecamatan = $responsekecamatan -> json();

        $responsekelurahan = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan='.$this -> kecamatan);
        $datakelurahan = $responsekelurahan -> json();


        return view('livewire.user.pilih-lokasi-laundry', [
            'dataprovinsi' => $dataprovinsi['provinsi'],
            'datakota' => $datakota['kota_kabupaten'],
            'datakecamatan' => $datakecamatan['kecamatan'],
            'datakelurahan' => $datakelurahan['kelurahan']
        ]);
    }

    public function daftar()
    {
        
        $user = User::find(Auth::user()->id);
        $user -> lokasi_kelurahan = $this -> kelurahan;
        $user -> save();
        
        return redirect('/');

    }

    public function resetsemua()
    {
        $this -> provinsi = 0;
        $this -> kota = 0;
        $this -> kecamatan = 0;
        $this -> kelurahan = 0;
    }
}
