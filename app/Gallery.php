<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'travel_packages_id','image'
    ];

    protected $hidden = [
        
    ];

    
    public function travel_package()
    {
        // return $this->belongsTo(TravelPackage::class);
        return $this->belongsTo('App\TravelPackage','travel_packages_id','id'); 
    }

    // public function user()
    // {
    //     return $this->belongsTo('App\User', 'foreign_key', 'other_key');
    // }
    
}
