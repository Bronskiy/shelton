<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class ContactEntries extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'contactentries';
    
    protected $fillable = [
          'contact_name',
          'contact_phone',
          'contact_email',
          'contact_text'
    ];
    

    public static function boot()
    {
        parent::boot();

        ContactEntries::observe(new UserActionsObserver);
    }
    
    
    
    
}