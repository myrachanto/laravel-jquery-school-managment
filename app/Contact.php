<?php namespace App;
    use Illuminate\Database\Eloquent\Model;

class Contact extends Model {
	protected $table = 'contact';
	protected $fillable = array('fname','lname', 'email','phone','moreinfo','inqury','website','info','mincost',
    'maxcost','deadline');
}