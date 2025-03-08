@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Subscribe</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total Subscribe <span
                            class="ms-2 badge bg-danger">{{ count($subscribes) }}</span></li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            {{-- <div class="d-flex align-items-center gap-2 gap-lg-3">

                <a data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-light-primary btn-sm">Add
                    Subscribes</a>

            </div> --}}
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
                        <thead class="bg-black text-light">
                            <tr>
                                <th class="ps-2">Sl No</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscribes as $key => $subscribe)
                                <tr>

                                    <td class="ps-3">{{ $key + 1 }}</td>
                                    <td>{{ $subscribe->email }}</td>

                                    <td>
                                        <a href="{{ route('delete.subscribe', $subscribe->id) }}" class="ms-1" id="delete"
                                            title="Delete"><i class="bi bi-trash3-fill fs-3 text-danger"></i></a>
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

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-centered">
            <div class="modal-content">

                <div class="modal-header" style="background: #6196A6;height: 50px;">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add Coupon</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.coupon') }}" method="POST" id="myForm" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            {{-- <div class="col-6">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Coupon Name</label>
                                    <input type="text" name="coupon_name" class="form-control form-control-sm"
                                        placeholder="Coupon Name" autocomplete="off">
                                </div>

                            </div> --}}

                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Coupon Name</label>
                                    <input type="text" name="coupon_name"
                                        class="form-control form-control-sm @error('coupon_name') is-invalid @enderror"
                                        placeholder="Coupon Name" autocomplete="off">

                                    <!-- Display validation error message -->
                                    @error('coupon_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-6">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Discount(%)</label>
                                    <input type="number" name="coupon_discount" class="form-control form-control-sm"
                                        placeholder="Coupon Discount" autocomplete="off">
                                </div>

                            </div>

                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Validity</label>
                                    <input type="date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                        name="coupon_validity" class="form-control form-control-sm" autocomplete="off">
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Button trigger modal -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    {{-- validate code  --}}
    <script type="text/javascript">
        $(document).ready(function() {

            $('#myForm').validate({
                rules: {
                    coupon_name: {
                        required: true,
                    },
                    coupon_discount: {
                        required: true,
                    },
                    coupon_validity: {
                        required: true,
                    },
                },
                messages: {
                    coupon_name: {
                        required: 'Please Enter Coupon Name',
                    },
                    coupon_discount: {
                        required: 'Please Enter Coupon Value',
                    },

                    coupon_validity: {
                        required: 'Please Enter Valid Date',
                    },

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>



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
