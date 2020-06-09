<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
	protected $table = 'librarys'; 
	protected $fillable = array('name','description','subject','category','class','foto');
	    public static $rules = array(
		'name'=>'required|min:2|alpha|no_spaces',
		'desciption'=>'required|min:2|alpha',
		'desciption'=>'required',
	);
}

    
	