<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laundry extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'laundries';

    protected $fillable = [
        'nama_laundry',
        'deskripsi', 
        'id_user',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'id_provinsi',
        'id_kota',
        'id_kecamatan',
        'id_kelurahan'
    ];
}
