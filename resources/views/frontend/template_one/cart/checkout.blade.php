@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
    <!-- page banner area start -->
    <section class="page-banner-area blog-page"
        data-background="{{ asset('frontend/template_one/assets/img/bg/banner.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div>
                        <div class="banner-text text-center pt-80 pb-80">
                            <h2 class="f-800 cod__black-color">
                                DadaBhaai <span class="grenadier-color">Product</span>
                            </h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb pt-3">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item grenadier-color active" aria-current="page">
                                        <a href="">
                                            <span class="grenadier-color">Shipping Info</span>
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
    <form action="{{ route('template.checkout.store') }}" id="myForm" method="POST">
        @csrf
        <div class="product shop-page pt-40 pb-80 fix">
            <div class="container">
                <div class="border-b">
                    <div class="row">
                        <div class="col-lg-12 col-md-4">
                            <div class="shop-bar d-flex align-items-center justify-content-between">
                                <p class="f-800 cod__black-color">
                                    <span class="grenadier-color">Information</span>
                                </p>
                                <a href="{{ route('index') }}" class="f-800 cod__black-color">
                                    <span class="grenadier-color">Continue Shopping<i
                                            class="fa fa-long-arrow-right pl-2"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="card border-0 shadow-lg p-0">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-lg-8">
                                        {{-- Billing Info --}}
                                        <div class="card border-0 shadow-none mb-3">
                                            <div class="card-header checkout-page-form" style="background: #dfdddd;">
                                                <a class="card-title">Billing Info</a>
                                            </div>
                                            <div id="" class="" data-parent=""
                                                style="background-color: #f5f5f5">
                                                <div class="card-body p-0">
                                                    <div class="bg-light p-3">
                                                        <div class="row">
                                                            <div class="form-group col-sm-4">
                                                                <label for="user_id">Billing Name
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Billing Name"
                                                                    value="{{ Auth::user()->name }}" name="billing_name" />
                                                            </div>

                                                            <div class="form-group col-sm-4">
                                                                <label for="phone">Phone <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="eg: 01728459652"
                                                                    value="{{ Auth::user()->phone }}" name="billing_phone"
                                                                    id="billing_phone" />
                                                                <small id="phoneError" class="text-danger"
                                                                    style="display:none;">Please enter a valid phone
                                                                    number.</small>
                                                            </div>

                                                            <script>
                                                                // Get the phone input field and the error message element
                                                                const phoneInput = document.getElementById('billing_phone');
                                                                const phoneError = document.getElementById('phoneError');

                                                                // Bangladesh phone number regex pattern (starts with 01 and followed by 9 digits)
                                                                const phonePattern = /^01\d{9}$/;

                                                                // Add event listener for input events
                                                                phoneInput.addEventListener('input', function() {
                                                                    const phoneValue = phoneInput.value;

                                                                    // Test if the phone number matches the pattern
                                                                    if (phonePattern.test(phoneValue)) {
                                                                        phoneError.style.display = 'none'; // Hide error message
                                                                        phoneInput.classList.remove('is-invalid'); // Optional: remove invalid class
                                                                    } else {
                                                                        phoneError.style.display = 'block'; // Show error message
                                                                        phoneInput.classList.add('is-invalid'); // Optional: add invalid class
                                                                    }
                                                                });
                                                            </script>

                                                            <div class="form-group col-sm-4">
                                                                <label for="email">Email
                                                                </label>
                                                                <input type="email" class="form-control"
                                                                    value="{{ Auth::user()->email }}"
                                                                    placeholder="example@gmail.com" name="billing_email" />
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="city">City
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ Auth::user()->city }}" name="billing_city"
                                                                    placeholder="City Name" />
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="state">State
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ old('billing_state') }}" name="billing_state"
                                                                    placeholder="State Name" />
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="postal_code">Postal Code
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ Auth::user()->postal_code }}"
                                                                    name="billing_postal_code" placeholder="Postal Code" />
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="city">Country
                                                                </label>
                                                                {{-- <select name="billing_country"
                                                                    class="form-control form-control-sm w-100 border" id="">
                                                                    <option disabled>Default select</option>
                                                                    @foreach ($countries as $country)
                                                                        <option value="{{ $country->name }}">
                                                                            {{ $country->name }}</option>
                                                                    @endforeach
                                                                </select> --}}
                                                                <input type="text" class="form-control"
                                                                    value="{{ Auth::user()->country }}"
                                                                    name="billing_country" placeholder="Country Name" />
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="address_line1">Address 1
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ Auth::user()->address }}"
                                                                    name="billing_address_line1"
                                                                    placeholder="Address One" />
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="address_line2">Address 2
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ Auth::user()->address_two }}"
                                                                    name="billing_address_line2"
                                                                    placeholder="Address Two" />
                                                            </div>
                                                            <div class="form-group col-sm-12">
                                                                <label for="address_line2">Note
                                                                </label>
                                                                <textarea class="form-control" placeholder="Write Something" name="notes" id="" cols="1"
                                                                    rows="1"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Billing Info --}}

                                        <input type="checkbox" id="myCheckbox" name="terms"> Same As billing Address

                                        {{-- Shipping Info --}}
                                        <div class="card border-0 shadow-none mb-0 mt-3">
                                            <div class="card-header checkout-page-form" style="background: #dfdddd;">
                                                <a class="card-title">Shipping Info</a>
                                            </div>
                                            <div id="" class="" data-parent=""
                                                style="background-color: #f5f5f5">
                                                <div class="card-body p-0">
                                                    <div class="bg-light p-3">
                                                        <div class="row">
                                                            <div class="form-group col-sm-4">
                                                                <label for="user_id">Shipping Name
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Shipping Name" value=""
                                                                    name="shipping_name" />
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="phone">Shipping Phone
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Shipping Phone" value=""
                                                                    name="shipping_phone" />
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="city">Shipping City
                                                                </label>
                                                                <input type="text" class="form-control" value=""
                                                                    name="shipping_city" placeholder="Shipping City" />
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="state">Shipping State
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ old('shipping_state') }}"
                                                                    name="shipping_state" placeholder="Shipping State" />
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="postal_code">Postal Code
                                                                </label>
                                                                <input type="text" class="form-control" value=""
                                                                    name="shipping_postal_code"
                                                                    placeholder="Postal Code" />
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="city">Country
                                                                </label>

                                                                <input type="text" class="form-control" value=""
                                                                    name="shipping_country" placeholder="Country Name" />
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="address_line1">Address 1
                                                                </label>
                                                                <input type="text" class="form-control" value=""
                                                                    name="shipping_address_line1"
                                                                    placeholder="Address One" />
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="address_line2">Address 2
                                                                </label>
                                                                <input type="text" class="form-control" value=""
                                                                    name="shipping_address_line2"
                                                                    placeholder="Address Two" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Shipping Info --}}
                                    </div>
                                    <!-- Check Out Content -->
                                    <div class="col-lg-4">
                                        <form action="">
                                            <div class="card rounded-0">
                                                <div class="card-header font-weight-bold">
                                                    ORDER SUMMERY
                                                </div>
                                                <div class="card-body border-0">
                                                    <div class="row mb-5">
                                                        @foreach ($carts as $item)
                                                            <div class="col-12">
                                                                <table>
                                                                    <tr style="background: #dfdddd; padding: 10px;">
                                                                        <th class="py-3 pl-2 text-start" width="30%">
                                                                            Image</th>
                                                                        <th class="py-3 text-start" width="45%">Name
                                                                        </th>
                                                                        <th class="py-3 text-start" width="15$">Qty
                                                                        </th>
                                                                        <th class="py-3 pr-2 text-start" width="10%">
                                                                            Price</th>
                                                                    </tr>
                                                                    <tr style="border-bottom: 1px solid #dfdddd;">
                                                                        <td>
                                                                            <img src="{{ asset($item->options->image) }}"
                                                                                style="width:80px" alt="">
                                                                        </td>
                                                                        <td>
                                                                            <div>
                                                                                {{ $item->name }}
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div>
                                                                                {{ $item->qty }}
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div>
                                                                                ${{ $item->price }}
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="table-responsive border-0">
                                                        <table class="table border-0">
                                                            <thead style="background: #dfdddd">
                                                                <tr>
                                                                    <th scope="col">Details</th>
                                                                    <th class="text-right">Price Info</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="">
                                                                    <td>Price:</td>
                                                                    <td class="text-right">$ {{ $cartTotal }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="col">Grand Total</th>

                                                                    <th class="text-right">
                                                                        <input class="" type="hidden"
                                                                            name="total_amount"
                                                                            value="{{ $cartTotal }}">
                                                                        $ <b class="amount grandTotal">
                                                                            {{ $cartTotal }}</b>
                                                                    </th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        {{-- Delivery System  --}}
                                                        <div class="mt-5">
                                                            <h5 class="cart-title-highlight title-3">Payment Method</h5>
                                                            <ul
                                                                class="payment_methods methods list-unstyled mt-3 form-group">
                                                                <li class="payment_method_bacs">
                                                                    <div class="">
                                                                        <label class="radio-inline">
                                                                            <input type="radio" checked value="cod"
                                                                                name="payment_method" />
                                                                            <span>Cash On Delivery</span>
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        {{-- Delivery System  --}}
                                                        <div class="d-flex justify-content-end mt-3">
                                                            <button type="submit" class="cart-button w-100">
                                                                Proceed to Checkout
                                                            </button>
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
    </form>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            var subTotal = {{ $cartTotal }};

            var shippingCharge = $('.shippingCharge');
            var grandTotal = $('.grandTotal');

            var hiddenTotalInput = $('input[name="total_amount"]');

            $('input:radio[name="shipping_charge"]').change(function() {

                var shippingMethod = parseFloat($(this).val());
                var total = shippingMethod + subTotal;
                shippingCharge.text(shippingMethod.toFixed(2));
                grandTotal.text(total.toFixed(2));
                hiddenTotalInput.val(total.toFixed(2));
            });
        });
    </script>


    {{-- validate code  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    billing_name: {
                        required: true,
                    },

                    billing_phone: {
                        required: true,
                    },

                    billing_city: {
                        required: true,
                    },

                    billing_country: {
                        required: true,
                    },

                    billing_state: {
                        required: true,
                    },

                    billing_address_line1: {
                        required: true,
                    },

                    shipping_charge: {
                        required: true,
                    },

                    payment_method: {
                        required: true,
                    },
                },
                messages: {
                    billing_name: {
                        required: 'Please Enter Name',
                    },

                    billing_phone: {
                        required: 'Please Enter Phone Number',
                    },

                    billing_city: {
                        required: 'Please Enter City Name',
                    },

                    billing_country: {
                        required: 'Please Enter Country Name',
                    },

                    billing_state: {
                        required: 'Please Enter State Name',
                    },

                    billing_address_line1: {
                        required: 'Please Enter Address Name',
                    },

                    shipping_charge: {
                        required: 'Please Select Shipping Charge',
                    },

                    payment_method: {
                        required: 'Please Select Payment Method',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            var subTotal = {{ $cartTotal }};
            var shippingCharge = $('.shippingCharge');
            var grandTotal = $('.grandTotal');
            var couponDiscount = $('.couponDiscount');
            var hiddenTotalInput = $('input[name="total_amount"]');

            // Function to calculate grand total
            function calculateGrandTotal(shipping, discount) {
                var total = subTotal + shipping - discount;
                grandTotal.text(total.toFixed(2));
                hiddenTotalInput.val(total.toFixed(2));
            }

            // Update total amount when shipping charge changes
            $('input:radio[name="shipping_charge"]').change(function() {
                var shippingMethod = parseFloat($(this).val());
                var discount = parseFloat(couponDiscount.text()) || 0;
                shippingCharge.text(shippingMethod.toFixed(2));
                calculateGrandTotal(shippingMethod, discount);
            });

            // Apply coupon logic
            $('#applyCoupon').click(function() {
                var coupon = $('#couponCode').val();
                $.ajax({
                    url: '{{ route('apply.coupon') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        coupon: coupon
                    },
                    success: function(response) {
                        if (response.success) {
                            var discount = parseFloat(response.discount);
                            couponDiscount.text(discount.toFixed(2));
                            var shipping = parseFloat(shippingCharge.text()) || 0;
                            calculateGrandTotal(shipping, discount);

                            $('#exampleModal').modal('hide');
                        } else {
                            alert(response.message);
                        }
                    }
                });
            });
        });
    </script>


    <script>
        // JavaScript to handle coupon application without refreshing the page
        $(document).ready(function() {
            // Assuming you have some JavaScript code to handle applying the coupon and updating the UI accordingly
            // When the coupon is applied successfully, you can add a class to show the coupon discount field
            // For example:
            $('#applyCouponButton').click(function() {
                // Assuming this function applies the coupon and returns a boolean indicating success
                var success =
                    applyCoupon(); // You should replace this with your actual code to apply the coupon
                if (success) {
                    $('.coupon-discount').removeClass('d-none'); // Show the coupon discount field
                    $appliedCoupon = true; // Update the appliedCoupon variable
                }
            });
        });
    </script>

