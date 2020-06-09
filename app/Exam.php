<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
	protected $table = 'exams'; 
	protected $fillable = array('name','desciption');
    
	      public static $rules = array(
		'name'=>'required|min:2|alpha|no_spaces',
		'desciption'=>'required|min:2|alpha',
	);
}

