<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Technology;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $data = new \stdClass();
        $data->total_active_users = User::activeUserCount();
        $data->total_active_technology = Technology::activeTechnologyCount();
        return view('admin.dashboard.home',array('data'=>$data));
    }

}
