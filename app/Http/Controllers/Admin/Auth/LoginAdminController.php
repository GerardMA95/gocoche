<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginAdminController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | Login Admin Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the admin application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.authentication.login');
    }

    /**
     * Add test user.
     *
     * @return \Illuminate\Http\Response
     */
    public function addTestUser() 
    {
    	$user = new \App\User;
    	$user->name = 'test';
    	$user->email = 'test@test.com';
    	$user->password = bcrypt('1234');
    	$user->save();

    	return view('admin.authentication.login');
    }

}
