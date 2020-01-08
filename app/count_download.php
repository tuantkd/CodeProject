<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class count_download extends Model
{
    protected $table = 'count_downloads';
    protected $fillable = ['id', 'id_user_fk', 'id_document_fk', 'count_download'];
    public $timestamps = true;

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function documents()
    {
        return $this->belongsToMany('App\Document');
    }

}
