<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    public function dashboard()
    {
        return view('user.home');
    }

    public function home()
    {
        return view('user.home');
    }

    public function daftarLaundry()
    {
        return view('user.daftar-laundry');
    }

    public function detailLaundryId($id_laundry)
    {
        return view('user.detail-laundry', [
            'id_laundry' => $id_laundry
        ]);
    }

    public function orderLaundryId($id_laundry)
    {
        return view('user.order-laundry', [
            'id_laundry' => $id_laundry
        ]);
    }

    public function riwayatOrderan()
    {
        return view('user.riwayat-orderan');
    }

    public function riwayatOrderanAntrian($antrian)
    {
        return view('user.riwayat-order-detail', [
            'antrian' => $antrian
        ]);
    }
}
