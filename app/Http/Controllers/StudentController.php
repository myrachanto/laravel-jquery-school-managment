<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yearclass;
use App\Student;
use App\Exam;
use App\Result;
use App\Curriculum;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Paginate;

use App\Http\Requests; 
use App\Http\Controllers\Controller;
class StudentController extends Controller
{
      public function __construct(){
          //  $this->beforeFilter('csrf', array('on'=>'post'));
				view::share('yearclass', Yearclass::all());
				view::share('exams', Exam::all());
        }
        /*
         * Display all data
         */
	    public function index()
	    {
            $student = Student::all();
            return view('/admin/student/index')->with('student',$student);
	    }
		public function lists()
	    {
            $student = Student::all();
            return view('/admin/student/lists')->with('student',$student);
	    }
			public function personal()
	    {
            $student = Student::all();
            return view('/admin/student/personal')->with('student',$student);
	    }
		public function academic()
	    {
            $exam = Exam::all();
            $student = Student::all();
            return view('/admin/student/academic')
			->with('exam',$exam)
			->with('student',$student);

	    }
		 public function examresults(Request $request)
		{	
		$studentid = $request->student;
		$examid = $request->exam;
		$res = Result::where('studentid', $studentid)
		 						->where('examid', $examid)->first();
		$student = Student::where('id', $studentid)->firstorfail();
		$exam = Exam::where('id', $examid)->firstorfail();
		if($res->English>=80){
			$e = 'A';
		}elseif($res->English>=60){
			$e = 'B';
		}elseif($res->English>=50){
			$e = 'C';
		}elseif($res->English>=45){
			$e = 'D';
		}elseif($res->English>=40){
			$e = 'E';
		}else{
			$e ='F';
		}
		if($res->maths>=80){
			$m = 'A';
		}elseif($res->maths>=60){
			$m = 'B';
		}elseif($res->maths>=50){
			$m = 'C';
		}elseif($res->maths>=45){
			$m = 'D';
		}elseif($res->maths>=40){
			$m = 'E';
		}else{
			$m ='F';
		}
		if($res->Kiswahili>=80){
			$k = 'A';
		}elseif($res->Kiswahili>=60){
			$k = 'B';
		}elseif($res->Kiswahili>=50){
			$k = 'C';
		}elseif($res->Kiswahili>=45){
			$k = 'D';
		}elseif($res->Kiswahili>=40){
			$k = 'E';
		}else{
			$k ='F';
		}
		if($res->Biology>=80){
			$b = 'A';
		}elseif($res->Biology>=60){
			$b = 'B';
		}elseif($res->Biology>=50){
			$b = 'C';
		}elseif($res->Biology>=45){
			$b = 'D';
		}elseif($res->Biology>=40){
			$b = 'E';
		}else{
			$b ='F';
		}
		if($res->Geography>=80){
			$g = 'A';
		}elseif($res->Geography>=60){
			$g = 'B';
		}elseif($res->Geography>=50){
			$g = 'C';
		}elseif($res->Geography>=45){
			$g = 'D';
		}elseif($res->maths>=40){
			$g = 'E';
		}else{
			$g ='F';
		}
		if($res->Chemistry>=80){
			$c = 'A';
		}elseif($res->Chemistry>=60){
			$c = 'B';
		}elseif($res->Chemistry>=50){
			$c = 'C';
		}elseif($res->Chemistry>=45){
			$c = 'D';
		}elseif($res->Chemistry>=40){
			$c = 'E';
		}else{
			$c ='F';
		}
		if($res->Physics>=80){
			$p = 'A';
		}elseif($res->Physics>=60){
			$p = 'B';
		}elseif($res->Physics>=50){
			$p = 'C';
		}elseif($res->Physics>=45){
			$p = 'D';
		}elseif($res->Physics>=40){
			$p = 'E';
		}else{
			$p ='F';
		}
		if($res->CRE>=80){
			$cre = 'A';
		}elseif($res->CRE>=60){
			$cre = 'B';
		}elseif($res->CRE>=50){
			$cre = 'C';
		}elseif($res->CRE>=45){
			$cre = 'D';
		}elseif($res->CRE>=40){
			$cre = 'E';
		}else{
			$cre ='F';
		}
		if($res->business>=80){
			$biz = 'A';
		}elseif($res->business>=60){
			$biz = 'B';
		}elseif($res->business>=50){
			$biz = 'C';
		}elseif($res->business>=45){
			$biz = 'D';
		}elseif($res->business>=40){
			$biz = 'E';
		}else{
			$biz ='F';
		}
		if($res->History>=80){
			$h = 'A';
		}elseif($res->History>=60){
			$h = 'B';
		}elseif($res->History>=50){
			$h = 'C';
		}elseif($res->History>=45){
			$h = 'D';
		}elseif($res->History>=40){
			$h = 'E';
		}else{
			$h ='F';
		}
		if($res->Agriculture>=80){
			$a = 'A';
		}elseif($res->Agriculture>=60){
			$a = 'B';
		}elseif($res->Agriculture>=50){
			$a = 'C';
		}elseif($res->Agriculture>=45){
			$a = 'D';
		}elseif($res->Agriculture>=40){
			$a = 'E';
		}else{
			$a ='F';
		}
		return View::make('admin.student.examresults')
			->with('student', $student)
			->with('exam', $exam)
			->with('e', $e)
			->with('m', $m)
			->with('k', $k)
			->with('b', $b)
			->with('g', $g)
			->with('p', $p)
			->with('c', $c)
			->with('h', $h)
			->with('a', $a)
			->with('cre', $cre)
			->with('biz', $biz)
			->with('res', $res);
		}
		public function extra()
	    {
            $student = Student::all();
            return view('/admin/student/extra')->with('student',$student);
	    }
		public function extracurriculum($name)
	    {
		$id = $name;
        $curriculum = Curriculum::all();
		//$result = curriculum::where('examid', $examid)->get();
            return view('/admin/student/extacuriculum')->with('curriculum',$curriculum);
	    }
   /*
		** Add portfolio data
		*/
	public function add(Request $request)
	{
		$validator = Validator::make($request->all(), User::$rules);

		if ($validator->passes()) {
        	$student = new Student;
			$student->acedemicyear = $request->acedemicyear;
			$student->fname = $request->fname;
			$student->lname = $request->lname;
			$student->username = $request->username;
			$student->regno = $request->regno;
			$student->gender = $request->gender;
			$student->fathersname = $request->fathersname;
			$student->mothersname = $request->mothersname;
			$student->gaurdiansname = $request->gaurdiansname;
			$student->primary_p_no = $request->primary_p_no;
			$student->secondary_p_no = $request->secondary_p_no;
			$student->county = $request->county;
			$student->primaryschool = $request->primaryschool;
			$student->kcpescore = $request->kcpescore;
			$student->primaryaddress = $request->primaryaddress;
			$student->email = $request->email;
			$user->status = $status;
			$student->remember_token = $request->_token;
			$student->password = Hash::make($request->password);
		$student -> save();
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
			$id = Input::get('studentid');
			$student = Student::find($id);
			$file = Input::file('file');
			$file-> move('img/student/', $file->getClientOriginalName());
			$filename = $file->getClientOriginalName();
			$student->foto = "img/student/$filename";
        	$student->save();
			return Redirect::to('/admin/student');
		}

	}
		/*
		* View data
		*/
	public function view(Request $request)
	{
		if($request->ajax()){
			$id = $request->id;
			$info = Student::find($id);
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
        $student = Student::find($id);
		
			$student->acedemicyear = $request->edit_acedemicyear;
			$student->fname = $request->edit_fname;
			$student->lname = $request->edit_lname;
			$student->username = $request->edit_username;
			$student->Regno = $request->edit_regno;
			$student->gender = $request->edit_gender;
			$student->fathersname = $request->edit_fathersname;
			$student->mothersname = $request->edit_mothersname;
			$student->gaurdiansname = $request->edit_gaurdiansname;
			$student->primary_p_no = $request->edit_primary_p_no;
			$student->secondary_p_no = $request->edit_secondary_p_no;
			$student->county = $request->edit_county;
			$student->primaryschool = $request->edit_primaryschool;
			$student->kcpescore = $request->edit_kcpescore;
			$student->primaryaddress = $request->edit_primaryaddress;
			$student->email = $request->edit_email;
        $student->save();
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
		$student = Student::find($id);
		$student = $student -> delete();
		if($response)
			echo "Record Deleted successfully.";
		else
			echo "There was a problem. Please try again later.";
	}
	
}
