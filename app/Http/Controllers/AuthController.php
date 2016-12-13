<?php

namespace Blogger\Http\Controllers;

use Illuminate\Http\Request;

use Blogger\Http\Requests;

use Session;

use Blogger\User;

use Auth;

class AuthController extends Controller
{
   

	public function postSignup(Request $request)
	{
		//dd('sign up');//dd means die & dump!!
		$this->validate($request, [
			//The email must be required, unique to just one user, in the users table, it must be an email, and must have a maximum character of 255 length
			'name' => 'required|unique:users|max:20',
			'email' => 'required|unique:users|email|max:255',
			'password' => 'required|min:6',
		]);

		//dd('all ok');

		User::create([
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'password' => bcrypt($request->input('password')),
		]);

		Session::flash('success', 'Your account has been created and you can now sign in!');

		return redirect()->route('home');
	}


	public function postSignin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required',
			'password' => 'required',
		]);
		
		if (!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))){

			Session::flash('success', 'Could not sign you in with these details, please check and try again.');

			return redirect()->route('home');
		}

		Session::flash('success', 'You are now signed in!');

		return redirect()->route('home');
	}

	public function getSignout()
	{
		Auth::logout();

		return redirect()->route('home');
	}

}
