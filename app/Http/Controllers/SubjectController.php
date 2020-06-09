<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Subject;
use App\Classes;
use App\Teacherclass;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
      public function __construct(){
         //   $this->beforeFilter('csrf', array('on'=>'post'));
				view::share('teacherclass', Teacherclass::all());
				view::share('classes', Classes::all());
        }

		/*for security and other reasons i will omit the url to create subjects
        /*
         * Display all data
         */
	    public function index()
	    {
            $subject = Subject::all();
            return view('/admin/subjects/index')->with('subject',$subject);
	    }
		    public function lists()
	    {
            $subject = Subject::all();
            return view('/admin/subjects/lists')->with('subject',$subject);
	    } 
		 public function subjects()
	    {
            $subject = Subject::all();
            return view('/admin/subjects/subjects')->with('subject',$subject);
	    }
   /*
		** Add portfolio data
		*/
	public function add(Request $request)
	{
		
		$validator = Validator::make($request->all(), Subject::$rules);

		if ($validator->passes()) {
        $subject = new Subject;
        $subject->name = $request->name;
		//$nam = $subject->name;
		//$name = ucfirst($nam);
		//$names = strtolower($name);
        $subject->description = $request->description;
        //$category->majorcat = $request->majorcat;
		$subject -> save();
	    
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
			$id = Input::get('subjectid');
			$subject = Subject::find($id);
			$file = Input::file('file');
			$file-> move('img/subject/', $file->getClientOriginalName());
			$filename = $file->getClientOriginalName();
			$subject->foto = "img/subject/$filename";
        	$subject->save();
			return Redirect::to('/admin/subject');
		}

	}
		/*
		* View data
		*/
	public function view(Request $request)
	{
		if($request->ajax()){
			$id = $request->id;
			$info = Subject::find($id);
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
        $subject = Subject::find($id);
        $subject->name = $request->edit_name;
        $subject->description = $request->edit_description;
        $subject->save();
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
		$subject = Subject::find($id);
		$subject = $subject -> delete();
		if($response)
			echo "Record Deleted successfully.";
		else
			echo "There was a problem. Please try again later.";
	}
	
}
