<?php

namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Input;
	use Illuminate\Support\Facades\View;
    use Illuminate\Support\Facades\Auth;
    use App\Auth\Password;
    use App\User;
    use App\Subject;
	use App\Classes;
	use App\Student;
	use App\Exam;
	use App\Message;
	use App\Curriculum;
	use App\Finance;
	use App\Library;
    use Intervention\Image\Facades\Image;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Redirect; 
    use App\Http\Requests; 

class GeneralController extends Controller
{ 

	public function __construct(){
         //   $this->beforeFilter('csrf', array('on'=>'post'));
				view::share('subjectnav', Subject::all());
				view::share('classes', Classes::all());
				view::share('student', Student::all());
				view::share('teacher', User::all());
				view::share('exam', Exam::all());
				view::share('curriculum', Curriculum::all());
				view::share('messages', Message::all());
				view::share('finance', Finance::all());
				view::share('library', Library::all());
        }
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

         return view('admin.index');

	}
	public function student()
	{

         return view('admin.student');

	}	public function teacher()
	{

         return view('admin.teacher');

	}	public function classes()
	{

         return view('admin.classes');

	}	public function subjects()
	{

         return view('admin.subjects');

	}	public function exam()
	{

         return view('admin.exam');

	}	public function sport()
	{

         return view('admin.sport');

	}
		public function finance()
	{

         return view('admin.finance');

	}
}

