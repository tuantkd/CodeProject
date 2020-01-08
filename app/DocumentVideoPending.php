<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentVideoPending extends Model
{
    protected $table = 'document_video_pendings';
    protected $fillable = ['title_file', 'source', 'id_user_fk', 'code_iframe_youtb'];
    public $timestamps = true;

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
