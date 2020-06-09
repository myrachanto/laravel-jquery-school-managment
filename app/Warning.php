<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warning extends Model
{
	protected $table = 'warnings'; 
	protected $fillable = array('studentid','username','regno','phoneno','warning','ground');
    public static $rules = array(
		'warning'=>'required|min:2|alpha',
		'ground'=>'required|min:2|alpha',
	);
	  
}

