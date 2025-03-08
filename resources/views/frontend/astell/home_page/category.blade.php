<style>
    @media (max-width: 768px) {
        .tab-ty ul {
            list-style: none;
            border: none;
        }

        .tab-ty ul li {
            border: none;
            /* Ensure no border is applied */
        }

        /* Target mobile devices */
        .tab-ty {
            width: 100%;
            overflow-x: auto;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: 2px;
        }

        /* .tab-ty::-webkit-scrollbar {
            display: none;
        } */

        .tab-ty ul {
            display: flex;
            flex-wrap: nowrap;
            gap: 0px;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .tab-ty ul li {
            display: inline-block;
            min-width: 100px;
            border-radius: 5px;
            text-align: center;
            flex-shrink: 0;
            /* Prevent items from shrinking */
        }
    }
</style>
<section class="product">
    <div class="tab-ty">
        <ul>

            @if (!empty($homepage->categoryHomeTabOne))
                @if (count(optional($homepage->categoryHomeTabOne)->subproducts) > 0)
                    <li>
                        <a href="javascript:void(0);"
                            class="n1 on">{{ optional($homepage->categoryHomeTabOne)->subcategory_name }}</a>
                    </li>
                @endif
            @endif

            @if (!empty($homepage->categoryHomeTabTwo))
                @if (count(optional($homepage->categoryHomeTabTwo)->products) > 0)
                    <li>
                        <a href="javascript:void(0);"
                            class="n2">{{ optional($homepage->categoryHomeTabTwo)->category_name }}</a>
                    </li>
                @endif
            @endif
            @if (!empty($homepage->categoryHomeTabOne))
                @if (count(optional($homepage->categoryHomeTabThree)->products) > 0)
                    <li>
                        <a href="javascript:void(0);"
                            class="n3">{{ optional($homepage->categoryHomeTabThree)->category_name }}</a>
                    </li>
                @endif
            @endif
            @if (!empty($homepage->categoryHomeTabFour))
                @if (count(optional($homepage->categoryHomeTabFour)->products) > 0)
                    <li>
                        <a href="javascript:void(0);"
                            class="n4">{{ optional($homepage->categoryHomeTabFour)->category_name }}</a>
                    </li>
                @endif
            @endif
        </ul>
    </div>

    {{-- First Category Start  --}}
    @if (!empty($homepage->categoryHomeTabOne))
        @if (count(optional($homepage->categoryHomeTabOne)->subproducts) > 0)
            <div class="tab-cont n1 on" style="background-image: url('images/%40p_bg01.png')">
                <div class="wrap">

                    <div class="wl">

                        <div class="swiper-container">

                            <ul class="swiper-wrapper">
                                @foreach (optional($homepage->categoryHomeTabOne)->subproducts as $category_product_one)
                                    <li class="swiper-slide main-img-ctg">

                                        <a
                                            href="{{ url('product' . '/' . $category_product_one->id . '/' . $category_product_one->product_slug) }}">

                                            <img src="{{ asset($category_product_one->product_image) }}"
                                                style="width:500px;" alt="{{ $category_product_one->product_name }}" />
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>

                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>

                    </div>

                    <div class="wr">

                        @foreach (optional($homepage->categoryHomeTabOne)->subproducts as $key => $category_product_one)
                            <strong class="tmpProductInfo tmpProductInfo_{{ $key }}"
                                style="{{ $key == '0' ? '' : 'display:none;' }}">{{ $category_product_one->product_name }}</strong>

                            <p class="tmpProductInfo tmpProductInfo_{{ $key }}"
                                style="{{ $key == '0' ? '' : 'display:none;' }}">
                                {!! Str::limit(strip_tags($category_product_one->short_desc), 390) !!}
                            </p>

                            <div class="btn-group tmpProductInfo tmpProductInfo_{{ $key }}"
                                style="{{ $key == '0' ? '' : 'display:none;' }}">

                                <a href="{{ url('product' . '/' . $category_product_one->id . '/' . $category_product_one->product_slug) }}"
                                    class="lnk-ty1">Details</a>

                            </div>
                        @endforeach


                        <div class="list">
                            <div class="swiper-container">
                                <ul class="swiper-wrapper">
                                    @foreach (optional($homepage->categoryHomeTabOne)->subproducts as $key => $category_product_one)
                                        <li class="swiper-slide thumbnail-img-ctg">
                                            <a href="javascript:void(0)" class="active">
                                                <img src="{{ asset($category_product_one->product_image) }}"
                                                    alt="{{ $category_product_one->product_name }}" />
                                                <span
                                                    title="{{ $category_product_one->product_name }}">{{ Str::limit(strip_tags($category_product_one->product_name), 18) }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="swiper-slider"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
    {{-- First Category End  --}}

    {{-- 2nd Category Start  --}}
    @if (!empty($homepage->categoryHomeTabTwo))
        @if (count(optional($homepage->categoryHomeTabTwo)->products) > 0)
            <div class="tab-cont n2" style="background-image: url('images/%40p_bg01.png')">
                <div class="wrap">

                    <div class="wl">

                        <div class="swiper-container">

                            <ul class="swiper-wrapper">
                                @foreach (optional($homepage->categoryHomeTabTwo)->products as $category_product_two)
                                    <li class="swiper-slide main-img-ctg">
                                        <a
                                            href="{{ url('product' . '/' . $category_product_two->id . '/' . $category_product_two->product_slug) }}">
                                            <img src="{{ asset($category_product_two->product_image) }}"
                                                style="width:500px;" alt="{{ $category_product_two->product_name }}" />
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>

                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>

                    </div>

                    <div class="wr">
                        @foreach (optional($homepage->categoryHomeTabTwo)->products as $key => $category_product_two)
                            <strong class="tmpProductInfo tmpProductInfo_{{ $key }}"
                                style="{{ $key == '0' ? '' : 'display:none;' }}">{{ $category_product_two->product_name }}</strong>

                            <p class="tmpProductInfo tmpProductInfo_{{ $key }}"
                                style="{{ $key == '0' ? '' : 'display:none;' }}">
                                {!! Str::limit(strip_tags($category_product_two->short_desc), 390) !!}
                            </p>

                            <div class="btn-group tmpProductInfo tmpProductInfo_{{ $key }}"
                                style="{{ $key == '0' ? '' : 'display:none;' }}">
                                <a href="{{ url('product' . '/' . $category_product_two->id . '/' . $category_product_two->product_slug) }}"
                                    class="lnk-ty1">Details</a>
                            </div>
                        @endforeach


                        <div class="list">
                            <div class="swiper-container">
                                <ul class="swiper-wrapper">
                                    @foreach (optional($homepage->categoryHomeTabTwo)->products as $key => $category_product_two)
                                        <li class="swiper-slide thumbnail-img-ctg">
                                            <a href="javascript:void(0)" class="active">
                                                <img src="{{ asset($category_product_two->product_image) }}"
                                                    alt="{{ $category_product_two->product_name }}" />
                                                <span
                                                    title="{{ $category_product_two->product_name }}">{{ Str::limit(strip_tags($category_product_two->product_name), 18) }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="swiper-slider"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
    {{-- 2nd Category End  --}}

    {{-- 3rd Category Start  --}}
    @if (!empty($homepage->categoryHomeTabThree))
        @if (count(optional($homepage->categoryHomeTabThree)->products) > 0)
            <div class="tab-cont n3" style="background-image: url('images/%40p_bg01.png')">
                <div class="wrap">

                    <div class="wl">

                        <div class="swiper-container">

                            <ul class="swiper-wrapper">
                                @foreach (optional($homepage->categoryHomeTabThree)->products as $category_product_three)
                                    <li class="swiper-slide main-img-ctg">
                                        <a
                                            href="{{ url('product' . '/' . $category_product_three->id . '/' . $category_product_three->product_slug) }}">
                                            <img src="{{ asset($category_product_three->product_image) }}"
                                                style="width:500px;"
                                                alt="{{ $category_product_three->product_name }}" />
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>

                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>

                    </div>

                    <div class="wr">
                        @foreach (optional($homepage->categoryHomeTabThree)->products as $key => $category_product_three)
                            <strong class="tmpProductInfo tmpProductInfo_{{ $key }}"
                                style="{{ $key == '0' ? '' : 'display:none;' }}">{{ $category_product_three->product_name }}</strong>

                            <p class="tmpProductInfo tmpProductInfo_{{ $key }}"
                                style="{{ $key == '0' ? '' : 'display:none;' }}">
                                {!! Str::limit(strip_tags($category_product_three->short_desc), 390) !!}
                            </p>

                            <div class="btn-group tmpProductInfo tmpProductInfo_{{ $key }}"
                                style="{{ $key == '0' ? '' : 'display:none;' }}">
                                <a href="{{ url('product' . '/' . $category_product_three->id . '/' . $category_product_three->product_slug) }}"
                                    class="lnk-ty1">Details</a>
                            </div>
                        @endforeach


                        <div class="list">
                            <div class="swiper-container">
                                <ul class="swiper-wrapper">
                                    @foreach (optional($homepage->categoryHomeTabThree)->products as $key => $category_product_three)
                                        <li class="swiper-slide thumbnail-img-ctg">
                                            <a href="javascript:void(0)" class="active">
                                                <img src="{{ asset($category_product_three->product_image) }}"
                                                    alt="{{ $category_product_three->product_name }}" />
                                                <span
                                                    title="{{ $category_product_three->product_name }}">{{ Str::limit(strip_tags($category_product_three->product_name), 18) }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="swiper-slider"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
    {{-- 3rd Category End  --}}

    {{-- 4th Category Start  --}}
    @if (!empty($homepage->categoryHomeTabFour))
        @if (count(optional($homepage->categoryHomeTabFour)->products) > 0)
            <div class="tab-cont n4" style="background-image: url('images/%40p_bg01.png')">
                <div class="wrap">

                    <div class="wl">

                        <div class="swiper-container">

                            <ul class="swiper-wrapper">
                                @foreach (optional($homepage->categoryHomeTabFour)->products as $category_product_four)
                                    <li class="swiper-slide main-img-ctg">
                                        <a
                                            href="{{ url('product' . '/' . $category_product_four->id . '/' . $category_product_four->product_slug) }}">
                                            <img src="{{ asset($category_product_four->product_image) }}"
                                                style="width:500px;"
                                                alt="{{ $category_product_four->product_name }}" />
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>

                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>

                    </div>

                    <div class="wr">
                        @foreach (optional($homepage->categoryHomeTabFour)->products as $key => $category_product_four)
                            <strong class="tmpProductInfo tmpProductInfo_{{ $key }}"
                                style="{{ $key == '0' ? '' : 'display:none;' }}">{{ $category_product_four->product_name }}</strong>

                            <p class="tmpProductInfo tmpProductInfo_{{ $key }}"
                                style="{{ $key == '0' ? '' : 'display:none;' }}">
                                {!! Str::limit(strip_tags($category_product_four->short_desc), 390) !!}
                            </p>

                            <div class="btn-group tmpProductInfo tmpProductInfo_{{ $key }}"
                                style="{{ $key == '0' ? '' : 'display:none;' }}">
                                <a href="{{ url('product' . '/' . $category_product_four->id . '/' . $category_product_four->product_slug) }}"
                                    class="lnk-ty1">Details</a>
                            </div>
                        @endforeach


                        <div class="list">
                            <div class="swiper-container">
                                <ul class="swiper-wrapper">
                                    @foreach (optional($homepage->categoryHomeTabFour)->products as $key => $category_product_four)
                                        <li class="swiper-slide thumbnail-img-ctg">
                                            <a href="javascript:void(0)" class="active">
                                                <img src="{{ asset($category_product_four->product_image) }}"
                                                    alt="{{ $category_product_four->product_name }}" />
                                                <span
                                                    title="{{ $category_product_four->product_name }}">{{ Str::limit(strip_tags($category_product_four->product_name), 18) }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="swiper-slider"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
    {{-- $th Category End  --}}
    <script>
        const tabContainer = document.querySelector(".tab-ty");
        let isDown = false;
        let startX;
        let scrollLeft;

        tabContainer.addEventListener("mousedown", (e) => {
            isDown = true;
            startX = e.pageX - tabContainer.offsetLeft;
            scrollLeft = tabContainer.scrollLeft;
        });

        tabContainer.addEventListener("mouseleave", () => {
            isDown = false;
        });

        tabContainer.addEventListener("mouseup", () => {
            isDown = false;
        });

        tabContainer.addEventListener("mousemove", (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - tabContainer.offsetLeft;
            const walk = (x - startX) * 2; // Scroll speed multiplier
            tabContainer.scrollLeft = scrollLeft - walk;
        });
    </script>
</section>
