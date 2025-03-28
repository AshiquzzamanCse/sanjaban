@php
    $heros = App\Models\Banner::where('status', '1')->orderBy('id', 'ASC')->get();
@endphp
<section class="hero hero__area">
    <div class="hero__active slider-active">

        @if (count($heros) > 0)
            @foreach ($heros as $hero)
                <div style="height: 650px;" class="single__hero single-slider hero__bg pt-120 pb-120 home-main-banner"
                    data-background="{{ asset($hero->banner_image) }}">
                </div>
            @endforeach
        @else
            <p class="text-center text-danger">No Image Avaiable</p>
        @endif
    </div>

</section>
