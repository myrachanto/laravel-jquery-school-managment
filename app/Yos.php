<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yos extends Model
{
	protected $table = 'yoss'; 
	protected $fillable = array('name','desciption');
        public static $rules = array(
		'name'=>'required|min:2|alpha|no_spaces',
		'desciption'=>'required|min:2|alpha',
	);
	  
}

