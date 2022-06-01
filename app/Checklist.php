<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $fillable = ['idProject', 'idUser', 'toDO', 'checked', 'tglStart', 'deadline', 'linkFile'];
    public $primaryKey = 'idChecklist';
}
