@extends('layouts.app')
@section('title','Verification')
@section('content')
<form class="login-form" action="{{ url('login') }}" method="post" id="login_form">
    @csrf

    @include('errormessage')

</form>
@section('script')
<script>

</script>
@endsection
@endsection
