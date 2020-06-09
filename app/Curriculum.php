<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
	protected $table = 'curriculums'; 
	protected $fillable = array('category','name','type','desciption','foto');
    
	  
}

