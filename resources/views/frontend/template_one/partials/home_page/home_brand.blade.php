@php
    $brands = App\Models\Brand::where('status', '1')->latest()->get();
@endphp


@if (count($brands) > 0)
    <div class="brand">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="brand-active">
                        @foreach ($brands as $brand)
                            <div class="p-3 single-brand">
                                <a href="{{ url('product/brand/' . $brand->id . '/' . $brand->brand_slug) }}">
                                    <img style="width: 150px;" class="img-fluid"
                                        src="{{ asset('storage/brand/' . $brand->icon) }}" alt="{{ $brand->brand_name }}" />
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
