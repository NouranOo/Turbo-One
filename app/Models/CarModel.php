<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class CarModel extends Model  
{
    use Notifiable;
     protected $table="carmodels";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'CarBrand_id' ,'ModelName_en','ModelName_ar'
        
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    protected $casts = [
        'CarBrand_id'=>'int',
    ];

    public function UserCar(){
        return $this->hasOne('App\Models\UserCar','CarModel_id');
    }

    public function CarBrand(){
        return $this->belongsTo('App\Models\CarBrand','CarBrand_id');
    }
   



}
