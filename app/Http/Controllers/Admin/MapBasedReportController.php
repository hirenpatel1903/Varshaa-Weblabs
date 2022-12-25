<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MapBasedReportController extends Controller
{
    public function index()
    {
        return view('admin.map-based-report.index');
    }
}
