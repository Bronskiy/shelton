<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'comments';

    protected $fillable = [
          'comment_name',
          'comment_phone',
          'comment_email',
          'comment_text',
          'comment_admin',
          'comment_confirmation',
          'rooms_id',
          'language_id'
    ];


    public static function boot()
    {
        parent::boot();

        Comments::observe(new UserActionsObserver);
    }
    public static $enum_comment_confirmation = ["1" => "Не проверено", "2" => "Опубликовано"];

    public function rooms()
    {
        return $this->hasOne('App\Rooms', 'id', 'rooms_id');
    }
        public function language()
        {
            return $this->hasOne('App\Language', 'id', 'language_id');
        }





}
