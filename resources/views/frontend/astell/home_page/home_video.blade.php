@if (
    !empty($homepage->video_slider_one_video) ||
        !empty($homepage->video_slider_one_image) ||
        !empty($homepage->video_slider_two_video) ||
        !empty($homepage->video_slider_two_image))
    <section class="key-visual">
        <div class="swiper-container">
            <ul class="swiper-wrapper ps-0 border-0 ms-0">
                <li class="swiper-slide" data-slide-type="vdo">
                    @if (!empty($homepage->video_slider_one_video))
                        <video class="video-js" muted controls autoplay playsinline>
                            <source src="{{ asset('upload/home/' . $homepage->video_slider_one_video) }}"
                                type="video/mp4" />
                        </video>
                    @else
                        <img src="{{ asset('upload/home/' . $homepage->video_slider_one_image) }}" alt="">
                    @endif
                    <div class="txt">
                        <strong style="color: #ffffff">{{ $homepage->video_slider_one_title }}</strong>
                        <p style="color: #ffffff">{{ $homepage->video_slider_one_sub_title }}</p>
                    </div>
                </li>
                <li class="swiper-slide" data-slide-type="vdo">
                    @if (!empty($homepage->video_slider_two_video))
                        <video class="video-js" muted controls autoplay playsinline>
                            <source src="{{ asset('upload/home/' . $homepage->video_slider_two_video) }}"
                                type="video/mp4" />
                        </video>
                    @else
                        <img src="{{ asset('upload/home/' . $homepage->video_slider_two_image) }}" alt="">
                    @endif
                    <div class="txt">
                        <strong style="color: #ffffff">{{ $homepage->video_slider_two_title }}</strong>
                        <p style="color: #ffffff">{{ $homepage->video_slider_two_sub_title }}</p>
                    </div>
                </li>
            </ul>
            <div class="swiper-pagination"></div>
            <div class="swiper-progress-bar">
                <div class="progress"></div>
            </div>
        </div>
    </section>
@endif
