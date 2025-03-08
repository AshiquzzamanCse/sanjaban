<script src="{{ asset('frontend/template_one/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/popper.min.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/owl.carousel.min.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/isotope.pkgd.min.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/one-page-nav-min.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/slick.min.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/ajax-form.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/wow.min.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/jquery.scrollUp.min.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/imagesloaded.pkgd.min.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/jquery.nice-select.min.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/jquery.magnific-popup.min.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/jquery.countdown.min.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/jquery-ui-slider-range.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/jquery.elevateZoom-3.0.8.min.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/meanmenu.min.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/Elemental.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/plugins.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/main.js') }}"></script>
<script src="{{ asset('frontend/template_one/assets/js/search_advance.js') }}"></script>

<script src="{{ asset('frontend/template_one/assets/js/validate.min.js') }}"></script>
{{-- <script src="https://kit.fontawesome.com/69b7156a94.js" crossorigin="anonymous"></script> --}}
<script src="{{ asset('frontend/assets/js/font-awesome.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
</script>


<script>
    $(document).ready(function() {
        $(".releted_accessories").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 6000,
            arrows: false,
            draggable: true, // Enable dragging
            infinite: true, // Enable infinite loop
            responsive: [
                {
                    breakpoint: 768, // Adjust for mobile screens
                    settings: {
                        slidesToShow: 2
                    }
                }
            ]
        });
    });
</script>

{{-- Releted Accesories End --}}

<script>
    // JavaScript to toggle dropdown visibility
    $(document).ready(function() {
        $("#categoryLink").click(function(e) {
            e.preventDefault(); // Prevent default link behavior
            $("#categoryDropdown").slideToggle(); // Toggle dropdown visibility
            e.stopPropagation(); // Prevent event from propagating further
        });

        // Prevent dropdown from closing when clicking inside
        $("#categoryDropdown").click(function(e) {
            e.stopPropagation(); // Prevent event from propagating further
        });

        // Close dropdown when clicking outside
        $(document).click(function() {
            $("#categoryDropdown").slideUp(); // Close dropdown
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#myTab a").click(function(e) {
            e.preventDefault();
            $(this).tab("show");
        });
    });
</script>


@yield('catscripts')
@yield('childcatscripts')
@yield('brandscripts')
@yield('pricescripts')

{{-- =====================WishList Product All Code Start ============================ --}}

{{-- Add Cart To WishList --}}
<script>
    $('.add_to_wishlist').click(function() {

        var product_id = $(this).data('product_id');

        $.ajax({
            type: 'POST',
            dataType: 'json',

            data: {
                product_id: product_id,
            },

            url: '/add-to-wishlist',

            success: function(data) {
                wishlist();

                // Start Message

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                    })

                    // window.location.href = '/compare-product';

                } else {

                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }

                // End Message
            }
        })

    })
</script>

{{-- Load Wishlist --}}
<script>
    function wishlist() {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/get-wishlist',

            success: function(response) {

                $('#cartWishlistQty').text(response.cartWishlistQty);

                var tableHtml = "";

                if (response.cartWishlist.length === 0) {

                    tableHtml = `

                        <p style="padding-top: 80px;">Wishlist List is Empty</p>
                    `;

                    $('#wishlistLink').hide();
                } else {
                    $.each(response.cartWishlist, function(key, value) {
                        tableHtml +=

                            `<tr class="border-bottom">
                                <td>
                                    <img class="img-fluid"
                                        src="/${value.options.image}" style="width:60px;height:60px;" alt="" />
                                </td>
                                <td>
                                    <p>${value.name.length > 60 ? value.name.substring(0, 60) : value.name}</p>
                                </td>

                                <td>
                                    $ ${value.price}
                                </td>

                                <td class="">
                                    <a type="submit" style="cursor:pointer" id="${value.id}" onclick="addToCartCompare(this.id)"> Add To Cart</a>
                                </td>

                                <td class="">
                                    <a type="submit" style="cursor:pointer" id="${value.rowId}" onclick="wishlistRemove(this.id)"><i class="fa-solid fa-trash text-danger"></i></a>
                                </td>

                            </tr>`;

                    });

                    $('#wishlistLink').show(); // Show the comparison link when list has items
                }

                $('#wishlist').html(tableHtml);
            }
        });
    }

    wishlist();
