<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document_Image extends Model
{
    protected $table = 'document_images';
    protected $fillable = ['title_file', 'content', 'kind',
        'id_user_fk', 'author', 'source', 'file_name' 
	];
    public $timestamps = true;

   	public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
