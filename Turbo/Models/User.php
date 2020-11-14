<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class User extends Model  
{
    use Notifiable;
     protected $table="users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'FullName','Email','Mobile','DateOfBirth','Gender_id','Photo','IsVerifed',
        'IsActive','CurrentWalletBalance','UserType_id',
         'ApiToken','Token', 'RecoveryCode','FacbookId','GoogleId','Lang','Lang',
        
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'Password',
    ];
    protected $casts = [
        'Mobile'=>'int',
        'Gender_id'=>'int',
        'IsVerifed'=>'int',
        'IsActive'=>'int',
        'UserType_id'=>'int',
        

    ];

    public function Gendre(){
        return $this->hasOne('App\Models\Gender','Gender_id');
    }

    public function UserType(){
        return $this->hasOne('App\Models\UserType','UserType_id');
    }

    public function UserCars(){
        return $this->hasMany('App\Models\UserCar','User_id');
    }

    public function UserSavedPlaces(){
        return $this->hasMany('App\Models\UserSavedPlace','User_id');
    }
    public function Orders(){
        return $this->hasMany('App\Models\Order','User_id');
    }
    public function Payments(){
        return $this->hasMany('App\Models\Payment','User_id');
    }
   



}
