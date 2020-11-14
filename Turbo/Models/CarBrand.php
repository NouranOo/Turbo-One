<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class CarBrand extends Model  
{
    use Notifiable;
     protected $table="carbrands";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name_en' ,'Name_ar'
        
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

    public function UserCar(){
        return $this->hasOne('App\Models\UserCar','CarBrand_id');
    }

    public function CarModel(){
        return $this->hasOne('App\Models\CarModel','CarBrand_id');
    }
   



}
