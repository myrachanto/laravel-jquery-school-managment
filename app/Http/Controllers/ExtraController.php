<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Extra;
use App\Curriculum;
use App\classes;
use App\Http\Controllers\Controller;
	use Illuminate\Support\Facades\Input;
	use Illuminate\Support\Facades\View;
    use Illuminate\Support\Facades\Auth;

class ExtraController extends Controller
{
      public function __construct(){
           // $this->beforeFilter('csrf', array('on'=>'post'));
				view::share('curriculum', Curriculum::all());
				view::share('classes', Classes::all());
        }
        /*
         * Display all data
         */
	    public function index()
	    {
            $extra = Extra::all();
            return view('/admin/classes/extra')->with('extra',$extra);
	    }

   /*
		** Add portfolio data
		*/
	public function add(Request $request)
	{
        $extra = new Extra;
        $extra->classid = $request->classid;
        $extra->curriculumid = $request->curriculumid;
        $extra->team = $request->team;
        $extra->description = $request->description;
        $extra->achievements = $request->achievements;
        $extra->comments = $request->comments;
		$extra -> save();
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
			$info = Extra::find($id);
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
        $extra = Extra::find($id);
        $extra->classid = $request->edit_classid;
        $extra->curriculumid = $request->edit_curriculumid;
        $extra->team = $request->edit_team;
        $extra->description = $request->edit_description;
        $extra->achievements = $request->edit_achievements;
        $extra->comments = $request->edit_comments;
        $extra->save();
		return back()
				->with('success','Record Updated successfully.');
	}

}
