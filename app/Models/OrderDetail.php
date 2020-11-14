<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class OrderDetail extends Model  
{
    use Notifiable;
     protected $table="orderdetails";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Order_id' ,'SubService_id','Sale'
        
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    protected $casts = [
        'Order_id'=>'int',
        'SubService_id'=>'int',
    
    ];
    public function Order(){
        return $this->belongsTo('App\Models\Order','Order_id');
    }
    public function ServicesubCategorie(){
        return $this->hasOne('App\Models\ServicesubCategorie','SubService_id');
    }
   



}
