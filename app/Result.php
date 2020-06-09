<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
	protected $table = 'result'; 
    //username	regno	English	maths	Kiswahili	Biology	Geography	Chemistry	Physics	CRE	History	business	Agriculture	dated
	protected $fillable = array('acadamicyear','classid','examid','studentid',
    'username','regno','English','maths','Kiswahili','Biology','Geography','Chemistry','Physics','CRE',
    'History','business','Agriculture');

     public function students()
    {
        return $this->hasMany('Student');
    }
	 public function subjects()
    {
        return $this->hasMany('Subject');
    }
	  
}

