<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
	protected $table = 'subjects'; 
	protected $fillable = array('name','desciption','foto');
        public static $rules = array(
		'name'=>'required|min:2|alpha|no_spaces',
		'desciption'=>'required|min:2|alpha',
	);
	 public function results()
    {
        return $this->hasMany('Result');
    }
	  
}

