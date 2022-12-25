@extends('layouts.master')
@section('title',"Map Based Report")
@section('css')
<link href="{{url('assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
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
                <span class="active">Map Based Report</span>
            </li>
        </ul>

        <!-- BEGIN PAGE BASE CONTENT -->
        @include('errormessage')
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <span class="caption-subject bold uppercase">Map Based Reports</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <p>1. Show single map with all customer plotted as marker</p>
                        <p>2. On marker click, display infowindow with complete customer details</p>
                        <span><b>Map Use <a href="http://leafletjs.com/"><u><em>leafletjs.com</em></u></a> for navigation ----- This site can’t be reached.</b></span>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY-->
</div>
@endsection

@section('script')
@endsection

