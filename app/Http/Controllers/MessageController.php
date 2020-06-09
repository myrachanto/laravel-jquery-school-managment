<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use App\Yos;
use App\Nortification;
use App\Student;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    
	public function __construct() {
	//	parent::__construct();
	//	$this->beforeFilter('csrf', array('on'=>'post'));
				view::share('users', User::all());
				view::share('student', Student::all());
				view::share('yos', Yos::all());
	} 

	public function index() {
        $type1 = 'privatemsg';
        $user = 2;
        //$user = Auth::user()->id;
		$inbox = Message::where('Receiverid', $user)
								 ->where ('type', $type1)->get();
		$outbox = Message::where('senderid',$user)
								 ->where ('type', $type1)->get();
            return view('/admin/messages/index')
            ->with('inbox',$inbox)
            ->with('outbox',$outbox);
	}
    	public function general() {
        $type2 = 'general';
		$messages = Message::where('type', $type2)->get();
            return view('/admin/messages/general')
            ->with('messages',$messages);
	}
    public function messager() {
            return view('/admin/messages/nortfication');
	}
    public function messager2(Request $request) {
		
		$yos = $request->yos;
		$title = $request->title;
		$message = $request->message;
        $user = 2;
		$receivers = Student::where('yos', $yos)->get();
            return view('/admin/messages/messager2')
            ->with('title',$title)
            ->with('message',$message)
            ->with('yos',$yos)
            ->with('receivers',$receivers);
	}
		public function send(Request $request)
	{	
			$c = count($request->checked);
      		$user = 2;
			$title = $request->title;
			$message = $request->message;
			$yos = $request->yos;
		   for ($x = 0; $x < $c; $x++){
					$check = Nortification::where('receiverid', $request->studentid[$x])
									->where ('title', $title)->get();
				
								if($check->count()>0)
							{
								return Redirect::to('/admin/message')
								->with('message', 'this Message has being sent already !!!');
							}else{
									$note = new Nortification();
									$studentid = $request->studentid[$x];
									$student = Student::where('id', $studentid)->first();
									$note->senderid = $user;	
									$note->receiverid = $studentid;	
									$note->receiver = $student->username;		
									$note->title = $title;
									$note->body = $message;
									$note->save();
									
							}
			 
				} 
								return Redirect::to('/admin/message')
									->with('message', 'Message sent.');
	}
public function add(Request $request)
	{
        $Message = new Message;
        $senderid = 2;
        //$user = Auth::user()->id;
        $Message->senderid = $senderid;
        $Message->receiverid = $request->receiverid;
        $Message->title = $request->title;
        $Message->body = $request->body;
        $Message->type = $request->type;
		$Message -> save();
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
			$info = Message::find($id);
			//echo json_decode($info);
			return response()->json($info);
		}
	}
        public function genview(Request $request)
	{
		if($request->ajax()){
			$id = $request->id;
			$info = Message::find($id);
			//echo json_decode($info);
			return response()->json($info);
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
		$message = Message::find($id);
		$message = $message -> delete();
		if($response)
			echo "Record Deleted successfully.";
		else
			echo "There was a problem. Please try again later.";
	}
	
}
