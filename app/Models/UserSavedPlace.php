<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class UserSavedPlace extends Model  
{
    use Notifiable;
     protected $table="usersavedplaces";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'User_id','Name_en','Name_ar','Latitude','longitude'
        
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
        'Latitude'=>'float',
        'longitude'=>'float',
    
    ];

    public function User(){
        return $this->belongsTo('App\Models\User','User_id');
    }
   



}
