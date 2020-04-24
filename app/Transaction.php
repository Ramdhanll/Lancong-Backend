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

	// 'details','travel_package','user' 

    public function details() {
    	return $this->hasMany('App\TransactionDetail','transactions_id', 'id');
    }

    public function travel_package() {
    	return $this->belongsTo('App\TravelPackage', 'travel_packages_id', 'id');
    }

    public function user() {
    	return $this->belongsTo('App\User', 'users_id', 'id');
    }
}
