@php
    $offer_cats = App\Models\Admin\OfferCategory::with('offer')
        ->whereHas('offer')
        ->where('status', '1')
        ->limit(4)
        ->latest()
        ->get();
@endphp

{{-- @php
    use Carbon\Carbon;
    use App\Models\Admin\OfferCategory;

    $offer_cats = OfferCategory::with(['offer' => function ($query) {
            $query->where('end_date', '>', Carbon::now());
        }])
        ->where('status', '1')
        ->limit(4)
        ->latest()
        ->get();
@endphp --}}

@if (count($offer_cats) > 0)
    <div class="offer-deals">
        <div class="offer--deals__main offer-deals--bg py-30"
            data-background="{{ asset('frontend/template_one/assets/img/bg/offer_banner.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="offer--deals__tabs">

                            <div class="tab-content" id="myTabContent">


                                @foreach ($offer_cats as $key => $offer_cat)
                                    @if (!empty($offer_cat->offer))
                                        <div class="tab-pane fade show {{ $key == 0 ? 'active' : '' }}"
                                            id="cat-tab-{{ $offer_cat->id }}" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <div class="row align-items-center">
                                                <div class="col-xl-4 col-lg-4">

                                                    <h2>{{ $offer_cat->offer_category_name }}</h2>
                                                    <h6 class="mb-3">{{ $offer_cat->offer->name }}</h6>

                                                    <p>Hurry Up Before Offer Will End</p>

                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <img class="img-fluid w-100"
                                                        src="{{ asset('storage/offer_image/' . $offer_cat->offer->offer_image) }}"
                                                        onerror="this.onerror=null; this.src='{{ asset('img/no-img.jpg') }}';"
                                                        alt="Offer Image" >

                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <div class="offer--deals__products mb-30 mt-30">

                                                        <div class="products--deals__content mb-35">
                                                            <h6 class="f-700 mb-20">
                                                                <a href="javascript:void(0)"
                                                                    id="opname">{{ $offer_cat->offer->products->product_name }}</a>
                                                            </h6>

                                                            <span>$ </span><span
                                                                class="price-old">{{ $offer_cat->offer->price }}</span>

                                                            <span class="f-600 grenadier-color">$<span
                                                                    class="price-new f-600 grenadier-color"
                                                                    id="">{{ $offer_cat->offer->discount_price }}</span></span>

                                                            {{-- <input type="hidden" class="mb-0  border-1" name=""
                                                                value="{{ $offer_cat->offer->discount_price }}"
                                                                min="1" id="opprice" style="width: 50px" />

                                                            <input type="hidden" class="mb-0  border-1" name=""
                                                                value="1" min="1" id="oqty"
                                                                style="width: 50px" /> --}}

                                                        </div>
                                                        <div class="product-countdown mb-15">
                                                            <div class="time-count-deal">
                                                                <div class="countdown-list"
                                                                    data-countdown="{{ $offer_cat->offer->end_date }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- <input type="hidden" id="offerproduct_id"
                                                            value="{{ $offer_cat->offer->id }}"> --}}

                                                        <div class="product--footer__deals">

                                                            @if ($offer_cat->offer->end_date >= Carbon\Carbon::now())
                                                                <a type="submit" style="cursor:pointer;"
                                                                    data-product_id="{{ $offer_cat->offer->products->id }}"
                                                                    data-discount_price="{{ $offer_cat->offer->discount_price }}"
                                                                    class="add-link f-700 add_to_offer_btn">+ Add
                                                                    To Cart</a>
                                                            @else
                                                                <p class="add-link f-700 add_to_offer_btn">Offer Ended
                                                                </p>
                                                            @endif

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offer--deals__menu">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="deals--nav__menu">
                            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">


                                @foreach ($offer_cats as $key => $offer_cat)
                                    @if (!empty($offer_cat->offer))
                                        <li class="nav-item">
                                            <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="cat-tab-one-tab"
                                                data-toggle="tab" href="#cat-tab-{{ $offer_cat->id }}" role="tab"
                                                aria-controls="cat-tab-one"
                                                aria-selected="true">{{ $offer_cat->offer_category_name }}</a>
                                        </li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
@endif
