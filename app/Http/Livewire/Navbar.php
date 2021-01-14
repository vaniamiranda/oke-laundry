<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public $admins;
    public $laundries;
    public $users;
    public $userDropdowns;

    public function render()
    {
        $this -> admins();
        $this -> laundries();
        $this -> users();
        return view('livewire.navbar', [
            'admins' => $this -> admins,
            'laundries' => $this -> laundries,
            'users' => $this -> users,
        ]);
    }

    public function admins()
    {
        $this -> admins = [
            'pending' => [
                'nama' => 'Pending',
                'route' => 'admin.pending'         
            ],
            'laundry' => [
                'nama' => 'Laundry',
                'route' => 'admin.laundry'         
            ],
            'user' => [
                'nama' => 'User',
                'route' => 'admin.user'         
            ],
        ];
    }

    public function laundries()
    {
        $this -> laundries = [
            'home' => [
                'nama' => 'Home',         
                'route' => 'laundry-dashboard'             
            ],
            'tambah-jenis-pakaian' => [
                'nama' => 'Pakaian',         
                'route' => 'pakaian'             
            ]
        ];
    }

    public function users()
    {
        $this -> users = [
            'home' => [
                'nama' => 'Home',
                'route' => 'home'         
            ],
            'riwayat-orderan' => [
                'nama' => 'Riwayat Orderan',
                'route' => 'user.riwayat-orderan'         
            ],
        ];
        $this -> userDropdowns = [
            'home' => [
                'nama' => 'Daftar Menjadi Laundry',
                'route' => 'daftar-laundry'         
            ]
        ];

    }
}
