<?php

namespace App\Http\Livewire\User;

use App\Models\Invoice;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Webpatser\Uuid\Uuid;

class OrderLaundry extends Component
{
    public $id_laundry = 0;
    public $allProducts = [];
    public $order = [];
    public $deskripsi = '';
    public $total = 0;
    public $error = 0;

    public function mount()
    {
        $this -> allProducts = Type::select('types.*', 'laundries.id AS laundry_id')
            ->where('laundries.id', '=', $this -> id_laundry)
            ->join('laundries', 'types.id_laundry', '=', 'laundries.id_user')->get();
        foreach ($this -> allProducts as $index => $data) {
            $this -> order[$index] = [
                    'jenis_pakaian' => $data->jenis_pakaian,
                    'quantity' => 0
            ];
        }
    }

    public function render()
    {
        return view('livewire.user.order-laundry');
    }

    public function tambah_pakaian($id, $index)
    {
        $this -> order[$index]['quantity']++;
    }

    public function kurang_pakaian($id, $index)
    {
        if ($this -> order[$index]['quantity'] == 0) {
            $this -> order[$index]['quantity'] == 0;
        }else{
            $this -> order[$index]['quantity']--;
        }
    }

    public function order()
    {
        // /*
        Invoice::create([
            'id_laundry' => $this->id_laundry,
            'antrian' => Uuid::generate(),
            'id_pelanggan' => Auth::user()->id,
            'deskripsi_pakaian' => $this -> deskripsi,
            'tempat' => Auth::user()->lokasi_kelurahan,
            'status_pembayaran' => 'pending',
            'status_cucian' => 'pending',
            'pakaian' => json_encode($this -> order)
        ]);

        session()->flash('status', 'Order Berhasil di Tambahkan');
        redirect()->route('home');
        // */
    }

    public function kosong()
    {
        $this -> error = 1;
    }
    public function tutup()
    {
        $this -> error = 0;
    }
}
