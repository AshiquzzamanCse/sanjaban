<div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
    <div>

        <div class="heading-2">
            <h3 class="title-3 fsz-15 grenadier-color">Change Password</h3>
        </div>

        <form action="{{ route('template.one.user.password.update') }}" method="POST" class="col-md-12 text-start px-0"
            id="myForm">

            @csrf

            <div class="form-group">
                <label for="old_password">Old Password <span class="red-clr grenadier-color">*</span></label>
                <input type="password" name="old_password" value="{{ old('old_password') }}"
                    placeholder="Enter Old Password" class="form-control @error('old_password') is-invalid @enderror"
                    required>

                @error('old_password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="form-group">
                <label for="new_password">New Password <span class="red-clr grenadier-color">*</span></label>
                <input type="password" name="new_password" placeholder="Enter New Password"
                    class="form-control @error('new_password') is-invalid @enderror" required="">

                @error('new_password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="new_password_confirmation">Confirm Password <span
                        class="red-clr grenadier-color">*</span></label>
                <input type="password" name="new_password_confirmation" placeholder="Enter Confirm Password"
                    class="form-control @error('new_password_confirmation') is-invalid @enderror" required="">

                @error('confirmation_password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="">
                <button type="submit" style="cursor: pointer" class="grenadier-bg p-2 border-0 text-white px-4">
                    Password Update
                </button>
            </div>
        </form>
        {{-- Dashboard Links End --}}
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

{{-- validate code  --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                old_password: {
                    required: true,
                },

                new_password: {
                    required: true,
                },

                new_password_confirmation: {
                    required: true,
                },
            },
            messages: {
                old_password: {
                    required: 'Please Enter Old Password',
                },

                new_password: {
                    required: 'Please Enter New Password',
                },

                new_password_confirmation: {
                    required: 'Please Enter Confirm Password',
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
