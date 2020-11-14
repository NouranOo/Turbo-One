<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class Location extends Model  
{
    use Notifiable;
     protected $table="locations";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name_en' ,'Name_ar','Longitude','latitude','CoverageArea'
        
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    protected $casts = [
        'Longitude'=>'int',
        'latitude'=>'int',

    ];
    public function ServiceCategories(){
        return $this->belongsToMany('App\Models\ServiceCategorie', 'ServiceLocation', 'Service_id', 'Location_id');
    }
   



}