</script>

{{-- Add Cart Wishlist --}}
<script>
    function addToCartWishlist(id) {

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "/add-to-cart-wishlist/" + id,

            success: function(data) {

                miniCart();
                miniCartRelated();

                // Start Message

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                    })

                } else {

                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }

                // End Message


            }
        })
    }
</script>

{{-- Wishlist Remove --}}
<script>
    // function wishlistRemove(rowId) {

    //     $.ajax({
    //         type: 'GET',
    //         url: '/wishlist/product/remove/' + rowId,
    //         dataType: 'json',
    //         success: function(data) {
    //             miniCart();
    //             wishlist();

    //             // Start Message

    //             const Toast = Swal.mixin({
    //                 toast: true,
    //                 position: 'top-end',
    //                 icon: 'success',
    //                 showConfirmButton: false,
    //                 timer: 3000
    //             })
    //             if ($.isEmptyObject(data.error)) {

    //                 Toast.fire({
    //                     type: 'success',
    //                     title: data.success,
    //                 })

    //             } else {

    //                 Toast.fire({
    //                     type: 'error',
    //                     title: data.error,
    //                 })
    //             }

    //             // End Message

    //         }


    //     })
    // }

    function wishlistRemove(rowId) {

        $.ajax({
            type: 'GET',
            url: '/wishlist/product/remove/' + rowId,
            dataType: 'json',
            success: function(data) {
                miniCart();
                wishlist();

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                });

                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success,
                    });

                    // Redirect to wishlist page after success
                    window.location.href = '/wishlist-product'; // Redirect to the wishlist route

                } else {
                    Toast.fire({
                        type: 'error',
                        title: data.error,
                    });
                }
                // End Message
            }
        });
    }
</script>

{{-- ===================== Wishlist Product All Code End ============================== --}}

{{-- =====================Compare Product All Code Start ============================ --}}

{{-- Add Cart To Compare --}}
<script>
    $('.add_to_compare').click(function() {

        var product_id = $(this).data('product_id');

        $.ajax({
            type: 'POST',
            dataType: 'json',

            data: {
                product_id: product_id,
            },

            url: '/add-to-compare',

            success: function(data) {
                compare();

                // Start Message

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                    })

                    // window.location.href = '/compare-product';

                } else {

                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }

                // End Message
            }
        })

    })
</script>

{{-- Load Compare --}}
<script>
    function compare() {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/get-compare',

            success: function(response) {

                $('#cartCompareQty').text(response.cartCompareQty);

                var tableHtml = "";

                if (response.cartCompare.length === 0) {

                    tableHtml = `


                        <ul class="text-center">
                            <li>Compare List is Empty</li>
                        </ul>
                    `;

                    $('#compareLink').hide();
                } else {
                    $.each(response.cartCompare, function(key, value) {
                        tableHtml += `
                            <div class="px-0 col-lg-3" style="border-top: 1px solid #dee2e6;border-bottom: 1px solid #dee2e6;">
                                <div class="top-info">
                                    <img class="img-fluid compare-product-img" src="/${value.options.image}" alt="${value.name.length > 20 ? `${value.name.substring(0, 20)}...` : value.name}">
                                </div>
                                <ul class="text-center cd-features-list">
                                    <li>
                                        <h3 class="compare-title" title="${value.name}">${value.name.length > 15 ? `${value.name.substring(0, 15)}...` : value.name}</h3>
                                    </li>
                                    <li>$ ${value.price}</li>

                                    <li>
                                        <a type="submit" style="cursor:pointer" id="${value.id}" onclick="addToCartCompare(this.id)"> Add To Cart</a>
                                        </li>

                                    <li><a type="submit" style="cursor:pointer" id="${value.rowId}" onclick="compareRemove(this.id)"><i class="fa-solid fa-trash text-danger"></i></a></li>

                                </ul>
                            </div>`;
                    });

                    $('#compareLink').show(); // Show the comparison link when list has items
                }

                $('#compare').html(tableHtml);
            }
        });
    }

    compare();
</script>

