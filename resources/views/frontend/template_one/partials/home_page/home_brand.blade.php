@php
    $brands = App\Models\Brand::where('status', '1')->latest()->get();
@endphp


@if (count($brands) > 0)
    <div class="brand bg-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="brand-active">
                        @foreach ($brands as $brand)
                            <div class="p-3 single-brand">
                                <a href="{{ url('product/brand/' . $brand->id . '/' . $brand->brand_slug) }}">
                                    <img class="img-fluid" src="{{ asset('storage/brand/' . $brand->icon) }}" alt="{{ $brand->brand_name }}"
                                        onerror="this.onerror=null; this.src='{{ asset('https://dadabhaai.com/upload/logo_white/202406290352Dadabhaai%20Logo%20White%20Variant.png') }}';" />
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
