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
                                    <h3 class="font-red-haze">
                                        <span data-counter="counterup" data-value="{{$data->total_active_users}}">{{$data->total_active_users}}</span>
                                    </h3>
                                    <small>TOTAL CLIENT</small>
                                </div>
                                <div class="icon">
                                    <i class="icon-users"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <a href="#">
                        <div class="dashboard-stat2 bordered">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-red-haze">
                                        <span data-counter="counterup" data-value="{{$data->total_active_technology}}">{{$data->total_active_technology}}</span>
                                    </h3>
                                    <small>TOTAL TECHNOLOGY</small>
                                </div>
                                <div class="icon">
                                    <i class="icon-puzzle"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
@endsection
