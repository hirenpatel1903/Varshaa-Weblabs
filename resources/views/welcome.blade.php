@extends('template.layout')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"/>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <form>
                    <div class="form-group row">
                        <label for="project_name" class="col-sm-2">Project Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="project_name" placeholder="Enter project name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 form-control-label">Source Language</label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" id="select-source" data-live-search="true">
                                @foreach($languages as $language){
                                    <option data-tokens="china">{{$language['source_language']['language']}}</option>
                                }
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 form-control-label">Target Language</label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" multiple id="select-target" data-live-search="true">
                                <option>Mustard</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script>
    $(function() {
        $('.selectpicker').selectpicker();
    });
</script>
@stop
