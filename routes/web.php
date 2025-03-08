<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\TemplateOneCartController;
use App\Http\Controllers\Frontend\TemplateOneController;
use App\Http\Controllers\Frontend\TemplateTwoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', [IndexController::class, 'Index'])->name('index');

Route::middleware(['auth', 'verified'])->group(function () {


});

require __DIR__ . '/auth.php';
require __DIR__ . '/adminauth.php';

Route::controller(IndexController::class)->group(function () {

    //Template
    Route::get('/product/{id}/{product_slug}', 'TemplateOneProduct');
    //Single Product
    Route::get('/single-product/{id}', 'SingleProduct')->name('single.product');

    //Fqa Frontend
    Route::get('/faq', 'Faq')->name('faq');
    //Contact Frontend
    Route::get('/contact-user', 'ContactUser')->name('contact.user');
    Route::post('/send-message', 'SendMessage')->name('send.message');
    //Brand Page
    Route::get('/brand', 'BrandPage')->name('brand.page');
    Route::get('/brand-wise-product/{id}', 'BrandWiseProduct')->name('brand.wise.product');
    //About Page
    Route::get('/about', 'AboutPage')->name('about.page');

    // lOGIN wITH gOOGLE
    Route::get('login/google', 'redirectToGoogle')->name('login.google');
    Route::get('login/google/callback', 'googleCallback');
});

Route::middleware(['auth', 'verified'])->group(function () {

    //User Dashboard
    Route::get('/dashboard', [TemplateOneController::class, 'TemplateOneDashboard'])->name('template.one.dashboard');
    Route::post('/user/profile-update', [TemplateOneController::class, 'TemplateOneProfileUpdate'])->name('template.one.user.profile.update');

    //User Password
    Route::post('/user/password-update', [TemplateOneController::class, 'TemplateOnePasswordUpdate'])->name('template.one.user.password.update');

    //Template One Order Details
    Route::get('/user/order-details/{id}', [TemplateOneController::class, 'TemplateOneOrderDetails'])->name('template.one.user.order.details');

    //Invoice
    Route::get('/user/order-invoice/{id}', [TemplateOneController::class, 'TemplateOneOrderInvoice'])->name('template.one.user.invoice');

    //User Logout
    Route::get('/user-logout', [TemplateOneController::class, 'TemplateOneUserLogout'])->name('template.one.user.logout');
});

//Add To WishList
Route::post('/add-to-wishlist/{product_id}', [TemplateOneCartController::class, 'AddToWishList']);

Route::get('brand/related-product-search', [TemplateOneController::class, 'BrandRelatedProductSearch'])->name('brand.related.product.search');

// Template One Controller
Route::controller(TemplateOneController::class)->group(function () {

    //All Product
    Route::get('/all-product', 'TemplateOneAllProduct')->name('template.one.all_product');
    Route::post('/shop-filter', 'shopFilter')->name('shop.filter');

    //user login
    Route::post('/user-login', 'userLogin')->name('user.login');

    //Brand Wise
    Route::get('/product/brand/{id}/{brand_slug}', 'BrandRelatedProductOne');

    //Category Page
    Route::get('/home-category', 'HomeAllCategory')->name('home.all.category.page');
    Route::get('/product/category/{id}/{category_slug}', 'CategoryRelatedProductOne');

    //Offer Category Page
    Route::get('/offer-categorywise/product/{id}', 'OfferCategoryRelatedProductOne')->name('offer-categorywise.product');
    Route::get('/offerwise/product/{id}', 'OfferWiseProductOne')->name('offerwise.product');

    //Child Category
    Route::get('/product/childcategory/{id}/{childcategory_slug}', 'ChilldCategoryRelatedProductOne');

    //Contact
    Route::get('/contact', 'TemplateOneContact')->name('template_one.contact');
    Route::post('/user-contact/send', 'TemplateOneContactStore')->name('template_one.contact.store');

    //Product Search
    Route::post('/search', 'ProductSearch')->name('product.search');
    // Route::post('/search-product', 'SearchProduct');

    //Login
    Route::get('/dadabhai-login', 'TemplateOneLogin')->name('template.one.login');

    //Faq
    Route::get('/faq', 'TemplateOneFaq')->name('template.one.faq');

    //Trems
    Route::get('/terms', 'TemplateOneTerm')->name('template.one.term');

    //About Us
    Route::get('/about-us', 'TemplateOneAboutUs')->name('template.one.about');

    // Track Order
    Route::get('/user/tracking/order', 'TemplateOneTackOrder')->name('template.one.track.order');
    Route::post('/tracking-order', 'TemplateOneTackOrderSearch')->name('track.order.search');
    Route::get('/tracking-order/{id}', 'TemplateOneTackOrderProduct')->name('track.order.product');

    //Compare
    Route::get('/compare', 'ProductCompare')->name('compare');

    //Add To Compare
    Route::post('/add-to-compare', 'AddToCompare');
    Route::get('/compare-product', 'CompareProduct')->name('compare.product');
    Route::get('/get-compare', 'GetCompare');
    Route::post('/add-to-cart-compare/{id}', 'AddToCartCompare');
    Route::get('/compare/product/remove/{rowId}', 'RemoveCompareTemplateOne');

    //Add To Wishlist
    Route::post('/add-to-wishlist', 'AddToWishlist');
    Route::get('/wishlist-product', 'WishlistProduct')->name('wishlist.product');
    Route::get('/get-wishlist', 'GetWishlist');
    Route::post('/add-to-cart-wishlist/{id}', 'AddToCartWishlist');
    Route::get('/wishlist/product/remove/{rowId}', 'RemoveWishlistTemplateOne');
});

