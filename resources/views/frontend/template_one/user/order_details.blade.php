@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <div class="container mt-5 mb-5 pt-80 pb-80">
        <div class="row">

            {{-- Billing Address  --}}
            <div class="col-lg-4">

                <div class="card">
                    <div class="card-header">
                        <h5>Billing Address</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 table-striped table-hover">
                                <thead class="bg-light">
                                    <tr>
                                      <th scope="col">Name</th>
                                      <th scope="col">Details</th>
                                    </tr>
                                  </thead>
                                <tbody>
                                    <tr>
                                        <th>Billing Name</th>
                                        <td>{{ $order->billing_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Billing Phone</th>
                                        <td>{{ $order->billing_phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Billing Email</th>
                                        <td>{{ $order->billing_email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Billing Address One</th>
                                        <td>{{ $order->billing_address_line1 }}</td>
                                    </tr>
                                    <tr>
                                        <th>Billing Address Two</th>
                                        <td>{{ $order->billing_address_line2 }}</td>
                                    </tr>
                                    <tr>
                                        <th>Billing Post Code</th>
                                        <td>{{ $order->billing_postal_code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Billing City</th>
                                        <td>{{ $order->billing_city }}</td>
                                    </tr>
                                    <tr>
                                        <th>Billing State</th>
                                        <td>{{ $order->billing_state }}</td>
                                    </tr>
                                    <tr>
                                        <th>Billing Country</th>
                                        <td>{{ $order->billing_country }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            {{-- Billing Address  --}}
            {{-- Shipping Address  --}}
            <div class="col-lg-4">

                <div class="card">
                    <div class="card-header">
                        <h5>Shipping Address</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 table-striped table-hover">
                                <thead class="bg-light">
                                    <tr>
                                      <th scope="col">Name</th>
                                      <th scope="col">Details</th>
                                    </tr>
                                  </thead>
                                <tbody>
                                    <tr>
                                        <th>Shipping Name</th>
                                        <td>{{ $order->billing_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Phone</th>
                                        <td>{{ $order->billing_phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Email</th>
                                        <td>{{ $order->billing_email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Address One</th>
                                        <td>{{ $order->billing_address_line1 }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Address Two</th>
                                        <td>{{ $order->billing_address_line2 }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Post Code</th>
                                        <td>{{ $order->billing_postal_code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping City</th>
                                        <td>{{ $order->billing_city }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping State</th>
                                        <td>{{ $order->billing_state }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Country</th>
                                        <td>{{ $order->billing_country }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            {{-- Shipping Address  --}}

            {{-- Order Info  --}}
            <div class="col-lg-4">

                <div class="card">
                    <div class="card-header">
                        <h5>Order Info</h5>
                    </div>
                    <div class="card-body">
                        <table class="table mb-0 table-striped table-hover">
                            <thead class="bg-light">
                                <tr>
                                  <th scope="col">Name</th>
                                  <th scope="col">Details</th>
                                </tr>
                              </thead>
                            <tbody>
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
                                    <td class="text-danger text-capitalize">{{ $order->status }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- Order Info  --}}

            {{-- Product Details --}}
            <div class="col-lg-12 mt-4">
                <table class="table table-striped  table-bordered">
                    <thead class="grenadier-bg text-white">
                        <tr>
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
                                        style="width: 40px;">
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
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $("#select").select2({
            tags: true,
            // dropdownParent: $('#modal), // if select in modal
            theme: "bootstrap",
        });
    </script>
@endpush
