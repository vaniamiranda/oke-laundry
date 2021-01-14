<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pendingLaundryController extends Controller
{
    public function index()
    {
        return view('pending-laundry');
    }
}
