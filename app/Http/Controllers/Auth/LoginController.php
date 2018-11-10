<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Session;
use DateTime;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request) {
      $this->validate($request,['email' => 'required|email','password' => 'required']);

      if (Auth::guard()->attempt($this->getCredentials($request))){
        //authentication passed
        $rd = $this->redirectTo;
        if (\Session::has('redirect_url')) {
          $rd = \Session::get('redirect_url');
          \Session::forget('redirect_url');
        }
        $dt = new DateTime();
        $user = $request->user();
        $info = join("   ", [$user->id, $user->email, $request->ip(), $dt->format('Y-m-d H:i:s')]);
        \Log::info($info);
        return redirect($rd);
      }
      $errors = [
        "Your email and password are not verified or Your account is disabled by Administrator.",
      ];
      return redirect()->back()->withErrors($errors);
    }

    protected function getCredentials(Request $request)
    {
      $ret = [
        'email' => $request->input('email'),
        'password' => $request->input('password'),
        'Enabled' => 0,
      ];
      return $ret;
    }

    protected function redirectTo()
    {
        $rd = $this->redirectTo;
        if (\Session::has('redirect_url')) {
            $rd = \Session::get('redirect_url');
            \Session::forget('redirect_url');
        }
        return $rd;
    }
}
