<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Career;
use \Input as Input;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
      public function __construct(){
         //   $this->beforeFilter('csrf', array('on'=>'post'));
        }
        /*
         * Display all data
         */
	    public function index()
	    {
            $career = Career::all();
            return view('/admin/career/index')->with('career',$career);
	    }
	
	public function add(Request $request)
	{
		$validator = Validator::make($request->all(), Career::$rules);

		if ($validator->passes()) {
        $career = new Career;
        $career->name = $request->name;
        $career->description = $request->description;
        $career->category = $request->category;
       // $career->image = $request->image;
		$career -> save();
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
			$info = Career::find($id);
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
        $career = Career::find($id);
        $career->name = $request->edit_name;
        $career->description = $request->edit_description;
        $career->category = $request->edit_category;
        $category->save();
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
		$career = Career::find($id);
		$response = $career -> delete();
		if($response)
			echo "Record Deleted successfully.";
		else
			echo "There was a problem. Please try again later.";
	}
		public function upload(){
		if(Input::file('file')){
			$id = Input::get('careerid');
			$career = Career::find($id);
			$file = Input::file('file');
			$file-> move('img/careers/', $file->getClientOriginalName());
			$filename = $file->getClientOriginalName();
			$career->foto = "img/careers/$filename";
        	$career->save();
			return Redirect::to('/admin/career');
		}
	
		}
}
