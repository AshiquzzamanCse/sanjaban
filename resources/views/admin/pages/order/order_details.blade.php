@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!--begin::Content-->

    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Order</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Order Details<span class="ms-2 badge bg-danger"></span></li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <a href="{{ route('admin.all.order') }}" class="btn btn-light-primary btn-sm">Back</a>

            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->


    <!--begin::Post-->
    <div class="mt-5 mb-5">
        <div class="row">

            {{-- Billing Address  --}}
            <div class="col-lg-6">

                <div class="card">
                    <div class="pt-3 ps-5" style="height: 50px; text-align: start; background-color: #111213">
                        <h5 class="text-light">Billing Address</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>

                                <tr>
                                    <th class="fw-bold">Billing Name</th>
                                    <td>{{ $order->billing_name }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Billing Phone</th>
                                    <td>{{ $order->billing_phone }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Billing Email</th>
                                    <td>{{ $order->billing_email }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Billing Address One</th>
                                    <td>{{ $order->billing_address_line1 }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Billing Address Two</th>
                                    <td>{{ $order->billing_address_line2 }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Billing Post Code</th>
                                    <td>{{ $order->billing_postal_code }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Billing City</th>
                                    <td>{{ $order->billing_city }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Billing State</th>
                                    <td>{{ $order->billing_state }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Billing Country</th>
                                    <td>{{ $order->billing_country }}</td>
                                </tr>

                            </thead>
                        </table>
                    </div>
                </div>

            </div>
            {{-- Billing Address  --}}

            {{-- Order Info  --}}
            <div class="col-lg-6">

                <div class="card">
                    <div class="pt-3 ps-5" style="height: 50px; text-align: start; background-color: #111213">
                        <h5 class="text-light">Shipping Address</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>

                                <tr>
                                    <th class="fw-bold">Invoice No</th>
                                    <td class="text-danger">{{ $order->invoice_number }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Order Number</th>
                                    <td>{{ $order->order_number }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Payment Method</th>
                                    <td>{{ $order->payment_method }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Transcation Number</th>
                                    <td>{{ $order->transaction_number }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Total Amount</th>
                                    <td>$ {{ $order->total_amount }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Payment Status</th>
                                    <td>{{ $order->payment_status }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Order Date</th>
                                    <td>{{ $order->order_date }}</td>
                                </tr>

                                <tr>
                                    <th class="fw-bold">Status</th>

                                    <td class="px-3 text-white">
                                        @if ($order->status == 'pending')
                                            <span class="badge badge-danger">{{ $order->status }}</span>
                                        @elseif($order->status == 'processing')
                                            <span class="badge badge-primary">{{ $order->status }}</span>
                                        @elseif($order->status == 'shipped')
                                            <span class="badge badge-info">{{ $order->status }}</span>
                                        @elseif($order->status == 'delivered')
                                            <span class="badge badge-danger">{{ $order->status }}</span>
                                        @elseif($order->status == 'cancelled')
                                            <span class="badge badge-danger">{{ $order->status }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ $order->status }}</span>
                                        @endif
                                    </td>

                                </tr>

                                @if (Auth::guard('admin')->user()->can('status.order'))
                                    <tr>
                                        <td>
                                            <form action="{{ route('admin.order.status', $order->id) }}">
                                                @csrf
                                                <label for="" class="mb-2">Status Change</label>
                                                <select name="status" class="form-select form-select-sm" class="mx-3">
                                                    <option selected disabled>Change Status</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="processing">Processing</option>
                                                    <option value="shipped">Shipped</option>
                                                    <option value="delivered">Delivered</option>
                                                    <option value="cancelled">Cancel</option>
                                                </select>
                                                <button class="btn btn-light-primary btn-sm mt-3 float-end">Submit</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif

                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            {{-- Order Info  --}}


            {{-- Product Details --}}
            <div class="col-lg-12 mt-5">

                <table id="" class="table table-striped" style="width:100%">
                    <thead class="">
                        <tr style="background-color: #111213;color:white">
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($orderitem as $key => $item)
                            <tr>
                                <th class="text-center">{{ $key + 1 }}</th>

                                <td>
                                    <img src="{{ asset($item->product->product_image) }}" alt=""
                                        style="width: 50px;height: 50px;">
                                </td>

                                <td>{{ $item->product->product_name }}</td>
                                <td>$ {{ $item->price }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>$ {{ $item->qty * $item->price }}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
            {{-- Product Details --}}

        </div>
    </div>
    <!--end::Post-->
@endsection
