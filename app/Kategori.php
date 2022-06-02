<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['kategori',  'jumlah'];
    public $primaryKey = 'id';
    public $table='kategori';
}
