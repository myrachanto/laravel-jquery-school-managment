<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Subteacher;
use App\Classes;
use App\User;
use App\Subject;
use App\Http\Controllers\Controller;

class SubteacherController extends Controller
{
      public function __construct(){
        //    $this->beforeFilter('csrf', array('on'=>'post'));
        }
        /*
         * Display all data
         */
	    public function index($name)
	    {
            $subj = $name;
            $subteacher = Subteacher::all();
            $classes = Classes::all();
            $teacher = User::all();
			$subj = Subject::where('name', '=', $subj)->first();
            return view('/admin/subjects/subteacher')
            ->with('classes',$classes)
            ->with('teacher',$teacher)
            ->with('subj',$subj)
            ->with('subteacher',$subteacher);
	    }

   /*
		** Add portfolio data
		*/
	public function add(Request $request)
	{
        $subteacher = new Subteacher;
        $subteacher->classid = $request->classid;
        $subteacher->subjectid = $request->subjectid;
        $subteacher->teacherid = $request->teacherid;
		$clas = Classes::where('id',$request->classid)->first();
		$sub = Subject::where('id',$request->subjectid)->firstorfail();
		$user = User::where('id',$request->teacherid)->firstorfail();
		
        $subteacher->class = $clas->name;
        $subteacher->subject = $sub->name;
        $subteacher->teacher = $user->username;
        $subteacher->expectedresults = $request->expectedresults;
        $subteacher->teachersresults = $request->teachersresults;
        $subteacher->comments = $request->comments;
        $subteacher->term = $request->term;
		$subteacher -> save();
		return back()
				->with('success','Record Added successfully.');
	    }
		/*
		* View data
		*/
	public function view(Request $request)
	{
		if($request->ajax()){
			$id = $request->id;
			$info = Subteacher::find($id);
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
        $subteacher = Subteacher::find($id);
        $subteacher->classid = $request->edit_classid;
        $subteacher->subjectid = $request->edit_subjectid;
        $subteacher->teacherid = $request->edit_teacherid;
		$clas = Classes::where('id',$request->classid)->first();
		$sub = Subject::where('id',$request->subjectid)->firstorfail();
		$user = User::where('id',$request->teacherid)->firstorfail();
		
        $subteacher->class = $clas->name;
        $subteacher->subject = $sub->name;
        $subteacher->teacher = $user->username;
        $subteacher->expectedresults = $request->edit_expectedresults;
        $subteacher->teachersresults = $request->edit_teachersresults;
        $subteacher->comments = $request->edit_comments;
        $subteacher->term = $request->edit_term;
        $subteacher->save();
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
		$subteacher = Subteacher::find($id);
		$subteacher = $subteacher -> delete();
		if($response)
			echo "Record Deleted successfully.";
		else
			echo "There was a problem. Please try again later.";
	}
	
}
