<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable=['customer_id','product_id','staff_id','transaction_date'];
}
