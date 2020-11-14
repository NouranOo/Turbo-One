<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class ServiceLocation extends Model  
{
    use Notifiable;
     protected $table="servicelocations";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Service_id','Location_id'
        
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    protected $casts = [
        'Service_id'=>'int',
        'Location_id'=>'int',
    ];
    public function Order(){
        return $this->belongsTo('App\Models\Order','ServiceLocation_id');
    }
   



}
