<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Yos;
use App\Warning;
use App\Student;
use \Input as Input;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class YosController extends Controller
{
      public function __construct(){
           // $this->beforeFilter('csrf', array('on'=>'post'));
				view::share('student', Student::all());
        }
        /*
         * Display all data
         */
	    public function index()
	    {
            $yos = Yos::all();
            return view('/admin/classes/yos/index')->with('yos',$yos);
	    }
         public function promotion1()
	    {
            $yos = Yos::all();
            return view('/admin/classes/yos/promotion1')->with('yos',$yos);
	    }
		public function checkclass()
	    {
            $yos = Yos::all();
            return view('/admin/classes/yos/checkclass')->with('yos',$yos);
	    }
	public function promotion2(Request $request){
		$yos = $request->yos;
		$promote = Student::where('yos', '=', $yos)->get();
		$yo = Yos::all();
		return View::make('/admin/classes/yos/promotion2')
			->with('yos', $yos)
			->with('yo', $yo)
			->with('promote', $promote);


	}	
	public function promotion4(Request $request){
		$yos = $request->yos;
		$promote = Student::where('yos', '=', $yos)->get();
		return View::make('/admin/classes/yos/promotion2')
			->with('yos', $yos)
			->with('promote', $promote);


	}	
	public function viewclass($name){
		$yos = $name;
		$promote = Student::where('yos', '=', $yos)->get();
		$yo = Yos::all();
		return View::make('/admin/classes/yos/viewclass')
			->with('yo', $yo)
			->with('yos', $yos)
			->with('promote', $promote);


	}
    public function promotion3(Request $request){
		$student = $request->student;
		$danger = Student::where('username', '=', $student)->firstorfail();
		return View::make('/admin/classes/yos/promotion3')
			->with('danger', $danger);


	} 
	public function expulsionlist(){
		$warn = Warning::all();
		return View::make('/admin/classes/yos/expulsionlist')
			->with('warn', $warn);


	}
	public function promote(Request $request)
	{
		
			$c = count($request->checked);
			
		   for ($x = 0; $x < $c; $x++){
					$promote = Student::where('studentid', $request->studentid[$x])->firstorfail();
					$promote->yos = $request->yos[$x];
					$promote -> save();
								
					}
				
			return Redirect::to('/admin/exams')
				->with('message', 'info updated.');
				//	}

	}
		public function graduate(Request $request)
	{
		
			$c = count($request->checked);
			$status = 'alumnae';
		   for ($x = 0; $x < $c; $x++){
					$promote = Student::where('studentid', $request->studentid[$x])->firstorfail();
					$promote->yos = $status;
					$promote -> save();
								
					}
				
			return Redirect::to('/admin/exams')
				->with('message', 'info updated.');
				//	}

	}
	public function Danger(Request $request)
	{
        $warning = new Warning;
		$warn = Warning::all();
        $warning->warning = $request->warning;
        $warning->ground = $request->ground;
        $warning->studentid = $request->studentid;
		$stud = Student::where('id', '=', $request->studentid)->firstorfail();
        $warning->username = $stud->username;
        $warning->regno = $stud->regno;
        $warning->phoneno = $stud->primary_p_no;
		$warning -> save();
		return View::make('/admin/classes/yos/expulsionlist')
			->with('warn', $warn);

	    }
	public function Dangerexp(Request $request)
	{
        $warning = new Warning;
        $warning->warning = $request->warning;
		$warn = Warning::all();
        $warning->ground = $request->ground;
        $warning->studentid = $request->studentid;
		$stud = Student::where('id', '=', $request->studentid)->firstorfail();
        $warning->username = $stud->username;
        $warning->regno = $stud->regno;
        $warning->phoneno = $stud->primary_p_no;
		if($warning -> save()){
			if($request->warning == discontinued){
				$disco = Student::where('id', '=', $request->studentid)->firstorfail();
				$disco->yos = $request->discontinued;
				$disco->save();
			}
			
		}
		return View::make('/admin/classes/yos/expulsionlist')
			->with('warn', $warn);
	    }
	public function add(Request $request)
	{
		$validator = Validator::make($request->all(), Yos::$rules);

		if ($validator->passes()) {
        $yos = new Yos;
        $yos->name = $request->name;
        $yos->description = $request->description;
		$yos -> save();
		return back()
				->with('success','Record Added successfully.');
	    		 }
		return back()
			->with('message', 'Something went wrong')
			->withErrors($validator)
			->withInput();
	
		}
		/*
		* View data
		*/
	public function view(Request $request)
	{
		if($request->ajax()){
			$id = $request->id;
			$info = Yos::find($id);
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
        $yos = Yos::find($id);
        $yos->name = $request->edit_name;
        $yos->description = $request->edit_description;
        $yos->save();
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
		$yos = Yos::find($id);
		$response = $yos -> delete();
		if($response)
			echo "Record Deleted successfully.";
		else
			echo "There was a problem. Please try again later.";
	}
	
}
