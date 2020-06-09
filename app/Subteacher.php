<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subteacher extends Model
{
	protected $table = 'subteachers'; 
	protected $fillable = array('classid','subjectid','teacherid','class','subject','teacher', 'expectedresults','teachersresults','comments','term');
    
	  
}

