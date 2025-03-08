@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
@section('title', 'Dada Bhaai')
<!-- hero  -->
@include('frontend.template_one.partials.home_page.hero')
<!-- Hero end -->

<!-- Top Category Area  -->
@include('frontend.template_one.partials.home_page.home_category')
<!-- Top Category Area end -->

<!-- Discover All Product  -->
@include('frontend.template_one.partials.home_page.home_product')
<!-- Discover All Product end -->

<!-- Weekly Deals -->
@include('frontend.template_one.partials.home_page.home_weekly_offer')
<!-- Weekly Deals end -->

<!-- Latest Items   -->
@include('frontend.template_one.partials.home_page.latest_product')
<!-- Latest Items  end -->

<!-- Offer Banner  -->
@include('frontend.template_one.partials.home_page.offer_banner')
<!-- Offer Banner -->

<!-- Featured  -->
@include('frontend.template_one.partials.home_page.home_feature')
<!-- Featured end -->


<!-- Latest Offer  -->
@include('frontend.template_one.partials.home_page.latest_offer')
<!-- Latest Offer end -->

<!-- Brand -->
@include('frontend.template_one.partials.home_page.home_brand')
<!-- Brand End -->


@endsection
