<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tmp_lahir',
        'tgl_lahir',
        'email',
        'alamat',
        'kode_order',
        'id_concert',
    ];
}