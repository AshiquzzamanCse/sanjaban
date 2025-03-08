@extends('frontend.astell.frontend_dashboard_astell')
@section('index_astell')
    <main class="sub">

        <section class="lnb">
            <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
                <ul class="swiper-wrapper" style="transition-duration: 0ms;transform: translate3d(0.282px, 0px, 0px);">

                    <li class="swiper-slide swiper-slide-active">
                        <a href="javascript:;" class="on">All Product</a>
                    </li>

                    @php
                        use App\Models\Admin\Category;
                        $categories = Category::where('status', '1')->inRandomOrder()->limit(5)->get();
                    @endphp


                    @forelse ($categories as $category)
                        <li class="swiper-slide swiper-slide-next">
                            <a
                                href="{{ url('product/category-dadabhaai/' . $category->id . '/' . $category->category_slug) }}">{{ $category->category_name }}</a>
                        </li>
                    @empty
                        <p>No Category Avaiable</p>
                    @endforelse

                </ul>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </section>

        <section class="sub-visual scrollAniTop view">

            <div class="bg" style="background-image: url('{{ asset('img/all-product.png') }}');">
            </div>

        </section>

        <section class="list-ty1">

            <ul>

                @php

                    $products = App\Models\Admin\Product::where('status', '1')
                        ->orderBy('product_name', 'ASC')
                        ->paginate(8);

                @endphp

                @forelse ($products as $product)
                    <li class="scrollAni n2 view">

                        <ul class="img-area">
                            <li class="on" data-num="n1"
                                style="background-color: white;display: flex;justify-content: center;align-items: center;">
                                <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}" />
                            </li>
                        </ul>

                        <div class="txt-area">
                            <em>{{ $product->brand->brand_name }}</em>
                            <strong>{{ $product->product_name }}</strong>
                            <ul class="color-dot"></ul>
                            {{-- <p>
                                {!! $product->short_desc !!}
                            </p> --}}
                            <p>
                                Dadavaai Frontend is a lightweight e-commerce solution built with Bootstrap, jQuery, and
                                other technologies. This project offers a responsive and visually appealing user interface
                                for seamless online shopping.
                            </p>
                            <a href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}"
                                class="lnk-ty1">Discover Product</a>
                        </div>
                    </li>
                @empty
                    <p>No Product Avaiable</p>
                @endforelse


                <div class="row mt-5 mb-5 mobile-row">
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
