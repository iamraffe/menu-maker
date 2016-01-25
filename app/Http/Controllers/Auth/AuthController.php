<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Registrar as Registrar;
use App\Repositories\ParseGroupRepository;
use App\Repositories\ParseUserRepository;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Parse\ParseUser;
use Validator;
use \LaraParse\Subclasses\User as LaraParseUser;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/admin/menus';

    public function __construct(Guard $auth, Registrar $registrar, LaraParseUser $user)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;
        $this->user = $user;
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request, ParseUserRepository $userRepo)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = $userRepo->findBy('username', $request->username);

        if(!$user->emailVerified){
            flash()->error('', 'Your email must be verified before you can log in');
            return redirect()->back();
        }

        $credentials = $request->only('username', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember_token'))) {
            return redirect()->intended($this->redirectPath());
        }

        return redirect($this->loginPath())
            ->withInput($request->only('username', 'remember_token'))
            ->withErrors([
                'username' => $this->getFailedLoginMessage(),
            ]);
    }

     /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postRegister(Request $request, ParseGroupRepository $group, $account)
    {
        // dd($account);
        $user = $request->all();
        $group = $group->findBy('account', $account);
        $user['group'] = $group;
        $user['email'] = $user['email'].'@bufalinapizza.com';
        try {
            $validator = $this->registrar->validator($user);
            if ($validator->fails()) {
                $this->throwValidationException(
                    $request, $validator
                );
            }
        } catch(ParseException $ex) {
            flash()->error('A user is already registered with these credentials', 'Please check your input and try again.');
            return redirect()->back();
        }

        $this->registrar->create($user);

        // $this->auth->login();
        flash()->overlay('Thanks for signing up!', 'Please check your email and verify your account', 'info');
        return redirect()->back();
    }

}