{{-- Add Cart Compare --}}
<script>
    function addToCartCompare(id) {

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "/add-to-cart-compare/" + id,

            success: function(data) {

                miniCart();
                miniCartRelated();

                // Start Message

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                    })

                } else {

                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }

                // End Message


            }
        })
    }
</script>

{{-- Compare Remove --}}
<script>
    function compareRemove(rowId) {
        $.ajax({
            type: 'GET',
            url: '/compare/product/remove/' + rowId,
            dataType: 'json',
            success: function(data) {
                miniCart();
                compare();
                // Start Message

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        title: data.success,
                    })

                    // Redirect to wishlist page after success
                    window.location.href = '/compare-product'; // Redirect to the wishlist route

                } else {

                    Toast.fire({
                        type: 'error',
                        title: data.error,
                    })
                }

                // End Message

            }


        })
    }
</script>

{{-- =====================Compare Product All Code End ============================== --}}


{{-- OfferToCartOne --}}
<script>
    $('.add_to_offer_btn').click(function() {

        var price = $(this).data('discount_price');
        var product_id = $(this).data('product_id');

        $.ajax({

            type: "POST",
            dataType: 'json',
            url: '/product/offer/store',

            data: {
                price: price,
                product_id: product_id,
                // color: color,
            },

            success: function(data) {

                // $('.cart_icon').removeClass('d-none');

                miniCart();

                // Start Message

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                    })

                } else {

                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }

                // End Message
            }

        })



    })


    // function offerToCartOne() {

    //     var product_name = $('#opname').text();
    //     var id = $('#offerproduct_id').val();
    //     var quantity = $('#oqty').val();

    //     var price = $('#opprice').val();

    //     $.ajax({

    //         type: "POST",
    //         dataType: 'json',
    //         url: '/product/offer/store/' + id,

    //         data: {
    //             quantity: quantity,
    //             product_name: product_name,

    //             price: price,
    //         },

    //         success: function(data) {

    //             miniCart();

    //             // Start Message

    //             const Toast = Swal.mixin({
    //                 toast: true,
    //                 position: 'top-end',

    //                 showConfirmButton: false,
    //                 timer: 3000
    //             })
    //             if ($.isEmptyObject(data.error)) {

    //                 Toast.fire({
    //                     type: 'success',
    //                     icon: 'success',
    //                     title: data.success,
    //                 })

    //             } else {

    //                 Toast.fire({
    //                     type: 'error',
    //                     icon: 'error',
    //                     title: data.error,
    //                 })
    //             }

    //             // End Message
    //         }

    //     })

    // }
</script>
{{-- OfferToCartOne --}}

{{-- MiniCart --}}
<script>
    function miniCart() {
        $.ajax({
            type: 'GET',
            url: '/product/mini-cart',
            dataType: 'json',

            success: function(response) {
                // console.log(response)

                $('span[id="cartSubTotal"]').text(response.cartTotal);
                $('#cartQty').text(response.cartQty);
                $('#cartQtyMobile').text(response.cartQtyMobile);

                var miniCart = "";

                if (response.carts.length === 0) {

                    $('#cartQty').closest('li').hide();
                    // Mini cart is empty
                    miniCart += `<ul><li class="mb-20 text-center">Mini cart is empty</li></ul>`;
                } else {

                    $('#cartQty').closest('li').show();
                    $.each(response.carts, function(key, value) {
                        miniCart +=

                            `<div class="pb-3 row" style="border-bottom: 1px solid #eee;">

                                                <div class="col-lg-4">

                                                    <div>
                                                        <img src="/${value.options.image}" class="img-fluid" alt="${value.name}">
                                                    </div>

                                                </div>

                                                <div class="col-lg-8">
                                                    <div>

                                                        <p class="mb-0">${value.name.length > 15 ? `${value.name.substring(0, 15)}...` : value.name}</p>

                                                        <p class="mb-0" style="color: #000">

                                                            <span class="pe-3">${value.qty} x $ ${value.price}</span>

                                                            <span style="cursor:pointer">

                                                                <a type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)">
                                                                    <i class="fa-solid fa-trash text-muted"></i>
                                                                </a>

                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>`
                    });
                }

                $('#miniCart').html(miniCart);
            }
        });
    }
    miniCart();
