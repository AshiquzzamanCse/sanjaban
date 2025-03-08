@foreach ($products as $product)
    <div class="col-lg-4 col-md-6">
        <div class="product-grid mb-4">

            <div class="product-image">
                <a href="{{ url('product/' . $product->id . '/' . $product->product_slug) }}">
                    <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}"
                        style="width:100%; height: 300px;">
                </a>
            </div>

            <div class="product-content d-flex justify-content-between align-items-center">
                <div>

                    <span><a class="text-muted"
                            href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}">{{ $product->brand->brand_name }}</a>
                    </span>

                    <h3 class="title font-weight-bold" title="{{ $product->product_name }}"><a
                            href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}">{{ substr($product->product_name, 0, 25) }}</a>
                    </h3>
                </div>



                <div class="price font-weight-bold pr-2">
                    @if ($product->sas_price !== null || $product->price !== null || $product->discount_price !== null)
                        @if ($product->price_status == 'rfq' && $product->sas_price !== null)
                            <h6 class="grenadier-color mb-0 font-weight-bold">
                                $ {{ $product->sas_price }}
                            </h6>
                        @elseif ($product->price_status == 'offer_price' && $product->price !== null && $product->discount_price !== null)
                            <del>$ {{ $product->price }}</del>
                            <h6 class="grenadier-color mb-0 font-weight-bold">$
                                {{ $product->discount_price }}</h6>
                        @elseif ($product->price_status == 'price' && $product->price !== null)
                            <h6 class="grenadier-color mb-0 font-weight-bold">
                                $ {{ $product->price }}
                            </h6>
                        @endif
                    @endif
                </div>


            </div>


            {{-- <a type="submit" style="cursor:pointer;" class="add-cart add_to_cart_btn_product"
                data-product_id="{{ $product->id }}">Add to cart</a> --}}

            @if ($product->sas_price !== null || $product->price !== null || $product->discount_price !== null)
                <a type="submit" style="cursor:pointer;" class="add-cart add_to_cart_btn_product"
                    data-product_id="{{ $product->id }}">Add to cart</a>
            @else
                <a href="{{ route('template_one.contact') }}" class="add-cart">Contact Us</a>
            @endif



            

        </div>
    </div>
@endforeach
