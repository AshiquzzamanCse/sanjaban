<div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
    <div>
        <div class="heading-2">
            <h3 class="title-3 fsz-15 grenadier-color">Track Order</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <form action="{{ route('track.order.search') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-lg-4">
                            <input type="text" class="form-control" placeholder="Enter Mobile Number" name="code"
                                required>
                        </div>

                        <div class="col-lg-4">
                            <button style="cursor: pointer"
                                class="grenadier-bg p-2 border-0 text-white px-4">Track</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
        {{-- Dashboard Links End --}}
    </div>
</div>
