<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenceflow extends Model
{
	protected $table = 'expenceflows'; 
	protected $fillable = array('expenceid','amount','year','term');
    
	 public function expences()
    {
        return $this->hasMany('Expence');
    } 
	   public function finances()
    {
        return $this->hasMany('Finance');
    } 

}

