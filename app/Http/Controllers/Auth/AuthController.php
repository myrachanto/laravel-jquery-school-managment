<?php
namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/teacher-login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function AdminLogin()
    {
        
         if (auth()->guard('teacher')->user()) return redirect()->route('/admin/dashboard');
        return view('/auth/login');
    }

    public function Adminsignup(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->guard('teacher')->attempt(['email' => $request->input('email'),
                                               'password' => $request->input('password'),
                                               'status' => 1]))
        {
            $user = auth()->guard('teacher')->user();
			return Redirect::to('/admin/dashboard')->with('message', 'Thanks for signing in');
        }else{
            return back()->with('message','your username and password are wrong.');
        }
    }
     public function logout() {
				Auth::guard('teacher')->logout(); // logout user
				return Redirect::to('/teacher-login'); //redirect back to login
				}
}