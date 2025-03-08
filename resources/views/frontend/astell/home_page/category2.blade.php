<section class="product">
    <div class="tab-ty">
        <ul>
            @foreach ($categories as $key => $category)
                <li>
                    <a href="javascript:void(0);" class="tab-link n{{ $key + 1 }} {{ $key == 0 ? 'on' : '' }}">
                        {{ $category->category_name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    @foreach ($categories as $key => $category)
    <div class="tab-cont n{{ $key + 1 }} {{ $key == 0 ? 'on' : '' }}" style="background-image:url('/images/@p_bg01.png')">
        <div class="wrap">
            <div class="wl">
                <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
                    <ul class="swiper-wrapper"
                        style="transition-duration: 0ms; transform: translate3d(-594px, 0px, 0px);">
                        <li class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="37"
                            style="width: 594px;">
                            <img src="https://cdn.astellnkern.com/product/202110/20211018113939_d8bf4fb6-6ab5-4b63-a91e-9a03f9762965.png"
                                alt="ak100.png">
                        </li>
                        <li class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 594px;">
                            <img src="https://cdn.astellnkern.com/product/202402/20240228134754_0c741f94-0d4a-4cac-aeca-6adc6c453636.png"
                                alt="SP3000T_list (1).png">
                        </li>
                        <li class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" style="width: 594px;">
                            <img src="https://cdn.astellnkern.com/product/202209/20220905141635_3d2f686c-ea69-4ab8-90bd-9aaeff9e727d.png"
                                alt="sp3000_list_1.png">
                        </li>
                        <li class="swiper-slide" data-swiper-slide-index="2" style="width: 594px;">
                            <img src="https://cdn.astellnkern.com/product/202110/20211025143709_378311f6-21cb-428d-ab9c-0cfd53627ed6.png"
                                alt="sp2000t_01.png">
                        </li>
                        <li class="swiper-slide" data-swiper-slide-index="3" style="width: 594px;">
                            <img src="https://cdn.astellnkern.com/product/202110/20211025142845_d7296e7a-41c5-4ec0-8812-606ccf9ce606.png"
                                alt="sp2000_g.png">
                        </li>
                        <li class="swiper-slide" data-swiper-slide-index="4" style="width: 594px;">
                            <img src="https://cdn.astellnkern.com/product/202110/20211025142438_54375b7b-339c-41e2-a17f-ce2a6b316c10.png"
                                alt="sp1000_b.png">
                        </li>
                        <li class="swiper-slide" data-swiper-slide-index="5" style="width: 594px;">
                            <img src="https://cdn.astellnkern.com/product/202110/20211025143503_1e8c375c-2d99-438c-a53a-2f0878ab31b9.png"
                                alt="sp1000m_blue.png">
                        </li>
                    </ul>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
                <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></div>
                <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></div>
            </div>
            {{--  --}}
            <div class="wr">
                <strong class="tmpProductInfo tmpProductInfo_0">SP3000T</strong>
                <p class="tmpProductInfo tmpProductInfo_0">A&amp;ultima SP3000T is a portable audio player that defies
                    convention, offering a unique fusion of analog and digital excellence.</p>
                <div class="btn-group tmpProductInfo tmpProductInfo_0">
                    <a href="/support/whereToBuy.jsp" class="lnk-ty1">Find store</a>
                    
                </div>
                {{--  --}}
                <strong class="tmpProductInfo tmpProductInfo_1" style="display:none">SP3000</strong>
                <p class="tmpProductInfo tmpProductInfo_1" style="display:none">The A&amp;ultima SP3000 is the
                    flagship product that is the essence of everything learned and engineered over the last 10+ years of
                    digital music processing.</p>
                <div class="btn-group tmpProductInfo tmpProductInfo_1" style="display:none">
                    <a href="/support/whereToBuy.jsp" class="lnk-ty1">Find store</a>
                    
                </div>
                {{--  --}}
                <strong class="tmpProductInfo tmpProductInfo_2" style="display:none">SP2000T</strong>
                <p class="tmpProductInfo tmpProductInfo_2" style="display:none">The SP2000T combines the OP AMP
                    configuration of our SP2000 with a nostalgic vacuum TUBE AMP, adding a vintage feel to the portable
                    player.</p>
                <div class="btn-group tmpProductInfo tmpProductInfo_2" style="display:none">
                    <a href="/support/whereToBuy.jsp" class="lnk-ty1">Find store</a>
                    
                </div>
                {{--  --}}
                <strong class="tmpProductInfo tmpProductInfo_3" style="display:none">SP2000</strong>
                <p class="tmpProductInfo tmpProductInfo_3" style="display:none">A&amp;ultima SP2000 is the third
                    player released in the A&amp;ultima lineup. A&amp;ultima SP2000 features newly developed audio
                    circuitry and amplifier design.</p>
                <div class="btn-group tmpProductInfo tmpProductInfo_3" style="display:none">
                    <a href="/support/whereToBuy.jsp" class="lnk-ty1">Find store</a>
                
                </div>
                {{--  --}}
                <strong class="tmpProductInfo tmpProductInfo_4" style="display:none">SP1000</strong>
                <p class="tmpProductInfo tmpProductInfo_4" style="display:none">The A&amp;ultima SP1000 is a
                    one-of-a-kind, high-end, powerful flagship high resolution music player equipped with the latest
                    advanced features.</p>
                <div class="btn-group tmpProductInfo tmpProductInfo_4" style="display:none">
                    <a href="/support/whereToBuy.jsp" class="lnk-ty1">Find store</a>
                    <div class="mark-group">
                        <img src="https://cdn.astellnkern.com/product/202109/20210928113750_c9d5e434-952c-41a6-a2c6-f0084b7b35e1.jpg"
                            alt="CES_2018.jpg">
                        <img src="https://cdn.astellnkern.com/product/202203/20220322112348_903710ea-d293-4837-b32c-2f6c6909b990.jpg"
                            alt="IF2018.jpg">
                        <img src="https://cdn.astellnkern.com/product/202203/20220322112348_6c299557-5ea9-43a8-a1c0-23b8fa78ca42.jpg"
                            alt="red-(1).jpg">
                    </div>
                </div>
                {{--  --}}
                <strong class="tmpProductInfo tmpProductInfo_5" style="display:none">SP1000M</strong>
                <p class="tmpProductInfo tmpProductInfo_5" style="display:none"> The A&amp;ultima SP1000M achieves
                    greater portability, without sacrificing the level of performance found in the original SP1000.</p>
                <div class="btn-group tmpProductInfo tmpProductInfo_5" style="display:none">
                    <a href="/support/whereToBuy.jsp" class="lnk-ty1">Find store</a>
                </div>
                {{--  --}}
                <strong class="tmpProductInfo tmpProductInfo_6" style="display:none">SP1000M
                    GOLD</strong>
                <p class="tmpProductInfo tmpProductInfo_6" style="display:none"> A&amp;ultima's second product,
                    SP1000M, which was born with no compromise as to sound, gave a new value to Gold.</p>
                <div class="btn-group tmpProductInfo tmpProductInfo_6" style="display:none">
                    <a href="/support/whereToBuy.jsp" class="lnk-ty1">Find store</a>
                    <div class="mark-group">
                    </div>
                </div>
                {{--  --}}
                <div class="list">
                    <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
                        <ul class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                            <li class="swiper-slide swiper-slide-active">
                                <a href="javascript:void(0);" class="active">
                                    <img src="https://cdn.astellnkern.com/product/202402/20240228134754_0c741f94-0d4a-4cac-aeca-6adc6c453636.png"
                                        alt="SP3000T_list (1).png">
                                    <span>SP3000T</span>
                                </a>
                            </li>
                            <li class="swiper-slide swiper-slide-next">
                                <a href="javascript:void(0);">
                                    <img src="https://cdn.astellnkern.com/product/202209/20220905141635_3d2f686c-ea69-4ab8-90bd-9aaeff9e727d.png"
                                        alt="sp3000_list_1.png">
                                    <span>SP3000</span>
                                </a>
                            </li>
                            <li class="swiper-slide">
                                <a href="javascript:void(0);">
                                    <img src="https://cdn.astellnkern.com/product/202110/20211025143709_378311f6-21cb-428d-ab9c-0cfd53627ed6.png"
                                        alt="sp2000t_01.png">
                                    <span>SP2000T</span>
                                </a>
                            </li>
                            <li class="swiper-slide">
                                <a href="javascript:void(0);">
                                    <img src="https://cdn.astellnkern.com/product/202110/20211025142845_d7296e7a-41c5-4ec0-8812-606ccf9ce606.png"
                                        alt="sp2000_g.png">
                                    <span>SP2000</span>
                                </a>
                            </li>
                            <li class="swiper-slide">
                                <a href="javascript:void(0);">
                                    <img src="https://cdn.astellnkern.com/product/202110/20211025142438_54375b7b-339c-41e2-a17f-ce2a6b316c10.png"
                                        alt="sp1000_b.png">
                                    <span>SP1000</span>
                                </a>
                            </li>
                            <li class="swiper-slide">
                                <a href="javascript:void(0);">
                                    <img src="https://cdn.astellnkern.com/product/202110/20211025143503_1e8c375c-2d99-438c-a53a-2f0878ab31b9.png"
                                        alt="sp1000m_blue.png">
                                    <span>SP1000M</span>
                                </a>
                            </li>
                            <li class="swiper-slide">
                                <a href="javascript:void(0);">
                                    <img src="https://cdn.astellnkern.com/product/202110/20211025143522_9b6459f3-dbb6-4e10-815f-dc17983c2782.png"
                                        alt="sp1000m_g.png">
                                    <span>SP1000M
                                        GOLD</span>
                                </a>
                            </li>
                        </ul>
                        <div class="swiper-pagination"></div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                    <div
                        class="swiper-slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                        <div class="ui-slider-range ui-corner-all ui-widget-header ui-slider-range-min"
                            style="width: 2.94118%;"></div><span tabindex="0"
                            class="ui-slider-handle ui-corner-all ui-state-default" style="left: 2.94118%;"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>

@push('scripts')
    <script>
        $(document).ready(function() {
            // Tab functionality
            document.querySelectorAll('.tab-ty ul li a').forEach(function(tab, index) {
                tab.addEventListener('click', function(event) {
                    event.preventDefault();

                    // Remove 'on' class from all tab links and tab contents
                    document.querySelectorAll('.tab-ty ul li a').forEach(function(el) {
                        el.classList.remove('on');
                    });
                    document.querySelectorAll('.tab-cont').forEach(function(el) {
                        el.classList.remove('on');
                    });

                    // Add 'on' class to clicked tab link and corresponding tab content
                    tab.classList.add('on');
                    document.querySelector('.tab-cont.n' + (index + 1)).classList.add('on');
                });
            });
        });
    </script>
@endpush
