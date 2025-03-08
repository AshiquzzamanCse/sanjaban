<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Contact;
use App\Models\Admin\Faq;
use App\Models\Admin\MultiImg;
use App\Models\Admin\Product;
use App\Models\Admin\ProductSinglePage;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class TemplateTwoController extends Controller
{
    //Index
    // public function Index()
    // {
    //     $videos = HomePage::where('status', '1')->latest()->get();

    //     return view('frontend.astell.index_astell');

    // }

    //Template OneProduct
    public function SingleProductTemplateTwo($id)
    {
        $product = Product::find($id);

        $sproducts = ProductSinglePage::where('status', 'active')->where('product_id', $product->id)->first();

        $multiImages = MultiImg::where('product_id', $product->id)->get();
        //dd($sproducts);

        return view('frontend.astell.product.single_product', compact('product', 'sproducts', 'multiImages'));

    }

    //Template Two AllProduct
    public function TemplateTwoAllProduct()
    {
        return view('frontend.astell.pages.all_product');
    }

    //Faq
    public function TemplateTwoFaq()
    {
        $faqs = Faq::where('status', '1')->orderBy('order', 'ASC')->latest()->get();
        return view('frontend.astell.pages.faq', compact('faqs'));
    }

    //Contact
    public function TemplateTwoContact()
    {
        return view('frontend.astell.pages.contact');
    }

    public function TemplateTwoContactStore(Request $request)
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

    //Buying
    public function TemplateTwoBuying()
    {
        return view('frontend.astell.pages.buying');
    }

    //Category Wise Product
    public function CategoryWiseProductTemplateTwo($id, $slug)
    {
        $catwiseproduct = Category::find($id);
        $products = Product::where('category_id', $catwiseproduct->id)->paginate(8);

        return view('frontend.astell.pages.category_wise_product_template_two', compact('catwiseproduct', 'products'));
    }

    // public function ProductDetailsTemplateTwo($id, $product_slug)
    // {

    //     $product = Product::find($id);
    //     $sproducts = ProductSinglePage::where('status', 'active')->where('product_id', $product->id)->first();
    //     $multiImages = MultiImg::where('product_id', $product->id)->get();

    //     return view('frontend.astell.pages.single_product', compact('product', 'sproducts', 'multiImages'));

    // }

    public function DadabhaaiProductSearch(Request $request)
    {
        $request->validate(['search' => 'required']);

        $item = $request->search;

        Product::where('product_name', 'LIKE', "%$item%")
            ->orWhere('short_desc', 'LIKE', "%$item%")
            ->paginate(16);

        // Redirect to a GET route instead of returning view directly
        return redirect()->route('product.search.results', ['item' => $item]);
    }

    public function showSearchResults(Request $request)
    {
        $item = $request->query('item');

        $products = Product::where('product_name', 'LIKE', "%$item%")
            ->orWhere('short_desc', 'LIKE', "%$item%")
            ->paginate(16);

        return view('frontend.astell.pages.dadabhaai_product_search', compact('products', 'item'));
    }

    //AddToCartProductHome
    public function AddToCartProductHomeAstell(Request $request)
    {
        $id = $request->product_id;

        $product = Product::findOrFail($id);

        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($cartItem->isNotEmpty()) {

            return response()->json(['error' => 'This Product Has Already Added']);
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

}
