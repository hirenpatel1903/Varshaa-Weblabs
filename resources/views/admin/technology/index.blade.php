@extends('layouts.master')
@section('title',"Technology")
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
                <span class="active">Technology</span>
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
                            <span class="caption-subject bold uppercase">Technologys</span>
                        </div>
                        <div class="btn-group pull-right">
                            <a href="{{route('technology.create')}}"><button id="add_products" class="btn sbold green"> Add New
                                <i class="fa fa-plus"></i>
                            </button></a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-responsive" id="recordlist">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
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
            url: '{{ route("gettechnology")}}',
            type: 'post',
        },
        columns: [
            {data: 'name', name: 'name'},
            {data: 'created_at',
                render: function (data, type, row, meta) {
                     var dateWithTimezone = moment.utc(data).tz(tz);
                     console.log(dateWithTimezone);
                     return dateWithTimezone.format('<?php echo config('const.JSdisplayDateTimeFormatWithAMPM');?>');
                 }
             },
            {data: 'action', name: 'action', searchable: false, sortable: false},
        ]
    });


    window.history.replaceState({}, document.title,baseUrl+"/admin/technology");

    $("#delete-record").on("click", function () {
        var id = $("#id").val();
        $('#exampleModal').modal('hide');
        $.ajax({
            url: baseUrl + '/admin/technology/' + id,
            type: "DELETE",
            dataType: 'json',
            success: function (data) {
                if (data == 'Error') {
                    toastr.error("Oops, There is some thing went wrong.Please try after some time.");
                } else {
                    toastr.success('Record Deleted Successfully.');
                    dataTable.draw();
                }
            },
            error: function (data) {
                toastr.error("Invalid Request");
            }
        });
    });

});
</script>
@endsection

