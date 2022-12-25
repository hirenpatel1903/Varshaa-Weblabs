<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;

class TechnologyReportController extends Controller
{
    public function index()
    {
        return view('admin.technology-reports.index');
    }

    public static function getTechnologyReportsList(Request $request){

        $query = User::select('*')->where('role_id', 2)->with('technology')->get()
        ->map(function ($users, $type) {
            return [
                'technology_name' => $users->technology->name,
                'of_client' => rand($users->technology->count(),12)
            ];
        })
        ->values();
        $query = $query->unique(function ($item) {
            return $item['technology_name'] . $item['technology_name'];
        });
        return Datatables::of($query)->make(true);
    }
}
