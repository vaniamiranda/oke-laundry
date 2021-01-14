<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaundryController extends Controller
{
    public function index()
    {
        return view('laundry.dashboard');
    }

    public function pakaian()
    {
        return view('laundry.pakaian');
    }

    public function detail()
    {
        return view('laundry.detail');
    }

    public function nota($antrian)
    {
        return view('laundry.nota', [
            'antrian' => $antrian
        ]);
    }
}
