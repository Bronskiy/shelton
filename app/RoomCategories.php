<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class RoomCategories extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'roomcategories';
    
    protected $fillable = [
          'room_cat_title',
          'room_cat_slug',
          'room_cat_order',
          'language_id'
    ];
    

    public static function boot()
    {
        parent::boot();

        RoomCategories::observe(new UserActionsObserver);
    }
    
    public function language()
    {
        return $this->hasOne('App\Language', 'id', 'language_id');
    }


    
    
    
}