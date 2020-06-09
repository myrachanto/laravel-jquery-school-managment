<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fname','lname','username','type','country', 'spousename',
    'nextofkinname', 'primary_p_no','secondary_p_no','county',
    'p_employment','subject1','subject2','extra_curruclum','email','phone','password','remember_token','foto'];

    	public static $rules = array(
		'fname'=>'required|min:2|alpha',
		'lname'=>'required|min:2|alpha',
		'username'=>'required|min:2|alpha',
		'country'=>'required|min:2|alpha_num',
        'spousename'=>'required',
        'nextofkinname'=>'required',
        'primary_p_no'=>'required',
        'secondary_p_no'=>'required',
        'county'=>'required',
        'p_employment'=>'required',
        'subject1'=>'required',
        'subject2'=>'required',
        'extra_curruclum'=>'required',
		'phone'=>'required|between:7,15',
		'email'=>'required|email|unique:users',
		'password'=>'required|alpha_num|between:8,12|confirmed',
		'password_confirmation'=>'required|alpha_num|between:8,12',
	);
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
}
