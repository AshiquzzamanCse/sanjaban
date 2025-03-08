@extends('frontend.template_one.frontend_dashboard_template_one')

@section('index_template_one')
@section('title')
    DadaBhaai | Product
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- shop area start -->
<form id="shop-filter-form" method="POST">
    @csrf

    <div class="product shop-page pt-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="common-sidebar shop-banner-sidebar">
                        {{-- Category --}}
                        <div class="common-cat">
                            <div class="side-title">
                                <h6>Categories</h6>
                            </div>
                            <ul>
                                @php
                                    $filterCat = request()->get('category')
                                        ? explode(',', request()->get('category'))
                                        : [];
                                @endphp

                                @foreach ($categorys as $cat)
                                    @php
                                        $countProduct = App\Models\Admin\Product::where(
                                            'category_id',
                                            $cat->id,
                                        )->count();
                                    @endphp
                                    <li style="margin-left: 15px;">
                                        <label class="">
                                            <input type="checkbox" class="form-check-input category-filter"
                                                name="category[]" value="{{ $cat->category_slug }}"
                                                @if (in_array($cat->category_slug, $filterCat)) checked @endif>
                                            {{ $cat->category_name }} ({{ $countProduct }})
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Brand --}}
                        <div class="common-cat mt-4">
                            <div class="side-title">
                                <h6>Brands</h6>
                            </div>
                            <ul>
                                @php
                                    $filterBrand = request()->get('brand') ? explode(',', request()->get('brand')) : [];
                                @endphp

                                @foreach ($brands as $brand)
                                    @php
                                        $countBrand = App\Models\Admin\Product::where('brand_id', $brand->id)->count();
                                    @endphp
                                    <li style="margin-left: 15px;">
                                        <label class="">
                                            <input type="checkbox" class="form-check-input brand-filter" name="brand[]"
                                                value="{{ $brand->brand_slug }}"
                                                @if (in_array($brand->brand_slug, $filterBrand)) checked @endif>
                                            {{ $brand->brand_name }} ({{ $countBrand }})
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 order-1 order-lg-2 px-0">
                    <!-- Filter bar -->
                    <div class="border-b">
                        <div class="row align-items-end mx-0 p-3" style="background: #f5f5f5;">

                            <div class="col-lg-4">
                                <h4 class="f-800 cod__black-color mb-0">Product</h4>
                            </div>

                            <div class="col-lg-3">

                            </div>

                            <div class="col-lg-5">
                                <div class="form-group has-search mb-0">
                                    <input type="text" class="form-control product-search" name="product_search"
                                        placeholder="Search" value="{{ request()->get('product_search') }}">
                                    <span class="fa fa-search form-control-feedback"></span>
                                </div>
                            </div>

                            {{-- <div class="col-lg-1">
                                <div class="d-flex justify-content-end">
                                    <select name="sortBy" class="sort-by" onchange="this.form.submit();">
                                        <option selected disabled>Show</option>
                                        <option value="10" @if (request()->get('sortBy') == '10') selected @endif>10
                                        </option>
                                        <option value="20" @if (request()->get('sortBy') == '20') selected @endif>20
                                        </option>
                                        <option value="30" @if (request()->get('sortBy') == '30') selected @endif>30
                                        </option>
                                        <option value="40" @if (request()->get('sortBy') == '40') selected @endif>40
                                        </option>
                                        <option value="50" @if (request()->get('sortBy') == '50') selected @endif>50
                                        </option>
                                        <option value="60" @if (request()->get('sortBy') == '60') selected @endif>60
                                        </option>
                                    </select>
                                </div>
                            </div> --}}

                        </div>
                    </div>

                    <!-- Product Grid -->
                    <div id="product-grid" class="row mt-4">
                        @include('frontend.template_one.product.product_grid', ['products' => $products])
                    </div>

                    <!-- Pagination -->
                    <div class="row mt-10">
                        <div class="col-sm-12">
                            <div class="common-pagination text-center">
                                {{ $products->links('vendor.pagination.template_one') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- shop area end -->

<script>
    $(document).ready(function() {
        // Handle form changes for AJAX submission
        $('#shop-filter-form').on('change keyup', '.category-filter, .brand-filter, .product-search, .sort-by',
            function() {
                $('#shop-filter-form').submit();
            });

        // Submit form via AJAX
        $('#shop-filter-form').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            var formData = $(this).serialize(); // Get form data
            $.ajax({
                url: "{{ route('shop.filter') }}", // Ensure this is correct
                type: "POST",
                data: formData,
                success: function(response) {
                    $('#product-grid').html(response.productsHtml); // Update products
                    $('.common-pagination').html(response.pagination); // Update pagination
                }
            });
        });
    });
</script>
@endsection
