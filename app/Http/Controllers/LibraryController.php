<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;
use App\User;
use App\Subject;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LibraryController extends Controller
{
    
	public function __construct() {
	//	parent::__construct();
		//$this->beforeFilter('csrf', array('on'=>'post'));
				view::share('subject', Subject::all());
				view::share('users', User::all());
	} 
    public function index() {
		$library = Library::all();
            return view('/admin/library/index')
            ->with('library',$library);
	}
    public function upload(){
		if(Input::file('file')){
            
        $library = new Library;
        $library->name = Input::get('name');
			$library->description = Input::get('description');
			$library->subject = Input::get('subject');
			$library->category = Input::get('category');
			$library->class = Input::get('class');
			$file = Input::file('file');
			$file-> move('img/libraly/', $file->getClientOriginalName());
			$filename = $file->getClientOriginalName();
			$library->foto = "img/libraly/$filename";
        	$library->save();
			return Redirect::to('admin/library');
		}

	}
		/*
		* View data
		*/
	public function view(Request $request)
	{
		if($request->ajax()){
			$id = $request->id;
			$info = Library::find($id);
			//echo json_decode($info);
			return response()->json($info);
		}
	}

	
	
}
