<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
	protected $fillable = array('name','desciption','category','image');
        public static $rules = array(
		'name'=>'required|min:2|alpha|no_spaces',
		'desciption'=>'required|min:2|alpha',
	);
}