@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <form class="login-form" action="{{ route('clientRegister') }}" method="post" id="register_form">
        @csrf
        <h3 class="form-title font-green">Sign In</h3>
        @include('errormessage')
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">First Name</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" id="first_name" autocomplete="off" placeholder="First Name" name="first_name" />
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Last Name</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" id="last_name" autocomplete="off" placeholder="Last Name" name="last_name" />
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" id="email" autocomplete="off" placeholder="Email" name="email" />
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" id="password" autocomplete="off" placeholder="Password" name="password" />
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Re-type Password</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" id="re_password" autocomplete="off" placeholder="Re-type Password" name="re_password" />
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Phone</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" id="phone" autocomplete="off" placeholder="Phone" name="phone" />
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">How did you hear about us?</label>
            <select class="form-control" id="hear_about_us" name="hear_about_us">
                <option value="" selected>Select How did you hear about us.?</option>
                @foreach($aboutUsArrayList as $key=>$status)
                    <option value="{{$key}}">{{$status}}</option>
                @endforeach
            </select>
        </div><hr>
        <div class="form-action">
            <button type="submit" class="btn green uppercase submitbutton">Register</button>
        </div>
        <p>Have already an account? <a href="{{ route('login') }}">Sign In here</a> </p>
    </form>
@section('script')
    <script>
        $(document).ready(function() {

            // Custom-JQuery Validation
            $.validator.addMethod('Email', function(value) {
                return /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(value);
            }, 'Please enter a valid email.');

            jQuery.validator.addMethod("lettersonly2", function(value, element) {
                return this.optional(element) || /^\S+[a-z]+$/i.test(value);
            }, "Please enter valid full name.");
            jQuery.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-z," "]+$/i.test(value);
            }, "");

            jQuery.validator.addMethod("validphone", function(value, element) {
                return this.optional(element) || /^(?=.*[0-9])[- +()0-9]+$/.test(value);
            }, "Please enter valid phone number.");

            // Custom-Javascript Validation
            $('#register_form').validate({
                rules: {
                    first_name: {
                        required: true,
                        lettersonly2: true,
                        lettersonly: true,
                    },
                    last_name: {
                        required: true,
                        lettersonly2: true,
                        lettersonly: true,
                    },
                    email: {
                        required: true,
                        maxlength: 50,
                        email: true,
                        remote: {
                            url: baseUrl + "/checkEmail/",
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                emailId: function() { return $('input[name=email]').val(); }
                            },
                        }
                    },
                    password: {
                        required: true,
                        minlength: 5,
                        maxlength: 20,
                    },
                    re_password: {
                        required: true,
                        minlength: 5,
                        maxlength: 20,
                        equalTo: "#password"
                    },
                    phone: {
                        required: true,
                        validphone: true,
                        maxlength: 20,
                    },
                    hear_about_us: {
                        required: true,
                    }
                },
                messages: {
                    first_name: {
                        required: "Please enter first name.",
                        lettersonly2: "Please enter valid first name.",
                        lettersonly: "Please enter valid first name."
                    },
                    last_name: {
                        required: "Please enter last name.",
                        lettersonly2: "Please enter valid last name.",
                        lettersonly: "Please enter valid last name."
                    },
                    email: {
                        remote: "Email already exist.",
                    },
                    password: {
                        required: "Please enter password.",
                    },
                    phone: {
                        required: "Please enter phone number.",
                        maxlength: "Please enter valid phone number."
                    },
                    hear_about_us: {
                        required: "Please select hear about us.",
                    }
                },
                submitHandler: function(form) {
                    if ($("form").validate().checkForm()) {
                        $(".submitbutton").attr("type", "button");
                        $(".submitbutton").addClass("disabled");
                        form.submit();
                    }
                }
            });

        });
    </script>
@endsection
@endsection
