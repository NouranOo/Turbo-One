<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class PaymentType extends Model  
{
    use Notifiable;
     protected $table="paymenttypes";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name_en','Name_ar'
        
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    protected $casts = [
    
    ];
    public function Order(){
        return $this->hasMany('App\Models\Order','PaymentType_id');
    }
    public function Payment(){
        return $this->belongsTo('App\Models\Payment','PaymentType_id');
    }
   



}
