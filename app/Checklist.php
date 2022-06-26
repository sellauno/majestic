<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $fillable = ['idLayanan', 'toDO', 'finish', 'tglStart', 'deadline', 'linkFile', 'tglUpload','idUser'];
    public $primaryKey = 'idChecklist';
}
