<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Features extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'features';
    
    protected $fillable = [
          'feature_title',
          'feature_icon',
          'feature_text',
          'language_id'
    ];
    

    public static function boot()
    {
        parent::boot();

        Features::observe(new UserActionsObserver);
    }
    
    public function language()
    {
        return $this->hasOne('App\Language', 'id', 'language_id');
    }


    
    
    
}