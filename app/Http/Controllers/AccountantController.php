<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Accountant;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccountantController extends Controller
{
    
	public function __construct() {
	//	parent::__construct();
	//	$this->beforeFilter('csrf', array('on'=>'post'));
		view::share('blognav', Blog::take(10)->orderBy('created_at', 'DESC')->get());
	} 
	 public function index()
	    {
            $accountant = Accountant::all();
            return view('/admin/accountant/index')->with('accountant',$accountant);
	    }

	public function getNewaccount() {
		return View::make('users.newaccount');
	}
    

	public function signin() {
		return View::make('users.signin');
	}
    public function login() {
		return View::make('users.signin');
	}
/*	public function postCreate(Request $request) {
		$validator = Validator::make(Request::all(), User::$rules);

		if ($validator->passes()) {
			$user = new User;
			$user->fname = $request->fname;
			$user->lname = $request->lname;
			$user->username = $request->username;
			$user->country = $request->country;
			$user->phone = $request->phone;
			$user->spousename = $request->spousename;
			$user->nextofkinname = $request->nextofkinname;
			$user->primary_p_no = $request->primary_p_no;
			$user->secondary_p_no = $request->secondary_p_no;
			$user->county = $request->county;
			$user->p_employment = $request->p_employment;
			$user->subject1 = $request->subject1;
			$user->subject2 = $request->subject2;
			$user->extra_curruclum = $request->extra_curruclum;
			$user->email = $request->email;
			$user->remember_token = $request->_token;
			$user->password = Hash::make($request->password);
			$user->save();

			return Redirect::to('/admin/newuser')
				->with('message', 'Thank you for creating a new account. Please sign in.');
		}
 
		return Redirect::to('/admin/newuser')
			->with('message', 'Something went wrong')
			->withErrors($validator)
			->withInput();
	}
	*/
	public function add(Request $request)
	{
		$status = 1;
		$validator = Validator::make(Request::all(), User::$rules);

		if ($validator->passes()) {
        	$user = new Accountant;
			$user->fname = $request->fname;
			$user->lname = $request->lname;
			$user->username = $request->username;
			$user->country = $request->country;
			$user->phone = $request->phone;
			$user->spousename = $request->spousename;
			$user->nextofkinname = $request->nextofkinname;
			$user->primary_p_no = $request->primary_p_no;
			$user->secondary_p_no = $request->secondary_p_no;
			$user->county = $request->county;
			$user->p_employment = $request->p_employment;
			$user->subject1 = $request->subject1;
			$user->subject2 = $request->subject2;
			$user->extra_curruclum = $request->extra_curruclum;
			$user->email = $request->email;
			$user->status = $status;
			$user->remember_token = $request->_token;
			$user->password = Hash::make($request->password);
		$user -> save();
		return back()
				->with('success','Record Added successfully.');
	    }
		return back()
			->with('message', 'Something went wrong')
			->withErrors($validator)
			->withInput();
	}
	public function upload(){
		if(Input::file('file')){
			$id = Input::get('teacherid');
			$teacher = Accountant::find($id);
			$file = Input::file('file');
			$file-> move('img/accountant/', $file->getClientOriginalName());
			$filename = $file->getClientOriginalName();
			$teacher->foto = "img/accountant/$filename";
        	$teacher->save();
			return Redirect::to('/admin/teacher');
		}

	}
		/*
		* View data
		*/
	public function view(Request $request)
	{
		if($request->ajax()){
			$id = $request->id;
			$info = Accountant::find($id);
			//echo json_decode($info);
			return response()->json($info);
		}
	}
	/*
	*   Update data
	*/
	public function update(Request $request)
	{
		$id = $request -> edit_id;
        $user = Accountant::find($id);
			$user->fname = $request->edit_fname;
			$user->lname = $request->edit_lname;
			$user->username = $request->edit_username;
			$user->country = $request->edit_country;
			$user->phone = $request->edit_phone;
			$user->spousename = $request->edit_spousename;
			$user->nextofkinname = $request->edit_nextofkinname;
			$user->primary_p_no = $request->edit_primary_p_no;
			$user->secondary_p_no = $request->edit_secondary_p_no;
			$user->county = $request->edit_county;
			$user->p_employment = $request->edit_p_employment;
			$user->subject1 = $request->edit_subject1;
			$user->subject2 = $request->edit_subject2;
			$user->extra_curruclum = $request->edit_extra_curruclum;
			$user->email = $request->edit_email;
        $user->save();
		return back()
				->with('success','Record Updated successfully.');
	}

	/**
	 * Remove/Delete the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete(Request $request)
	{
		$id = $request -> id;
		$user = Accountant::find($id);
		$user = $user -> delete();
		if($response)
			echo "Record Deleted successfully.";
		else
			echo "There was a problem. Please try again later.";
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