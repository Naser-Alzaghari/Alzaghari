@extends('user.layouts.master')

@section('content')
<div id="content" class="main-content-wrapper">
    <div class="page-content-inner">
        <div class="container">
            <div class="row pt--150 pt-md--60 pt-sm--40 pb--80 pb-md--60 pb-sm--40">
                <div class="col-12">
                    <div class="user-dashboard-tab flex-column flex-md-row">
                        <div class="user-dashboard-tab__head nav flex-md-column" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link active" data-toggle="pill" role="tab" href="{{ route('my_account') }}"
                                aria-controls="dashboard" aria-selected="true">Account Details</a>
                            <a class="nav-link" data-toggle="pill" role="tab" href="{{ route('view_orders') }}"
                                aria-controls="orders" aria-selected="true">Orders</a>
                            <form method="POST" action="{{ route('logout') }}" id="logout_form">
                                @csrf
                                <a class="nav-link" href="javascript:{}" onclick="document.getElementById('logout_form').submit();">Logout</a>
                                {{-- <button class="nav-link" type="submit">
                                    Logout
                                </button> --}}
                            </form>
                        </div>
                        <div class="user-dashboard-tab__content tab-content">
                            <div class="tab-pane fade show active" id="accountdetails">
                                <form action="{{ route('profile.update') }}" method="POST" class="form form--account">
                                    @csrf
                                    @method('PUT')
                                    <!-- Display success message -->
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                
                                    <!-- Display validation errors -->
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                
                                    <div class="row grid-space-30 mb--20">
                                        <div class="col-md-6 mb-sm--20">
                                            <div class="form__group">
                                                <label class="form__label" for="name">First name <span class="required">*</span></label>
                                                <input type="text" name="name" id="name" class="form__input" value="{{ old('name', auth()->user()->name) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-sm--20">
                                            <div class="form__group">
                                                <label class="form__label" for="phone_number">phone number <span class="required">*</span></label>
                                                <input type="text" name="phone_number" id="phone_number" class="form__input" value="{{ old('phone_number', auth()->user()->phone_number) }}">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row mb--20">
                                        <div class="col-12">
                                            <div class="form__group">
                                                <label class="form__label" for="address">Address <span class="required">*</span></label>
                                                <input type="text" name="address" id="address" class="form__input" value="{{ old('address', auth()->user()->address) }}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb--20">
                                        <div class="col-12">
                                            <div class="form__group">
                                                <label class="form__label" for="email">Email Address <span class="required">*</span></label>
                                                <input type="email" name="email" id="email" class="form__input" value="{{ old('email', auth()->user()->email) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <fieldset class="form__fieldset mb--20">
                                        <legend class="form__legend">Password change</legend>
                                        <div class="row mb--20">
                                            <div class="col-12">
                                                <div class="form__group">
                                                    <label class="form__label" for="cur_pass">Current password (leave blank to leave unchanged)</label>
                                                    <input type="password" name="cur_pass" id="cur_pass" class="form__input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb--20">
                                            <div class="col-12">
                                                <div class="form__group">
                                                    <label class="form__label" for="new_pass">New password (leave blank to leave unchanged)</label>
                                                    <input type="password" name="new_pass" id="new_pass" class="form__input">
                                                    <span id="password-strength-message"></span> <!-- Strength message container -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form__group">
                                                    <label class="form__label" for="conf_new_pass">Confirm new password</label>
                                                    <input type="password" name="conf_new_pass" id="conf_new_pass" class="form__input">
                                                    <span id="password-match-message"></span> <!-- Match message container -->
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form__group">
                                                <input type="submit" value="Save Changes" class="btn btn-style-1 btn-submit">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    function checkPasswordStrength(password) {
        var strength = 0;
        if (password.length >= 8) strength += 1;
        if (password.match(/[a-z]+/)) strength += 1;
        if (password.match(/[A-Z]+/)) strength += 1;
        if (password.match(/[0-9]+/)) strength += 1;
        if (password.match(/[\W]+/)) strength += 1;
        return strength;
    }

    function updateStrengthMessage(password) {
        var messages = {
            length: "At least 8 characters",
            lowercase: "At least one lowercase letter",
            uppercase: "At least one uppercase letter",
            number: "At least one number",
            special: "At least one special character"
        };

        var status = {
            length: password.length >= 8,
            lowercase: /[a-z]+/.test(password),
            uppercase: /[A-Z]+/.test(password),
            number: /[0-9]+/.test(password),
            special: /[\W]+/.test(password)
        };

        $('#password-strength-message').html(
            '<ul>' +
            '<li style="color:' + (status.length ? 'green' : 'red') + '">' + messages.length + '</li>' +
            '<li style="color:' + (status.lowercase ? 'green' : 'red') + '">' + messages.lowercase + '</li>' +
            '<li style="color:' + (status.uppercase ? 'green' : 'red') + '">' + messages.uppercase + '</li>' +
            '<li style="color:' + (status.number ? 'green' : 'red') + '">' + messages.number + '</li>' +
            '<li style="color:' + (status.special ? 'green' : 'red') + '">' + messages.special + '</li>' +
            '</ul>'
        ).show();

        return Object.values(status).every(Boolean); // Return true if all conditions are met
    }

    $('#new_pass, #conf_new_pass').on('keyup', function () {
        var newPass = $('#new_pass').val();
        var confNewPass = $('#conf_new_pass').val();
        var strongPassword = updateStrengthMessage(newPass);

        if (!strongPassword) {
            $('.btn-submit').prop('disabled', true);
        } else {
            if (newPass === confNewPass) {
                $('#conf_new_pass').css('border-color', 'green');
                $('#password-match-message').text('Passwords match').css('color', 'green').show();
                $('.btn-submit').prop('disabled', false);
            } else {
                $('#conf_new_pass').css('border-color', 'red');
                $('#password-match-message').text('Passwords do not match').css('color', 'red').show();
                $('.btn-submit').prop('disabled', true);
            }
        }
    });

    $('#new_pass, #conf_new_pass').on('focus', function () {
        $('#password-strength-message, #password-match-message').show();
    });

    $('#new_pass, #conf_new_pass').on('blur', function () {
        $('#password-strength-message, #password-match-message').hide();
    });

    // Ensure the submit button is disabled on page load if the passwords do not match or are weak
    // $('.btn-submit').prop('disabled', true);
    $('#password-strength-message, #password-match-message').hide();
});
</script>

@endsection