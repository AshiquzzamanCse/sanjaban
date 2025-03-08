@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
@section('title')
    DadaBhaai | Forgot Password
@endsection
<!-- page banner area start -->
<section class="page-banner-area" data-background="{{ asset('frontend/template_one/assets/img/bg/banner.jpeg') }}"
    style="margin-top: 4.7rem;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <div class="banner-text text-center pt-90 pb-90">
                    <h2 class="f-800 cod__black-color">Forgot Password</h2>

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
</section>
<!-- page banner area end -->

<!-- reg area start -->
<section class="reg-area pt-60 pb-75">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="reg-wrapper">
                    <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item mr-40">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Forgot Password</a>
                        </li>
                    </ul>


                    {{-- Login  --}}

                    <x-auth-session-status class="mb-4 text-danger" :status="session('status')" />

                    <form method="POST" action="{{ route('password.email') }}">

                        @csrf

                        <div class="">
                            <label>Email Address</label>

                            @error('email')
                                <div class="text-danger" style="margin-top: 0px;">{{ $message }}</div>
                            @enderror

                            <input type="email" placeholder="Email Address" value="{{ old('email') }}" required
                                name="email" class="form-control" id="email">
                        </div>

                        <button type="submit">Password Reset</button>

                    </form>

                    {{-- Login  --}}


                </div>
            </div>
        </div>
    </div>
</section>
<!-- reg area end -->
@endsection


{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
