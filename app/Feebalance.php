<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feebalance extends Model
{
	protected $table = 'feebalance'; 
	protected $fillable = array('expenceid','expencename','studentid','studentname' ,'invoiceno',
    'yos','description' ,'term','feeamt','amountpaid','invoicedate');
    
	  
}