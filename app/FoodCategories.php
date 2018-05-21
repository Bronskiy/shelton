<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class FoodCategories extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'foodcategories';

    protected $fillable = [
          'food_cat_title',
          'food_cat_slug',
          'foodcategories_id',
          'food_cat_text',
          'food_cat_photo',
          'language_id'
    ];


    public static function boot()
    {
        parent::boot();

        FoodCategories::observe(new UserActionsObserver);
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
