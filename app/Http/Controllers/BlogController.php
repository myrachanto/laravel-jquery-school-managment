<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Blog;
use \Input as Input;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
      public function __construct(){
        //    $this->beforeFilter('csrf', array('on'=>'post'));
        }
        /*
         * Display all data
         */
	    public function index()
	    {
            $blog = Blog::all();
            return view('/admin/blog/index')->with('blog',$blog);
	    }
	/*	public function upload(){

       		$category = new Category;
			$category->name = Input::get('name');
			$category->file = Input::get('file');
			if($category->file){
				$category ->move('img/categoryfotos', $category->file);
				echo '<img src="img/categoryfotos/.$category->file" class="img-responsive" alt="$category->file"';
				}
			}
			/*
		** Add blog data
		*/
	public function add(Request $request)
	{
	/*	$validator = Validator::make($request->all(), Blog::$rules);

		if ($validator->passes()) {*/
        $blog = new Blog;
        $blog->name = $request->name;
        $blog->title = $request->title;
        $blog->metatag = $request->metatag;
        $blog->category = $request->category;
        $blog->description1 = $request->description1;
        $blog->description2 = $request->description2;
        $blog->description3 = $request->description3;
        $blog->summary = $request->summary;
       // $career->image = $request->image;
		$blog -> save();
		return back()
				->with('success','Record Added successfully.');
	   /* }
		return back()
			->with('message', 'Something went wrong')
			->withErrors($validator)
			->withInput();*/
	
		}
		/*
		* View data
		*/
	public function view(Request $request)
	{
		if($request->ajax()){
			$id = $request->id;
			$info = Blog::find($id);
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
        $blog = Blog::find($id);
        $blog->name = $request->edit_name;
        $blog->title = $request->edit_title;
        $blog->metatag = $request->edit_metatag;
        $blog->category = $request->edit_category;
        $blog->description1 = $request->edit_description1;
        $blog->description2 = $request->edit_description2;
        $blog->description3 = $request->edit_description3;
        $blog->summary = $request->edit_summary;
        $blog->save();
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
		$blog = Blog::find($id);
		$response = $blog -> delete();
		if($response)
			echo "Record Deleted successfully.";
		else
			echo "There was a problem. Please try again later.";
	}
	public function upload(Request $request){
		if($request->file){
			$id = $request->blogid;
			$blog = Blog::find($id);
			$file = $request->file('file');
			$file-> move('img/blogs/', $file->getClientOriginalName());
			$filename = $file->getClientOriginalName();
			$blog->foto = "img/blogs/$filename";
        	$blog->save();
			return Redirect::to('/admin/blog');
		}
	}
}
