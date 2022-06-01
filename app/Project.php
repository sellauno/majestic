<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['idClient', 'reels', 'tiktok', 'feeds', 'stories', 'tglMulai', 'tglSelesai', 'status', 'idPJ', 'harga', 'todo', 'finished'];
    public $primaryKey = 'idProject';
}
