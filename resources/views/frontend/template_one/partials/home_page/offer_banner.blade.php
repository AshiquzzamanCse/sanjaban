@php
    $offercats = App\Models\Admin\OfferCategory::where('status', '1')->inRandomOrder()->limit(2)->get();
@endphp
@if (count($offercats) > 0)
    <div class="product pt-60 fix category-banner-product">
        <div class="container">
            <div class="row">
                @foreach ($offercats as $offercat)
                    <div class="col-lg-6">
                        <a href="{{ route('offer-categorywise.product', $offercat->id) }}"
                           title="{{ $offercat->offer_category_name }}">

                            @php
                                $offerImage = !empty($offercat->offer_category_image)
                                    ? asset('storage/offer_category_image/' . $offercat->offer_category_image)
                                    : asset('img/search.jpg');
                            @endphp

                            <div class="offer-banner offer--banner__bg mb-30">
                                <img class="offer-banner-img img-fluid" src="{{ $offerImage }}"
                                     alt="{{ $offercat->offer_category_name }}"
                                     onerror="this.onerror=null; this.src='{{ asset('img/search.jpg') }}';" />
                                {{-- <div class="offer--banner__text">
                                    <span class="f-200 white-color">{{ $offercat->offer_category_name }}</span>
                                    <h4 class="mb-40 white-color f-900">55% Flate</h4>
                                    <a href="">View Collection<i class="icofont-long-arrow-right"></i></a>
                                </div> --}}
                            </div>

                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