</script>
{{-- MiniCart --}}

{{-- BuyToCartOne --}}

<script>
    function buyToCartOne() {

        var product_name = $('#dpname').text();
        var id = $('#oneproduct_id').val();
        // var quantity = $('#dqty').val();

        var qty = $('.qty-input-product').val();

        $.ajax({

            type: "POST",
            dataType: 'json',
            url: '/product/buy/store/' + id,

            data: {
                qty: qty,
                product_name: product_name,
            },

            success: function(data) {

                miniCart();

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                    })

                    window.location.href = '/view-cart';

                } else {

                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }
                // End Message
            }

        })

    }
</script>

{{-- BuyToCartOne --}}


{{-- add_to_cart_btn_product_single --}}

{{-- <script>
    $('.add_to_cart_btn_product_single').click(function() {

        var product_id = $(this).data('product_id');
        var qty = $(this).closest('.d-flex').find('.qty-input').val();


        $.ajax({

            type: "POST",
            dataType: 'json',
            url: '/product-store-cart-single',

            data: {
                product_id: product_id,
                qty: qty,
            },

            success: function(data) {

                $('.cart_icon').removeClass('d-none');

                // miniCart();
                miniCartRelated();

                // Start Message

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                    })

                } else {

                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }

                // End Message
            }

        })

    })
</script> --}}

{{-- add_to_cart_btn_product_single_add --}}
<script>
    $(document).ready(function() {
        // Handle adding product to the list when the "Add" button is clicked
        $('.add_to_cart_btn_product_single_add').on('click', function() {
            var productId = $(this).data('product_id'); // Get the product ID
            var productName = $(this).data('product_name'); // Get the product name
            var productPrice = $(this).data('product_price'); // Get the product price
            var quantity = $(this).closest('.card-body').find('.qty-input').val(); // Get the quantity

            // Create a new list item with the product details
            var newItem = `
                <li class="mb-2 d-flex align-items-center" style="border-bottom: 1px solid #eee;border-top: 1px solid #eee;">
                    <span class="pr-2">${$('#productList li').length + 1}.</span>
                    <input type="text" class="form-control form-control-sm accesories-title" value="${productName}" readonly>
                    <input type="text" class="form-control form-control-sm accesories-qty" value="x ${quantity}" readonly>
                    <input type="text" class="form-control form-control-sm accesories-amount" value="$ ${productPrice * quantity}" readonly>
                    <div class="accesories-remove">
                        <a type="submit" style="cursor:pointer" class="" id="${productId}" onclick="removeProduct(this.id)">
                            <i class="fa-solid fa-close text-danger"></i>
                        </a>
                    </div>
                </li>
            `;

            // Append the new item to the list
            $('#productList').append(newItem);
        });

        // Handle quantity changes
        $(document).on('click', '.increase-btn', function() {
            var qtyInput = $(this).closest('.number').find('.qty-input');
            var currentQty = parseInt(qtyInput.val());
            qtyInput.val(currentQty + 1);
        });

        $(document).on('click', '.decrease-btn', function() {
            var qtyInput = $(this).closest('.number').find('.qty-input');
            var currentQty = parseInt(qtyInput.val());
            if (currentQty > 1) {
                qtyInput.val(currentQty - 1);
            }
        });
    });

    // Remove a product from the list
    function removeProduct(productId) {
        $('#' + productId).closest('li').remove();
    }
</script>
{{-- add_to_cart_btn_product_single_add --}}


{{-- AddToCartOne --}}
<script>
    function addToCartOne() {

        var product_name = $('#dpname').text();
        var id = $('#oneproduct_id').val();
        // var quantity = $('#dqty').val();

        var qty = $('.qty-input-product').val();



        var color = $('#dcolor option:selected').text();

        $.ajax({

            type: "POST",
            dataType: 'json',
            url: '/product/store/' + id,

            data: {
                qty: qty,
                product_name: product_name,
                color: color,
            },

            success: function(data) {

                $('.cart_icon').removeClass('d-none');

                // miniCart();
                miniCartRelated();

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                    })

                } else {

                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }
                // End Message
            }

        })

    }
</script>
{{-- AddToCartOne --}}

