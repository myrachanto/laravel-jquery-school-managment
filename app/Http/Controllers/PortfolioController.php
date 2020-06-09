<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Portfolio;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class PortfolioController extends Controller
{
      public function __construct(){
         //   $this->beforeFilter('csrf', array('on'=>'post'));
        }
        /*
         * Display all data
         */
	    public function index()
	    {
            $portfolio = Portfolio::all();
            return view('/admin/portfolio/index')->with('portfolio',$portfolio);
	    }

   /*
		** Add portfolio data
		*/
	public function add(Request $request)
	{
		$validator = Validator::make($request->all(), Portfolio::$rules);

		if ($validator->passes()) {
        $portfolio = new Portfolio;
        $portfolio->name = $request->name;
        $portfolio->description = $request->description;
        //$category->majorcat = $request->majorcat;
		$portfolio -> save();
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
			$info = Portfolio::find($id);
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
        $portfolio = Portfolio::find($id);
        $portfolio->name = $request->edit_name;
        $portfolio->description = $request->edit_description;
        $portfolio->save();
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
		$portfolio = Portfolio::find($id);
		$portfolio = $portfolio -> delete();
		if($response)
			echo "Record Deleted successfully.";
		else
			echo "There was a problem. Please try again later.";
	}
		public function upload(){
		if(Input::file('file')){
			$id = Input::get('portfolioid');
			$portfolio = Portfolio::find($id);
			$file = Input::file('file');
			$file-> move('img/portfolio/', $file->getClientOriginalName());
			$filename = $file->getClientOriginalName();
			$portfolio->foto = "img/portfolio/$filename";
        	$portfolio->save();
			return Redirect::to('/admin/portfolio');
		}
	
		}
}
