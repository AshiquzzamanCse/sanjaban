<!DOCTYPE html>
<html class="no-js" lang="en">

@include('frontend.template_one.partials.style_link')
<style>
    .loader {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 11111;
        background: url("{{ asset('img/giphy.webp') }}") 50% 50% no-repeat white;
    }
</style>

<body>
    <!-- Loader -->
    <div class="loader"></div>
    <!-- Loader End -->

    <!-- Header -->
    @include('frontend.template_one.partials.header')
    <!-- Header end /-->

    <!-- Main -->
    <main class="main--wrapper">

        @yield('index_template_one')

    </main>
    <!-- Main End -->

    <!-- Footer -->
    @include('frontend.template_one.partials.footer')
    <!-- Footer End -->

    <!-- JS here -->
    @include('frontend.template_one.partials.js_link')
    <!-- JS here -->

    <!-- JavaScript to hide loader when body content is loaded -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var loader = document.getElementById("loader");
            loader.style.display = "none";
        });
    </script>
    <!-- JavaScript End -->

</body>

</html>
