<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Test111 extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'test111';
    
    protected $fillable = ['test_textes'];
    

    public static function boot()
    {
        parent::boot();

        Test111::observe(new UserActionsObserver);
    }
    
    
    
    
}