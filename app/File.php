<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    // use HasFactory;
    protected $fillable = ['idChecklist', 'kategori', 'url', 'namaFile'];
}
