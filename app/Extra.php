<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
	protected $table = 'extras'; 
	protected $fillable = array('classid','curriculumid','team','description','achievements','comments');
    
	  
}
