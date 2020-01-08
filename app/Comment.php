<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['id', 'id_user_fk', 'id_document_fk', 'content'];
    public $timestamps = true;

    //Trả lời bình luận thuộc 1 user nào đó
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    //Trả lời bình luận thuộc 1 tài liệu nào đó
    public function documents()
    {
        return $this->belongsTo('App\Document');
    }
}
