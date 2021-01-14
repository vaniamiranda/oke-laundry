<?php

namespace App\Http\Livewire\User;

use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class RiwayatOrderan extends Component
{
    use WithPagination;
    public $search;
    public $paginate = 10;

    protected $queryString = ['search'];

    public function render()
    {
        $invoices = Invoice::
        select('laundries.nama_laundry', 'invoices.antrian', 'invoices.id_pelanggan', 'invoices.tanggal_masuk', 'invoices.tanggal_selesai', 'invoices.berat', 'invoices.total_harga', 'invoices.status_pembayaran', 'invoices.status_cucian')
        ->join('laundries', 'invoices.id_laundry', '=', 'laundries.id')
        ->where('invoices.id_pelanggan', '=', Auth::user()->id)
        ->where('laundries.nama_laundry', 'like', '%'.$this -> search.'%')
        ->orderBy('invoices.id', 'desc')
        ->paginate($this -> paginate);
        return view('livewire.user.riwayat-orderan', [
            'invoices' => $invoices
        ]);
    }

    public function paginateKurang()
    {
        if ($this -> paginate == 1) {
            $this -> paginate == 1;
        }else{
            $this -> paginate--;
        }
    }
    public function paginateTambah()
    {
        if ($this -> paginate == 100) {
            $this -> paginate == 100;
        }else{
            $this -> paginate++;
        }
    }
}
