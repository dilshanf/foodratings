<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(Request $request) {
		return view('auth.login');
	}


	public function login(Request $request) {
		$request->validate([
			'email' => 'required|email',
			'password' => 'required',
		]);

		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials)) {
			return redirect()->intended('/');
		}
		else
		{
			return redirect()->intended('login');
		}
	}
	
	public function logout(Request $request) {
		Auth::logout();
		return redirect()->intended('login');
	}
}
