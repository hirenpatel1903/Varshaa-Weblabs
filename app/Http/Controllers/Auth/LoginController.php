<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view('auth.login');
    }

    public function verification(){
        return view('auth.verification');
    }

     public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }

        $remember_me = $request->has('remember') ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => request('password')],$remember_me)) {
            $user = Auth::user();
            if ($user->status == config('const.statusInActive')){
                \Auth::logout();
                session()->flash('error',trans('messages.accountInactive'));
                return redirect()->route('login');
            }

            if(!empty($user)){
                 return redirect()->route('dashboard');
            }else{
                \Auth::logout();
                session()->flash('error',trans('messages.notAuthorized'));
                return redirect()->route('login');
            }

        }else{
            session()->flash('error',trans('messages.invalidCredentials'));
            return redirect()->route('login');
        }
     }

    public function logout(){
        \Auth::logout();
        return redirect()->route('login');
    }
}
