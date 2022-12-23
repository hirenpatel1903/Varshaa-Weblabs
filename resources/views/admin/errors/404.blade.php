<?php
use Illuminate\Support\Facades\Auth;
?>
@section('title','404')
@extends('layouts.errormaster')
@section('content')
<center>
    <div class="row">
        <div class="col-md-12 page-404">
            <div class="number font-green"><h1> 404 </h1></div>
            <div class="details">
                <h1>Oops! You're lost.</h1>
                <p> We can not find the page you're looking for.
            </div>
            <a href="{{route('dashboard')}}" class="btn red btn-outline">Return Dashboard </a>
        </div>
    </div>
</center>

@endsection

