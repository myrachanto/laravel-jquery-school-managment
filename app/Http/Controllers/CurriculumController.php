<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Curriculum;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;


class CurriculumController extends Controller
{
      public function __construct(){
          //  $this->beforeFilter('csrf', array('on'=>'post'));
        }
        /*
         * Display all data
         */
	    public function index()
	    {
            $curriculum = Curriculum::all();
            return view('/admin/curriculum/index')->with('curriculum',$curriculum);
	    }

   /*
		** Add portfolio data
		*/
	public function add(Request $request)
	{
        $curriculum = new Curriculum;
        $curriculum->category = $request->category;
        $curriculum->name = $request->name;
		$name = $curriculum->name;
        $curriculum->type = $request->type;
        $curriculum->description = $request->description;
		$curriculum -> save();
		/*if($curriculum -> save()){
				Schema::create($name, function (Blueprint $table) {
						$table->increments('id');
						$table->string('Academicyear');
						$table->string('term');
						$table->string('teacher');
						$table->text('achievements');
						$table->string('Team');
						$table->text('comments');
						$table->timestamps();
					});
		}*/
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
			$info = Curriculum::find($id);
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
        $curriculum = Curriculum::find($id);
        $curriculum->category = $request->edit_category;
        $curriculum->name = $request->edit_name;
        $curriculum->type = $request->edit_type;
        $curriculum->description = $request->edit_description;
        $curriculum->save();
		
		return back()
				->with('success','Record Updated successfully.');
	}
	public function upload(Request $request){
		if(Input::file('file')){
			$id = $request->curriculumid;
			$curriculum = Curriculum::find($id);
			$file =  $request->file;
			$file-> move('img/curriculum/', $file->getClientOriginalName());
			$filename = $file->getClientOriginalName();
			$curriculum->foto = "img/curriculum/$filename";
        	$curriculum->save();
			return Redirect::to('/admin/curriculum');
		}

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
		$curriculum = Curriculum::find($id);
		$curriculum = $curriculum -> delete();
		if($response)
			echo "Record Deleted successfully.";
		else
			echo "There was a problem. Please try again later.";
	}
	
}
