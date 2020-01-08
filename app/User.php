<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $guard = '';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password', 'level',
        'job', 'old', 'address'
    ];

    public $timestamps = true;










    //Bình luận
    public function comments()
    {
        return $this->hasMany('App\Comment'); //1 user thì có nhiều bình luận
    }

    //Tài liệu
    public function document()
    {
        return $this->hasMany('App\Document');
    }

    //Tài liệu hình ảnh
    public function document_image()
    {
        return $this->hasMany('App\Document_Image');
    }

    public function document_video()
    {
        return $this->hasMany('App\Document_Video');
    }

    //Đánh giá 5 sao
    public function rating_star()
    {
        return $this->hasMany('App\rating_star');
    }






    //Chờ duyệt tài liệu
    public function document_pending()
    {
        return $this->hasMany('App\Document_Pending');
    }

    //Chờ duyệt tài liệu hình ảnh
    public function document_image_pending()
    {
        return $this->hasMany('App\DocumentImagePending');
    }

    //Download tài liệu
    public function count_download()
    {
        return $this->hasMany('App\count_download');
    }
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $show = [
        'password', 'remember_token',
    ];


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

}
