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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Offer Category</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total Offer Category<span
                            class="ms-2 badge bg-danger">{{ count($offercats) }}</span></li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                @if (Auth::guard('admin')->user()->can('add.offer'))
                    <a href="" class="btn btn-light-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#addModal">Add
                        Offer Category</a>
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
                                <th class="ps-2">Sl No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offercats as $key => $offercat)
                                <tr>

                                    <td class="ps-3">{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ !empty($offercat->offer_category_image) ? url('storage/offer_category_image/' . $offercat->offer_category_image) : url('https://ui-avatars.com/api/?name=' . urlencode($offercat->offer_category_name)) }}"
                                            style="width: 40px;height:40px;" alt="">



                                    </td>

                                    <td>{{ $offercat->offer_category_name }}</td>

                                    <td>
                                        @if ($offercat->status == 1)
                                            <span class="badge badge-light-success">Is_active</span>
                                        @else
                                            <span class="badge badge-light-danger">Is_inactive</span>
                                        @endif
                                    </td>

                                    <td>

                                        @if (Auth::guard('admin')->user()->can('status.offer'))
                                            @if ($offercat->status == 1)
                                                <a href="{{ route('offer.inactive.category', $offercat->id) }}"
                                                    title="Inactive"><i
                                                        class="bi bi-hand-thumbs-down text-danger fs-3"></i></a>
                                            @else
                                                <a href="{{ route('offer.active.category', $offercat->id) }}"
                                                    title="Active"><i
                                                        class="bi bi-hand-thumbs-up text-success fs-3"></i></a>
                                            @endif
                                        @endif

                                        @if (Auth::guard('admin')->user()->can('edit.offer'))
                                            <a href="" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $offercat->id }}" class="ms-1"
                                                title="Edit"><i class="bi bi-pencil-square fs-3 text-primary"></i></a>
                                        @endif

                                        {{-- Edit Modal --}}

                                        <div class="modal fade" id="editModal{{ $offercat->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background: #6196A6;height: 50px;">
                                                        <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Edit
                                                            Offer Category</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('update.offer.category') }}" method="POST"
                                                        id="myForm1" enctype="multipart/form-data">

                                                        @csrf

                                                        <input type="hidden" name="id" value="{{ $offercat->id }}">

                                                        <div class="modal-body">

                                                            <div class="row">

                                                                <div class="col-12 mb-3">

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Category
                                                                            Name</label>
                                                                        <input type="text" name="offer_category_name"
                                                                            class="form-control form-control-sm form-control-solid"
                                                                            placeholder="Offer Category Name"
                                                                            value="{{ $offercat->offer_category_name }}"
                                                                            autocomplete="off">
                                                                    </div>

                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="form-group mb-3">

                                                                        <label for="" class="mb-2">Icon Image</label>

                                                                        <input type="file" autocomplete="off"
                                                                            id="" name="icon_image"
                                                                            class="form-control form-control-sm border-1 mb-2 image1">

                                                                        <img src="{{ asset('storage/offer_category_image/' . $offercat->icon_image) }}"
                                                                            style="width:73px" class="showImage1"
                                                                            alt="">

                                                                    </div>
                                                                </div>


                                                                <div class="col-6">
                                                                    <div class="form-group mb-3">

                                                                        <label for="" class="mb-2">Banner Image</label>

                                                                        <input type="file" autocomplete="off"
                                                                            id="" name="offer_category_image"
                                                                            class="form-control form-control-sm border-1 mb-2 image">

                                                                        <img src="{{ asset('storage/offer_category_image/' . $offercat->offer_category_image) }}"
                                                                            style="width:73px" class="showImage"
                                                                            alt="">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary btn-sm">Update
                                                                Offer Category</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                        @if (Auth::guard('admin')->user()->can('delete.offer'))
                                            <a href="{{ route('delete.offer.category', $offercat->id) }}" class="ms-1"
                                                id="delete" title="Delete"><i
                                                    class="bi bi-trash3-fill fs-3 text-danger"></i></a>
                                        @endif


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

    {{-- Modal --}}

    <!-- Button trigger modal -->


    <!-- Add Modal -->

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background: #6196A6;height: 50px;">
                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Add Offer Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.offer.category') }}" method="POST" id="myForm"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-12 mb-3">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Category Name</label>
                                    <input type="text" name="offer_category_name"
                                        class="form-control form-control-sm form-control-solid"
                                        placeholder="Offer Category Name" value="{{ old('offer_category_name') }}"
                                        autocomplete="off">
                                </div>

                            </div>

                            <div class="col-6">
                                <div class="form-group mb-3">

                                    <label for="" class="mb-2">Offer Icon Image</label>

                                    <input type="file" autocomplete="off" id="" name="icon_image"
                                        class="form-control form-control-sm border-1 form-control-solid mb-2 image">

                                    <img src="{{ url('upload/no_image.jpg') }}" style="width:73px" class="showImage"
                                        alt="">
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="form-group mb-3">

                                    <label for="" class="mb-2">Offer Banner Image</label>

                                    <input type="file" autocomplete="off" id="" name="offer_category_image"
                                        class="form-control form-control-sm border-1 form-control-solid mb-2 image1">

                                    <img src="{{ url('upload/no_image.jpg') }}" style="width:73px" class="showImage1"
                                        alt="">
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Add Offer Category</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Button trigger modal -->

    {{-- Image Show  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('.image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.image1').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.showImage1').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
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

    {{-- validate code  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    offer_category_name: {
                        required: true,
                    },


                },
                messages: {
                    offer_category_name: {
                        required: 'Please Enter Offer Category Name',
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm1').validate({
                rules: {
                    offer_category_name: {
                        required: true,
                    },

                },
                messages: {
                    offer_category_name: {
                        required: 'Please Enter Offer Category Name',
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
@endsection
