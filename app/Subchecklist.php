<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subchecklist extends Model
{
    // use HasFactory;
    protected $fillable = ['idChecklist', 'idUser', 'subTodo', 'subtglStart', 'subdeadline'];
    public $primaryKey = 'idSubchecklist';
}
