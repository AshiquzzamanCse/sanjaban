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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Total Orders</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Shipped Order<span
                            class="ms-2 badge bg-danger">{{ count($orders) }}</span></li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                @if (Auth::guard('admin')->user()->can('all.pending'))
                    <a href="{{ route('admin.all.order') }}" class="btn btn-light-danger btn-sm">All Order</a>
                @endif

                @if (Auth::guard('admin')->user()->can('all.processing'))
                    <a href="{{ route('all.processing.order') }}" class="btn btn-light-primary btn-sm">Processing</a>
                @endif

                @if (Auth::guard('admin')->user()->can('all.shipped'))
                    <a href="{{ route('all.shipped.order') }}" class="btn btn-light-dark btn-sm">Shipped</a>
                @endif

                @if (Auth::guard('admin')->user()->can('all.delivered'))
                    <a href="{{ route('all.delivered.order') }}" class="btn btn-light-info btn-sm">Delivered</a>
                @endif

                @if (Auth::guard('admin')->user()->can('all.cancel'))
                    <a href="{{ route('all.cancel.order') }}" class="btn btn-light-danger btn-sm">Cancel</a>
                @endif

            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Post-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!--begin::Table-->

                    <table id="kt_datatable_example_5" class="table table-striped" style="width:100%">

                        <thead>

                            <tr>
                                <th style="width: 40px;">No</th>
                                <th>Invoice No</th>
                                <th>Order Number</th>
                                <th>Amount</th>
                                <th>Order Date</th>
                                <th>Payment Method</th>
                                <th>Status</th>

                                <th scope="col">Action</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($orders as $key => $order)
                                <tr>
                                    <th scope="row" class="text-center">{{ $key + 1 }}</th>
                                    <td>{{ $order->invoice_number }}</td>
                                    <td>{{ $order->order_number }}</td>
                                    <td>Tk {{ $order->total_amount }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->payment_method }}</td>

                                    <td class="">
                                        @if ($order->status == 'pending')
                                            <span class="badge badge-danger">{{ $order->status }}</span>
                                        @elseif($order->status == 'processing')
                                            <span class="badge badge-primary">{{ $order->status }}</span>
                                        @elseif($order->status == 'shipped')
                                            <span class="badge badge-info">{{ $order->status }}</span>
                                        @elseif($order->status == 'delivered')
                                            <span class="badge badge-success">{{ $order->status }}</span>
                                        @elseif($order->status == 'cancelled')
                                            <span class="badge badge-danger">{{ $order->status }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ $order->status }}</span>
                                        @endif
                                    </td>

                                    <td>

                                        <a href="{{ route('admin.order.details', $order->id) }}"><i
                                                class="fa fa fa-eye text-muted pr-2"></i></a>

                                        <a href="{{ route('admin.order.invoice', $order->id) }}" target="_blank"><i
                                                class="fa fa-download text-success"></i></a>

                                        <a href="{{ route('admin.order.delete', $order->id) }}" id="delete"><i
                                                class="fa fa-close text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <!--end::Table-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Post-->


    {{-- Data Table  --}}
    <script>
        $("#kt_datatable_example_5").DataTable({
            "language": {
                "lengthMenu": "Show _MENU_",
            },
            "dom": "<'row'" +
                "<'col-lg-6 col-12 -'l>" +
                "<'col-lg-6 col-12'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        });
    </script>
@endsection
