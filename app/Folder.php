<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    // use HasFactory;
    protected $fillable = ['folderId', 'idProject', 'kategori'];
}
