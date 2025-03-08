@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">

    <section class="page-banner-area" data-background="{{ asset('frontend/template_one/assets/img/bg/banner.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-sm-12">
                    <div class="banner-text text-center pt-90 pb-90">
                        <h2 class="f-800 cod__black-color">My Dashboard</h2>

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

    <div class="container mb-5">
        <div class="row pt-80 pb-80">
            <div class="col-lg-12">
                <div class="row">


                    @include('frontend.template_one.user.dashboard-sidebar')

                    <!-- /.col-md-4 -->
                    <div class="col-md-10">
                        <div class="tab-content" id="myTabContent">

                            {{-- User Dashboard Content --}}
                            <div class="tab-pane fade show active" id="dashboard" role="tabpanel"
                                aria-labelledby="dashboard-tab">
                                <div>
                                    <div class="heading-2">
                                        <h3 class="title-3 fsz-15 grenadier-color">All Details</h3>
                                    </div>

                                    {{-- Dashboard Cards --}}
                                    <div class="row">

                                        @php
                                            $orders = App\Models\User\Order::where('user_id', Auth::user()->id)->get();
                                        @endphp

                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <h5 class="font-weight-bold">({{ count($orders) }})</h5>
                                                        <p class="grenadier-color">Total Orders</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- @php
                                            $wishlists = App\Models\Admin\Wishlist::where(
                                                'user_id',
                                                Auth::user()->id,
                                            )->get();
                                        @endphp

                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <h5 class="font-weight-bold">({{ count($wishlists) }})</h5>
                                                        <p class="grenadier-color"><a
                                                                href="{{ route('wishlist') }}">Wishlist</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}

                                        @php
                                            $orderss = App\Models\User\Order::where('user_id', Auth::user()->id)
                                                ->where('status', 'delivered')
                                                ->get();
                                        @endphp

                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <h5 class="font-weight-bold">({{ count($orderss) }})</h5>
                                                        <p class="grenadier-color">Delivery</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    {{-- Dashboard Cards End --}}

                                </div>
                            </div>
                            {{-- User Dashboard Content End --}}

                            {{-- Order Content --}}
                            @include('frontend.template_one.user.user_order')

                            {{-- Order Content End --}}

                            {{-- Track Order Content --}}
                            @include('frontend.template_one.user.track_order')
                            {{-- End --}}

                            {{-- payment Content --}}
                            {{-- <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                                <div>
                                    <div class="heading-2">
                                        <h3 class="title-3 fsz-15 grenadier-color">Pre Booked History</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-striped  table-bordered">
                                                <thead class="grenadier-bg text-white">
                                                    <tr>
                                                        <th scope="col" class="text-center">Order No</th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Payment Id</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col" class="text-center">Date</th>
                                                        <th scope="col" class="text-center">Status</th>
                                                        <th scope="col">Total amount</th>
                                                        <th scope="col">Paid amount</th>
                                                        <th scope="col" class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" class="text-center">1</th>
                                                        <td>Lorem ipsum dolor,</td>
                                                        <td class="text-center">#5564a658</td>
                                                        <td>Booked</td>
                                                        <td>30 May 2024</td>
                                                        <td class="text-center"><span
                                                                class="badge badge-primary">Deliverd</span></td>
                                                        <td class="text-center">$1150</td>
                                                        <td class="text-center">$1150</td>
                                                        <td class="text-center">
                                                            <a href=""><i
                                                                    class="fa fa fa-pencil text-muted pr-2"></i></a>
                                                            <a href=""><i class="fa fa-close text-danger"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <div>
                                    <div class="heading-2">
                                        <h3 class="title-3 fsz-15 grenadier-color">RFQ History</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-striped  table-bordered">
                                                <thead class="grenadier-bg text-white">
                                                    <tr>
                                                        <th scope="col" class="text-center">Order No</th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Payment Id</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col" class="text-center">Date</th>
                                                        <th scope="col" class="text-center">Status</th>
                                                        <th scope="col">Total amount</th>
                                                        <th scope="col">Paid amount</th>
                                                        <th scope="col" class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" class="text-center">1</th>
                                                        <td>Lorem ipsum dolor,</td>
                                                        <td class="text-center">#5564a658</td>
                                                        <td>RFQ</td>
                                                        <td>30 May 2024</td>
                                                        <td class="text-center"><span
                                                                class="badge badge-primary">Deliverd</span></td>
                                                        <td class="text-center">$1150</td>
                                                        <td class="text-center">$1150</td>
                                                        <td class="text-center">
                                                            <a href=""><i
                                                                    class="fa fa fa-pencil text-muted pr-2"></i></a>
                                                            <a href=""><i class="fa fa-close text-danger"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div> --}}
                            {{-- End --}}

                            {{-- contact Content --}}
                            @include('frontend.template_one.user.user_contact')

                            {{-- End --}}

                            {{-- Security Content --}}
                            @include('frontend.template_one.user.user_password')

                            {{-- End --}}

                        </div>
                    </div>
                    <!-- /.col-md-8 -->

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
