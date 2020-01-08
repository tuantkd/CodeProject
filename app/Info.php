<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'infomations';
    protected $fillable = ['title', 'content'];
    public $timestamps = true;
}
