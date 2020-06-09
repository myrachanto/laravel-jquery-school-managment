<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expence extends Model
{
	protected $table = 'expences'; 
	protected $fillable = array('name','desciption');
        public static $rules = array(
		'name'=>'required|min:2|alpha|no_spaces',
		'desciption'=>'required|min:2|alpha',
	);
	  
}

