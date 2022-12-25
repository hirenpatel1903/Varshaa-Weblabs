<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use App\Models\Technology;
use App\Helpers\Helper;
use Illuminate\Support\Facades\URL;
use Validator;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.technology.index');
    }

    public static function getTechnologyList(Request $request){

        $query = Technology::select('*');

        if($request->order ==null){
            $query->orderBy('id','desc');
        }

        return Datatables::of($query)
        ->addColumn('action', function ($data) {
            $editLink = URL::to('/').'/admin/technology/'.$data->id.'/edit';
            $viewLink = '';

            return Helper::Action($editLink,$data->id,$viewLink,$data->status);
        })

        ->rawColumns(['action'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.technology.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);

            if($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }

            $recordId = Technology::create([
                'name' => $request->name,
            ]);
            session()->flash('success',trans('messages.added'));
            return redirect()->route('technology');
       }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('technology.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $data = Technology::find($id);
            return view('admin.technology.edit',compact('data'));
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('technology');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);

            if($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }


            Technology::technologyUpdate($id,$request);

            session()->flash('success',  trans('messages.updated'));
            return redirect()->route('technology');
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $data = Technology::where('id',$id)->delete();
            return Response::json($data);
        }catch(\Exception $e){
            Log::error('TechnologyController->destroy' . $e->getCode());
        }
    }
}
