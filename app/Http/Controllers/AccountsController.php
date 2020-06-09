<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Expenceflow;
use App\Expence;
use App\Student;
use App\Finance;
use App\Invoice;
use App\yos;
use \Input as Input;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Redirect; 

class AccountsController extends Controller
{
      public function __construct(){
        //    $this->beforeFilter('csrf', array('on'=>'post'));
				view::share('expence', Expence::all());
				view::share('student', Student::all());
				view::share('yos', Yos::all());
				view::share('finance', Finance::all());
        }
			public function Dashboard()
	{
         return view('Accounts.Dashboard');

	}
        /*
         * Display all data
         */
	    public function index()
	    {
			$payment = "payment";
			$finances = Finance::where('type', $payment)->get();
            return view('/Accounts/finances/index')->with('finances',$finances);
	    }
	
	public function add(Request $request)
	{
        $finance = new Finance;
		$payment = "payment";
        $finance->studentid = $request->studentid;
        $studentid = $request->studentid;
		$stud = Student::where('id', $studentid)->Firstorfail();
        $finance->username = $stud->username;
        $finance->regno = $stud->regno;
        $finance->type = $payment;
        $finance->name = $request->name;
        $finance->year = $request->yos;
        $finance->term = $request->term;
        $finance->description = $request->description;
        $finance->payment = $request->amount;
		$finance -> save();
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
			$info = Finance::find($id);
			//echo json_decode($info);
			return response()->json($info);
		}
	}
	public function fees(){
        $yos = yos::all();
        $invoice = Invoice::all();
		return View::make('Accounts.finances.fees')
			->with('yos', $yos)
			->with('invoice', $invoice);
	}
		public function studentfees($name){
        $yos = $name;
		$studs = Finance::where('year', $yos)->get();
		//$invo = Invoice::where('year', $yos)->get(); come back latter!!!!
		return View::make('Accounts.finances.studentfees')
			->with('yos', $yos)
			->with('studs', $studs);
	}	
	public function paymentflow(){
		$student = Student::all();
		return View::make('Accounts.finances.paymentflow')
			->with('student', $student);
	}
	public function individualinvo($name){
      		$invoiceno = $name;
			$inv = Invoice::where('invoiceno', $invoiceno)->Firstorfail();
			$amt = $inv->amount;
			$invoice = Expenceflow::where('invoiceno', $invoiceno)->get();
		return View::make('Accounts.finances.individualinvo')
			->with('$amt', $amt)
			->with('invoiceno', $invoiceno)
			->with('invoice', $invoice);
	}	
	public function paymentflow2(Request $request){
      		$studentid = $request ->studentid;
			$student = Student::where('id', $studentid)->firstorfail();
			$finance = Finance::where('studentid', $studentid)->get();
			$debts = $finance->sum('amount');
			$credit = $finance->sum('payment');
			$feebalance = $debts-$credit;
		return View::make('Accounts.finances.paymentflow2')
			->with('$debts', $debts)
			->with('$credit', $credit)
			->with('$feebalance', $feebalance)
			->with('student', $student)
			->with('finance', $finance);
	}
	public function confirm(Request $request){
       		$year = $request->year;
			$invoiceno = $request->invoiceno;
			$amt = $request->amt;
			$term = $request->term;	
			$studs = Student::where('yos', $year)->get();
		return View::make('Accounts.finances.confirm')
			->with('invoiceno', $invoiceno)
			->with('amt', $amt)
			->with('year', $year)
			->with('term', $term)
			->with('studs', $studs);
	}
 	public function deploy(Request $request)
	{	
			$c = count($request->checked);
			$year = $request->year;
			$invoiceno = $request->invoiceno;
			$amt = $request->amt;
			$term = $request->term;		
		   for ($x = 0; $x < $c; $x++){
					$check = Finance::where('studentid', $request->studentid[$x])
									->where ('invoiceno', $invoiceno)->get();
				
								if($check->count()>0)
							{
								return Redirect::to('/Accounts/finances/fees')
								->with('message', 'this Invoice Exists!!!');
							}else{
									$finance = new Finance();
									$studentid = $request->studentid[$x];
									$student = Student::where('id', $studentid)->first();
									$finance->studentid = $studentid;	
									$finance->username = $student->username;
									$finance->regno = $student->regno;			
									$finance->year = $year;
									$finance->term = $term;
									$finance->invoiceno = $invoiceno;
									$finance->amount = $amt;
									$finance->checked = $request->checked[$x];
									$finance->save();
									
							}
			 
				} 
								return Redirect::to('/Accounts/finance')
									->with('message', 'info updated.');
	}
		  
	

	
}