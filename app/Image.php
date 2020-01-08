<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image_banners';
    protected $fillable = ['image'];
    public $timestamps = true;
}
