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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Home</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Edit Home</li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->

            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <a href="{{ route('all.home') }}" class="btn btn-light-primary btn-sm">Back</a>

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

                <div class="" style="background: #6196A6;height: 50px;">
                    <h6 class="float-end mt-4 text-white me-3 fw-bolder">Home Page Edit From</h6>
                </div>

                <div class="card-body">

                    <form action="{{ route('update.home') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $home->id }}">

                        <div class="row mb-4">
                            <div class="col-4 shadow-sm bg-white p-3">

                                <label for="" class="mb-3">Status</label>
                                <select name="status" id="" class="form-select form-select-sm" required>
                                    <option selected disabled>Choose Tamplate</option>

                                    {{-- <option value="tamplate_one" {{ $home->status == 'tamplate_one' ? 'selected' : '' }}>
                                    Template One</option> --}}

                                    <option value="tamplate_two" {{ $home->status == 'tamplate_two' ? 'selected' : '' }}>
                                        Template Two</option>

                                    {{-- <option value="tamplate_three"
                                    {{ $home->status == 'tamplate_three' ? 'selected' : '' }}>Template Three
                                </option> --}}

                                </select>
                            </div>
                        </div>

                        <div class="row">

                            {{-- Video Area --}}
                            <div class="col-12 shadow-sm bg-white border-3">
                                <div class="card">
                                    <div class="card-body">

                                        <h3 class="fw-bolder text-danger">Video Section</h3>

                                        <hr>

                                        <div class="row">

                                            {{-- Video One Section --}}

                                            <div class="col-3 mb-2">
                                                <div class="form-group">
                                                    <label for="">Video Slider One Title</label>
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        name="video_slider_one_title"
                                                        value="{{ $home->video_slider_one_title }}">
                                                </div>
                                            </div>

                                            <div class="col-3 mb-2">
                                                <div class="form-group">
                                                    <label for="">Video Slider One Sub Title</label>
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        name="video_slider_one_sub_title"
                                                        value="{{ $home->video_slider_one_sub_title }}">
                                                </div>
                                            </div>

                                            <div class="col-3 mb-2">
                                                <div class="form-group">
                                                    <label for="">Video Slider One Image</label>

                                                    <input type="file" class="form-control form-control-sm mt-2"
                                                        name="video_slider_one_image">

                                                    <img src="{{ asset('upload/home/' . $home->video_slider_one_image) }}"
                                                        style="width: 50px;height:50px;" class="mt-2" alt="">

                                                </div>
                                            </div>

                                            <div class="col-3 mb-2">
                                                <div class="form-group">
                                                    <label for="">Video Slider One Video</label>
                                                    <input type="file"
                                                        class="form-control form-control-sm mt-2 @error('video_slider_one_video') is-invalid @enderror"
                                                        name="video_slider_one_video"
                                                        value="{{ $home->video_slider_one_video }}">
                                                    @error('video_slider_one_video')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror

                                                    <a href="{{ route('delete.video', $home->id) }}"
                                                        class="ms-1 text-danger" id="delete" title="Delete">Delete
                                                        Video</i>
                                                    </a>

                                                </div>
                                            </div>

                                            {{-- Video Slider Two --}}

                                            <div class="col-3 mb-2">
                                                <div class="form-group">
                                                    <label for="">Video Slider Two Title</label>
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        name="video_slider_two_title"
                                                        value="{{ $home->video_slider_two_title }}">
                                                </div>
                                            </div>

                                            <div class="col-3 mb-2">
                                                <div class="form-group">
                                                    <label for="">Video Slider Two Sub Title</label>
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        name="video_slider_two_sub_title"
                                                        value="{{ $home->video_slider_two_sub_title }}">
                                                </div>
                                            </div>

                                            <div class="col-3 mb-2">
                                                <div class="form-group">
                                                    <label for="">Video Slider Two Image</label>

                                                    <input type="file" class="form-control form-control-sm mt-2"
                                                        name="video_slider_two_image">

                                                    <img src="{{ asset('upload/home/' . $home->video_slider_two_image) }}"
                                                        style="width: 50px;height:50px;" class="mt-2" alt="">

                                                </div>
                                            </div>

                                            <div class="col-3 mb-2">
                                                <div class="form-group">
                                                    <label for="">Video Slider Two Video</label>
                                                    <input type="file"
                                                        class="form-control form-control-sm mt-2 @error('video_slider_two_video') is-invalid @enderror"
                                                        name="video_slider_two_video"
                                                        value="{{ $home->video_slider_two_video }}">
                                                    @error('video_slider_two_video')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror

                                                    <a href="{{ route('delete.video2', $home->id) }}"
                                                        class="ms-1 text-danger" id="delete" title="Delete">Delete
                                                        Video</i>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            {{-- Category Section  --}}
                            <div class="col-12 shadow-sm bg-white border-3">
                                <div class="card">
                                    <div class="card-body">

                                        <h3 class="fw-bolder text-danger">Category Section</h3>

                                        <hr>

                                        <div class="row">


                                            <div class="col-3 mb-2">
                                                <div class="form-group">
                                                    <label for="">SubCategory One</label>

                                                    <select class="form-select form-select-solid form-select-sm"
                                                        name="category_tab_one_id" data-control="select2"
                                                        data-placeholder="Category One" data-allow-clear="true" required>
                                                        <option></option>
                                                        @if (count($subcategorys) > 0)
                                                            @foreach ($subcategorys as $subcategory)
                                                                <option value="{{ $subcategory->id }}"
                                                                    {{ $home->category_tab_one_id == $subcategory->id ? 'selected' : '' }}>
                                                                    {{ $subcategory->subcategory_name }}

                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-3 mb-2">
                                                <div class="form-group">
                                                    <label for="">Category Two</label>

                                                    <select class="form-select form-select-solid form-select-sm"
                                                        name="category_tab_two_id" data-control="select2"
                                                        data-placeholder="Category Two" data-allow-clear="true" required>
                                                        <option></option>
                                                        @if (count($categorys) > 0)
                                                            @foreach ($categorys as $category)
                                                                <option value="{{ $category->id }}"
                                                                    {{ $home->category_tab_two_id == $category->id ? 'selected' : '' }}>
                                                                    {{ $category->category_name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-3 mb-2">
                                                <div class="form-group">
                                                    <label for="">Category Three</label>

                                                    <select class="form-select form-select-solid form-select-sm"
                                                        name="category_tab_three_id" data-control="select2"
                                                        data-placeholder="Category Three" data-allow-clear="true"
                                                        required>
                                                        <option></option>
                                                        @if (count($categorys) > 0)
                                                            @foreach ($categorys as $category)
                                                                <option value="{{ $category->id }}"
                                                                    {{ $home->category_tab_three_id == $category->id ? 'selected' : '' }}>
                                                                    {{ $category->category_name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-3 mb-2">
                                                <div class="form-group">
                                                    <label for="">Category Four</label>

                                                    <select class="form-select form-select-solid form-select-sm"
                                                        name="category_tab_four_id" data-control="select2"
                                                        data-placeholder="Category Four" data-allow-clear="true" required>
                                                        <option></option>
                                                        @if (count($categorys) > 0)
                                                            @foreach ($categorys as $category)
                                                                <option value="{{ $category->id }}"
                                                                    {{ $home->category_tab_four_id == $category->id ? 'selected' : '' }}>
                                                                    {{ $category->category_name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            {{-- Image Slider Section  --}}
                            <div class="col-12 shadow-sm bg-white border-3">
                                <div class="card">
                                    <div class="card-body">

                                        <h3 class="fw-bolder text-danger">Image Section</h3>

                                        <hr>

                                        <div class="row">

                                            {{-- Image One  --}}
                                            <div class="col-12 mb-5">
                                                <h4 class="mb-3">One Image Slider</h4>
                                                <div class="row">

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">One Header</label>
                                                            <input type="text" name="image_slider_one_header"
                                                                value="{{ $home->image_slider_one_header }}"
                                                                class="form-control form-control-sm">

                                                        </div>
                                                    </div>

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">One Badge</label>
                                                            <input type="text" name="image_slider_one_badge"
                                                                value="{{ $home->image_slider_one_badge }}"
                                                                class="form-control form-control-sm">

                                                        </div>
                                                    </div>

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">One Title</label>
                                                            <input type="text" name="image_slider_one_title"
                                                                value="{{ $home->image_slider_one_title }}"
                                                                class="form-control form-control-sm">

                                                        </div>
                                                    </div>

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">One Sub Title</label>
                                                            <input type="text" name="image_slider_one_sub_title"
                                                                value="{{ $home->image_slider_one_sub_title }}"
                                                                class="form-control form-control-sm">

                                                        </div>
                                                    </div>

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">One Button Name</label>
                                                            <input type="text" name="image_slider_one_button_name"
                                                                value="{{ $home->image_slider_one_button_name }}"
                                                                class="form-control form-control-sm">

                                                        </div>
                                                    </div>

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">One Button Link</label>
                                                            <input type="text" name="image_slider_one_button_link"
                                                                value="{{ $home->image_slider_one_button_link }}"
                                                                class="form-control form-control-sm">

                                                        </div>
                                                    </div>

                                                    <div class="col-8 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">One Description</label>
                                                            <textarea name="image_slider_one_description" id="" cols="2" rows="2" class="form-control">{{ $home->image_slider_one_description }}</textarea>

                                                        </div>
                                                    </div>

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="">Image Slider One</label>

                                                            <input type="file"
                                                                class="form-control form-control-sm mt-2"
                                                                name="image_slider_one_image">

                                                            <img src="{{ asset('upload/home/' . $home->image_slider_one_image) }}"
                                                                style="width: 50px;height:50px;" class="mt-2"
                                                                alt="">

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            {{-- ============Image Two ============== --}}

                                            {{-- Image Two  --}}
                                            <div class="col-12 mb-5">
                                                <h4 class="mb-3">Two Image Slider</h4>
                                                <div class="row">

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">Two Header</label>
                                                            <input type="text" name="image_slider_two_header"
                                                                value="{{ $home->image_slider_two_header }}"
                                                                class="form-control form-control-sm">

                                                        </div>
                                                    </div>

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">Two Badge</label>
                                                            <input type="text" name="image_slider_two_badge"
                                                                value="{{ $home->image_slider_two_badge }}"
                                                                class="form-control form-control-sm">

                                                        </div>
                                                    </div>

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">Two Title</label>
                                                            <input type="text" name="image_slider_two_title"
                                                                value="{{ $home->image_slider_two_title }}"
                                                                class="form-control form-control-sm">

                                                        </div>
                                                    </div>

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">Two Sub Title</label>
                                                            <input type="text" name="image_slider_two_sub_title"
                                                                value="{{ $home->image_slider_two_sub_title }}"
                                                                class="form-control form-control-sm">

                                                        </div>
                                                    </div>

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">Two Button Name</label>
                                                            <input type="text" name="image_slider_two_button_name"
                                                                value="{{ $home->image_slider_two_button_name }}"
                                                                class="form-control form-control-sm">

                                                        </div>
                                                    </div>

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">Two Button Link</label>
                                                            <input type="text" name="image_slider_two_button_link"
                                                                value="{{ $home->image_slider_two_button_link }}"
                                                                class="form-control form-control-sm">

                                                        </div>
                                                    </div>

                                                    <div class="col-8 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">Two Description</label>
                                                            <textarea name="image_slider_two_description" id="" cols="2" rows="2" class="form-control">{{ $home->image_slider_two_description }}</textarea>

                                                        </div>
                                                    </div>

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="">Image Slider Two</label>

                                                            <input type="file"
                                                                class="form-control form-control-sm mt-2"
                                                                name="image_slider_two_image">

                                                            <img src="{{ asset('upload/home/' . $home->image_slider_two_image) }}"
                                                                style="width: 50px;height:50px;" class="mt-2"
                                                                alt="">

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            {{-- Image Three  --}}
                                            <div class="col-12 mb-5">
                                                <h4 class="mb-3">Three Image Slider</h4>
                                                <div class="row">

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">Three Header</label>
                                                            <input type="text" name="image_slider_three_header"
                                                                value="{{ $home->image_slider_three_header }}"
                                                                class="form-control form-control-sm">

                                                        </div>
                                                    </div>

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">Three Badge</label>
                                                            <input type="text" name="image_slider_three_badge"
                                                                value="{{ $home->image_slider_three_badge }}"
                                                                class="form-control form-control-sm">

                                                        </div>
                                                    </div>

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">Three Title</label>
                                                            <input type="text" name="image_slider_three_title"
                                                                value="{{ $home->image_slider_three_title }}"
                                                                class="form-control form-control-sm">

                                                        </div>
                                                    </div>

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">Three Sub Title</label>
                                                            <input type="text" name="image_slider_three_sub_title"
                                                                value="{{ $home->image_slider_three_sub_title }}"
                                                                class="form-control form-control-sm">

                                                        </div>
                                                    </div>

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">Three Button Name</label>
                                                            <input type="text" name="image_slider_three_button_name"
                                                                value="{{ $home->image_slider_three_button_name }}"
                                                                class="form-control form-control-sm">

                                                        </div>
                                                    </div>

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">Three Button Link</label>
                                                            <input type="text" name="image_slider_three_button_link"
                                                                value="{{ $home->image_slider_three_button_link }}"
                                                                class="form-control form-control-sm">

                                                        </div>
                                                    </div>

                                                    <div class="col-8 mb-2">
                                                        <div class="form-group">
                                                            <label for="" class="mb-2">Three Description</label>
                                                            <textarea name="image_slider_three_description" id="" cols="2" rows="2" class="form-control">{{ $home->image_slider_three_description }}</textarea>

                                                        </div>
                                                    </div>

                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <label for="">Image Slider Three</label>

                                                            <input type="file"
                                                                class="form-control form-control-sm mt-2"
                                                                name="image_slider_three_image">

                                                            <img src="{{ asset('upload/home/' . $home->image_slider_three_image) }}"
                                                                style="width: 50px;height:50px;" class="mt-2"
                                                                alt="">

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            {{-- Background Image --}}
                            <div class="col-12 shadow-sm bg-white border-3">
                                <div class="card">
                                    <div class="card-body">

                                        <h3 class="fw-bolder text-danger">Background Image</h3>

                                        <hr>

                                        <div class="row">

                                            {{-- Video One Section --}}

                                            <div class="col-12 mb-2">
                                                <div class="form-group">
                                                    <label for="">Background Image Title</label>
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        name="background_image_title"
                                                        value="{{ $home->background_image_title }}">
                                                </div>
                                            </div>

                                            <div class="col-4 mb-2">
                                                <div class="form-group">
                                                    <label for="">Sub Title</label>
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        name="background_image_sub_title"
                                                        value="{{ $home->background_image_sub_title }}">
                                                </div>
                                            </div>

                                            <div class="col-4 mb-2">
                                                <div class="form-group">
                                                    <label for="">Button Name</label>
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        name="background_image_button_name"
                                                        value="{{ $home->background_image_button_name }}">
                                                </div>
                                            </div>

                                            <div class="col-4 mb-2">
                                                <div class="form-group">
                                                    <label for="">Button Link</label>
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        name="background_image_button_link"
                                                        value="{{ $home->background_image_button_link }}">
                                                </div>
                                            </div>

                                            <div class="col-4 mb-2">
                                                <div class="form-group">
                                                    <label for="">One Image</label>

                                                    <input type="file" class="form-control form-control-sm mt-2"
                                                        name="background_image_one_image">

                                                    <img src="{{ asset('upload/home/' . $home->background_image_one_image) }}"
                                                        style="width: 50px;height:50px;" class="mt-2" alt="">

                                                </div>
                                            </div>

                                            <div class="col-4 mb-2">
                                                <div class="form-group">
                                                    <label for="">Two Image</label>
                                                    <input type="file" class="form-control form-control-sm mt-2"
                                                        name="background_image_two_image">

                                                    <img src="{{ asset('upload/home/' . $home->background_image_two_image) }}"
                                                        style="width: 50px;height:50px;" class="mt-2" alt="">
                                                </div>
                                            </div>

                                            <div class="col-4 mb-2">
                                                <div class="form-group">
                                                    <label for="">Three Image</label>
                                                    <input type="file" class="form-control form-control-sm mt-2"
                                                        name="background_image_three_image">

                                                    <img src="{{ asset('upload/home/' . $home->background_image_three_image) }}"
                                                        style="width: 50px;height:50px;" class="mt-2" alt="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            {{-- Product Image --}}
                            <div class="col-12 shadow-sm bg-white border-3">
                                <div class="card">
                                    <div class="card-body">

                                        <h3 class="fw-bolder text-danger">Product Section</h3>

                                        <hr>

                                        <div class="row">

                                            {{-- Feature Product One --}}
                                            <div class="col-3 mb-2">
                                                <div class="form-group">
                                                    <label for="">Product One</label>

                                                    <select class="form-select form-select-solid form-select-sm"
                                                        name="feature_product_one" data-control="select2"
                                                        data-placeholder="Product Name" data-allow-clear="true" required>
                                                        <option></option>
                                                        @if (count($products) > 0)
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->id }}"
                                                                    {{ $home->feature_product_one == $product->id ? 'selected' : '' }}>
                                                                    {{ $product->product_name }}

                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- Feature Product Two --}}
                                            <div class="col-3 mb-2">
                                                <div class="form-group">
                                                    <label for="">Product Two</label>

                                                    <select class="form-select form-select-solid form-select-sm"
                                                        name="feature_product_two" data-control="select2"
                                                        data-placeholder="Product Name" data-allow-clear="true" required>
                                                        <option></option>
                                                        @if (count($products) > 0)
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->id }}"
                                                                    {{ $home->feature_product_two == $product->id ? 'selected' : '' }}>
                                                                    {{ $product->product_name }}

                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- Feature Product Three --}}
                                            <div class="col-3 mb-2">
                                                <div class="form-group">
                                                    <label for="">Product Three</label>

                                                    <select class="form-select form-select-solid form-select-sm"
                                                        name="feature_product_three" data-control="select2"
                                                        data-placeholder="Product Name" data-allow-clear="true" required>
                                                        <option></option>
                                                        @if (count($products) > 0)
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->id }}"
                                                                    {{ $home->feature_product_three == $product->id ? 'selected' : '' }}>
                                                                    {{ $product->product_name }}

                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>


                                            {{-- Feature Product Four --}}
                                            <div class="col-3 mb-2">
                                                <div class="form-group">
                                                    <label for="">Product Four</label>

                                                    <select class="form-select form-select-solid form-select-sm"
                                                        name="feature_product_four" data-control="select2"
                                                        data-placeholder="Product Name" data-allow-clear="true" required>
                                                        <option></option>
                                                        @if (count($products) > 0)
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->id }}"
                                                                    {{ $home->feature_product_four == $product->id ? 'selected' : '' }}>
                                                                    {{ $product->product_name }}

                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- Feature Product One Image --}}
                                            <div class="col-3 mb-2">
                                                <div class="form-group">
                                                    <label for="">Product One Image</label>

                                                    <input type="file" name="feature_product_one_image"
                                                        class="form-control form-control-sm">

                                                    <img src="{{ asset('upload/home/' . $home->feature_product_one_image) }}"
                                                        style="width: 50px;height:50px;" class="mt-2" alt="">
                                                </div>
                                            </div>

                                            {{-- Feature Product Two Image --}}
                                            <div class="col-3 mb-2">
                                                <div class="form-group">
                                                    <label for="">Product Two Image</label>

                                                    <input type="file" name="feature_product_two_image"
                                                        class="form-control form-control-sm">

                                                    <img src="{{ asset('upload/home/' . $home->feature_product_two_image) }}"
                                                        style="width: 50px;height:50px;" class="mt-2" alt="">
                                                </div>
                                            </div>

                                            {{-- Feature Product Three Image --}}
                                            <div class="col-3 mb-2">
                                                <div class="form-group">
                                                    <label for="">Product Three Image</label>

                                                    <input type="file" name="feature_product_three_image"
                                                        class="form-control form-control-sm">

                                                    <img src="{{ asset('upload/home/' . $home->feature_product_three_image) }}"
                                                        style="width: 50px;height:50px;" class="mt-2" alt="">
                                                </div>
                                            </div>

                                            {{-- Feature Product Four Image --}}
                                            <div class="col-3 mb-2">
                                                <div class="form-group">
                                                    <label for="">Product Four Image</label>

                                                    <input type="file" name="feature_product_four_image"
                                                        class="form-control form-control-sm">

                                                    <img src="{{ asset('upload/home/' . $home->feature_product_four_image) }}"
                                                        style="width: 50px;height:50px;" class="mt-2" alt="">
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary btn-sm float-end">Update
                                    Home</button>
                            </div>

                        </div>


                    </form>

                </div>

            </div>
        </div>

    </div>


    <!--end::Post-->
@endsection
