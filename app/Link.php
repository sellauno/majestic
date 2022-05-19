<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['idProject', 'tglUpload', 'kategori','judul', 'link', 'idUser'];
    public $primaryKey = 'idLink';
}
