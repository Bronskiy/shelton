<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class NightTariff extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'nighttariff';

    protected $fillable = [
          'night_tariff_title',
          'night_tariff_slug',
          'night_tariff_image',
          'night_tariff_text',
          'language_id',
          'night_tariff_seo_title',
          'night_tariff_seo_keywords',
          'night_tariff_seo_description'
    ];


    public static function boot()
    {
        parent::boot();

        NightTariff::observe(new UserActionsObserver);
    }


    public function language()
    {
        return $this->hasOne('App\Language', 'id', 'language_id');
    }

}
