<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Expence;
use \Input as Input;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ExpencesController extends Controller
{
      public function __construct(){
          //  $this->beforeFilter('csrf', array('on'=>'post'));
        }
        /*
         * Display all data
         */
	    public function index()
	    {
            $expence = Expence::all();
            return view('/Accounts/finances/expences/index')->with('expence',$expence);
	    }
	
	public function add(Request $request)
	{
		$validator = Validator::make($request->all(), Expence::$rules);

		if ($validator->passes()) {
        $expence = new Expence;
        $expence->name = $request->name;
        $expence->description = $request->description;
		$expence -> save();
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
			$info = Expence::find($id);
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
        $expence = Expence::find($id);
        $expence->name = $request->edit_name;
        $expence->description = $request->edit_description;
        $expence->save();
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
		$expence = Expence::find($id);
		$response = $expence -> delete();
		if($response)
			echo "Record Deleted successfully.";
		else
			echo "There was a problem. Please try again later.";
	}
	
}