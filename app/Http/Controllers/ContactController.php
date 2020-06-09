<?php namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Input;
	use Illuminate\Support\Facades\View;
    use App\Auth\Auth;
    use App\Contact;
    use Intervention\Image\Facades\Image;
	use Illuminate\Support\Facades\Redirect;
    use Illuminate\Validation\ValidationServiceProvider;
    class ContactsController extends Controller
    {
        public function __construct(){
           // $this->beforeFilter('csrf', array('on'=>'post'));
        }
        /*
         * Display all data
         */
	   public function index()
	    {
            $contact = Contact::all();
            return view('contacts.index')->with('contact',$contact);
	    }

   /*
		* Add student data
		*/
	public function add(Request $request)
	{
        $contact = new Contact;
        $contact->fname = $request->fname;
        $contact->lname =  $request->lname;
        $contact->email =  $request->email;
        $contact->phone =  $request->phone;
        $contact->moreinfo =  $request->moreinfo;
        $contact->inquiry =  $request->inquiry;
        $contact->company =  $request->company;
        $contact->info =  $request->info;
        $contact->mincost =  $request->mincost;
        $contact->maxcost =  $request->maxcost;
        $contact->deadline =  $request->deadline;
		$contact -> save();
		return Redirect::to('/contact')
				->with('message','Inquiry recieved we will get back to you ASAP!!.');
	    }
		/*
		* View data
		*/
	public function view(Request $request)
	{
		if($request->ajax()){
			$id = $request->id;
			$info = Contact::find($id);
			//echo json_decode($info);
			return response()->json($info);
		}
	}
}
