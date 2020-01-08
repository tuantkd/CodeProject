<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentImagePending extends Model
{
    protected $table = 'document_image_pendings';
    protected $fillable = ['title_file', 'content', 'kind',
        'id_user_fk', 'author', 'source', 'file_name' 
	];
    public $timestamps = true;

   	public function users()
    {
        return $this->belongsTo('App\User');
    }
}
