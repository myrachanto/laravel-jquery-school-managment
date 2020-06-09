<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Expenceflow;
use App\Expence;
use App\Invoice;
use App\Yos;
use App\Feebalance;
use \Input as Input;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Redirect; 

class ExpenceflowController extends Controller
{
      public function __construct(){
          //  $this->beforeFilter('csrf', array('on'=>'post'));
				view::share('expence', Expence::all());
				view::share('invoice', Invoice::all());
				view::share('yos', Yos::all());
        }
        /*
         * Display all data
         */
	    public function index()
	    {
            $expenceflows = Expenceflow::all();
            return view('/admin/finances/expenceflows/index')->with('expenceflows',$expenceflows);
	    }
	    public function fee()
	    {
            $expenceflows = Expenceflow::all();
            return view('/admin/finances/fee')->with('expenceflows',$expenceflows);
	    }
	 public function part1()
	{	
		return View::make('admin.finances.part1');
	}
	public function invoicelist()
	{	
		return View::make('admin.finances.invoicelist');
	}
	 public function invoice($name)
	{	
		$invoiceno = $name;
		 $invoicedata = Expenceflow::where('invoiceno', $invoiceno)->get();
		$amt = $invoicedata->sum('amount');
		$invo = Invoice::where('invoiceno', $invoiceno)->firstorfail();
		$year = $invo->year;
		$term = $invo->term;
		return View::make('admin.finances.invoice')
			->with('invoiceno', $invoiceno)
			->with('year', $year)
			->with('term', $term)
			->with('amt', $amt)
			->with('invoicedata', $invoicedata);
	}
	public function part2(Request $request){
		$years = $request->year;
		$term = $request->term;
        $expence = Expence::all();
		return View::make('admin.finances.part2')
			->with('expence', $expence)
			->with('term', $term)
			->with('years', $years);


	}	
	public function part3(Request $request){
		$invoiceno = $request->invoiceno;
        $expence = Expence::all();
		return View::make('admin.finances.part3')
			->with('expence', $expence)
			->with('invoiceno', $invoiceno);
	}
		public function Infor(Request $request)
	{
			$c = count($request->checked);
			$y = $c - 1;
			$invo = Invoice::all();
			$las = $invo -> count();
			$last = $las + 1;
			$sch = "SchoInv";
			$invoiceno = "$sch$last";
			$years = $request->years;
			$term = $request->term;		
		   for ($x = 0; $x < $c; $x++){
					$check = Invoice::where('year', $request->years)
									->where ('term', $request->term)->get();
				
								if($check->count()>0)
							{
								return Redirect::to('/admin/finance')
								->with('message', 'this Invoice Exists!!!');
							}else{
									$expenceflows = new Expenceflow();
									$expenceid = $request->expenceid[$x];
									$expenc = Expence::where('id', $expenceid)->first();
									$expenceflows->expencename = $expenc->name;
									$expenceflows->expenceid = $expenceid;				
									$expenceflows->year = $years;
									$expenceflows->term = $term;
									$expenceflows->invoiceno = $invoiceno;
									$amount = $request->amount[$x];
									$amt =  $amount + $amount;
									$expenceflows->amount = $amount;
									$expenceflows->checked = $request->checked[$x];
									$expenceflows->save();
									
							}
			 if($x == $c - 1){
				 $amounts = Expenceflow::where('invoiceno', $invoiceno)->get();
					$amt = $amounts->sum('amount');
					$invoice = new Invoice;
					$invoice->invoiceno = $invoiceno;
					$invoice->term = $term;
					$invoice->year = $years;
					$invoice->amount = $amt;
					$invoice -> save();	
		 		  }
				} 
								return Redirect::to('/admin/finance')
									->with('message', 'info updated.');
	}
		public function forced(Request $request)
	{
			$c = count($request->checked);
			$invoiceno = $request->invoiceno;
		   for ($x = 0; $x < $c; $x++){
				
									$expenceflows = Expenceflow::where('invoiceno', $invoiceno)
													->where ('expenceid', $request->expenceid[$x])->firstorfail();
									$expenceid = $request->expenceid[$x];
									$expenc = Expence::where('id', $expenceid)->first();
									$expenceflows->expencename = $expenc->name;
									$expenceflows->expenceid = $expenceid;
									$amount = $request->amount[$x];
									$amt =  $amount + $amount;
									$expenceflows->amount = $amount;
									$expenceflows->checked = $request->checked[$x];
									$expenceflows->save();
									
			 if($x == $c - 1){
				 $amounts = Expenceflow::where('invoiceno', $invoiceno)->get();
					$amt = $amounts->sum('amount');
					$invoice = Invoice::where('invoiceno', $invoiceno)->first();
					$invoice->amount = $amt;
					$invoice -> save();	
		 		  }
		   }
								return Redirect::to('/admin/finance')
									->with('message', 'info updated.');
	}
	public function view(Request $request)
	{
		if($request->ajax()){
			$id = $request->id;
			$info = Expenceflow::find($id);
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
        $expenceflows = Expenceflow::find($id);
        $expenceflows->expenceid = $request->edit_expenceid;
        $expenceflows->year = $request->edit_year;
        $expenceflows->term = $request->edit_term;
        $expenceflows->amount = $request->edit_amount;
        $expenceflows->save();
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