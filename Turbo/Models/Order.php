<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class Order extends Model  
{
    use Notifiable;
     protected $table="orders";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'User_id' ,'SubService_id','ServiceLocation_id','UserLocationLonitude',
        'UserLocationLatitude','TotalAmount','ServiveReqDate','ServiceReqTime',
        'OrderStatus_id','PaymentType_id','Service_id'
        
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    protected $casts = [
        'User_id'=>'int',
        'SubService_id'=>'int',
        'ServiceLocation_id'=>'int',
        'UserLocationLonitude'=>'int',
        'UserLocationLatitude'=>'int',
        'TotalAmount'=>'int',
        'OrderStatus_id'=>'int',
        'PaymentType_id'=>'int',
        'Service_id'=>'int',

        
    ];

    public function User(){
        return $this->belongsTo('App\Models\User','User_id');
    }
    public function ServicesubCategories(){
        return $this->hasMany('App\Models\ServicesubCategorie','SubServise_id');
    }
    public function ServiceLocation(){
        return $this->hasOne('App\Models\ServiceLocation','ServiceLocation_id');
    }
    public function OrderStatus(){
        return $this->hasOne('App\Models\OrderStatus','OrderStatus_id');
    }
    public function PaymentType(){
        return $this->hasOne('App\Models\PaymentType','PaymentType_id');
    }
    public function OrderDetail(){
        return $this->hasOne('App\Models\OrderDetail','Order_id');
    }
    public function ServiceCategorie(){
        return $this->hasOne('App\Models\ServiceCategorie','Service_id');
    }
    public function Payments(){
        return $this->hasMany('App\Models\Payment','Order_id');
    }
    public function OrderReport(){
        return $this->belongsTo('App\Models\OrderReport','Order_id');
    }


}
