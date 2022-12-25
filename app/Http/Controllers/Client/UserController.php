<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{

    /* Get My profile */
    public function getMyProfile(){
        try{
            $data = User::getUserDetails(Auth::user()->id);
            return view('client.user.myprofile',compact('data'));
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('myprofile');
        }
    }
    public function updateMyProfile(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'profile_pic' => 'nullable|image|mimes:jpeg,bmp,png,jpg|max:15000'
            ]);

            if($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }

            User::updateMyProfile($request);

            session()->flash('success',  trans('messages.updatemyProfile'));
            return redirect()->route('myprofile');
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return back()->withInput();
        }
    }

}
