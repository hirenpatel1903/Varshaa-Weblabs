<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
class Helper {

    public static function res($data, $msg, $code) {
        $response = [
            'status' => $code == 200 ? true : false,
            'code' => $code,
            'msg' => $msg,
            'version' => '1.0.0',
            'data' => $data
        ];
        return response()->json($response, $code);
    }

    public static function success($data = [], $msg = 'Success', $code = 200) {
        return Helper::res($data, $msg, $code);
    }

    public static function fail($data = [], $msg = "Some thing wen't wrong!", $code = 203) {
        return Helper::res($data, $msg, $code);
    }

    public static function error_parse($msg) {
        foreach ($msg->toArray() as $key => $value) {
            foreach ($value as $ekey => $evalue) {
                return $evalue;
            }
        }
    }

    public static function Status($data) {
        if ($data->status == '1') {
            return '<button type="button" class="btn green btn-xs pointerhide cursornone">Active</button>';
        }else if($data->status == '2'){
            return '<button type="button" class="btn yellow-mint btn-xs pointerhide cursornone">Pending</button>';
        }
        else {
            return '<button type="button" class="btn red btn-xs pointerhide cursornone">InActive</button>';
        }
    }

    public static function Action($editLink = '', $deleteID = '', $viewLink = '') {
        if ($editLink)
            $edit = '<a href="' . $editLink . '" class="btn btn-xs green"> <i class="fa fa-edit"></i></a>';
        else
            $edit = '';

        if ($deleteID)
            $delete = '<a onclick="deleteValueSet(' . $deleteID . ')"  class="btn btn-xs red deleterecord"  data-toggle="modal" data-target="#exampleModal" >  <i class="fa fa-trash"></i></a>';
        else
            $delete = '';

        if ($viewLink)
            $view = '<a href="' . $viewLink . '" class="btn btn-xs blue"><i class="fa fa-eye"></i></a>';
        else
            $view = '';


        return $view . '' . $edit . '' . $delete;
    }

    public static function getRoleArray(){
        return array(
            "1" => "Admin",
            "2" => "Client",
        );
    }

    /* For Store Path Start */
    public static function profileFileUploadPath(){
        return storage_path('app/public/profilepic/');
    }
     /* For Store Path End */

     /* For Display Image */
    public static function displayProfilePath(){
        return URL::to('/').'/storage/profilepic/';
    }
}
