<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
	use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //   $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
         return view('front.index');

	}
    public function aboutus()
	{
         return view('front.aboutus');

	}
	public function careers()
	{
		return view('front.careers');
	 
	}public function Portfolio()
	{
         return view('front.portfolio');

	}
    public function contact()
	{
         return view('front.contact');

	}
    public function login()
	{
         return view('auth.login');

	}
    public function register()
	{
         return view('auth.register');

	}
    public function change()
	{
         return view('auth.passwords.email');

	}
    public function email()
	{
         return view('auth.passwords.email');

	}
    public function resetpass()
	{
         return view('auth.passwords.reset');

	}
    public function reset()
	{
         return view('auth.emails.password');

	}
}
