<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = ['idKategori', 'jumlah', 'idProject'];
    public $primaryKey = 'idLayanan';
    public $table = 'layanan';
}
