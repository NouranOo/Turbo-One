<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class Payment extends Model  
{
    use Notifiable;
     protected $table="payments";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'User_id' ,'PaymentType_id','Amount','Order_id','Transaction_id'
        
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
        'PaymentType_id'=>'int',
        'Amount'=>'int',
        'Order_id'=>'int',
        'Transaction_id'=>'int',
    
    ];
    public function User(){
        return $this->belongsTo('App\Models\User','User_id');
    }
    public function PaymentTypes(){
        return $this->hasMany('App\Models\PaymentType','PaymentType_id');
    }

    public function Order(){
        return $this->belongsTo('App\Models\Order','Order_id');
    }



}
