@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="flex-wrap mb-5 page-title d-flex align-items-center me-3 mb-lg-0">
                <h1 class="my-1 mb-0 d-flex text-dark fw-bolder fs-3 align-items-center">Single Product</h1>
                <span class="mx-4 border-gray-300 h-20px border-start"></span>
                <ul class="my-1 breadcrumb breadcrumb-separatorless fw-bold fs-7">
                    <li class="breadcrumb-item text-muted">Total Single Product <span
                            class="ms-2 badge bg-danger">{{ count($sproducts) }}</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="gap-2 py-5 card-header align-items-center gap-md-5">
            <div class="d-flex">
                <h1 class="my-1 mb-0 d-flex text-dark fw-bolder fs-3 align-items-center">Product List</h1>
            </div>
            <div class="gap-5 card-toolbar flex-row-fluid justify-content-end">
                @if (Auth::guard('admin')->user()->can('add.sproduct'))
                    <a href="{{ route('add.single.page') }}" class="btn btn-info btn-sm">Add Product</a>
                @endif
            </div>
        </div>

        <div class="pt-0 card-body">
            <table id="kt_datatable_example_5" class="table table-striped" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th width="5%" class="text-center">Sl No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th width="10%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody valign="middle">
                    @foreach ($sproducts as $key => $sproduct)
                        <tr valign="middle">
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td>
                                <img src="{{ asset($sproduct['products']['product_image']) }}"
                                    style="width: 40px; height:40px;" alt="">
                            </td>
                            <td>{{ $sproduct['products']['product_name'] }}</td>
                            <td>
                                @if ($sproduct['products']['price'])
                                    <span>{{ $sproduct['products']['price'] }} $</span>
                                @elseif ($sproduct['products']['sas_price'])
                                    <span>{{ $sproduct['products']['sas_price'] }} $</span>
                                @else
                                    <span>{{ $sproduct['products']['discount_price'] }} $</span>
                                @endif
                            </td>
                            <td>{{ $sproduct['products']['qty'] }}</td>
                            <td>
                                @if ($sproduct->status == 'active')
                                    <span class="badge badge-light-success">Is_active</span>
                                @else
                                    <span class="badge badge-light-danger">Is_inactive</span>
                                @endif
                            </td>
                            <td class="text-center pe-4">
                                @if (Auth::guard('admin')->user()->can('status.sproduct'))
                                    @if ($sproduct->status == 'active')
                                        <a href="{{ route('inactive.single.page', $sproduct->id) }}" title="Inactive">
                                            <i class="bi bi-hand-thumbs-down text-danger fs-3"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('active.single.page', $sproduct->id) }}" title="Active">
                                            <i class="bi bi-hand-thumbs-up text-success fs-3"></i>
                                        </a>
                                    @endif
                                @endif

                                @if (Auth::guard('admin')->user()->can('edit.sproduct'))
                                    <a href="{{ route('edit.single.page', $sproduct->id) }}" class="ms-1" title="Edit">
                                        <i class="bi bi-pencil-square fs-3 text-primary"></i>
                                    </a>
                                @endif

                                @if (Auth::guard('admin')->user()->can('delete.sproduct'))
                                    <a href="{{ route('delete.single.page', $sproduct->id) }}" class="ms-1"
                                        id="delete" title="Delete">
                                        <i class="bi bi-trash3-fill fs-3 text-danger"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- DataTable  --}}
    <script>
        $("#kt_datatable_example_5").DataTable({
            "language": {
                "lengthMenu": "Show _MENU_",
            },
            "dom": "<'row'" +
                "<'col-12 col-sm-6 d-flex align-items-center justify-content-start'l>" + // Use col-12 for all, and col-sm-6 for sm
                "<'col-12 col-lg-6 col-12'f>" + // Same for the other element
                ">" +
                "<'table-responsive'tr>" +
                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        });
    </script>

@endsection
