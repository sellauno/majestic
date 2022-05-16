<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['idProject', 'tglUpload', 'judul', 'link', 'idUser'];
    public $primaryKey = 'idLink';
}
