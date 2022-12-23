@extends('layouts.master')
@section('title', 'Clear Cache')
@section('css')
    <style>
        .clearcache{
            font-size: 80px;
            padding-top: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="{{route('dashboard')}}">Dashboard</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">Clear Cache</span>
                </li>
            </ul>
            @include('errormessage')
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject font-red-sunglo bold uppercase">Clear Cache</span>
                            </div>
                        </div>

                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="form-group row">
                                    <div class="text-center">
                                        <i class="fa fa-battery-full text-success clearcache"></i>
                                        <h4 class="text-center">WOW! Cache Cleared!!</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
@endsection
