@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
@section('title', 'Dada Bhaai | Contact Us')
<!-- page banner area start -->
<section class="page-banner-area" data-background="{{ asset('frontend/template_one/assets/img/bg/page-banner.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <div class="mt-5 text-center banner-text pb-90">
                    <h2 class="f-800 cod__black-color">Contact Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Contact Us
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- page banner area end -->
<!-- contact area start -->
<section class="contact-area pb-60">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7">
                <div class="">
                    <h4 class="mb-3 title">Get In Touch!</h4>
                    <form action="{{ route('template_one.contact.store') }}" method="POST">
                        @csrf
                        @if (session('status'))
                            <div class="text-success" role="alert">
                                {{ session('status') }}

                            </div>
                        @elseif (session('error'))
                            <div class="text-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="mb-4 col-6">
                                <input type="text" name="name"
                                    class="form-control form-control-sm contact-form @error('name') is-invalid @enderror"
                                    placeholder="Enter Name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4 col-6">
                                <input type="email" name="email"
                                    class="form-control form-control-sm contact-form @error('email') is-invalid @enderror"
                                    placeholder="Email Address">
                                @error('email')
                                    <div class="text-danger" style="padding-top: -10px;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4 col-12">
                                <input type="text" name="subject"
                                    class="form-control form-control-sm contact-form @error('subject') is-invalid @enderror"
                                    placeholder="Name Of Subject">

                                @error('subject')
                                    <div class="text-danger" style="padding-top: -10px;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4 col-12">
                                <textarea name="message" class="form-control form-control-sm contact-form @error('message') is-invalid @enderror"
                                    placeholder="Desciption" cols="3" rows="3"></textarea>
                                @error('message')
                                    <div class="text-danger" style="padding-top: -10px;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="px-3 cart-button">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-xl-4 offset-xl-1 col-lg-5">
                <div class="contact-text">
                    <div class="single-text mb-30">
                        <i class="icofont-telephone"></i>

                        <h5>Contact customer service</h5>

                        <p>Need assistance? Our customer service team is here to help you. For any support, you can contact us at for prompt assistance.</p>

                        <h5>{{ $sites->phone_two }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact area end -->
@endsection
