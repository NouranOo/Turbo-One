<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class ServicesubCategorie extends Model  
{
    use Notifiable;
     protected $table="servicesubcategories";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name_en','Description_en','Name_ar','Description_ar','Service_id','Price','ServiceType_id'
        
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
        'Price'=>'int',
        'ServiceType_id'=>'int',
    
    ];
    public function ServiceCategorie(){
        return $this->belongsTo('App\Models\ServiceCategorie','Service_id');
    }
    public function ServiceType(){
        return $this->belongsTo('App\Models\ServiceType','ServiceType_id');
    }
    public function Order(){
        return $this->belongsTo('App\Models\Order','SubServise_id');
    }
    public function OrderDetail(){
        return $this->belongsTo('App\Models\OrderDetail','SubService_id');
    }
   



}
