<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	protected $table = 'invoices'; 
	protected $fillable = array('invoiceno','yos','term','year','amount','invoicedate');
    
	  
}