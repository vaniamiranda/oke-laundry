<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pending');
    }

    public function pendingId($laundry)
    {
        return view('admin.pending-info', [
            'id_laundry' => $laundry
        ]);
    }

    public function laundry()
    {
        return view('admin.laundry');
    }

    public function user()
    {
        return view('admin.user');
    }
}
