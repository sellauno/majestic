<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    protected $fillable = ['iduser', 'komentator', 'body'];
    protected $table = 'comment';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
