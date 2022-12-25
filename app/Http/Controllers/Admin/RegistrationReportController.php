<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;

class RegistrationReportController extends Controller
{
    public function index()
    {
        return view('admin.registration-report.index');
    }

    public static function getRegistrationReportList(Request $request){

        $query = User::select('*')->where('role_id',2)->get()
        ->groupBy('hear_about_us')
        ->map(function($users, $type) {
            return [
                'source' => $type,
                'no_of_registration' => $users->count()
            ];
        })
        ->values();
        $query = $query->sortByDesc('no_of_registration');
        return Datatables::of($query)->make(true);
    }
}
