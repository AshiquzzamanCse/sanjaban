@extends('frontend.frontend_dashboard')
@section('frontend')
    <!-- CONTENT + SIDEBAR -->
    <div class="clearfix main-wrapper">
        <div class="site-pagetitle jumbotron">
            <div class="container text-center">
                <h3>Dada <span class="thm-clr">Vaai</span>
                </h3>
                <!-- Breadcrumbs -->
                <div class="breadcrumbs">
                    <div class="text-center breadcrumbs">
                        <i class="fa fa-home"></i>
                        <span>
                            <a href="{{ route('index') }}">Home</a>
                        </span>
                        <i class="fa fa-arrow-circle-right"></i>
                        <span class="current">Brand All</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container theme-container">

            <div class="main-container row">

                @forelse ($brands as $brand)
                    <div class="col-lg-2">
                        {{-- <div class="card">
                            <div class="card-body" style="">
                                <img src="{{ asset('storage/brand/' . $brand->brand_image) }}"
                                    style="width:70px;height:70px;" alt="">
                                    <p>{{ $brand->brand_name }}</p>
                            </div>
                        </div> --}}

                        <div class="text-box" style="margin-bottom: 10px;">
                            <div class=" title-3 fsz-14 blklt-clr">
                                <a href="{{ route('brand.wise.product', $brand->id) }}">
                                    <img src="{{ asset('storage/brand/' . $brand->brand_image) }}"
                                        style="width: 350px;height: 120px;object-fit: cover;padding: 8px;background: #eee;"
                                        onerror="this.onerror=null; this.src='{{ asset('img/no-img.jpg') }}';"
                                        alt=""></a>
                            </div>
                            <p class="mb-0" style="padding-top: 8px; padding-bottom: 8px;">{{ $brand->brand_name }}</p>
                        </div>
                    </div>
                @empty
                    <p>No Brand Avaiable</p>
                @endforelse

            </div>
        </div>
    </div>
    <div class="clear"></div>
    <!-- / CONTENT + SIDEBAR -->
@endsection
