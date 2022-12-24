<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

    public function index(Request $request){
        $aboutUsArrayList = Helper::getHearAboutUsArray();
        return view('auth.register',compact('aboutUsArrayList'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'email' => 'required|email',
            'password' => 'required',
            're_password' => ['same:password'],
            'phone' => 'required',
            'hear_about_us' => 'required'
        ]);

        if($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }

        $createClient = User::createClient($request);
        if (isset($createClient)) {
            session()->flash('success',trans('messages.clientRegister'));
            return redirect()->route('login');
        }else{
            session()->flash('error',trans('messages.somethingWrong'));
            return redirect()->route('client-register');
        }
     }
}
