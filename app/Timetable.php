<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
	protected $table = 'timetables'; 
	protected $fillable = array('dayid','classid','first','second','third','fourth'
    ,'firth','sixth','seventh','eighth','nineth');
    
	  
}



