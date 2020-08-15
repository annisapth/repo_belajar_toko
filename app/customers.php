<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    protected $table = 'customers';
    public $timestamps = false;

    protected $fillable = ['id_customers', 'nama_customers', 'alamat_customers', 'gender'];

}
