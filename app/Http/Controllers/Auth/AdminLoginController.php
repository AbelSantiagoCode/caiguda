<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
	public function __construct(){
		$this->middleware('guest:admin', ['except'=>['logout']]);
	}


	public function showLoginForm(){
		return view('auth.admin-login');
	}

	public function login(Request $request){
		// Validate the form data
		$this->validate($request,[
			'email' 	=> 'required|email',
			'password' 	=> 'required|min:6'
		]);

		// Attempt to log the user in
		//Auth::guard('admin')->attempt($credentials,$remenber);
		if (Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remenber)) {
			// If successful, then redirect to their intended location
			return redirect()->intended(route('admin.dashboard'));
			
		}
		
		// If unsuccessful, then redirect to the login with the form data

		return redirect()->back()->withInput($request->only('email','remenber'));
	}


	public function logout()
    {
    	Auth::guard('admin')->logout();
        return redirect('/');
        //$this->guard()->logout();

        // Next line code will flush sessions and close both admin and user.
        //$request->session()->invalidate();

        //return $this->loggedOut($request) ?: redirect('/');

    }

}
