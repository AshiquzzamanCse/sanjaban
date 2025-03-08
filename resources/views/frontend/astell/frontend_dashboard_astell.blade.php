<!DOCTYPE html>
<html lang="en">

@include('frontend.astell.partials.style_link')
<style>
    .loader {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 11111;
        background: url("{{ asset('img/preloader.gif') }}") 50% 50% no-repeat white;
    }
</style>

<body>
    <div class="loader" id="loader"></div>
    <div class="overlay"></div>

    @if (Route::is('index'))
        <div class="line-bg">
            <span class="line1"></span>
            <span class="line2"></span>
            <span class="line3"></span>
            <span class="line4"></span>
            <span class="line5"></span>
            <span class="line6"></span>
            <span class="line7"></span>
            <span class="line8"></span>
            <span class="line9"></span>
            <span class="line10"></span>
        </div>
    @endif

    <div class="body-wrap">
        <div class="side-group">
            <a href="javascript:;" class="btn-top">TOP</a>
        </div>

        @include('frontend.astell.partials.header')

        @yield('index_astell')

        @include('frontend.astell.partials.footer')
    </div>

    @include('frontend.astell.partials.js_link')

    <!-- JavaScript to hide loader when body content is loaded -->
    <script>
        window.onload = function() {
            var loader = document.getElementById("loader");
            loader.style.display = "none";
        };
    </script>
    <!-- JavaScript End -->
</body>

</html>
