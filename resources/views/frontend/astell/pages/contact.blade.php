@extends('frontend.astell.frontend_dashboard_astell')
@section('index_astell')
    <section>
        <div class="contact-group">
            <div class="visual">
                <h2>Contact Us</h2>
                <p>Have some question? We are here to help!</p>
            </div>

            <div class="container">
                <div class="row cont" style="overflow: hidden; height:auto; width:100%;">
                    <div class="mb-4 text-center col-12">
                        <h2 class="fw-bold">Get in touch with us</h2>
                    </div>

                    @php
                        $site = App\Models\Sites::find(1);
                    @endphp

                    <div class="mb-2 col-lg-4">
                        <div class="p-2 bg-white d-flex align-items-center justify-content-center">
                            <div style="width: 35%">
                                <img style="width: 100px;"
                                    src="{{ asset('img/location-icons.png') }}"
                                    alt="i_contact1.png">
                            </div>
                            <div style="width: 65%;">
                                {{ optional($site)->address }}
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 col-lg-4">
                        <div class="p-2 bg-white d-flex align-items-center justify-content-center">
                            <div style="width: 35%">
                                <img style="width: 100px;"
                                    src="{{ asset('img/contact-email.png') }}"
                                    alt="i_contact3.png">
                            </div>
                            <div style="width: 65%;">
                                {{ optional($site)->contact_email }}
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 col-lg-4">
                        <div class="p-2 bg-white d-flex align-items-center justify-content-center">
                            <div style="width: 35%" class="contact-mobile-icons">
                                <img style="width: 62px;"
                                    src="{{ asset('img/contact-phone.png') }}"
                                    alt="i_contact3.png">
                                    {{-- <i class="fa-solid fa-phone"></i> --}}
                            </div>
                            <div style="width: 65%;">
                                {{ optional($site)->phone_one }}
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 col-12" style="padding-left:2rem; padding-right:2rem;">
                        <div class="bg-white row">
                            <form action="{{ route('template.two.contact.store') }}" method="POST">
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

                                <div class="px-4 py-5 row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Name</label>
                                            <input type="text" required class="form-control @error('name') is-invalid @enderror"
                                                style="padding: 0.875rem .75rem;" name="name"
                                                placeholder="Enter Your Name">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email</label>
                                            <input type="email" required class="form-control @error('email') is-invalid @enderror"
                                                style="padding: 0.875rem .75rem;" name="email"
                                                placeholder="Enter Your Email">

                                            @error('email')
                                                <div class="text-danger" style="padding-top: -10px;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Phone</label>
                                            <input type="text" required class="form-control @error('phone') is-invalid @enderror"
                                                style="padding: 0.875rem .75rem;" name="phone"
                                                placeholder="Enter Your Phone">

                                            @error('phone')
                                                <div class="text-danger" style="padding-top: -10px;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Subject</label>
                                            <input type="text"
                                                class="form-control @error('subject') is-invalid @enderror"
                                                style="padding: 0.875rem .75rem;" required name="subject"
                                                placeholder="Enter Your Subject">

                                            @error('subject')
                                                <div class="text-danger" style="padding-top: -10px;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Message</label>
                                            <textarea required class="form-control @error('subject') is-invalid @enderror" style="padding: 0.875rem .75rem;" rows="5"
                                                placeholder="Leave a comment here" id="floatingTextarea2" name="message"></textarea>
                                            @error('subject')
                                                <div class="text-danger" style="padding-top: -10px;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 d-flex justify-content-center">
                                        <div class="pt-3">
                                            <button class="px-5 py-3 btn btn-outline-success" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="wrap">
        </div>
    </section>
@endsection
