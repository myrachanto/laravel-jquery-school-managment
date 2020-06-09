<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nortification extends Model
{
	protected $table = 'nortifications'; 
	protected $fillable = array('senderid','sender','receiverid','receiver','title','body');
    
	  
}