//Cart Controller
Route::controller(CartController::class)->group(function () {

    Route::get('/product-cart', 'TotalCart')->name('product.cart');

});

//Template One Cart Controller
Route::controller(TemplateOneCartController::class)->group(function () {

    //Offer To Cart
    Route::post('/product/offer/store', 'OfferToCartTemplateOne');

    //Buy To Cart
    Route::post('/product/buy/store/{id}', 'BuyToCartTemplateOne');

    //Buy To Cart Single
    // Route::post('/product/store-single/{id}', 'AddToCartTemplateOneSingle');

    //Add To Cart
    Route::post('/product/store/{id}', 'AddToCartTemplateOne');
    Route::get('/product/mini-cart', 'AddMiniCartTemplateOne');
    Route::get('/minicart/product/remove/{rowId}', 'RemoveMiniCartTemplateOne');

    Route::post('/fcart/data/store/{id}', 'AddToCartTemplateOneFrontend');

    //AddToCartOfferProductTemplateOne
    Route::post('/offer-product-store', 'AddToCartOfferProductTemplateOne');
    Route::post('/product-store-cart', 'AddToCartProductHome');
    Route::post('/product-store-cart-single', 'AddToCartProductHomeSingle');

    Route::post('/product/store/related/{id}', 'AddToCartTemplateOneRelated');
    Route::get('/product/mini/cart/related', 'AddMiniCartTemplateOneRelated');
    Route::get('/mini-cart/increase/{rowId}', 'IncreaseMiniCartTemplateOneRelated');
    Route::get('/mini-cart/decrease/{rowId}', 'DecreaseMiniCartTemplateOneRelated');
    Route::get('/minicart-related-remove/{rowId}', 'RemoveMiniCartRelatedTemplateOne');

    //View Cart
    Route::get('/view-cart', 'ViewCartTemplateOne')->name('template.one.view.cart');
    Route::get('/get-cart-product', 'GetCartProduct');
    Route::get('/cart-remove/{rowId}', 'CartRemove');

    Route::get('/cart-decrement/{rowId}', 'CartDecrement');
    Route::get('/cart-increment/{rowId}', 'CartIncrement');

    //CheckOut
    Route::get('/cart-checkout', 'CheckoutTemplateOne')->name('template.one.checkout');
    Route::post('/cart-checkout-store', 'CheckoutStoreTemplateOne')->name('template.checkout.store');

    // ==================================
    Route::post('/apply-coupon', 'applyCoupon')->name('apply.coupon');
});

// Template Two Controller
Route::controller(TemplateTwoController::class)->group(function () {

    //Template Two
    Route::get('/product-single/{id}', 'SingleProductTemplateTwo');

    //All Product
    Route::get('/all-product-dadabhaai', 'TemplateTwoAllProduct')->name('template.two.all.product');

    //Faq
    Route::get('/faq-dadabhaai', 'TemplateTwoFaq')->name('template.two.faq');

    //contact us
    Route::get('/contact-dadabhaai', 'TemplateTwoContact')->name('template.two.contact');
    Route::post('/contact/store', 'TemplateTwoContactStore')->name('template.two.contact.store');

    //Buying Guide
    Route::get('/buying-guide', 'TemplateTwoBuying')->name('template.two.buying');

    //Category Page
    Route::get('/product/category-dadabhaai/{id}/{category_slug}', 'CategoryWiseProductTemplateTwo');

    // Route for handling the POST request (form submission)
    Route::post('/product-search-dadabhaai', 'DadabhaaiProductSearch')->name('dadabhaai.product.search');

    // Route for showing search results (GET request)
    Route::get('/product-search-results', 'showSearchResults')->name('product.search.results');

    // Route for showing search results (GET request)
    Route::post('/product-store-cart-product', 'AddToCartProductHomeAstell');
});


Route::post('/submit-email', [TemplateOneController::class, 'submit'])->name('submit.email');

