<?php

namespace App\Http\Livewire;

use App\Models\Laundry;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class DaftarMenjadiLaundry extends Component
{
    public $nama;
    public $provinsi = 0;
    public $kota = 0;
    public $kecamatan = 0;
    public $kelurahan = 0;
    public $deskripsi;


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
        return view('livewire.daftar-menjadi-laundry', [
            'dataprovinsi' => $dataprovinsi['provinsi'],
            'datakota' => $datakota['kota_kabupaten'],
            'datakecamatan' => $datakecamatan['kecamatan'],
            'datakelurahan' => $datakelurahan['kelurahan']
        ]);
    }

    
    
    public function daftar()
    {
        $responseprovinsi = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi/'.$this->provinsi);
        $dataprovinsi = $responseprovinsi -> json();
        $namaprovinsi = $dataprovinsi['nama'];
        
        $responsekota = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kota/'.$this->kota);
        $datakota = $responsekota -> json();
        $namakota = $datakota['nama'];

        $responsekecamatan = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan/'.$this->kecamatan);
        $datakecamatan = $responsekecamatan -> json();
        $namakecamatan = $datakecamatan['nama'];

        $responsekelurahan = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kelurahan/'.$this->kelurahan);
        $datakelurahan = $responsekelurahan -> json();
        $namakelurahan = $datakelurahan['nama'];

        Laundry::create([
            'nama_laundry' => $this -> nama,
            'provinsi' => $namaprovinsi,
            'kota' => $namakota,
            'kecamatan' => $namakecamatan,
            'kelurahan' => $namakelurahan,
            'id_provinsi' => $this -> provinsi,
            'id_kota' => $this -> kota,
            'id_kecamatan' => $this -> kecamatan,
            'id_kelurahan' => $this -> kelurahan,
            'deskripsi' => $this -> deskripsi,
            'id_user' => Auth::user()->id
        ]);

        $user = User::find(Auth::user()->id);
        $user -> role = "pending_laundry";
        $user -> save();
        
        return redirect('/');

    }

    public function resetsemua()
    {
        $this -> nama = '';
        $this -> provinsi = 0;
        $this -> kota = 0;
        $this -> kecamatan = 0;
        $this -> kelurahan = 0;
        $this -> deskripsi = '';
    }
}
