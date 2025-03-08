<section class="product-banner">
    
    {{-- <p class="top-txt">
        {{ $homepage->background_image_title }}
    </p> --}}

    <div class="swiper-container">

        <ul class="swiper-wrapper pe-0">

            @if (!empty($homepage->image_slider_one_image))
                <li class="swiper-slide">

                    <div class="bg"
                        style="background-image: url('{{ asset('upload/home/' . $homepage->image_slider_one_image) }}');">
                    </div>

                    <div class="inner" data-swiper-parallax="-100%">
                        <div class="flex-center">
                            <div>
                                <p class="txt1">{{ $homepage->image_slider_one_header }}</p>
                                <p class="txt2">{{ $homepage->image_slider_one_badge }}</p>
                                <p class="txt3">
                                    {{ $homepage->image_slider_one_description }}
                                </p>
                                <a href="{{ $homepage->image_slider_one_button_link }}" target="blank"
                                    class="btn-line-ty1">
                                    <span>{{ $homepage->image_slider_one_button_name }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            @endif

            @if (!empty($homepage->image_slider_two_image))
                <li class="swiper-slide">

                    <div class="bg"
                        style="background-image: url('{{ asset('upload/home/' . $homepage->image_slider_two_image) }}');">
                    </div>

                    <div class="inner" data-swiper-parallax="-100%">
                        <div class="flex-center">
                            <div>
                                <p class="txt1">{{ $homepage->image_slider_two_header }}</p>
                                <p class="txt2">{{ $homepage->image_slider_two_badge }}</p>
                                <p class="txt3">
                                    {{ $homepage->image_slider_two_description }}
                                </p>
                                <a href="{{ $homepage->image_slider_two_button_link }}" target="blank"
                                    class="btn-line-ty1">
                                    <span>{{ $homepage->image_slider_two_button_name }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            @endif

            @if (!empty($homepage->image_slider_three_image))
                <li class="swiper-slide">

                    <div class="bg"
                        style="background-image: url('{{ asset('upload/home/' . $homepage->image_slider_three_image) }}');">
                    </div>

                    <div class="inner" data-swiper-parallax="-100%">
                        <div class="flex-center">
                            <div>
                                <p class="txt1">{{ $homepage->image_slider_three_header }}</p>
                                <p class="txt2">{{ $homepage->image_slider_three_badge }}</p>
                                <p class="txt3">
                                    {{ $homepage->image_slider_three_description }}
                                </p>
                                <a href="{{ $homepage->image_slider_three_button_link }}" target="blank"
                                    class="btn-line-ty1">
                                    <span>{{ $homepage->image_slider_three_button_name }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            @endif


        </ul>

        <div class="swiper-button-prev">
            <span class="prev-info"></span>
        </div>
        <div class="swiper-button-next">
            <span class="next-info"></span>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-progress-bar">
            <div class="progress"></div>
        </div>
    </div>
</section>
