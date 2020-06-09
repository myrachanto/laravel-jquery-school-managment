<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacherclass extends Model
{
	protected $table = 'days'; 
	protected $fillable = array('name');
         public static $rules = array(
		'name'=>'required|min:2|alpha|no_spaces',
	);
}