{{-- addToCartOneOffer --}}
<script>
    $('.add_to_cart_btn').click(function() {


        var price = $(this).data('offer_price');
        var product_id = $(this).data('product_id');


        // var color = $('#dcolor option:selected').text();

        $.ajax({

            type: "POST",
            dataType: 'json',
            url: '/offer-product-store',

            data: {
                price: price,
                product_id: product_id,
                // color: color,
            },

            success: function(data) {

                $('.cart_icon').removeClass('d-none');

                miniCart();

                // Start Message

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                    })

                } else {

                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }

                // End Message
            }

        })

    })
</script>
{{-- addToCartOneOffer --}}

{{-- add_to_cart_btn_product --}}
<script>
    $('.add_to_cart_btn_product').click(function() {

        var product_id = $(this).data('product_id');
        var qty = $(this).closest('.d-flex').find('.qty-input').val();


        $.ajax({

            type: "POST",
            dataType: 'json',
            url: '/product-store-cart',

            data: {
                product_id: product_id,
                qty: qty,
            },

            success: function(data) {

                $('.cart_icon').removeClass('d-none');

                miniCart();
                miniCartRelated();

                // Start Message

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                    })

                } else {

                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }

                // End Message
            }

        })

    })
</script>
{{-- add_to_cart_btn_product --}}


{{-- addToCartDetails --}}
<script>
    function addToCartDetailsF() {

        var product_name = $('#fname').text();
        var id = $('#fproduct_id').val();

        $.ajax({

            type: 'POST',
            dataType: 'json',

            url: "/fcart/data/store/" + id,

            data: {
                product_name: product_name,
            },

            success: function(data) {

                miniCart();

                // Start Message

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        title: data.success,
                    })

                } else {

                    Toast.fire({
                        type: 'error',
                        title: data.error,
                    })
                }

                // End Message
            }

        })

    }
</script>

{{-- AddToCartOneRelated --}}
<script>
    function addToCartOneRelated() {

        var product_name = $('#drpname').text();
        var id = $('#onerproduct_id').val();
        var quantity = $('#drqty').val();

        // var color = $('#dcolor option:selected').text();

        $.ajax({

            type: "POST",
            dataType: 'json',
            url: '/product/store/related/' + id,

            data: {
                quantity: quantity,
                product_name: product_name,
                // color: color,
            },

            success: function(data) {

                miniCart();
                miniCartRelated();

                // Start Message

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                    })

                } else {

                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }

                // End Message
            }

        })

    }
</script>
{{-- AddToCartOneRelated --}}



{{-- Mini Cart Related --}}
<script type="text/javascript">
    function miniCartRelated() {
        $.ajax({
            type: 'GET',
            url: '/product/mini/cart/related',
            dataType: 'json',

            success: function(response) {

                // console.log(response)

                $('span[id="cartSubTotal"]').text(response.cartTotal);
                $('#cartQty').text(response.cartQty);
                $('#cartQtyMobile').text(response.cartQtyMobile);

                var miniCartRelated = "";
                var serialNumber = 1;

                $.each(response.carts, function(key, value) {
                    miniCartRelated +=


                        `<ul style="list-style-type: circle !important;">
                          <li class="mb-2 d-flex align-items-center" style="border-bottom: 1px solid #eee;border-top: 1px solid #eee;">
                            <span class="pr-2">${serialNumber++}.</span>
                            <input type="text" class="form-control form-control-sm accesories-title" placeholder="${value.name.length > 16 ? value.name.substring(0, 16) + '' : value.name}">
                            <input type="text" class="form-control form-control-sm accesories-qty" placeholder="x ${value.qty}">
                            <input type="text" class="form-control form-control-sm accesories-amount" placeholder="$ ${value.price * value.qty}">
                            <div class="accesories-remove">
                                <a type="submit" style="cursor:pointer" class="" id="${value.rowId}" onclick="miniCartRelatedRemove(this.id)">

                                   <i class="fa-solid fa-close text-danger"></i>

                                  </a>
                        </div>
                          </li>
                        </ul>
                        `
                });

                $('#miniCartRelated').html(miniCartRelated);

            }

        })
    }
    miniCartRelated();
</script>
{{-- Mini Cart Related --}}

