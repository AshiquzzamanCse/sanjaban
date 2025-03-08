@foreach ($products as $product)
    <div class="col-lg-4 col-md-6">
        <div class="product-grid mb-4">
            <div class="product-image">
                <a href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}" class="image">
                    <img title="{{ $product->product_name }}" src="{{ asset($product->product_image) }}"
                        style="width:100%; height: 300px;">
                </a>
            </div>
            <div class="product-content d-flex justify-content-between align-items-center">
                <div>
                    <span><a class="text-muted"
                            href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}">{{ $product->brand->brand_name }}</a></span>
                    <h3 class="title font-weight-bold"><a
                            href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}">{{ substr($product->product_name, 0, 25) }}</a>
                    </h3>
                </div>
                <div class="price font-weight-bold pr-2">
                    @if ($product->price_status == 'rfq' && !is_null($product->sas_price))
                        <h6 class="grenadier-color mb-0 font-weight-bold">${{ $product->sas_price }}</h6>
                    @elseif ($product->price_status == 'offer_price' && !is_null($product->price) && !is_null($product->discount_price))
                        <del>$ {{ $product->price }}</del>
                        <h6 class="grenadier-color mb-0 font-weight-bold">${{ $product->discount_price }}</h6>
                    @elseif ($product->price_status == 'price' && !is_null($product->price))
                        <h6 class="grenadier-color mb-0 font-weight-bold">${{ $product->price }}</h6>
                    @endif
                </div>
            </div>
            <div>
                @if ($product->sas_price !== null || $product->price !== null || $product->discount_price !== null)
                    <a href="#" class="add-cart add_to_cart_btn_product"
                        data-product_id="{{ $product->id }}">Add to cart</a>
                @else
                    <a href="{{ route('template_one.contact') }}" class="add-cart">Contact Us</a>
                @endif
            </div>
        </div>
    </div>
@endforeach

@empty
    <p class="text-danger">No products found.</p>
    @endforelse
