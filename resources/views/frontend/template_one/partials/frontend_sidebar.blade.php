<style>
    .active {
        color: rgb(237, 33, 41) !important;
    }
</style>

<div class="col-lg-3 order-2 order-lg-1">

    @php
        $brands = App\Models\Brand::where('status', '1')->orderBy('brand_name', 'ASC')->latest()->limit(7)->get();
        $categorys = App\Models\Admin\Category::where('status', '1')
            ->orderBy('category_name', 'ASC')
            ->latest()
            ->limit(9)
            ->get();
    @endphp

    <div class="common-sidebar shop-banner-sidebar">

        {{-- Category  --}}
        <div class="common-cat">
            <div class="side-title">
                <h6>Category</h6>
            </div>
            <div id="accordionBrands" class="accordion">
                <div class="card border-0 shadow-none mb-0">

                    @foreach ($categorys as $category)
                        <div class="card-header pl-0 {{ optional($catwiseproduct)->id == $category->id ? 'mark-cat' : 'collapsed' }}"
                            data-toggle="collapse" data-parent="#accordion"
                            aria-expanded="{{ optional($catwiseproduct)->id == $category->id ? 'true' : '' }}"
                            href="#cat{{ $category->id }}">
                            <a
                                class="card-title {{ optional($catwiseproduct)->id == $category->id ? 'mark-cat' : '' }}">
                                {{ $category->category_name }}
                            </a>
                        </div>

                        <div id="cat{{ $category->id }}" class="collapse" data-parent="#accordion"
                            style="background-color: #f5f5f5;">

                            @php
                                $subcategorys = App\Models\Admin\SubCategory::where('status', '1')
                                    ->where('category_id', $category->id)
                                    ->latest()
                                    ->get();
                            @endphp

                            <div id="accordion2" class="accordion pl-3">
                                @foreach ($subcategorys as $subcategory)
                                    <div class="card border-0 shadow-none mb-0">
                                        <div class="card-header category-filter {{ optional($childcatwiseproduct)->subcategory_id == $subcategory->id ? 'mark-sub-cat' : 'collapsed' }} pl-0"
                                            data-toggle="collapse" data-target="#sub{{ $subcategory->id }}">
                                            <a class="card-title">
                                                {{ $subcategory->subcategory_name }}
                                            </a>
                                        </div>

                                        <div id="sub{{ $subcategory->id }}" class="collapse" data-parent="#accordion2"
                                            style="background-color: #f5f5f5;">
                                            @php
                                                $childcategorys = App\Models\Admin\ChildCategory::where('status', '1')
                                                    ->where('subcategory_id', $subcategory->id)
                                                    ->latest()
                                                    ->get();
                                            @endphp
                                            @foreach ($childcategorys as $childcategory)
                                                <div class="card-body p-2 {{ optional($childcatwiseproduct)->id == $childcategory->id ? 'marks' : '' }}"
                                                    aria-expanded="{{ optional($childcatwiseproduct)->id == $childcategory->id ? 'true' : 'false' }}">
                                                    <a href="{{ url('product/childcategory/' . $childcategory->id . '/' . $childcategory->childcategory_slug) }}"
                                                        class="pl-3 text-muted childcategory-link {{ optional($childcatwiseproduct)->id == $childcategory->id ? 'marks' : 'collapsed' }}">{{ $childcategory->childcategory_name }}</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        {{-- <div class="common-cat">
            <div class="side-title">
                <h6>Category</h6>
            </div>
            <div id="accordionBrands" class="accordion">
                <div class="card border-0 shadow-none mb-0">
                    @foreach ($categorys as $category)
                        <!-- Category Header -->
                        <div class="card-header pl-0 {{ optional($catwiseproduct)->category_id == $category->id ? 'mark-cat active' : '' }}"
                            data-bs-toggle="collapse" data-bs-target="#cat{{ $category->id }}"
                            aria-expanded="{{ optional($catwiseproduct)->category_id == $category->id ? 'true' : 'false' }}">
                            <a class="card-title {{ optional($catwiseproduct)->category_id == $category->id ? 'mark-cat active' : '' }}">
                                {{ $category->category_name }}
                            </a>
                        </div>
        
                        <!-- Category Collapsible Body -->
                        <div id="cat{{ $category->id }}"
                            class="collapse {{ optional($catwiseproduct)->category_id == $category->id || (optional($catwiseproduct)->subcategory_id && $category->id == optional($catwiseproduct)->subcategory->category_id) ? 'show' : '' }}"
                            data-bs-parent="#accordionBrands" style="background-color: #f5f5f5;">
                            @php
                                $subcategorys = App\Models\Admin\SubCategory::where('status', '1')
                                    ->where('category_id', $category->id)
                                    ->latest()
                                    ->get();
                            @endphp
                            <!-- Subcategory Accordion -->
                            <div id="accordion2" class="accordion pl-3">
                                @foreach ($subcategorys as $subcategory)
                                    <div class="card border-0 shadow-none mb-0">
                                        <!-- Subcategory Header -->
                                        <div class="card-header category-filter {{ optional($childcatwiseproduct)->subcategory_id == $subcategory->id ? 'mark-sub-cat active' : '' }} pl-0"
                                            data-bs-toggle="collapse" data-bs-target="#sub{{ $subcategory->id }}"
                                            aria-expanded="{{ optional($childcatwiseproduct)->subcategory_id == $subcategory->id ? 'true' : 'false' }}">
                                            <a class="card-title">
                                                {{ $subcategory->subcategory_name }}
                                            </a>
                                        </div>
        
                                        <!-- Subcategory Collapsible Body -->
                                        <div id="sub{{ $subcategory->id }}"
                                            class="collapse {{ optional($childcatwiseproduct)->subcategory_id == $subcategory->id || (optional($childcatwiseproduct)->childcategory_id && optional($childcatwiseproduct)->childcategory->subcategory_id == $subcategory->id) ? 'show' : '' }}"
                                            data-bs-parent="#accordion2" style="background-color: #f5f5f5;">
                                            @php
                                                $childcategorys = App\Models\Admin\ChildCategory::where('status', '1')
                                                    ->where('subcategory_id', $subcategory->id)
                                                    ->latest()
                                                    ->get();
                                            @endphp
                                            @foreach ($childcategorys as $childcategory)
                                                <div class="card-body p-2 {{ optional($childcatwiseproduct)->id == $childcategory->id ? 'marks active' : '' }}"
                                                    aria-expanded="{{ optional($childcatwiseproduct)->id == $childcategory->id ? 'true' : 'false' }}">
                                                    <a href="{{ url('product/childcategory/' . $childcategory->id . '/' . $childcategory->childcategory_slug) }}"
                                                        class="pl-3 text-muted childcategory-link {{ optional($childcatwiseproduct)->id == $childcategory->id ? 'marks active' : '' }}">
                                                        {{ $childcategory->childcategory_name }}
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
         --}}
        

        {{-- Brand  --}}
        <div class="common-cat mt-5">
            <div class="side-title">
                <h6>Brands</h6>
            </div>
            <div>
                @foreach ($brands as $brand)
                    <div class="card brand-filter pl-0">
                        <a class="card-title mb-0 {{ request()->route('brand_slug') == $brand->brand_slug ? 'active-brand' : '' }}"
                            style="color: #170000; padding: .75rem 0rem; color: {{ request()->route('brand_slug') == $brand->brand_slug ? 'red' : '#170000' }};"
                            href="{{ url('product/brand/' . $brand->id . '/' . $brand->brand_slug) }}">
                            {{ $brand->brand_name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</div>

