<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Rooms extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'rooms';

    protected $fillable = [
          'room_title',
          'room_slug',
          'room_text',
          'room_price',
          'room_price_night',
          'room_price_24',
          'room_photo',
          'room_gallery',
          'roomcategories_id',
          'language_id'
    ];


    public static function boot()
    {
        parent::boot();

        Rooms::observe(new UserActionsObserver);
    }

    public function roomcategories()
    {
        return $this->hasOne('App\RoomCategories', 'id', 'roomcategories_id');
    }

    public function language()
    {
        return $this->hasOne('App\Language', 'id', 'language_id');
    }





}