<script>
    document.getElementById('myCheckbox').addEventListener('change', function() {
        const isChecked = this.checked;

        if (isChecked) {
            // Copy billing address to shipping address
            document.querySelector('[name="shipping_name"]').value = document.querySelector(
                '[name="billing_name"]').value;
            document.querySelector('[name="shipping_phone"]').value = document.querySelector(
                '[name="billing_phone"]').value;
            document.querySelector('[name="shipping_city"]').value = document.querySelector(
                '[name="billing_city"]').value;
            document.querySelector('[name="shipping_state"]').value = document.querySelector(
                '[name="billing_state"]').value;
            document.querySelector('[name="shipping_postal_code"]').value = document.querySelector(
                '[name="billing_postal_code"]').value;
            document.querySelector('[name="shipping_country"]').value = document.querySelector(
                '[name="billing_country"]').value;
            document.querySelector('[name="shipping_address_line1"]').value = document.querySelector(
                '[name="billing_address_line1"]').value;
            document.querySelector('[name="shipping_address_line2"]').value = document.querySelector(
                '[name="billing_address_line2"]').value;
        } else {
            // Clear shipping address fields if unchecked
            document.querySelector('[name="shipping_name"]').value = '';
            document.querySelector('[name="shipping_phone"]').value = '';
            document.querySelector('[name="shipping_city"]').value = '';
            document.querySelector('[name="shipping_state"]').value = '';
            document.querySelector('[name="shipping_postal_code"]').value = '';
            document.querySelector('[name="shipping_country"]').value = '';
            document.querySelector('[name="shipping_address_line1"]').value = '';
            document.querySelector('[name="shipping_address_line2"]').value = '';
        }
    });
</script>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="container">
                <div class="modal-content">
                    <div class="modal-body">
                        <label for="">Coupon Name</label>
                        <input type="text" id="couponCode" placeholder="Coupon Name" autocomplete="off"
                            class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="applyCoupon">Apply Coupon</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
