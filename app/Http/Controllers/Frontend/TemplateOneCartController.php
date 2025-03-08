<?php

namespace App\Http\Controllers\Frontend;

use Helper;
use Carbon\Carbon;
use App\Models\Admin;
use App\Mail\OrderMail;
use App\Models\User\Order;
use App\Models\Admin\Coupon;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Wishlist;
use App\Models\User\OrderItem;
use Nnjeim\World\Models\Country;
use App\Http\Controllers\Controller;
use App\Notifications\OrderComplete;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Notification;


class TemplateOneCartController extends Controller
{
    //Offer To Cart
    public function OfferToCartTemplateOne(Request $request)
    {
        $id = $request->product_id;

        $product = Product::findOrFail($id);

        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($cartItem->isNotEmpty()) {

            return response()->json(['warning' => 'This Product Has Already Added']);
        }

        Cart::add([

            'id' => $id,
            'name' => $product->product_name,
            'qty' => 1,
            'price' => $request->price,
            'weight' => 1,
            'options' => [
                'image' => $product->product_image,
                // 'color' => $request->color,
            ],
        ]);

        return response()->json(['success' => 'Successfully Add on Your Cart']);
    }

    //Buy To Cart
    public function BuyToCartTemplateOne(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($cartItem->isNotEmpty()) {

            return response()->json(['warning' => 'This Product Has Already Added']);
        }

        if ($product->price_status == 'rfq') {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->qty,
                'price' => $product->sas_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,
                    // 'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfully Buy on Your Cart']);
        } elseif ($product->price_status == 'offer_price') {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->qty,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,
                    // 'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfully Buy on Your Cart']);
        } else {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->qty,
                'price' => $product->price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,
                    // 'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfully Buy on Your Cart']);
        }
    }

    //Add To Cart
    public function AddToCartTemplateOneFrontend(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($cartItem->isNotEmpty()) {

            return response()->json(['warning' => 'This Product Has Already Added']);
        }

        if ($product->price_status == 'rfq') {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => 1,
                'price' => $product->sas_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,

                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } elseif ($product->price_status == 'offer_price') {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => 1,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,

                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } else {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => 1,
                'price' => $product->price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,

                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        }
    }

