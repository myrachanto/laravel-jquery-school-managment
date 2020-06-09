<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Yearclass;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;


class YearclassController extends Controller
{
      public function __construct(){
       //     $this->beforeFilter('csrf', array('on'=>'post'));
        }
        /*
         * Display all data
         */
	    public function index()
	    {
            $yearclass = Yearclass::all();
            return view('/admin/yearclass/index')->with('yearclass',$yearclass);
	    }

   /*
		** Add portfolio data
		*/
	public function add(Request $request)
	{
		$validator = Validator::make($request->all(), Yearclass::$rules);

		if ($validator->passes()) {
        $yearclass = new Yearclass;
        $yearclass->name = $request->name;
		$name = $curriculum->name;
        $yearclass->description = $request->description;
		$yearclass -> save();
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
			$id = Input::get('yearclassid');
			$yearclass = Yearclass::find($id);
			$file = Input::file('file');
			$file-> move('img/yearclass/', $file->getClientOriginalName());
			$filename = $file->getClientOriginalName();
			$yearclass->foto = "img/yearclass/$filename";
        	$yearclass->save();
			return Redirect::to('/admin/yearclass');
		}

	}
		/*
		* View data
		*/
	public function view(Request $request)
	{
		if($request->ajax()){
			$id = $request->id;
			$info = Yearclass::find($id);
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
        $yearclass = Yearclass::find($id);
        $yearclass->name = $request->edit_name;
        $yearclass->description = $request->edit_description;
        $yearclass->save();
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
		$yearclass = Yearclass::find($id);
		$yearclass = $yearclass -> delete();
		if($response)
			echo "Record Deleted successfully.";
		else
			echo "There was a problem. Please try again later.";
	}
	
}
