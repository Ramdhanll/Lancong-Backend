<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transactions_id','username','nationality','is_visa','doe_passport'
    ];

    protected $hidden = [
        
    ];

    // parent key hasMany or dll
    // child belongsTo
    // $this->namaRelasi(namaModel::class,'primaryKeyModelYangdituju','foreignKeyFieldIni')
    
    public function transaction(){
        return $this->belongsTo( Transaction::class, 'transactions_id', 'id' );
    }
}
