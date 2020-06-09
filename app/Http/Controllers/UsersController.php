<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    
	public function __construct() {
	//	parent::__construct();
	//	$this->beforeFilter('csrf', array('on'=>'post'));
		view::share('blognav', Blog::take(10)->orderBy('created_at', 'DESC')->get());
	} 

	public function getNewaccount() {
		return View::make('users.newaccount');
	}
    

/*	public function signin() {
		return View::make('users.signin');
	}
    public function login() {
		return View::make('users.signin');
	}*/
	public function postCreate() {
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->passes()) {
			$user = new User;
			$user->fname = Input::get('fname');
			$user->lname = Input::get('lname');
			$user->username = Input::get('username');
			$user->country = Input::get('country');
			$user->phone = Input::get('phone');
			$user->spousename = Input::get('spousename');
			$user->nextofkinname = Input::get('nextofkinname');
			$user->primary_p_no = Input::get('primary_p_no');
			$user->secondary_p_no = Input::get('secondary_p_no');
			$user->county = Input::get('county');
			$user->p_employment = Input::get('p_employment');
			$user->subject1 = Input::get('subject1');
			$user->subject2 = Input::get('subject2');
			$user->extra_curruclum = Input::get('extra_curruclum');
			$user->email = Input::get('email');
			$user->remember_token = Input::get('_token');
			$user->password = Hash::make(Input::get('password'));
			$user->save();

			return Redirect::to('/admin/newuser')
				->with('message', 'Thank you for creating a new account. Please sign in.');
		}

		return Redirect::to('/admin/newuser')
			->with('message', 'Something went wrong')
			->withErrors($validator)
			->withInput();
	}

	public function postSignin() {
		if (Auth::attempt("user", ['email'=>Input::get('email'), 'password'=>Input::get('password')])){
			return Redirect::to('/admin/dashboard')->with('message', 'Thanks for signing in');
		}

		return Redirect::to('/admin/signin')->with('message', 'Your email/password combo was incorrect');
	}

	public function getSignout() {
		Auth::logout();
		return Redirect::to('/teacher-login')->with('message', 'You have been signed out');
	}
}