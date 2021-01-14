<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id_laundry',
        'antrian',
        'id_pelanggan',
        'deskripsi_pakaian',
        'tempat',
        'status_pembayaran',
        'status_cucian',
        'pakaian'
    ];
}
