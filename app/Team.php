<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['idProject','idUser', 'jabatan'];
    public $primaryKey = 'idTeam';
}
