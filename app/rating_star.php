<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rating_star extends Model
{
    protected $table = 'rating_stars';
    protected $fillable = ['id', 'id_user_fk', 'id_document_fk', 'rating'];
    public $timestamps = true;

    public function users()
    {
    	return $this->belongsToMany('App\User');
    }

    public function documents()
    {
        return $this->belongsTo('App\Document');
    }
}
