<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\StatusMail;
use App\Models\User\Order;
use App\Models\User\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminOrderController extends Controller
{

    //Admin All Order
    public function AdminAllOrder()
    {
        $orders = Order::latest()->get();
        return view('admin.pages.order.all_order', compact('orders'));
    }

    //Admin Order Details
    public function AdminOrderDetails($id)
    {
        $order = Order::where('id', $id)->first();
        $orderitem = OrderItem::with('product')->where('order_id', $id)->orderBy('id', 'DESC')->get();

        return view('admin.pages.order.order_details', compact('order', 'orderitem'));
    }

    //Admin Order Invoice
    public function AdminOrderInvoice($id)
    {
        $order = Order::where('id', $id)->first();
        $orderitem = OrderItem::with('product')->where('order_id', $id)->orderBy('id', 'DESC')->get();

        return view('admin.pages.order.order_invoice', compact('order', 'orderitem'));

        // $pdf = Pdf::loadView('frontend.template_one.user.invoice', compact('order', 'orderitem'))->setPaper('a4')->setOption([
        //     'tempDir' => public_path(),
        //     'chroot' => public_path(),
        // ]);

        // return $pdf->download('user_invoice.pdf');
    }

    //Admin Order Status Change
    public function AdminOrderStatusChange(Request $request, $id)
    {
        $status = Order::find($id)->update([

            'status' => $request->status,

            'processing_date' => now(),
            'shipped_date' => now(),
            'delivered_date' => now(),

        ]);

        toastr()->success('Status Change Successfully');
        return redirect()->route('admin.all.order');
    }

    //Admin Order Delete
    public function AdminOrderDelete($id)
    {
        Order::find($id)->delete();

        toastr()->success('Order Delete Successfully');
        return redirect()->route('admin.all.order');
    }

    //Admin Processing Order
    public function AdminProcessingOrder()
    {
        $orders = Order::where('status', 'processing')->latest()->get();
        return view('admin.pages.order.all_order_processing', compact('orders'));
    }

    //Admin Shipped Order
    public function AdminShippedOrder()
    {
        $orders = Order::where('status', 'shipped')->latest()->get();
        return view('admin.pages.order.all_order_shipped', compact('orders'));
    }

    //Admin Deliver Order
    public function AdminDeliverOrder()
    {
        $orders = Order::where('status', 'delivered')->latest()->get();
        return view('admin.pages.order.all_order_delivered', compact('orders'));
    }

    //Admin Cancel Order
    public function AdminCancelOrder()
    {
        $orders = Order::where('status', 'cancelled')->latest()->get();
        return view('admin.pages.order.all_order_cancel', compact('orders'));
    }

    public function multuOrderStatusUpdate()
    {

        foreach (request('order_ids') as $id) {
            $item = Order::find($id);
            $item->status = request('status');
            $item->save();

        }

        return response()->json(['status' => true, 'msg' => 'Order Status Updated!!']);
    }
}
