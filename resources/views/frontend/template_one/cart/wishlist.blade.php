@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
@section('title')
    DadaBhaai | WishList
@endsection
<style>
    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch !important;
        -ms-overflow-style: none !important;
    }

    .table-responsive table {
        min-width: 600px;
        /* Adjust based on content */
    }
</style>
<!-- page banner area start -->
<section class="page-banner-area blog-page"
    data-background="{{ asset('frontend/template_one/assets/img/bg/banner.jpg') }}" style="height: 200px">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="text-center banner-text pt-50 pb-50">
                    <h2 class="f-800 cod__black-color">
                        WishList <span class="grenadier-color">Product</span>
                    </h2>
                    <nav aria-label="breadcrumb">
                        <ol class="pt-3 breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item grenadier-color active" aria-current="page">
                                <a href="">
                                    <span class="grenadier-color">WishList</span>
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- page banner area end -->

<!-- shop area start -->
<div class="product shop-page pt-90 pb-90 fix wishlist-box">
    <div class="container">
        <div class="pb-4 border-b">
            <div class="row">
                <div class="px-0 col-lg-12 col-md-4">
                    <div class="shop-bar d-flex align-items-center justify-content-between">
                        <h5 class="f-800 cod__black-color">
                            <span class="grenadier-color">Your Wishlist Selection</span>
                        </h5>
                        <h5 class="mt-4 f-800 cod__black-color mt-lg-0">
                            <a href="{{ route('index') }}" class="p-2 add-to-card-btns" style="border-radius: 20px">
                                <span class="grenadier-color">Continue Shopping<i
                                        class="pl-2 fa-solid fa-arrow-right"></i></span>
                            </a>
                        </h5>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="border-0 shadow-lg card">
                    <div class="p-0 card-body">
                        <div class="row">
                            <div class="px-0 col-lg-12">

                                <div class="table-responsive">
                                    <table class="table">
                                        <!-- Cart Header -->
                                        <thead class="border-none bg-light">
                                            <tr>
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th class="text-center">Cart</th>
                                                <th class="text-right">Remove</th>
                                            </tr>

                                        </thead>
                                        <!-- Cart Content -->

                                        {{-- <tbody id="wishlist"> </tbody> --}}
                                        <tbody>

                                            @forelse ($cartWishlists as $cartWishlist)
                                                <tr class="border-bottom">
                                                    <td>
                                                        <img class="img-fluid"
                                                            src="{{ asset($cartWishlist->options->image) }}"
                                                            style="width:60px;height:60px;" alt="" />
                                                    </td>
                                                    <td>
                                                        <p>{{ $cartWishlist->name }}</p>
                                                    </td>

                                                    <td>
                                                        {{-- Tk ${value.price} --}} <p>$ {{ $cartWishlist->price }}</p>
                                                    </td>

                                                    <td class="border-0 d-flex justify-content-center">
                                                        @if ($cartWishlist->price > 0)
                                                            <a type="submit" style="cursor:pointer"
                                                                id="{{ $cartWishlist->id }}"
                                                                class="text-white cart-button w-50 "
                                                                onclick="addToCartCompare(this.id)" class=""> Add
                                                                To Cart</a>
                                                        @endif
                                                    </td>


                                                    <td class="text-right">
                                                        <a type="submit" class="pr-3" style="cursor:pointer"
                                                            id="{{ $cartWishlist->rowId }}"
                                                            onclick="wishlistRemove(this.id)"><i
                                                                class="fa-solid fa-trash text-danger"></i></a>
                                                    </td>

                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center text-danger">Your wishlist is
                                                        empty.</td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Check Out Content -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
