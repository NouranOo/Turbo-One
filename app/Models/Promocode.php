<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class Promocode extends Model  
{
    use Notifiable;
     protected $table="promocodes";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Description_en','Description_ar','Code','DiscountType_id','DiscountAmount','IsActive','Status',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    protected $casts = [
        'DiscountType_id'=>'int',
        'IsActive'=>'int',
      
    
    ];
    public function DiscountType(){
        return $this->belongsTo('App\Models\DiscountType','DiscountType_id');
    }
   



}
