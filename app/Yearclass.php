<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yearclass extends Model
{
	protected $table = 'yearclass'; 
	protected $fillable = array('name','desciption','foto');
       public static $rules = array(
		'name'=>'required|min:2|alpha|no_spaces',
		'desciption'=>'required|min:2|alpha',
	);
	  
}

