<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'slider';

    protected $fillable = [
          'slider_title',
          'slider_text',
          'slider_image',
          'slider_order',
          'language_id'
    ];


    public static function boot()
    {
        parent::boot();

        Slider::observe(new UserActionsObserver);
    }

    public function language()
    {
        return $this->hasOne('App\Language', 'id', 'language_id');
    }





}