{{-- MiNi Cart Related Increase --}}
<script>
    function miniCartRelatedIncrease(rowId) {
        $.ajax({

            type: 'GET',
            dataType: 'json',

            url: '/mini-cart/increase/' + rowId,

            success: function(data) {

                miniCartRelated();

                // Start Message

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        title: data.success,
                    })

                } else {

                    Toast.fire({
                        type: 'error',
                        title: data.error,
                    })
                }

                // End Message

            }

        })
    }
</script>
{{-- MiNi Cart Related Increase  --}}

{{-- MiNi Cart Related Decrease --}}
<script>
    function miniCartRelatedDecrease(rowId) {
        $.ajax({

            type: 'GET',
            dataType: 'json',

            url: '/mini-cart/decrease/' + rowId,

            success: function(data) {

                miniCartRelated();

                // Start Message

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        title: data.success,
                    })

                } else {

                    Toast.fire({
                        type: 'error',
                        title: data.error,
                    })
                }

                // End Message

            }

        })
    }
</script>
{{-- MiNi Cart Related Decrease  --}}

{{-- Mini Cart Related Remove --}}
<script>
    function miniCartRelatedRemove(rowId) {
        $.ajax({

            type: 'GET',
            dataType: 'json',

            url: '/minicart-related-remove/' + rowId,

            success: function(data) {

                miniCartRelated();

                // Start Message

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        title: data.success,
                    })

                } else {

                    Toast.fire({
                        type: 'error',
                        title: data.error,
                    })
                }

                // End Message
            }

        })
    }
</script>
{{-- MinI Cart Related remove --}}


{{-- MiNi Cart Remove --}}
<script>
    function miniCartRemove(rowId) {
        $.ajax({
            type: 'GET',
            url: '/minicart/product/remove/' + rowId,
            dataType: 'json',
            success: function(data) {
                miniCart();
                //miniCartRelated();
                addToCartOneRelated();
                // Start Message

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        title: data.success,
                    })

                } else {

                    Toast.fire({
                        type: 'error',
                        title: data.error,
                    })
                }

                // End Message

            }


        })
    }
</script>

<!--  Start Load MY Cart // -->
<script type="text/javascript">
    function cart() {
        $.ajax({
            type: 'GET',
            url: '/get-cart-product',
            dataType: 'json',
            success: function(response) {
                // console.log(response)

                $('span[id="cartSubTotal"]').text(response.cartTotal);
                $('#cartTotal').text(response.cartTotal);

                var rows = "";

                if (response.carts.length === 0) {

                    $('#cartQty').closest('li').hide();

                    // Cart is empty
                    rows += `<tr><td colspan="7" class="text-center">Cart is empty</td></tr>`;
                } else {

                    $('#cartQty').closest('li').show();

                    var serialNumber = 1;

                    $.each(response.carts, function($, value) {
                        rows +=
                            `<tr class="border-bottom">
                                <td>${serialNumber++}</td>
                                <td>
                                    <div>
                                        <img class="img-fluid"
                                            src="/${value.options.image}"
                                            alt="" style="width:100%;height:60px;" />
                                    </div>
                                </td>
                                <td>${value.name}</td>
                                <td>$${value.price}</td>
                                <td>
                                    <div>
                                        <div class="mb-3 input-group">
                                            <a type="submit" id="${value.rowId}" onclick="cartDecrement(this.id)"
                                                class="p-0 border-0 shadow-none input-group-append decrementBtn"
                                                style="cursor: pointer">
                                                <span class="input-group-text">-</span>
                                            </a>
                                            <input  type="text"
                                                class="text-center form-control amountInput"
                                                aria-label="Amount (to the nearest dollar)"
                                                value="${value.qty}" min="1" />
                                            <a type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)"
                                                class="p-0 border-0 shadow-none input-group-prepend incrementBtn"
                                                style="cursor: pointer">
                                                <span class="input-group-text">+</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>$${value.subtotal}</td>
                                <td class="text-center">
                                    <div>
                                        <a type="submit" style="cursor: pointer" id="${value.rowId}" onclick="cartRemove(this.id)">
                                            <i class="fa fa-close text-danger delet-icons"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>`;
                    });
                }

                $('#cartPage').html(rows);
            }
        });
    }
    cart();
