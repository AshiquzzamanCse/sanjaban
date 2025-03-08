@php
    $products = App\Models\Admin\Product::where('status', 1)->latest()->get();
@endphp

<div class="top__featured--area pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-2 slider-category">
                <div class="top__featured--title">
                    <span class="dusty__gray-color text-uppercase">Top Featured</span>
                    <h3 class="pure__black-color mb-120">
                        <span class="f-300">Discover Top</span>
                        <span class="f-800">Categories</span>
                    </h3>
                </div>
            </div>
            <div class="col-xl-10">
                <div class="categories-active row position-relative">
                    @if (count($products) > 0)
                        @foreach ($products->groupBy('category_id') as $categoryId => $categoryProducts)
                            @php
                                // Fetch the category by category_id
                                $category = App\Models\Admin\Category::find($categoryId);
                            @endphp

                            @if ($category)
                                <div class="single-categories col-sm-12">
                                    <div class="categories-box position-relative">
                                        <div class="categories-thumb">
                                            <a
                                                href="{{ url('product/category/' . $category->id . '/' . $category->category_slug) }}">
                                                <img class="border img-fluid"
                                                    src="{{ asset('storage/category/' . $category->icon) }}"
                                                    style="width: 100%; height: 275px; object-fit: cover;" alt=""
                                                    onerror="this.onerror=null; this.src='{{ asset('img/category-not-found.jpg') }}';"/>
                                            </a>
                                            <h6 class="f-800 pure__black-color cate-title">
                                                <a
                                                    href="{{ url('product/category/' . $category->id . '/' . $category->category_slug) }}">
                                                    {{ $category->category_name }}
                                                </a>
                                            </h6>
                                        </div>
                                        <div class="category-products">
                                            @foreach ($categoryProducts as $product)
                                                <p>{{ $product->name }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p class="text-center text-danger">No Category Available</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
