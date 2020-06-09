<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Curriculum;
use App\Accountant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class TeacherController extends Controller
{
      public function __construct(){
       //     $this->beforeFilter('csrf', array('on'=>'post'));
        }
        /*
         * Display all data
         */
	    public function index()
	    {
            $user = User::all();
            return view('/admin/teacher/index')->with('user',$user);
	    }
         public function lists()
	    {
            $user = User::all();
            return view('/admin/teacher/lists')->with('user',$user);
	    }
		 public function Alists()
	    {
            $user = Accountant::all();
            return view('/admin/teacher/Alist')->with('user',$user);
	    }
		public function personal()
	    {
            $teacher = User::all();
            return view('/admin/teacher/personal')->with('teacher',$teacher);
	    }
		public function extra()
	    {
            $teacher = User::all();
            return view('/admin/teacher/extra')->with('teacher',$teacher);
	    }
		public function persona($name)
	    {
			
			$username = $name;
            $member = User::where('username',$username)->firstorfail();
            return view('/admin/teacher/persona')->with('member',$member);
	    }
		public function Apersona($name)
	    {
			
			$username = $name;
            $member = Accountant::where('username',$username)->firstorfail();
            return view('/admin/teacher/Apersona')->with('member',$member);
	    }
		public function fire(Request $request)
	    {
			$id = $request -> teacherid;
		    $user = User::find($id);
			$status = 0;
			$user->status = $status;
			$user -> save();
            return Redirect::to('/admin/teachers')
			->with('message','Action completed- teacher fired');
	    }
		public function hire(Request $request)
	    {
			$id = $request -> teacherid;
		    $user = User::find($id);
			$status = 1;
			$user->status = $status;
			$user -> save();
            return Redirect::to('/admin/teachers')
			->with('message','Action completed- teacher re-hired');
	    }
		public function Afire(Request $request)
	    {
			$id = $request -> teacherid;
		    $user = Accountant::find($id);
			$status = 0;
			$user->status = $status;
			$user -> save();
            return Redirect::to('/admin/teachers')
			->with('message','Action completed- Accountant fired');
	    }
		public function Ahire(Request $request)
	    {
			$id = $request -> teacherid;
		    $user = Accountant::find($id);
			$status = 1;
			$user->status = $status;
			$user -> save();
            return Redirect::to('/admin/teachers')
			->with('message','Action completed- Accountant re-hired');
	    }
		public function extracurriculum($name)
	    {
		$id = $name;
        $curriculum = Curriculum::all();
		//$result = curriculum::where('examid', $examid)->get();
            return view('/admin/teacher/extracurriculum')->with('curriculum',$curriculum);
	    }
   /*
		** Add portfolio data
		*/
	public function add(Request $request)
	{
		$validator = Validator::make($request->all(), User::$rules);

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
			$teacher = User::find($id);
			$file = Input::file('file');
			$file-> move('img/teacher/', $file->getClientOriginalName());
			$filename = $file->getClientOriginalName();
			$teacher->foto = "img/teacher/$filename";
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
			$info = User::find($id);
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
        $user = User::find($id);
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
		$user = User::find($id);
		$user = $user -> delete();
		if($response)
			echo "Record Deleted successfully.";
		else
			echo "There was a problem. Please try again later.";
	}
	
}
