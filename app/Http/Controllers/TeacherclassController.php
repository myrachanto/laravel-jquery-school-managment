<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Student;
use App\Timetable;
use App\Classes;
use App\Teacherclass;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
class TeacherclassController extends Controller
{
      public function __construct(){
          //  $this->beforeFilter('csrf', array('on'=>'post'));
				view::share('subject', Subject::all());
				view::share('classes', Classes::all());
				view::share('teacherclass', Teacherclass::all());
        }
        /*
         * Display all data
         */
	    public function index()
	    {
            $timetable = Timetable::all();
            return view('/admin/timetable/index')->with('timetable',$timetable);
	    }
		public function timetable()
	    {
            $timetable = Timetable::all();
            return view('/admin/timetable/lists')->with('timetable',$timetable);
	    }
		public function daywise()
	    {
            $teacherclass = Teacherclass::all();
            return view('/admin/timetable/days')->with('teacherclass',$teacherclass);
	    }
		public function dato($name)
	    {
			
			$teacherclass = Timetable::where('day', $name)->get();
            return view('/admin/timetable/dato')->with('teacherclass',$teacherclass);
	    }	
		public function claso($name)
	    {
			
			$teacherclass = Timetable::where('class', $name)->get();
            return view('/admin/timetable/claso')->with('teacherclass',$teacherclass);
	    }
   /*
		** Add portfolio data
		*/
	public function add(Request $request)
	{
        	$timetable = new Timetable;
			$timetable->dayid = $request->dayid;
			$t = Teacherclass::where('id', $request->dayid)->firstorfail();
			$timetable->day = $t->name;
			$timetable->classid = $request->classid;
			$c = Classes::where('id', $request->classid)->firstorfail();
			$timetable->class = $c->name;
			$timetable->dayid = $request->dayid;
			$timetable->classid = $request->classid;
			$timetable->first = $request->first;
			$timetable->second = $request->second;
			$timetable->third = $request->third;
			$timetable->fourth = $request->fourth;
			$timetable->firth = $request->firth;
			$timetable->sixth = $request->sixth;
			$timetable->seventh = $request->seventh;
			$timetable->eighth = $request->eighth;
			$timetable->nineth = $request->nineth;
		$timetable -> save();
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
			$info = Timetable::find($id);
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
        $timetable = Timetable::find($id);
		
			$timetable->dayid = $request->edit_dayid;
			$t = Teacherclass::where('id', $request->edit_dayid)->firstorfail();
			$timetable->day = $t->name;
			$timetable->classid = $request->edit_classid;
			$c = Classes::where('id', $request->edit_classid)->firstorfail();
			$timetable->class = $c->name;
			$timetable->first = $request->edit_first;
			$timetable->second = $request->edit_second;
			$timetable->third = $request->edit_third;
			$timetable->fourth = $request->edit_fourth;
			$timetable->firth = $request->edit_firth;
			$timetable->sixth = $request->edit_sixth;
			$timetable->seventh = $request->edit_seventh;
			$timetable->eighth = $request->edit_eighth;
			$timetable->nineth = $request->edit_nineth;
        $timetable->save();
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
		$timetable = Timetable::find($id);
		$timetable = $timetable -> delete();
		if($response)
			echo "Record Deleted successfully.";
		else
			echo "There was a problem. Please try again later.";
	}
	
}
