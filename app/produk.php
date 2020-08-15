<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'produk';
    public $timestamps = false;

    protected $fillable = ['id_produk', 'nama_produk', 'harga'];
}
