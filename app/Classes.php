<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
	protected $table = 'classes'; 
	protected $fillable = array('name','desciption');
        
	public static $rules = array(
		'name'=>'required|min:2|alpha_num|no_spaces',
		'desciption'=>'required|min:2|alpha',
	);
	  
}

