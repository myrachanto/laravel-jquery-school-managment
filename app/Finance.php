<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
	protected $table = 'finances'; 
	protected $fillable = array('studentid','name','desciption','term','year' ,'amount','payment','balance');
    
	  
}

