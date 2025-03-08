@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
@section('title')
    DadaBhaai | View Cart
@endsection
<style>
    @media only screen and (max-width: 768px) {
        .input-group{
            width: 130px;
        }
    }
</style>
    <!-- page banner area start -->
    <section class="page-banner-area blog-page"
        data-background="{{ asset('frontend/template_one/assets/img/bg/banner.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div>
                        <div class="text-center banner-text pt-150 pb-120">
                            <h2 class="f-800 cod__black-color">
                                DadaBhaai <span class="grenadier-color">Product</span>
                            </h2>
                            <nav aria-label="breadcrumb">
                                <ol class="pt-3 breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item grenadier-color active" aria-current="page">
                                        <a href="">
                                            <span class="grenadier-color">Check Out</span>
                                        </a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page banner area end -->
    <!-- shop area start -->
    <div class="product shop-page view-cart-page pt-50 pb-120 fix">
        <div class="container">

            <div class="border-b">
                <div class="row">
                    <div class="col-lg-12 col-md-4">
                        <div class="shop-bar d-flex align-items-center justify-content-between">
                            <h6 class="f-800 cod__black-color">
                                <span class="grenadier-color">YOUR CART</span>
                            </h6>
                            <a href="{{ route('index') }}" class="px-3 py-3 border f-800 cod__black-color rounded-pill">
                                <span class="">Continue Shopping<i class="pl-2 fa-solid fa-arrow-right-long"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 row">
                <div class="col-lg-12">
                    <div class="border-0 shadow-lg card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <!-- Cart Header -->
                                            <thead class="border-none bg-light">
                                                <tr>
                                                    <th style="width: 5%">SL</th>
                                                    <th style="width: 10%">Image</th>
                                                    <th style="width: 35%">Name</th>
                                                    <th style="width: 10%">Price</th>
                                                    <th style="width: 15%">Quantity</th>
                                                    <th style="width: 12%">Total</th>
                                                    <th style="width: 13%">Remove</th>
                                                </tr>
                                            </thead>
                                            <!-- Cart Content -->
                                            <tbody id="cartPage" valign="middle">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Check Out Content -->
                                <div class="col-lg-4">
                                    <form action="">
                                        <div class="card rounded-0">
                                            <div class="card-header">CART TOTAL</div>
                                            <div class="border-0 card-body">
                                                <div class="border-0 table-responsive">
                                                    <table class="table border-0">

                                                        <thead style="background: #dfdddd">
                                                            <tr>
                                                                <th scope="col">Details</th>
                                                                <th class="text-right">Price Info</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr class="">
                                                                <td>Sub Total:</td>
                                                                <td class="text-right">$ <span id="cartSubTotal"></span></td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="col">ORDER TOTAL</th>
                                                                <th class="text-right">$ <span id="cartTotal"></span></th>
                                                            </tr>
                                                        </tbody>

                                                    </table>
                                                    <div>
                                                        <div class="d-flex justify-content-end">

                                                            <a href="{{ route('template.one.checkout') }}" class="cart-button w-100">
                                                                Check Out
                                                            </a>
                                                        </div>
                                                    </div>
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



    <script>
        // Get the necessary elements
        const incrementBtn = document.getElementByClassName("incrementBtn");
        const decrementBtn = document.getElementByClassName("decrementBtn");
        const amountInput = document.getElementByClassName("amountInput");

        // Function to handle increment button click
        incrementBtn.addEventListener("click", () => {
            // Get the current value of the input
            let currentValue = parseInt(amountInput.value);
            // Increment the value
            currentValue++;
            // Update the input value
            amountInput.value = currentValue;
        });

        // Function to handle decrement button click
        decrementBtn.addEventListener("click", () => {
            // Get the current value of the input
            let currentValue = parseInt(amountInput.value);
            // Decrement the value if greater than 0
            if (currentValue > 0) {
                currentValue--;
            }
            // Update the input value
            amountInput.value = currentValue;
        });
    </script>
@endsection
