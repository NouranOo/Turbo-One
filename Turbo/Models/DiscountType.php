<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class DiscountType extends Model  
{
    use Notifiable;
     protected $table="discounttypes";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Type' 
        
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
    public function Promocode(){
        return $this->belongsTo('App\Models\Promocode','DiscountType_id');
    }
   



}
