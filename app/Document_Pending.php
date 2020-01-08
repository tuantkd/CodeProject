<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document_Pending extends Model
{
    protected $table = 'document__pendings';
    protected $fillable = ['id', 'title_file', 'file_name', 'file_cover_image', 'content', 
    	'file_size', 'kind', 'id_user_fk', 'evaluate', 'publish', 'author', 'source'
	];
    public $timestamps = true;


    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
