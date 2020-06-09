<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yearclass;
use App\Student;
use App\Exam;
use App\Finance;
use App\Result;
use App\Invoice;
use App\Expenceflow;
use App\Nortification;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Paginate;

use App\Http\Requests;
use App\Http\Controllers\Controller;
class MemberController extends Controller
{
      public function __construct(){
         //   $this->beforeFilter('csrf', array('on'=>'post'));
				view::share('yearclass', Yearclass::all());
				view::share('exams', Exam::all());
        }
		
		/* public function signin() {
			  return view('/member/login');
		 }
			
// Attempts to login admin with email id johndoe@gmail.com
//\Auth::attempt("admin", ['email' => 'johndoe@gmail.com', 'password' => 'password']); 
	public function login() {
		if (Auth::attempt('student', ['email'=>Input::get('email'), 'password'=>Input::get('password')])) {
			return Redirect::to('/member/academic')->with('message', 'Thanks for signing in');
		}

		return Redirect::to('/member/login')->with('message', 'Dude!!! Your email/password combo was incorrect');
	}*/
	public function logout() {
				Auth::guard('student')->logout(); // logout user
				return Redirect::to('/'); //redirect back to login
				}

        /*
         * Display all data
         */
	    public function index()
	    {
            $student = Student::all();
            return view('/admin/student/index')->with('student',$student);
	    }
			public function schoolfee1(){
      		$studentid = 1;
			$student = Student::where('id', $studentid)->firstorfail();
			$finance = Finance::where('studentid', $studentid)->get();
			$debts = $finance->sum('amount');
			$credit = $finance->sum('payment');
			$feebalance = $debts-$credit;
		return View::make('member.schoolfee1')
			->with('$debts', $debts)
			->with('$credit', $credit)
			->with('$feebalance', $feebalance)
			->with('student', $student)
			->with('finance', $finance);
	}
		public function messages() {
        $user = 1;
        //$user = Auth::user()->id;
		$inbox = Nortification::where('Receiverid', $user)->get();
            return view('/member/messages')
            ->with('inbox',$inbox);
	}
    	public function profile() {
        $user = 1;
        //$user = Auth::user()->id;
		$member = Student::where('id', $user)->firstorfail();
            return view('/member/profile')
            ->with('member',$member);
	}
    	public function view(Request $request)
	{
		if($request->ajax()){
			$id = $request->id;
			$info = Nortification::find($id);
			//echo json_decode($info);
			return response()->json($info);
		}
	}
		public function academic()
	    {
            $exam = Exam::all();
            return view('/member/academic')
			->with('exam',$exam);

	    }
       public function results(Request $request)
		{	
		$studentid = 1;
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
		return View::make('member.results')
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
        	public function invoice($name){
      		$invoiceno = $name;
			$inv = Invoice::where('invoiceno', $invoiceno)->Firstorfail();
			$amt = $inv->amount;
			$invoice = Expenceflow::where('invoiceno', $invoiceno)->get();
		return View::make('/member/invoice')
			->with('$amt', $amt)
			->with('invoiceno', $invoiceno)
			->with('invoice', $invoice);
	}
}