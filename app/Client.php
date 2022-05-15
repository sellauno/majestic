<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['namaClient', 'deskripsi'];
    public $primaryKey  = 'idClient';
}
