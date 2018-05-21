<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'food';

    protected $fillable = [
          'food_title',
          'food_slug',
          'food_consist',
          'food_qty',
          'food_price',
          'food_image',
          'foodcategories_id',
          'language_id'
    ];


    public static function boot()
    {
        parent::boot();

        Food::observe(new UserActionsObserver);
    }

    public function foodcategories()
    {
        return $this->hasOne('App\FoodCategories', 'id', 'foodcategories_id');
    }


    public function language()
    {
        return $this->hasOne('App\Language', 'id', 'language_id');
    }





}
