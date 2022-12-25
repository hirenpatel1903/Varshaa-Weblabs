<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function clearCache()
    {
        \Artisan::call('cache:clear');
        return view('clear-cache');
    }

    public function notFound(Request $request){
        return view('admin.errors.404');
    }

    public function exceptions(Request $request){
        return view('admin.errors.500');
    }

    public function unauthorized(Request $request){
        return view('admin.errors.401');
    }
    public function checkEmail(Request $request)
    {
        $user = User::where('email',$request->emailId)->count();
        if($user >= 1) {
            return Response::json(false);
        } else {
            return Response::json(true);
        }
    }

    /* Set Time Zone in Sesstion For date display USE Start*/
    public function settimezone(Request $request){
        $data = $request->all();
        session()->put('customTimeZone',$data['timezone']);
    }
    /* Set Time Zone in Sesstion For date display USE End*/
}
