<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenislayanan extends Model
{
    protected $fillable = ['kategori', 'proses'];
    public $primaryKey = 'idKategori';
    public $table = 'jenislayanan';
    protected $casts = [
        'proses' => 'array'
    ];
}
