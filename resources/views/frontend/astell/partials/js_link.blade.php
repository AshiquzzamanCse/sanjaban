<!--popUp//-->
<div id="indexPopLayer" class="popup sm-ty" style="display: none">
    <div class="pop-overlay"></div>
</div>

<iframe name="iframe4dummy" src="#" width="0" height="0" frameborder="0" style="display: none"></iframe>

<script src="{{ asset('frontend/astell/assets/js/jquery-3.5.1.js') }}"></script>
{{-- <script src="https://kit.fontawesome.com/69b7156a94.js" crossorigin="anonymous"></script> --}}
<script src="{{ asset('frontend/assets/js/font-awesome.js') }}"></script>
<script src="{{ asset('frontend/astell/assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('frontend/astell/assets/js/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('frontend/astell/assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('frontend/astell/assets/js/jquery.mCustomScrollbar.min.js') }}"></script>
<script src="{{ asset('frontend/astell/assets/js/video.min.js') }}"></script>
<script src="{{ asset('frontend/astell/assets/js/common.js') }}"></script>

<script src="{{ asset('frontend/astell/assets/js/jquery/jquery.alphanumeric.js') }}"></script>
<script src="{{ asset('frontend/astell/assets/js/jquery/jquery.form.js') }}"></script>
<script src="{{ asset('frontend/astell/assets/js/jquery/jquery.placeholder.js') }}"></script>
<script src="{{ asset('frontend/astell/assets/js/jquery/jquery.tmpl.js') }}"></script>
<script src="{{ asset('frontend/astell/assets/js/jquery/jquery.blockUI.js') }}"></script>
<script src="{{ asset('frontend/astell/assets/js/kimsoft/kimsoft.js') }}"></script>
<script src="{{ asset('frontend/astell/assets/js/common.dev.js') }}"></script>



@stack('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
</script>

{{-- ================= Product Cart Start ======================== --}}

<script>
    $('.add_to_cart_btn_product_astell').click(function() {

        var product_id = $(this).data('product_id');
        //var qty = $(this).closest('.d-flex').find('.qty-input').val();

        $.ajax({

            type: "POST",
            dataType: 'json',
            url: '/product-store-cart-product',

            data: {
                product_id: product_id,
                // qty: qty,
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

                    //window.location.href = '/template.one.view.cart';

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

{{-- ================= Product Cart End ======================== --}}


<script>
    $(document).ready(function() {
        function dropdownList() {
            $('.dropdown-list .wrap > ul > li > a').off('click').on('click', function() {
                if ($(this).hasClass('on')) {
                    $(this).removeClass('on');
                    $(this).closest('li').find('.cont').stop().slideUp(200);
                } else {
                    $(this).addClass('on');
                    $(this).closest('li').find('.cont').stop().slideDown(200);
                }
            });
        }

        dropdownList(); // Initialize the dropdown list
    });
</script>
{{-- add_to_cart_btn_product --}}
