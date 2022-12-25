@extends('layouts.master')
@section('title',"Registration report")
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
                <span class="active">Registration report</span>
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
                            <span class="caption-subject bold uppercase">Registration reports</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-responsive" id="recordlist">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Source</th>
                                    <th># of Registration</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY-->
    @include('confirmalert')
</div>
@endsection

@section('script')
<script src="{{url('assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{url('assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
<script src="{{url('assets/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
    var dataTable = $('#recordlist').DataTable({
        lengthMenu: getPageLengthDatatable(),
        processing: true,
        serverSide: true,
        order: [],
        searchDelay: 500,
        ajax: {
            url: '{{ route("getregistrationreport")}}',
            type: 'post',
        },
        columns: [
            {data: 'created_at',
                render: function (data, type, row, meta) {
                    var dateWithTimezone = moment.utc(data).tz(tz);
                    console.log(dateWithTimezone);
                    return dateWithTimezone.format('<?php echo config('const.JSdisplayDateTimeFormatWithAMPM');?>');
                }
            },
            {data: 'source', name: 'source', defaultContent: '-'},
            {data: 'no_of_registration', name: 'no_of_registration', defaultContent: '-'},
        ]
    });

    window.history.replaceState({}, document.title,baseUrl+"/admin/registrationreport");

});
</script>
@endsection

