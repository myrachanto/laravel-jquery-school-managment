<?php

namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
	//use Illuminate\Support\Facades\Input;
	use Illuminate\Support\Facades\View;
    use Illuminate\Support\Facades\Auth;
    use App\Auth\Password;
    use App\User;
    use App\Yearclass;
    use App\Subject;
    use App\Student;
    use App\Examination;
    use App\Exam;
    use App\Classes;
	use App\Result;
    use Intervention\Image\Facades\Image;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Redirect; 
    use App\Http\Requests; 
	use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
     
	public function __construct(){
          //  $this->beforeFilter('csrf', array('on'=>'post'));
				view::share('yearclassnav', Yearclass::all());
				view::share('subject', Subject::all());
				view::share('classes', Classes::all());
        }
          public function index()
	    {
            $exam = Exam::all();
            return view('/admin/exam/index')->with('exam',$exam);
	    }

		

   /*

		** Add portfolio data
		*/
	public function add(Request $request)
	{
		$validator = Validator::make($request->all(), Exam::$rules);

		if ($validator->passes()) {
        $exam = new Exam;
        $exam->name = $request->name;
        $exam->description = $request->description;
		$exam -> save();
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
			$info = Exam::find($id);
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
        $exam = Exam::find($id);
        $exam->name = $request->edit_name;
        $exam->description = $request->edit_description;
        $exam->save();
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
		$exam = Exam::find($id);
		$exam = $exam -> delete();
		if($response)
			echo "Record Deleted successfully.";
		else
			echo "There was a problem. Please try again later.";
	}
	       
    public function part1($name)
	{	
		$classes = $name;
		$subject = Subject::all();
		$exam = Exam::all();
		$student = Student::all();
		$classes = Classes::where('name', '=', $classes)->first();
		return View::make('admin.exam.part1')
			->with('subject', $subject)
			->with('exam', $exam)
			->with('student', $student)
			->with('classes', $classes);
	}
	public function studentwise(Request $request){
		$studentid = $request->studentid;
		$exam = $request->exam;
		$classid = $request->classid;
		$student = Student::where('id', '=', $studentid)->first();
		$exam = Exam::where('name', '=', $exam)->first();
		return View::make('admin.exam.Studentwise')
			->with('classid', $classid)
			->with('exam', $exam)
			->with('student', $student);


	}
	public function rewrite(Request $request){
			$check = Result::where('studentid', $request->studentid)
									->where ('examid', $request->examid)
									->where ('classid', $request->classid)->get();
				
								if($check->isEmpty())
							{
								return Redirect::to('/admin/exams')
								->with('message', 'Sorry there is nothing to update-that user with those credentials does not exist!!!');
							}else{
									$studentid = $request->studentid;
									$examid = $request->examid;
									$classid = $request->classid;
								
									$student = Student::where('id', '=', $studentid)->first();
									$res = Result::where('studentid', $studentid)
																->where ('examid', $examid)->first();
									$exam = Exam::where('id', '=', $examid)->first();
									return View::make('admin.exam.rewrite')
										->with('classid', $classid)
										->with('exam', $exam)
										->with('student', $student)
										->with('res', $res);
							}


	}
	public function part2(Request $request){
		$term = $request->term;
		$exam = $request->exam;
		$subject = $request->subject;
		$classes = $request->classes;
        $student = Student::all();
		$classes = Classes::where('name', '=', $classes)->first();
		$subject = Subject::where('name', '=', $subject)->first();
		$exam = Exam::where('name', '=', $exam)->first();
		return View::make('admin.exam.part2')
			->with('subject', $subject)
			->with('exam', $exam)
			->with('student', $student)
			->with('classes', $classes);


	}
	public function part3(Request $request){
		$term = $request->term;
		$exam = $request->exam;
		$subject = $request->subject;
		$classes = $request->classes;
        $student = Student::all();
		$classes = Classes::where('name', '=', $classes)->first();
		$subject = Subject::where('name', '=', $subject)->first();
		$exam = Exam::where('name', '=', $exam)->first();
		return View::make('admin.exam.part3')
			->with('subject', $subject)
			->with('exam', $exam)
			->with('student', $student)
			->with('classes', $classes);


	}
		
	public function info(Request $request)
	{
				$check = Result::where('studentid', $request->studentid)
									->where ('examid', $request->examid)->get();
				
								if($check->count()>0)
							{
								return Redirect::to('/admin/exams')
								->with('message', 'this data is already in the database!!!');
							}else{
								$result = new Result();
									$student = Student::where('id', $request->studentid)->firstorfail();
									$result->username = $student->username;
									$result->studentid = $request->studentid;
									$result->regno = $student->regno;
									$result->yos = $student->yos;
									$result->acadamicyear = $student->academicyear;
									$result->examid = $request->examid;
									$result->classid = $request->classid;
									$result->English = $request->English; 
									$result->maths = $request->maths;  
									$result->Kiswahili = $request->Kiswahili;  
									$result->Biology = $request->Biology;  
									$result->Geography = $request->Geography;  
									$result->Chemistry = $request->Chemistry;  
									$result->CRE = $request->CRE;  
									$result->History = $request->History;  
									$result->business = $request->business;  
									$result->Agriculture = $request->Agriculture;  
									$result->English = $request->English;  
									$result->English = $request->English;   	
									$result -> save();
									
								return Redirect::to('/admin/exams')
								->with('message', 'info updated!!!');
							}
	}
	public function write(Request $request)
	{
		$check = Result::where('studentid', $request->studentid)
									->where ('examid', $request->examid)->get();
				
								if($check->count()<0)
							{
								return Redirect::to('/admin/exams')
								->with('message', 'Sorry there is nothing to update!!!');
							}else{
				$result = Result::where('studentid', $request->studentid)
									->where ('examid', $request->examid)->first();
									$student = Student::where('id', $request->studentid)->firstorfail();
									$result->username = $student->username;
									$result->studentid = $request->studentid;
									$result->regno = $student->regno;
									$result->yos = $student->yos;
									$result->acadamicyear = $student->academicyear;
									$result->examid = $request->examid;
									$result->classid = $request->classid;
									$result->English = $request->English; 
									$result->maths = $request->maths;  
									$result->Kiswahili = $request->Kiswahili;  
									$result->Biology = $request->Biology;  
									$result->Geography = $request->Geography;  
									$result->Chemistry = $request->Chemistry;  
									$result->CRE = $request->CRE;  
									$result->CRE = $Physics->Physics;  
									$result->History = $request->History;  
									$result->business = $request->business;  
									$result->Agriculture = $request->Agriculture;  
									$result->English = $request->English;  
									$result->English = $request->English;   	
									$result -> save();
									
								return Redirect::to('/admin/exams')
								->with('message', 'info updated!!!');
							}
							
	}

		/*	insert new student with their sore data if they dont exist!!!
				*/
	public function Information(Request $request)
	{
		
			$subject = $request->subject;
			$examid = $request->examid;
			$c = count($request->checked);
			
		   for ($x = 0; $x < $c; $x++){
								if(!DB::table('result')->where('studentid', $request->studentid[$x])
									->where ('examid', $examid)->first())
							{
								$result = new Result();
									$student = Student::where('id', $request->studentid[$x])->firstorfail();
									$result->username = $student->username;
									$result->regno = $student->regno;
									$result->yos = $student->yos;
									$result->acadamicyear = $student->academicyear;
									$result->examid = $examid;
									$result->classid = $request->classesid;
									$result->$subject = $request->score[$x];
									$result->studentid = $request->studentid[$x];
									$result -> save();
								return Redirect::to('/admin/exams')
								->with('message', 'info updated!!!');

							}else{

									$result = Result::where('studentid', $request->studentid[$x])
											->where ('examid', $examid)->first();
											///use yos and accademic year to be precise
									$student = Student::where('id', $request->studentid[$x])->first();
									$result->username = $student->username;
									$result->regno = $student->regno;
									$result->yos = $student->yos;
									$result->acadamicyear = $student->academicyear;
									$result->examid = $examid;
									$result->classid = $request->classesid;
									$result->$subject = $request->score[$x];
									$result->studentid = $request->studentid[$x];
									$result -> save();
									
								return Redirect::to('/admin/exams')
								->with('message', 'info updated accordingly!!!');	
								}/*else{
									
								return Redirect::to('/admin/exams')
								->with('message', 'info Already exist in the database!!!');
								}*/
								
		 		  }

								return Redirect::to('/admin/exams')
									->with('message', 'info updated.');
	}

		public function forced(Request $request)
	{
		
			$c = count($request->checked);
		   for ($x = 0; $x < $c; $x++){
									$result = Result::where('studentid', $request->studentid[$x])
									->where ('examid', $request->examid)->firstorfail();
								/*	$student = Student::where('id', $request->studentid[$x])->firstorfail();
									$result->username = $student->username;
									$result->regno = $student->regno;
									$result->yos = $student->yos;
									$result->acadamicyear = $student->academicyear;
									$result->examid = $request->examid;
									$result->classid = $request->classesid;*/
									$subject = $request->subject;
									$result->$subject = $request->score[$x];
								//	$result->studentid = $request->studentid[$x];
									$result -> save();
		   }
				
			return Redirect::to('/admin/exams')
				->with('message', 'info updated.');

	}
    public function results()
	{	
		$subject = Subject::all();
		$student = Student::all();
		$results = Result::all();
		return View::make('admin.exam.results')
			->with('subject', $subject)
			->with('results', $results)
			->with('student', $student);
	}
	 public function result()
	{	
		$subject = Subject::all();
		$exam = exam::all();
		$classes = classes::all();
		return View::make('admin.exam.subjectwise')
			->with('subject', $subject)
			->with('classes', $classes)
			->with('exam', $exam);
	}
	 public function test()
	{	
		$subject = Subject::all();
		return View::make('admin.exam.test')
			->with('subject', $subject);
	}	 
	/*public function allresult()
	{	
		$yos = Input::get('1');
		$year = Input::get('year');
		$examid = Input::get('2');
		$result = Student::where('yos', $yos)->get();
		$all = collect();
		foreach($result as $r){
				$studentid = $r->id;
				$res = Result::where('examid', $examid)
								->where('studentid', $studentid)->firstorfail();
				$collection->put('$studentid', $res);

		   }
		return View::make('admin.exam.results')
			->with('all', $all);
			//->with('yos', $yos)
			//->with('exam', $exam);
	}*/

	public function answers(Request $request)
	{	
		$subjectid = $request->subjectid;
		$classid = $request->classid;
		$subj = Subject::where('id',$subjectid)->first();
		$exam = Exam::where('id',$request->examid)->firstorfail();
		$class = Classes::where('id',$request->classid)->firstorfail();
	$answers = Result::where('classid', $request->classid)
					->where ('examid', $request->examid)
					->where ('classid', $request->classid)->get();
					return View::make('admin.exam.answers')
						->with('subj', $subj)
						->with('exam', $exam)
						->with('class', $class)
						->with('answers', $answers);
	}
	public function test2()
	{	
		//$subjectid = $request->subjectid;
		$subject = Subject::all();
		$student = Student::all();

		$exam = Exam::where('id',2)->firstorfail();
	$answers = Result::where('classid', 1)
					->where ('examid', 2)->get();
					return View::make('admin.exam.test2')
						->with('subject', $subject)
						->with('exam', $exam)
						->with('student', $student)
						->with('answers', $answers);
	}
}