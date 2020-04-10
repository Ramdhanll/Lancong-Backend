<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'travel_packages_id','image'
    ];

    protected $hidden = [
        
    ];
}
