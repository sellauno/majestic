<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtodo extends Model
{
    protected $fillable = ['idChecklist', 'idUser', 'subtodo', 'start', 'deadline', 'checked'];
    public $primaryKey = 'idsubtodo';
}