    //Add To Cart
    public function AddToCartTemplateOne(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($cartItem->isNotEmpty()) {

            return response()->json(['warning' => 'This Product Has Already Added']);
        }

        if ($product->price_status == 'rfq') {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->qty,
                'price' => $product->sas_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,
                    'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } elseif ($product->price_status == 'offer_price') {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->qty,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,
                    'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } else {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->qty,
                'price' => $product->price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,
                    'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        }
    }

    //Add To Cart Offer Product Template One
    public function AddToCartOfferProductTemplateOne(Request $request)
    {
        $id = $request->product_id;

        $product = Product::findOrFail($id);

        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($cartItem->isNotEmpty()) {

            return response()->json(['warning' => 'This Product Has Already Added']);
        }

        Cart::add([

            'id' => $id,

            'name' => $product->product_name,
            'qty' => 1,
            'price' => $request->price,
            'weight' => 1,

            'options' => [
                'image' => $product->product_image,
                // 'color' => $request->color,
            ],

        ]);

        return response()->json(['success' => 'Successfully Added on Your Cart']);
    }

    //AddToCartProductHome
    public function AddToCartProductHome(Request $request)
    {
        $id = $request->product_id;

        $product = Product::findOrFail($id);

        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($cartItem->isNotEmpty()) {

            return response()->json(['warning' => 'This Product Has Already Added']);
        }

        if ($product->price_status == 'rfq') {

            Cart::add([

                'id' => $id,

                'name' => $product->product_name,
                'qty' => 1,
                'price' => $product->sas_price,
                'weight' => 1,

                'options' => [
                    'image' => $product->product_image,
                    // 'color' => $request->color,
                ],

            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } elseif ($product->price_status == 'offer_price') {

            Cart::add([

                'id' => $id,

                'name' => $product->product_name,
                'qty' => 1,
                'price' => $product->discount_price,
                'weight' => 1,

                'options' => [
                    'image' => $product->product_image,
                    // 'color' => $request->color,
                ],

            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } else {

            Cart::add([

                'id' => $id,

                'name' => $product->product_name,
                'qty' => 1,
                'price' => $product->price,
                'weight' => 1,

                'options' => [
                    'image' => $product->product_image,
                    // 'color' => $request->color,
                ],

            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        }
    }

    //AddToCart Product HomeSingle
    public function AddToCartProductHomeSingle(Request $request)
    {
        $id = $request->product_id;

        $product = Product::findOrFail($id);

        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($cartItem->isNotEmpty()) {

            return response()->json(['warning' => 'This Product Has Already Added']);
        }

        if ($product->price_status == 'rfq') {

            Cart::add([

                'id' => $id,

                'name' => $product->product_name,
                'qty' => $request->qty,
                'price' => $product->sas_price,
                'weight' => 1,

                'options' => [
                    'image' => $product->product_image,
                    // 'color' => $request->color,
                ],

            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } elseif ($product->price_status == 'offer_price') {

            Cart::add([

                'id' => $id,

                'name' => $product->product_name,
                'qty' => $request->qty,
                'price' => $product->discount_price,
                'weight' => 1,

                'options' => [
                    'image' => $product->product_image,
                    // 'color' => $request->color,
                ],

            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } else {

            Cart::add([

                'id' => $id,

                'name' => $product->product_name,
                'qty' => $request->qty,
                'price' => $product->price,
                'weight' => 1,

                'options' => [
                    'image' => $product->product_image,
                    // 'color' => $request->color,
                ],

            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        }
    }

    //Add To Cart Related
    public function AddToCartTemplateOneRelated(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($cartItem->isNotEmpty()) {

            return response()->json(['warning' => 'This Product Has Already Added']);
        }

        if ($product->price_status == 'rfq') {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->sas_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,
                    // 'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } elseif ($product->price_status == 'offer_price') {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,
                    // 'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } else {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,
                    // 'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        }
    }

    // Add MiniCart TemplateOne Related
    public function AddMiniCartTemplateOneRelated()
    {

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartQtyMobile = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartQtyMobile' => $cartQtyMobile,
            'cartTotal' => $cartTotal,

        ));
    }

    // Add MiniCart
    public function AddMiniCartTemplateOne()
    {

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartQtyMobile = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartQtyMobile' => $cartQtyMobile,
            'cartTotal' => $cartTotal,

        ));
    }

    //Remove MiniCart TemplateOne
    public function RemoveMiniCartTemplateOne($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove From Cart']);
    }

    //Remove MiniCart Related TemplateOne
    public function RemoveMiniCartRelatedTemplateOne($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove From Cart']);
    }

    //Increase MiniCart Related TemplateOne
    public function IncreaseMiniCartTemplateOneRelated($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        return response()->json(['success' => 'Qty Update Successfully']);
    }

    //Decrease MiniCart Related TemplateOne
    public function DecreaseMiniCartTemplateOneRelated($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        return response()->json(['success' => 'Qty Update Successfully']);
    }

    //View Cart TemplateOne
    public function ViewCartTemplateOne()
    {
        return view('frontend.template_one.cart.view_cart');
    }

    //GetCartProduct
    public function GetCartProduct()
    {

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartQtyMobile = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartQtyMobile' => $cartQtyMobile,
            'cartTotal' => $cartTotal,

        ));
    }

    //CartRemove
    public function CartRemove($rowId)
    {
        Cart::remove($rowId);

        return response()->json(['success' => 'Successfully Remove From Cart']);
    }

    public function CartDecrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        return response()->json('Decrement');
    } // End Method

    public function CartIncrement($rowId)
    {

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        return response()->json('Increment');
    }

    //Checkout Templat eOne
    public function CheckoutTemplateOne()
    {
        if (Auth::check()) {

            if (Cart::total() > 0) {

                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();

                // $countries = Country::all();

                return view('frontend.template_one.cart.checkout', compact('carts', 'cartQty', 'cartTotal'));
            } else {

                toastr()->warning('At least add to Cart One Product');

                return redirect()->to('/');
            }
        } else {

            toastr()->warning('You Need to Login First');

            return redirect()->route('template.one.login');
        }
    }

    public function CheckoutStoreTemplateOne(Request $request)
    {
        //dd($request->all());

        $admin = Admin::where('status', 1)->get();

        $order_id = Order::insertGetId([

            'user_id' => Auth::id(),

            'billing_name' => $request->billing_name,
            'billing_address_line1' => $request->billing_address_line1,
            'billing_address_line2' => $request->billing_address_line2,
            'billing_city' => $request->billing_city,
            'billing_state' => $request->billing_state,
            'billing_postal_code' => $request->billing_postal_code,
            'billing_country' => $request->billing_country,
            'billing_phone' => $request->billing_phone,
            'billing_email' => $request->billing_email,
            'notes' => $request->notes,

            'shipping_name' => $request->shipping_name,
            'shipping_phone' => $request->shipping_phone,
            'shipping_city' => $request->shipping_city,
            'shipping_state' => $request->shipping_state,
            'shipping_postal_code' => $request->shipping_postal_code,
            'shipping_country' => $request->shipping_country,
            'shipping_address_line1' => $request->shipping_address_line1,
            'shipping_address_line2' => $request->shipping_address_line2,

            'shipping_charge' => $request->shipping_charge,
            'payment_method' => 'Cash On Delivery',
            'transaction_number' => 'Cash On Delivery',
            'total_amount' => $request->total_amount,

            'invoice_number' => 'DV' . mt_rand(10000000, 99999999),
            'order_number' => Helper::generateOrderNumber(),

            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),

            'created_at' => Carbon::now(),

        ]);

        //Send Mail
        // $invoice = Order::findOrFail($order_id);
        // $orderItems = OrderItem::where('order_id', $order_id)->get();  // Fetch order items for the specific order

        // $data = [

        //     'invoice_number' => $invoice->invoice_number,
        //     'total_amount' => $invoice->total_amount,
        //     'billing_name' => $invoice->billing_name,

        //     'order_date' => $invoice->order_date,
        //     'transaction_number' => $invoice->transaction_number,

        //     'billing_email' => $invoice->billing_email,
        //     'billing_phone' => $invoice->billing_phone,
        //     'billing_address_line1' => $invoice->billing_address_line1,
        //     'order_items' => $orderItems,  // Pass order items to the email

        // ];

        // Mail::to($request->billing_email)->send(new OrderMail($data));
        //End Send Mail

        //Notification
        // Notification::send($admin, new OrderComplete($request->billing_name));
        //Notification

        $carts = Cart::content();
        foreach ($carts as $cart) {

            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => now(),

            ]);
        } // End Foreach

        Cart::destroy();

        toastr()->success('Order Successfully');

        return redirect()->route('index');
    }

    //Add To WishList
    public function AddToWishList(Request $request, $product_id)
    {

        if (Auth::check()) {
            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => now(),

                ]);
                return response()->json(['success' => 'Successfully Added On Your Wishlist']);
            } else {
                return response()->json(['warning' => 'This Product Has Already on Your Wishlist']);
            }
        } else {
            return response()->json(['warning' => 'At First Login Your Account']);
        }
    }

    //AllWishlist
    public function TemplateOneWishlist()
    {
        return view('frontend.template_one.cart.wishlist');
    }

    //Get Wishlist Product
    public function GetWishlistProduct()
    {

        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();
        $wishQty = wishlist::count();

        return response()->json(['wishlist' => $wishlist, 'wishQty' => $wishQty]);
    }

    //WishlistRemove
    public function WishlistRemove($id)
    {
        Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();
        return response()->json(['success' => 'Successfully Product Remove']);
    }

    // =================================
    public function applyCoupon(Request $request)
    {
        $coupon = $request->input('coupon');
        $validCoupon = Coupon::where('coupon_name', $coupon)->first();

        if ($validCoupon) {
            return response()->json([
                'success' => true,
                'discount' => $validCoupon->coupon_discount,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid coupon code.',
            ]);
        }
    }

    public function AddToCartWishlist(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($cartItem->isNotEmpty()) {

            return response()->json(['warning' => 'This Product Has Already Added']);
        }

        if ($product->price_status == 'rfq') {

            Cart::add([

                'id' => $id,
                'name' => $product->product_name,
                'qty' => 1,
                'price' => $product->sas_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,

                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } elseif ($product->price_status == 'offer_price') {

            Cart::add([

                'id' => $id,
                'name' => $product->product_name,
                'qty' => 1,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,

                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } else {

            Cart::add([

                'id' => $id,
                'name' => $product->product_name,
                'qty' => 1,
                'price' => $product->price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,

                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        }
    }
}
