<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class OrderReport extends Model  
{
    use Notifiable;
     protected $table="orderreports";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Order_id' ,'Description','Status'
        
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
    
    ];
    public function Order(){
        return $this->hasMany('App\Models\Order','Order_id');
    }



}
