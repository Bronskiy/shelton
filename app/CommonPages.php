<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class CommonPages extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'commonpages';
    
    protected $fillable = [
          'common_title',
          'common_text',
          'common_seo_title',
          'common_seo_keywords',
          'common_seo_description',
          'common_slug',
          'language_id'
    ];
    

    public static function boot()
    {
        parent::boot();

        CommonPages::observe(new UserActionsObserver);
    }
    
    public function language()
    {
        return $this->hasOne('App\Language', 'id', 'language_id');
    }


    
    
    
}