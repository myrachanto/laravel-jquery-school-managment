<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	protected $fillable = array('name','title','metatag','category', 'desciption1','description2','description3','summary');
      
	  private $rules = array(
		'name'=>'required|min:2|alpha|no_spaces',
		'title'=>'required|min:2|alpha',
		'metatag'=>'required|min:2|alpha',
		'category'=>'required|min:2|alpha_num',
		'desciption1'=>'required|min:20',
		'description2'=>'required|min:20',
		'description3'=>'required|min:20',
		'summary'=>'required|min:20',
		);
}
