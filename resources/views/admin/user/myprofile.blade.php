<?php use Request as Input; ?>
@section('title', 'My Profile')
@extends('layouts.master')

@section('css')
    <link href="{{ url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">My Profile</span>
                </li>
            </ul>
            @include('errormessage')
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject font-red-sunglo bold uppercase">My Profile</span>
                            </div>
                        </div>

                        <div class="portlet-body form">
                            {{ Form::model($data, ['route' => ['updatemyprofile'], 'method' => 'post', 'id' => 'createform', 'name' => 'createform', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) }}
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">First Name:<span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-4">
                                        {!! Form::text('first_name', Input::old('first_name'), ['class' => 'form-control', 'id' => 'first_name', 'name' => 'first_name', 'placeholder' => 'First Name']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Last Name:<span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-4">
                                        {!! Form::text('last_name', Input::old('last_name'), ['class' => 'form-control', 'id' => 'last_name', 'name' => 'last_name', 'placeholder' => 'Last Name']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Profile :</label>
                                    <div class="col-md-9">
                                        @if ($data->profile_pic)
                                            <img alt="" style="width: 102px;height: 104px;" class="img-circle" src="{{ $data->profile_pic }}">
                                            <br><br>
                                        @endif
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <span class="btn green btn-file">
                                                @if ($data->profile_pic)
                                                    <span class="fileinput-new"> Change Profile Image </span>
                                                @else
                                                    <span class="fileinput-new"> Select Profile Image </span>
                                                @endif
                                                <span class="fileinput-exists"> Change </span>
                                                <input type="hidden" value="" name="profile_pic"><input type="file" name="profile_pic">
                                            </span>
                                            <span class="fileinput-filename"></span> &nbsp;
                                            <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                        </div>

                                    </div>
                                </div>
                                @if(Auth::user()->role_id==config('const.roleClient'))
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Phone:<span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-4">
                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="{{ $data->phone }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Technology Interested:<span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-4">
                                        <input type="text" name="interested_tech" id="interested_tech" class="form-control" placeholder="Technology Interested">
                                    </div>
                                </div>
                                @endif


                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green submitbutton">Update</button>
                                            <a href="{{ route('dashboard') }}"><button type="button" class="btn default cancel">Cancel</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>

@endsection

@section('script')
    <script type="text/javascript" src="{{ url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>
    <script type="text/javascript">
        $("#createform").validate({
            ignore: [],
            rules: {
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                }
            },
            submitHandler: function(form) {
                if ($("form").validate().checkForm()) {
                    $(".submitbutton").attr("type", "button");
                    $(".submitbutton").addClass("disabled");
                    form.submit();
                }
            },
        });
    </script>
@endsection
