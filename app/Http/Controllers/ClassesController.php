<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Classes;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ClassesController extends Controller
{
      public function __construct(){
           // $this->beforeFilter('csrf', array('on'=>'post'));
        }
        /*
         * Display all data
         */
	    public function index()
	    {
            $classes = Classes::all();
            return view('/admin/classes/index')->with('classes',$classes);
	    }

   /*
		** Add portfolio data
		*/
	public function add(Request $request)
	{
		$validator = Validator::make($request->all(), Classes::$rules);
		if($validator->passes()) {
			$classes = new Classes;
			$classes->name = $request->name;
			$classes->description = $request->description;
			$classes -> save();
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
			$info = Classes::find($id);
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
        $classes = Classes::find($id);
        $classes->name = $request->edit_name;
        $classes->description = $request->edit_description;
        $classes->save();
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
		$classes = Classes::find($id);
		$classes = $classes -> delete();
		if($response)
			echo "Record Deleted successfully.";
		else
			echo "There was a problem. Please try again later.";
	}
	
}
