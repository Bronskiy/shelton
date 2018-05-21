<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class CommonData extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'commondata';
    
    protected $fillable = [
          'common_phone_1',
          'common_phone_2',
          'common_address',
          'common_map',
          'common_email',
          'common_ganalytics',
          'common_metrika',
          'language_id'
    ];
    

    public static function boot()
    {
        parent::boot();

        CommonData::observe(new UserActionsObserver);
    }
    
    public function language()
    {
        return $this->hasOne('App\Language', 'id', 'language_id');
    }


    
    
    
}