<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class ServiceCategorie extends Model  
{
    use Notifiable;
     protected $table="servicecategories";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ServiceName_en','ServiceDescription_en','ServiceName_ar','ServiceDescription_ar'
        
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

    public function ServicesubCategories(){
        return $this->hasMany('App\Models\ServicesubCategorie','Service_id');
    }
    public function Locations(){
        return $this->belongsToMany('App\Models\Location', 'ServiceLocation', 'Service_id', 'Location_id');
    }
    public function Order(){
        return $this->belongsTo('App\Models\Order','Service_id');
    }
   



}
