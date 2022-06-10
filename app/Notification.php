<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['id', 'idUser', 'notif','url', 'isRead'];
    protected $table = 'notification';
    public $timestamps = false;
}
