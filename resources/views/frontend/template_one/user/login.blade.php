@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
@section('title', 'Dada Bhaai | Login')

<style>
    .password-strength-sidebar {
        position: fixed;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        padding: 15px;
        background-color: rgba(0, 0, 0, 0.05);
        border: 1px solid #ccc;
        width: 250px;
        border-radius: 8px;
    }

    .password-strength-meter {
        height: 8px;
        margin-top: 10px;
        width: 100%;
        border-radius: 4px;
    }

    .password-strength-text {
        margin-top: 10px;
        font-size: 14px;
        font-weight: bold;
    }

    #password-criteria-list {
        margin-top: 15px;
        list-style-type: none;
        padding-left: 0;
    }

    .criteria {
        display: flex;
        align-items: center;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .criteria i {
        margin-right: 8px;
    }

    .criteria span {
        font-size: 14px;
    }

    .criteria.valid {
        color: green;
    }

    .criteria.invalid {
        color: red;
    }

    .criteria i.valid {
        color: green;
    }

    .criteria i.invalid {
        color: red;
    }
</style>
<!-- page banner area start -->
{{-- <section class="page-banner-area" data-background="{{ asset('frontend/template_one/assets/img/bg/banner.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <div class="text-center banner-text pt-90 pb-90">
                    <h2 class="f-800 cod__black-color">Sign Up</h2>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- page banner area end -->

<!-- reg area start -->
<section class="reg-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="text-center col-sm-12">
                <div class="reg-wrapper">
                    <ul class="nav" id="myTab" role="tablist">

                        <li class="mr-40 nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Sign In</a>
                        </li>
                        <li class="ml-40 nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Registration</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">

                        {{-- Login  --}}
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">

                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <form method="POST" action="{{ route('user.login') }}">
                                @csrf
                                <div class="field">
                                    <label>Email Address</label>
                                    @error('email')
                                        <div class="text-danger" style="margin-top: 0px;">{{ $message }}</div>
                                    @enderror
                                    <input type="email" class="form-control form-control-sm "
                                        placeholder="Email Address" value="{{ old('email') }}" required name="email">
                                </div>

                                <div class="field">
                                    <label>Password</label>
                                    <div class="input-group">
                                        <input id="password" type="password" class="form-control form-control-sm"
                                            name="password" placeholder="Password" required>
                                    </div>
                                    @error('password')
                                        <div class="text-danger" style="margin-top: 0px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input check" type="checkbox" name="remember"
                                            id="remember_me">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Remember Me
                                        </label>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="lost-pass">Forgot Password?</a>
                                </div>
                                <button type="submit" class="mt-4 w-100">Sign In</button>
                            </form>

                        </div>
                        {{-- Login  --}}


                        {{-- Register --}}
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="field">
                                    <label for="name">Name</label>
                                    <input type="text"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        id="name" placeholder="Full Name" value="{{ old('name') }}"
                                        name="name" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label for="email">Email Address</label>
                                    <input type="email"
                                        class="form-control form-control-sm @error('email') is-invalid @enderror"
                                        id="email" placeholder="Email Address" value="{{ old('email') }}"
                                        name="email" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="field">
                                            <label for="password">Password</label>
                                            <input type="password"
                                                class="form-control form-control-sm @error('password') is-invalid @enderror"
                                                name="password" id="password" placeholder="Password" required>
                                            <span id="passwordValidation"></span>
                                            <!-- Span to show password validation result -->
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="field">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password"
                                                class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror"
                                                name="password_confirmation" id="password_confirmation"
                                                placeholder="Confirm Password" required>
                                            <span id="passwordConfirmationValidation"></span>
                                            <!-- Span to show password confirmation validation result -->
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                                <div class="col-lg-12">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                        <label class="pt-0 form-check-label" for="exampleCheck1">I agree on DadaBhaai
                                            Term & Condition.</label>
                                    </div>
                                </div>

                                <button type="submit" class="w-100" id="submitBtn">Register Here</button>
                            </form>

                        </div>
                        {{-- Register --}}


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- reg area end -->



<script>
    function validateForm() {
        var checkbox = document.getElementById('exampleCheck1');
        if (!checkbox.checked) {
            alert("Please agree to the terms and conditions.");
            return false;
        }
        return true;
    }
</script>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordField = document.getElementById('password');
        const lengthCriteria = document.getElementById('length-criteria');
        const letterCriteria = document.getElementById('letter-criteria');
        const numberCriteria = document.getElementById('number-criteria');
        const specialCriteria = document.getElementById('special-criteria');
        const passwordStrengthMeter = document.getElementById('password-strength-meter');
        const passwordStrengthText = document.getElementById('password-strength-text');

        // Regular expressions for password validation
        const strengthCriteria = {
            length: /^(?=.{8,})/, // At least 8 characters
            letter: /[a-zA-Z]/, // At least one letter
            number: /[0-9]/, // At least one number
            special: /[!@#$%^&*(),.?":{}|<>]/ // At least one special character
        };

        // Function to check the password and update UI
        function checkPasswordStrength(password) {
            let strength = 0;

            // Check each criterion and update UI
            if (strengthCriteria.length.test(password)) {
                lengthCriteria.classList.add('valid');
                lengthCriteria.classList.remove('invalid');
                lengthCriteria.querySelector('i').classList.add('valid');
                lengthCriteria.querySelector('i').classList.remove('invalid');
            } else {
                lengthCriteria.classList.add('invalid');
                lengthCriteria.classList.remove('valid');
                lengthCriteria.querySelector('i').classList.add('invalid');
                lengthCriteria.querySelector('i').classList.remove('valid');
            }

            if (strengthCriteria.letter.test(password)) {
                letterCriteria.classList.add('valid');
                letterCriteria.classList.remove('invalid');
                letterCriteria.querySelector('i').classList.add('valid');
                letterCriteria.querySelector('i').classList.remove('invalid');
            } else {
                letterCriteria.classList.add('invalid');
                letterCriteria.classList.remove('valid');
                letterCriteria.querySelector('i').classList.add('invalid');
                letterCriteria.querySelector('i').classList.remove('valid');
            }

            if (strengthCriteria.number.test(password)) {
                numberCriteria.classList.add('valid');
                numberCriteria.classList.remove('invalid');
                numberCriteria.querySelector('i').classList.add('valid');
                numberCriteria.querySelector('i').classList.remove('invalid');
            } else {
                numberCriteria.classList.add('invalid');
                numberCriteria.classList.remove('valid');
                numberCriteria.querySelector('i').classList.add('invalid');
                numberCriteria.querySelector('i').classList.remove('valid');
            }

            if (strengthCriteria.special.test(password)) {
                specialCriteria.classList.add('valid');
                specialCriteria.classList.remove('invalid');
                specialCriteria.querySelector('i').classList.add('valid');
                specialCriteria.querySelector('i').classList.remove('invalid');
            } else {
                specialCriteria.classList.add('invalid');
                specialCriteria.classList.remove('valid');
                specialCriteria.querySelector('i').classList.add('invalid');
                specialCriteria.querySelector('i').classList.remove('valid');
            }

            // Calculate password strength based on matched criteria
            if (strengthCriteria.length.test(password)) strength++;
            if (strengthCriteria.letter.test(password)) strength++;
            if (strengthCriteria.number.test(password)) strength++;
            if (strengthCriteria.special.test(password)) strength++;

            // Update the strength meter based on how many criteria are met
            let strengthText = 'Very Weak';
            let strengthColor = 'red';
            if (strength === 4) {
                strengthText = 'Strong';
                strengthColor = 'green';
                passwordStrengthMeter.style.width = '100%';
            } else if (strength === 3) {
                strengthText = 'Medium';
                strengthColor = 'orange';
                passwordStrengthMeter.style.width = '75%';
            } else if (strength === 2) {
                strengthText = 'Weak';
                strengthColor = 'yellow';
                passwordStrengthMeter.style.width = '50%';
            } else {
                strengthText = 'Very Weak';
                strengthColor = 'red';
                passwordStrengthMeter.style.width = '25%';
            }

            passwordStrengthMeter.style.backgroundColor = strengthColor;
            passwordStrengthText.textContent = strengthText;
        }

        // Listen to the password field and check for changes
        passwordField.addEventListener('input', function() {
            const password = passwordField.value;
            checkPasswordStrength(password);
        });
    });
</script> --}}



@endsection
