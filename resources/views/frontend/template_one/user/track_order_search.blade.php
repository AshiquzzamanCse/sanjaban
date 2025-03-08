@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');


        .card {
            position: relative;
            display:
                -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction:
                normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color:
                #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius:
                0.10rem
        }

        .card-header:first-child {
            border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
        }

        .card-header {
            padding:
                0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1)
        }

        .track {
            position:
                relative;
            background-color: #ddd;
            height: 7px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-bottom:
                60px;
            margin-top: 50px
        }

        .track .step {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            width: 25%;
            margin-top:
                -18px;
            text-align: center;
            position: relative
        }

        .track .step.active:before {
            background: #FF5722
        }

        .track .step::before {
            height:
                7px;
            position: absolute;
            content: "";
            width: 100%;
            left: 0;
            top: 18px
        }

        .track .step.active .icon {
            background: #ee5435;
            color:
                #fff
        }

        .track .icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            position: relative;
            border-radius:
                100%;
            background: #ddd
        }

        .track .step.active .text {
            font-weight: 400;
            color: #000
        }

        .track .text {
            display: block;
            margin-top:
                7px
        }

        .itemside {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 100%
        }

        .itemside .aside {
            position: relative;
            -ms-flex-negative: 0;
            flex-shrink: 0
        }

        .img-sm {
            width: 80px;
            height: 80px;
            padding: 7px
        }

        ul.row,
        ul.row-sm {
            list-style: none;
            padding: 0
        }

        .itemside .info {
            padding-left: 15px;
            padding-right: 7px
        }

        .itemside .title {
            display:
                block;
            margin-bottom: 5px;
            color: #212529
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        .btn-warning {
            color:
                #ffffff;
            background-color: #ee5435;
            border-color: #ee5435;
            border-radius: 1px
        }

        .btn-warning:hover {
            color:
                #ffffff;
            background-color: #ff2b00;
            border-color: #ff2b00;
            border-radius: 1px
        }
    </style>


    <section class="page-banner-area" data-background="http://127.0.0.1:7000/frontend/template_one/assets/img/bg/banner.jpg"
        style="background-image: url(&quot;http://127.0.0.1:7000/frontend/template_one/assets/img/bg/banner.jpg&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-sm-12">
                    <div class="banner-text text-center pt-90 pb-90">
                        <h2 class="f-800 cod__black-color">Product Tracking</h2>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('template.one.dashboard') }}">Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">


                    <div class="container">
                        <article class="card">
                            <header class="card-header"> My Orders Tracking <span
                                    class="text-danger">({{ $track->invoice_number }})</span> </header>
                            <div class="card-body">

                                <h6 class="fw-bolder">Order Number: {{ $track->order_number }}</h6>

                                <article class="card">
                                    <div class="card-body row">
                                        <div class="col"> <strong>Order Date:</strong>
                                            <br>{{ $track->order_date }}
                                        </div>
                                        <div class="col"> <strong>Shipping BY:</strong> <br> {{ $track->billing_name }},
                                            | <i class="fa fa-phone"></i> {{ $track->billing_phone }} </div>
                                        <div class="col"> <strong>Status:</strong> <br> <span
                                                class="text-danger">{{ $track->status }}</span> </div>
                                        <div class="col"> <strong>Delivery Time:</strong> <br>

                                            @if ($track->status == 'delivered')
                                                <p>Wait For 2 working Days</p>
                                            @else
                                                <p>Wait For Approving</p>
                                            @endif


                                        </div>
                                    </div>
                                </article>

                                <div class="track">

                                    @if ($track->status == 'pending')
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span>
                                            <span class="text">Order Pending</span>
                                        </div>

                                        <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span
                                                class="text"> Picked by courier</span> </div>

                                        <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span
                                                class="text"> On the way </span> </div>

                                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                                                class="text">Ready for pickup</span> </div>
                                    @elseif ($track->status == 'processing')
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span>
                                            <span class="text">Order Pending</span>
                                        </div>

                                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span>
                                            <span class="text"> Picked by courier</span>
                                        </div>

                                        <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span
                                                class="text"> On the way </span> </div>

                                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                                                class="text">Ready for pickup</span> </div>
                                    @elseif ($track->status == 'shipped')
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span>
                                            <span class="text">Order Pending</span>
                                        </div>

                                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span>
                                            <span class="text"> Picked by courier</span>
                                        </div>

                                        <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span>
                                            <span class="text"> On the way </span>
                                        </div>

                                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                                                class="text">Ready for pickup</span> </div>
                                    @elseif ($track->status == 'delivered')
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span>
                                            <span class="text">Order Pending</span>
                                        </div>

                                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span>
                                            <span class="text"> Picked by courier</span>
                                        </div>

                                        <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span>
                                            <span class="text"> On the way </span>
                                        </div>

                                        <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span>
                                            <span class="text">Ready for pickup</span>
                                        </div>
                                    @endif

                                </div>

                                <hr>

                                <ul class="row">

                                    @foreach ($orderItems as $item)
                                        <li class="col-md-4">
                                            <figure class="itemside mb-3">
                                                <div class="aside"><img src="{{ asset($item->product->product_image) }}"
                                                        class="img-sm border"></div>
                                                <figcaption class="info align-self-center">
                                                    <p class="title">{{ $item->product->product_name }} <br>Qty:
                                                        {{ $item->qty }}</p> <span class="text-muted">Tk
                                                        {{ $item->price }}</span>
                                                </figcaption>
                                            </figure>
                                        </li>
                                    @endforeach



                                </ul>
                                <hr>
                                <a href="{{ route('template.one.dashboard') }}" class="btn btn-warning" data-abc="true">
                                    <i class="fa fa-chevron-left"></i> Back to orders</a>
                            </div>
                        </article>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $("#select").select2({
            tags: true,
            // dropdownParent: $('#modal), // if select in modal
            theme: "bootstrap",
        });
    </script>
@endpush
