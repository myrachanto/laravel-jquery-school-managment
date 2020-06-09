<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
	protected $table = 'portfolios'; 
	protected $fillable = array('name','desciption');
        public static $rules = array(
		'name'=>'required|min:2|alpha|no_spaces',
		'desciption'=>'required|min:2|alpha',
	);
	  
}

