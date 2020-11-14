<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class UserCar extends Model  
{
    use Notifiable;
     protected $table="usercars";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'User_id','CarBrand_id','CarModel_id','CarType_id','Mileage','ManufectureDate',
        
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    protected $casts = [
        'User_id'=> 'int',
        'CarBrand_id'=>'int',
        'CarModel_id'=>'int',
        'CarType_id'=>'int',

        'Mileage'=>'int',
        'ManufectureDate'=>'int',

    ];

    public function User(){
        return $this->belongsTo('App\Models\User','User_id');
    }

    public function CarBrand(){
        return $this->belongsTo('App\Models\CarBrand','CarBrand_id');
    }

    public function CarModel(){
        return $this->belongsTo('App\Models\CarModel','CarModel_id');
    }
    public function CarType(){
        return $this->hasOne('App\Models\CarType','CarType_id');
    }
   



}