</script>

{{-- Remove Load Cart --}}
<script>
    function cartRemove(id) {
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: "/cart-remove/" + id,

            success: function(data) {

                cart();
                miniCart();
                // couponCalculation();
                // Start Message

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                    })

                } else {

                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }

                // End Message


            }
        })
    }
</script>

{{-- // Cart INCREMENT --}}
<script>
    // Cart INCREMENT
    function cartIncrement(rowId) {
        $.ajax({
            type: 'GET',
            url: "/cart-increment/" + rowId,
            dataType: 'json',
            success: function(data) {
                // couponCalculation();
                cart();
                miniCart();

            }
        });
    }

    function cartDecrement(rowId) {
        $.ajax({
            type: 'GET',
            url: "/cart-decrement/" + rowId,
            dataType: 'json',
            success: function(data) {
                // couponCalculation();
                cart();
                miniCart();

            }
        });
    }
    // Cart Decrement End
</script>


<script>
    $(document).ready(function() {
        var submitIcon = $('.searchbox-icon');
        var inputBox = $('.searchbox-input');
        var searchBox = $('.searchbox');
        var isOpen = false;
        submitIcon.click(function() {
            if (isOpen == false) {
                searchBox.addClass('searchbox-open');
                inputBox.focus();
                isOpen = true;
            } else {
                searchBox.removeClass('searchbox-open');
                inputBox.focusout();
                isOpen = false;
            }
        });
        submitIcon.mouseup(function() {
            return false;
        });
        searchBox.mouseup(function() {
            return false;
        });
        $(document).mouseup(function() {
            if (isOpen == true) {
                $('.searchbox-icon').css('display', 'block');
                submitIcon.click();
            }
        });
    });

    function buttonUp() {
        var inputVal = $('.searchbox-input').val();
        inputVal = $.trim(inputVal).length;
        if (inputVal !== 0) {
            $('.searchbox-icon').css('display', 'none');
        } else {
            $('.searchbox-input').val('');
            $('.searchbox-icon').css('display', 'block');
        }
    }
</script>




<script>
    const header = document.querySelector(".page-header");
    const toggleClass = "is-sticky";

    window.addEventListener("scroll", () => {
        const currentScroll = window.pageYOffset;
        if (currentScroll > 150) {
            header.classList.add(toggleClass);
        } else {
            header.classList.remove(toggleClass);
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const qtyInput = document.getElementById('dqty');
        const increaseBtn = document.getElementById('increase');
        const decreaseBtn = document.getElementById('decrease');

        increaseBtn.addEventListener('click', () => {
            qtyInput.value = parseInt(qtyInput.value) + 1;
        });

        decreaseBtn.addEventListener('click', () => {
            if (qtyInput.value > 1) {
                qtyInput.value = parseInt(qtyInput.value) - 1;
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const qtyInput = document.getElementById('dqtyAccesories');
        const increaseBtn = document.getElementById('increaseAccesories');
        const decreaseBtn = document.getElementById('decreaseAccesories');

        increaseBtn.addEventListener('click', () => {
            qtyInput.value = parseInt(qtyInput.value) + 1;
        });

        decreaseBtn.addEventListener('click', () => {
            if (qtyInput.value > 1) {
                qtyInput.value = parseInt(qtyInput.value) - 1;
            }
        });
    });
</script>

{{-- =================================== --}}
{{-- <script>
    $(document).ready(function() {
        // Initialize accordion
        $('.card-header').each(function() {
            if ($(this).hasClass('mark-cat')) {
                $(this).addClass('collapsed').next().collapse('show');
            } else {
                $(this).addClass('collapsed').next().collapse('hide');
            }
            if ($(this).hasClass('mark-sub-cat')) {
                $(this).addClass('collapsed').next().collapse('show');
            } else {
                $(this).addClass('collapsed').next().collapse('hide');
            }

            if ($(this).hasClass('marks')) {
                $(this).addClass('collapsed').next().collapse('show');
            } else {
                $(this).addClass('collapsed').next().collapse('hide');
            }
        });

        // Handle click events to toggle accordion
        $('.category-filter, .card-header').click(function() {
            $(this).toggleClass('collapsed').next().collapse('toggle');
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.childcategory-link').click(function() {
            // Remove "marks" class from all links
            $('.childcategory-link').removeClass('marks');
            // Add "marks" class to the clicked link
            $(this).addClass('marks');
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Listen for change event on checkbox
        $('#defaultCheck1').change(function() {
            // Check if checkbox is checked
            if ($(this).is(':checked')) {
                // If checked, hide the on-check-show div
                $('.on-check-show').hide();
            } else {
                // If not checked, show the on-check-show div
                $('.on-check-show').show();
            }
        });
    });
</script> --}}

{{-- Change Mark Cat   --}}
<script>
    $(document).ready(function() {
        // Initialize accordion on page load
        function initializeAccordion() {
            // Loop through each card header to set the collapse behavior
            $('.card-header').each(function() {
                const isCategoryMarked = $(this).hasClass('mark-cat');
                const isSubCategoryMarked = $(this).hasClass('mark-sub-cat');
                const isChildCategoryMarked = $(this).hasClass('marks');

                // Control Category collapse state
                if (isCategoryMarked) {
                    $(this).next('.collapse').collapse('show'); // Show the category
                } else {
                    $(this).next('.collapse').collapse('hide'); // Hide the category
                }

                // Control Subcategory collapse state
                if (isSubCategoryMarked) {
                    $(this).next('.collapse').collapse('show'); // Show the subcategory
                } else {
                    $(this).next('.collapse').collapse('hide'); // Hide the subcategory
                }

                // Control Childcategory collapse state
                if (isChildCategoryMarked) {
                    $(this).next('.collapse').collapse('show'); // Show the childcategory
                } else {
                    $(this).next('.collapse').collapse('hide'); // Hide the childcategory
                }
            });
        }

        // Initialize accordion once page is loaded
        initializeAccordion();

        // Handle click events to toggle accordion
        $('.category-filter, .card-header').click(function() {
            // Toggling collapse for the clicked section
            $(this).toggleClass('collapsed').next('.collapse').collapse('toggle');
        });

        // Update the 'marks' class on childcategory-link click
        $('.childcategory-link').click(function() {
            // Remove "marks" class from all links
            $('.childcategory-link').removeClass('marks');
            // Add "marks" class to the clicked link
            $(this).addClass('marks');
        });

        // Handle checkbox change event for hiding/showing elements
        $('#defaultCheck1').change(function() {
            if ($(this).is(':checked')) {
                $('.on-check-show').hide();
            } else {
                $('.on-check-show').show();
            }
        });
    });
</script>

{{-- =================================================== --}}

<script>
    $(window).load(function() {
        $(".loader").fadeOut(3000);
    });
</script>
{{-- <script>
    $(document).ready(function() {
        var lastScrollTop = 0;
        var navbar = $('.sticky-navbar');

        $(window).scroll(function() {
            var currentScrollTop = $(this).scrollTop();

            if (currentScrollTop > lastScrollTop) {
                // Scroll down
                navbar.addClass('navbar-scrolled');
            } else {
                // Scroll up
                if (currentScrollTop === 0) {
                    navbar.removeClass('navbar-scrolled');
                }
            }

            lastScrollTop = currentScrollTop;
        });
    });
</script> --}}
<script>
    $(document).ready(function() {
        var lastScrollTop = 0;
        var navbar = $('.sticky-navbar');

        $(window).scroll(function() {
            var currentScrollTop = $(this).scrollTop();

            if (currentScrollTop > lastScrollTop) {
                // Scroll down
                navbar.addClass('navbar-scrolled');
            } else {
                // Scroll up
                if (currentScrollTop === 0) {
                    navbar.removeClass('navbar-scrolled');
                }
            }

            lastScrollTop = currentScrollTop;
        });

        // Prevent dropdown menu from closing when clicking inside
        $('.dropdown-menu').click(function(e) {
            e.stopPropagation();
        });

        // Close dropdown menu when clicking outside
        $(document).click(function() {
            $('.dropdown-menu').removeClass('show');
        });
    });
</script>

<script>
    document.getElementById('userIcon').addEventListener('click', function() {
        this.querySelector('i').classList.toggle('icon-red');
    });
</script>
