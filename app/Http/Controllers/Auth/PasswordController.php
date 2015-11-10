<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Parse\ParseUser;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Request an email password reset
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function postEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        ParseUser::requestPasswordReset($request->input('email'));

        flash()->overlay('An email has been sent to '.$request->input('email'), 'Please follow instructions in the email to change your password.', 'success');

        return redirect()->back();
    }

    /**
     * Display the password reset view for the given token.
     *
     * @param  string  $token
     * @return \Illuminate\Http\Response
     */
    public function getReset()
    {
        return view('auth.reset')->with(['username' => \Input::get('username'), 'token' => \Input::get('token')]);
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getResetSuccess()
    {
        flash()->overlay('Your password has been reset succesfully!', '', 'success');
        return redirect('/');
    }
}
