<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

use Carbon\Carbon; 

use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'orders';
    
    protected $fillable = [
          'order_user_id',
          'order_user_name',
          'order_user_email',
          'order_user_phone',
          'rooms_id',
          'order_user_arrival',
          'order_user_departure',
          'order_price',
          'order_user_message',
          'order_approval',
          'order_payment'
    ];
    

    public static function boot()
    {
        parent::boot();

        Orders::observe(new UserActionsObserver);
    }
    
    public function rooms()
    {
        return $this->hasOne('App\Rooms', 'id', 'rooms_id');
    }


    
    
    /**
     * Set attribute to datetime format
     * @param $input
     */
    public function setOrderUserArrivalAttribute($input)
    {
        if($input != '') {
            $this->attributes['order_user_arrival'] = Carbon::createFromFormat(config('quickadmin.date_format') . ' ' . config('quickadmin.time_format'), $input)->format('Y-m-d H:i:s');
        }else{
            $this->attributes['order_user_arrival'] = '';
        }
    }

    /**
     * Get attribute from datetime format
     * @param $input
     *
     * @return string
     */
    public function getOrderUserArrivalAttribute($input)
    {
        if($input != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('quickadmin.date_format') . ' ' .config('quickadmin.time_format'));
        }else{
            return '';
        }
    }

/**
     * Set attribute to datetime format
     * @param $input
     */
    public function setOrderUserDepartureAttribute($input)
    {
        if($input != '') {
            $this->attributes['order_user_departure'] = Carbon::createFromFormat(config('quickadmin.date_format') . ' ' . config('quickadmin.time_format'), $input)->format('Y-m-d H:i:s');
        }else{
            $this->attributes['order_user_departure'] = '';
        }
    }

    /**
     * Get attribute from datetime format
     * @param $input
     *
     * @return string
     */
    public function getOrderUserDepartureAttribute($input)
    {
        if($input != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('quickadmin.date_format') . ' ' .config('quickadmin.time_format'));
        }else{
            return '';
        }
    }


}