<?php

namespace App\Http\Controllers\Admin\Auth;

use App\DTO\Alert\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

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
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function sendFailedLoginResponse(Request $request) {
        $alertArray = collect();
        $alert = new Alert();
        $alert->setDangerType();
        $alert->setMessage(trans('form.error_password_or_mail'));
        $alertArray->push($alert);

        return view('admin.authentication.login', compact('alertArray'));
    }
}
