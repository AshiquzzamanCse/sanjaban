<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\Category;
use App\Models\Admin\Contact;
use App\Models\Admin\Faq;
use App\Models\Admin\HomePage;
use App\Models\Admin\MultiImg;
use App\Models\Admin\Product;
use App\Models\Admin\ProductSinglePage;
use App\Models\Admin\Template;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class IndexController extends Controller
{
    //Index
    public function Index()
    {
        $template = Template::latest('id')->where('status', '1')->first();

        if ($template->name == 'template_one') {

            return view('frontend.template_one.index_template_one');
        } else if ($template->name == 'template_two') {

            $homepage = HomePage::with(['featureProductOne', 'featureProductTwo', 'featureProductThree', 'featureProductFour'])->where('status', 'tamplate_two')->latest('id')->first();

            return view('frontend.astell.index_astell', compact('homepage'));
        } else if ($template->name == 'template_three') {
            $banners = Banner::where('status', '1')->orderBy('id', 'ASC')->latest()->get();
            $categorys = Category::where('status', '1')->orderBy('category_name', 'ASC')->latest()->get();

            return view('frontend.index', compact('banners', 'categorys'));
        }
    }

    //Template OneProduct
    public function TemplateOneProduct($id, $product_slug)
    {
        // $product = Product::find($id);

        $product = Product::with('productSinglePage')->find($id);

        if (!empty($product->productSinglePage) && $product->productSinglePage->status === 'active') {

            // $product = Product::find($id);
            $sproducts = $product->productSinglePage;
            $multiImages = MultiImg::where('product_id', $product->id)->get();

            return view('frontend.astell.pages.single_product', compact('product', 'sproducts', 'multiImages'));
        } else {

            $color = $product->color_id;
            $product_colors = explode(' ', $color);

            $multiImages = MultiImg::where('product_id', $product->id)->limit(3)->get();

            //Releted Category
            $cat_id = $product->childcategory_id;
            $relativeProduct = Product::where('childcategory_id', $cat_id)->where('id', '!=', $id)->orderBy('id', 'ASC')->limit(5)->get();


            // $child_id = $product->child_id;
            $child_ids = explode(',', $product->child_id);

            //dd(($child_id));
            foreach ($child_ids as $key => $child_id) {
                $relativeChild[] = Product::where('id', $child_id)
                    ->orderBy('id', 'DESC')
                    ->first();
            }

            $carts = Cart::content();
            $cartQty = Cart::count();


            return view('frontend.template_one.product.single_product', compact('product', 'relativeProduct', 'multiImages', 'relativeChild', 'product_colors', 'carts', 'cartQty'));
        }
    }

    //Single Product
    public function SingleProduct($id)
    {
        $product = Product::find($id);

        $color = $product->color_id;
        $product_colors = explode(',', $color);

        $multiImages = MultiImg::where('product_id', $product->id)->get();

        //Related product
        $cat_id = $product->category_id;
        $relativeProduct = Product::where('category_id', $cat_id)->where('id', '!=', $id)->orderBy('id', 'ASC')->limit(5)->get();

        $carts = Cart::content();
        $cartQty = Cart::count();

        return view('frontend.pages.product.single_product', compact('product', 'multiImages', 'relativeProduct', 'product_colors', 'carts', 'cartQty'));
    }

    //Faq
    public function Faq()
    {
        $faqs = Faq::where('status', '1')->orderBy('order', 'ASC')->latest()->get();
        return view('frontend.pages.setting.faq', compact('faqs'));
    }

    //ContactUser
    public function ContactUser()
    {
        return view('frontend.pages.setting.contact_user');
    }

    //ContactUser
    public function SendMessage(Request $request)
    {


        $typePrefix = 'MSG';

        $today = date('dmy');

        $lastCode = Contact::where('code', 'like', $typePrefix . '-' . $today . '%')
            ->orderBy('id', 'desc')
            ->first();

        $newNumber = $lastCode ? (int) explode('-', $lastCode->code)[2] + 1 : 1;

        $code = $typePrefix . '-' . $today . '-' . $newNumber;

        Contact::insert([

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'message' => $request->message,
            'code' => $code,

        ]);

        toastr()->success('Message Send Successfully');
        return redirect()->back();
    }

    //Brand Page
    public function BrandPage()
    {
        $brands = Brand::where('status', '1')->orderBy('brand_name', 'ASC')->latest()->get();
        return view('frontend.pages.product.brand_page', compact('brands'));
    }

    //Brand Page
    public function BrandWiseProduct($id)
    {
        $products = Product::where('brand_id', $id)->paginate(3);
        $brandname = Brand::where('id', $id)->first();

        return view('frontend.pages.product.brand_wise_product', compact('products', 'brandname'));
    }

    //About Page
    public function AboutPage()
    {
        $about = About::where('status', 'tamplate_one')->find(1);

        return view('frontend.pages.about_page', compact('about'));
    }

    //Login Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->registerOrlogin($user);

        return redirect()->route('template.one.dashboard');
    }

    public function registerOrlogin($data)
    {
        // Find user by email
        $user = User::where('email', $data->email)->first();

        // If user doesn't exist, create a new one
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->google_id = $data->id;
            // Generate a random password for the user
            $user->password = Hash::make(Str::random(8)); // You can adjust the password length as needed
            $user->save();
        }

        // Log in the user
        Auth::login($user);
    }
}
