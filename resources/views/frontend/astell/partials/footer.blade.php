<style>
    .footer-link {
        font-size: 16px;
        letter-spacing: 0.8px;
        text-align: center;
        white-space: nowrap;
    }
</style>
<footer>
    @php
        $site = App\Models\Sites::find(1);
    @endphp
    <div class="wrap">

        <div class="inner">
            <a class="logo__link" href="{{ route('index') }}">
                <img class="" style="width: 160px;" src="{{ asset('upload/logo_white/' . $site->logo_white) }}"
                    alt="">
            </a>
            <p style="width: 30%;">
                {{ $site->address }}
            </p>
            <div class="pt-3">
                <a class="footer-link" href="{{ route('template.two.contact') }}">Contact Us</a>
                <a class="footer-link" href="{{ route('template.two.faq') }}">Faq</a>
            </div>
            <p class="pt-3" style="font-size: 11px;">
                @COPYRIGHT Dada Bhaai, ALL RIGHT RESERVED.
            </p>
        </div>
        <div class="inner2">
            <a href="{{ $site->instagram_url }}" target="_blank" class="insta"></a>
            <a href="{{ $site->facebook_url }}" target="_blank" class="facebook"></a>
            <a href="{{ $site->youtube_url }}" target="_blank" class="youtube"></a>
        </div>
    </div>
</footer>
