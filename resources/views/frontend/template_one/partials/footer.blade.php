@php
    $site = App\Models\Sites::find(1);
@endphp
<style>
    .fb-wrap {
        max-width: 100%;
        overflow: hidden;
    }

    .fb-page {
        width: 100% !important;
    }

    @media only screen and (max-width: 600px) {
        .footer--area {
            text-align: center;
        }

        .footer-newsletter {
            display: flex;
            justify-content: center;
        }

        .footer-newsletter .input-group {
            width: 100% !important;
        }
    }
</style>
<footer class="footer--area">
    <div class="footer--top pb-25">
        <div class="footer-topbar">
            <p class="p-3 mb-0 text-center text-white">Discover a wide range of products at
                {{ optional($site)->site_name }}, your
                one-stop
                e-commerce destination. Enjoy seamless shopping, great deals, and excellent customer service.</p>
        </div>
        <div class="contaner-fluid footer-bg">
            <div class="container">
                <div class="pt-lg-5 pt-2 row gx-0">

                    <div class="col-12 col-xl-4 col-lg-6 col-md-8 mb-30 order-md-3 order-lg-2">
                        <div>
                            <a class="logo__link" href="{{ route('index') }}"><img class="" width="250px"
                                    src="{{ asset('upload/logo_black/' . optional($site)->logo_black) }}"
                                    alt=""></a>
                            <p class="pt-3">{{ optional($site)->site_slogan }}</p>
                            <p class="mb-0">Subscribe to get
                                updates!
                            </p>

                            @if (session('success'))
                                <div class="text-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="text-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="footer-newsletter">

                                <form action="{{ route('submit.email') }}" method="POST">
                                    @csrf
                                    <div class="mb-3 input-group w-75">
                                        <input type="text" class="form-control" name="email"
                                            placeholder="Enter Email Address" required>

                                        <div class="input-group-append">
                                            <button class="px-3 btn btn-outline-secondary" style="background: #ed2129;"
                                                type="submit" id="button-addon2">
                                                <i class="fa-regular fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>


                            </div>

                        </div>
                    </div>

                    <div class="col-12 col-xl-2 col-lg-6 col-md-8 mb-30 order-md-3 order-lg-2">
                        <div class="footer-widget">
                            <div class="footer-title">
                                <h6 class="f-800">Inquery</h6>
                            </div>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="{{ route('template.one.about') }}">About Us</a></li>
                                    <li><a href="{{ route('template_one.contact') }}">Contact Us</a></li>
                                    <li><a href="{{ route('template.one.term') }}">Terms & Condition</a></li>

                                    @if (Auth::user())
                                        <li><a href="{{ route('template.one.dashboard') }}">DashBoard</a></li>
                                    @else
                                        <li><a href="{{ route('template.one.login') }}">Login</a></li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-xl-2 col-lg-6 col-md-8 mb-30 order-md-3 order-lg-2">
                        <div class="footer-widget">
                            <div class="footer-title">
                                <h6 class="f-800">Social Platform</h6>
                            </div>
                            <div class="footer-menu h1foote-menu2">
                                <ul>
                                    {{-- <li><a href="{{ $site->facebook_url }}">Facebook</a></li> --}}
                                    <li><a href="{{ $site->skype_url }}">Skype</a></li>
                                    <li><a href="{{ $site->youtube_url }}">Youtube</a></li>
                                    <li><a href="{{ $site->linkedin_url }}">Linkdin</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-xl-4 col-lg-6 col-md-8 mb-30 order-md-3 order-lg-2">
                        <div class="footer-widget">
                            <div class="footer-title">
                                <h6 class="f-800">Join Us</h6>
                            </div>
                            <div>
                                <div id="fb-root"></div>
                                <script async defer crossorigin="anonymous"
                                    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v19.0&appId=1071946983902795" nonce="2wAZemwC">
                                </script>
                                <div class="fb-wrap">
                                    <div class="fb-page" data-href="{{ $site->facebook_url }}" data-tabs="timeline"
                                        data-width="500" data-height="135" data-small-header="false"
                                        data-adapt-container-width="true" data-hide-cover="false"
                                        data-show-facepile="true"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="pt-20 pb-20 footer-bottom gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center footer-copyright">
                        <a class="m-0 text-center text-muted" href="{{ route('index') }}">
                            Copyright 2025
                            <span class="grenadier-color">{{ $site->site_name }}</span> All Rights
                            Reserved.
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
