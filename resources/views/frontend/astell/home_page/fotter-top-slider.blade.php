<style>
    .swiper-button-prev,
    .swiper-container-rtl .swiper-button-next {
        background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M0,22L22,0l2.1,2.1L4.2,22l19.9,19.9L22,44L0,22L0,22L0,22z' fill='%23ffffff'%3E%3C/path%3E%3C/svg%3E");
        background-color: #ff0000;
        /* Set background color to white */
        left: 10px;
        right: auto;
    }

    .swiper-button-next {
        background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M27,22L5,44l-2.1-2.1L22.8,22L2.9,2.1L5,0L27,22L27,22L27,22z' fill='%23ffffff'%3E%3C/path%3E%3C/svg%3E");
        background-color: #ff0000;
        /* Set background color to white */
        right: 10px;
        left: auto;
    }
</style>
<section class="experience">
    <div class="swiper-container footer-swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            @if (!empty($homepage->background_image_one_image))
                <div class="swiper-slide">
                    <img class="img-fluid" src="{{ asset('upload/home/' . $homepage->background_image_one_image) }}"
                        alt="">
                </div>
            @endif

            @if (!empty($homepage->background_image_two_image))
                <div class="swiper-slide">
                    <img class="img-fluid" src="{{ asset('upload/home/' . $homepage->background_image_two_image) }}"
                        alt="">
                </div>
            @endif

            @if (!empty($homepage->background_image_three_image))
                <div class="swiper-slide">
                    <img class="img-fluid" src="{{ asset('upload/home/' . $homepage->background_image_three_image) }}"
                        alt="">
                </div>
            @endif
        </div>
        <div class="swiper-page-group">
            <div class="swiper-button-next">
            </div>

            <div class="swiper-button-prev">
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <h2>IMAGINE<br> YOUR OWN LIFE</h2>
</section>

@push('scripts')
    {{-- <script>
        $(document).ready(function() {
            // Swiper: Slider
            new Swiper('.footer-swiper', {
                loop: true,
                autoplay: {
                    delay: 3000, // Adjust the delay as needed (3000ms = 3 seconds)
                    disableOnInteraction: false, // Autoplay will not be disabled after user interactions
                },
                navigation: {
                    nextEl: '.swiper-button-next-main',
                    prevEl: '.swiper-button-prev-main',
                },
                slidesPerView: 1,
                paginationClickable: true,
                spaceBetween: 20,
                breakpoints: {
                    1920: {
                        slidesPerView: 1,
                        spaceBetween: 30
                    },
                    1028: {
                        slidesPerView: 2,
                        spaceBetween: 30
                    },
                    480: {
                        slidesPerView: 1,
                        spaceBetween: 10
                    }
                }
            });
        });
    </script> --}}
@endpush
