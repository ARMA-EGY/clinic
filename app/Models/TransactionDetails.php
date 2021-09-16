<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
    protected $table = 'transaction_details';
    
    protected $fillable = ['transaction_id', 'payment_method', 'amount'];

    public function Transaction()
    {
        return $this->belongsTo('App\Models\Transaction','transaction_id');
    } 
}
