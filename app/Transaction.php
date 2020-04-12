<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'travel_packages_id','users_id','additional_visa',
        'transaction_total','transaction_status'
    ];

    protected $hidden = [
        
    ];
}
