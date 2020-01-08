<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document_Video extends Model
{
    protected $table = 'document_videos';
    protected $fillable = ['title_file', 'source', 'id_user_fk', 'code_iframe_youtb'];
    public $timestamps = true;

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
