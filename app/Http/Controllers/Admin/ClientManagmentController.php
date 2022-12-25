<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;
use App\Helpers\Helper;

class ClientManagmentController extends Controller
{
    public function index()
    {
        return view('admin.client-management.index');
    }

    public static function getClientManagmentList(Request $request){

        $query = User::select('*')->where('role_id',2);
        if($request->order ==null){
            $query->orderBy('id','desc');
        }

        return Datatables::of($query)
        ->addColumn('full_name', function ($data) {
           return $data->full_name;
        })
        ->addColumn('technology_id', function ($data) {
           return Helper::Technologies($data);
        })
        ->addColumn('status', function ($data) {
           return Helper::Status($data);
        })
        ->rawColumns(['full_name','technology_id','status'])
        ->make(true);
    }
}
