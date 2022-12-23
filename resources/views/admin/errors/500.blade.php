<?php
use Illuminate\Support\Facades\Auth;
?>
@section('title','500')
@extends('layouts.errormaster')

@section('content')

<center>
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-md-12 page-500">
            <div class=" number font-red"><h1> 500 </h1></div>
            <div class=" details">
                <h3>Oops! Something went wrong.</h3>
                <p> We are fixing it! Please come back in a while. <br/> </p>
                <p><a href="{{route('dashboard')}}" class="btn red btn-outline">Return Dashboard </a> <br> </p>
            </div>
        </div>
    </div>
    <!-- END PAGE BASE CONTENT -->
</center>

@endsection

