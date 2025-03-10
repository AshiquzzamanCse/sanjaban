@php
    $offercats = App\Models\Admin\OfferCategory::where('status', '1')->inRandomOrder()->limit(2)->get();
@endphp
@if (count($offercats) > 0)
    <div class="product pt-60 fix category-banner-product">
        <div class="container">
            <div class="row">
                @foreach ($offercats as $offercat)
                    <div class="col-lg-6">
                        <a href=""
                           title="">



                            <div class="offer-banner offer--banner__bg mb-30">
                                <img class="offer-banner-img img-fluid" src=""
                                     alt="" />

                            </div>

                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
