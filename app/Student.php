<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Student extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['acedemicyear','fname','lname','username','gender','regno', 'email','phone','password',
    'fathersname','mothersname', 'gaurdiansname','primaryschool','kcpescore',
    'county','primaryaddress','primary_p_no','secondary_p_no','email','password','remember_token','foto'];

    	public static $rules = array(
		'fname'=>'required',
		'fname'=>'required|min:2|alpha',
		'lname'=>'required|min:2|alpha',
		'username'=>'required|min:2|alpha',
		'regno'=>'required|min:2|alpha_num',
		'phone'=>'required|between:7,15',
		'email'=>'required|email|unique:users',
		'password'=>'required|alpha_num|between:8,12|confirmed',
		'password_confirmation'=>'required|alpha_num|between:8,12',        
		'fathersname'=>'required',
		'mothersname'=>'required',
		'gaurdiansname'=>'required',
		'primaryschool'=>'required|min:2|alpha',
		'kcpescore'=>'required|min:2',
		'county'=>'required|min:2|alpha',
		'primaryaddress'=>'required|min:2|alpha_num',
		'primary_p_no'=>'required',
		'secondary_p_no'=>'required',
	);
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token']; 

    public function results()
    {
        return $this->hasMany('Result');
    }
}
