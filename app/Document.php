<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{



    protected $table = 'documents';
    protected $fillable = ['id', 'title_file', 'file_name', 'file_cover_image',
        'content', 'file_size', 'kind', 'id_user_fk',
    	'evaluate', 'publish', 'author', 'source', 'total_view','total_download' 
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

    public function rating_star()
    {
        return $this->hasMany('App\rating_star');
    }

    //Download tài liệu
    public function count_download()
    {
        return $this->hasMany('App\count_download');
    }
}
