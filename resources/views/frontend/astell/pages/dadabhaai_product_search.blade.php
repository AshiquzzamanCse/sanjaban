@extends('frontend.astell.frontend_dashboard_astell')
@section('index_astell')
    <main class="sub">
        <section class="sub-visual scrollAniTop view">
            <div class="bg" style="background-image: url('{{ asset('img/search.jpg') }}');">
            </div>
        </section>
        <section class="list-ty1" style="padding-top: 100px;">
            <ul>
                @forelse ($products as $product)
                    <li class="scrollAni n2 view">

                        <ul class="img-area">
                            <li class="on" data-num="n1">
                                <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}" />
                            </li>
                        </ul>

                        <div class="txt-area">
                            <em>{{ $product->brand->brand_name }}</em>
                            <strong>{{ $product->product_name }}</strong>
                            <ul class="color-dot"></ul>
                            <p>
                                {!! $product->short_desc !!}
                            </p>
                            <a href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}"
                                class="lnk-ty1">Discover Product</a>
                        </div>
                    </li>
                @empty
                    <p>No Product Avaiable</p>
                @endforelse
                <div class="mt-5 mb-5 row mobile-row">
                    <div class="col-12 d-flex justify-content-center">
                        <div class="common-pagination">
                            {{ $products->links('vendor.pagination.template_one') }}
                        </div>
                    </div>
                </div>
            </ul>
        </section>
    </main>
@endsection
