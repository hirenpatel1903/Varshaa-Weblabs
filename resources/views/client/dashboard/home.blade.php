@extends('layouts.master')
@section('title', 'Dashboard')
@section('css')
    <style>
        a:hover{
            text-decoration: none!important;
        }
    </style>
@endsection
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->

            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <span class="active">Dashboard</span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->

            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <a href="#">
                        <div class="dashboard-stat2 bordered">
                            <div class="display">
                                <div class="number">
                                    <small>Welcome {{ $clientDetails->full_name }}</small>
                                </div>
                            </div>
                            <span>Can edit your profile? <a href="{{ route('myprofile') }}">click here..</a></span>
                        </div>
                    </a>
                </div>
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
@endsection
