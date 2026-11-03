@extends('layouts.app')

@section('content')
    {{-- <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                @include('layouts.navbars.guest.navbar')
            </div>
        </div> --}}
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Reset your password</h4>
                                    <p class="mb-0">Enter your email and please wait a few seconds</p>
                                </div>
                                <div class="card-body">

                                    <input type="hidden" name="id" id="id">

                                    <div class="flex flex-col mb-3">
                                        <input type="email" name="email" id="email"
                                            class="form-control form-control-lg" placeholder="Email"
                                            value="{{ old('email') }}" aria-label="Email">
                                        @error('email')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror
                                        <p class="text-danger text-xs pt-1" id="error"></p>

                                    </div>

                                    <div class="flex flex-col mb-3" id="otpDiv" style="display: none">
                                        <input type="text" name="otp" id="otp"
                                            class="form-control form-control-lg" placeholder="Enter OTP"
                                            value="{{ old('otp') }}" aria-label="otp">
                                        @error('otp')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror
                                        <p class="text-danger text-xs pt-1" id="otperror"></p>
                                        <p class="text-primary text-xs pt-1" id="otpsucces"></p>

                                    </div>
                                    <div class="text-center">
                                        <button type="button" id="sendOtpBtn" onclick="sendOtp()"
                                            class="btn btn-lg btn-danger btn-lg w-100 mt-4 mb-0">Send OTP</button>

                                        <button type="button" style="display: none" id="otpVerifyBtn" onclick="otpVerify()"
                                            class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Verify OTP</button>
                                    </div>
                                </div>
                                <div id="alert">
                                    @include('components.alert')
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div
                                class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden">

                                <div>
                                    <img src="{{ asset('img/icmr-new-logo.jpg') }}" alt="">
                                </div>
                                <p class="text-white">Jabalpur, Madhya Pradesh</p>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">Advertisement. No.
                                    NIRTH/Tech/01/2023 Dated 10.07.2023</h4>
                                <p class="position-relative text-white"><b>Last Date:- 21th August 2023</b></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <script>
        function sendOtp() {
            $('#error').html('');

            let email = $('#email').val();
            if (!email) {
                alert('Please enter email address')
            }

            $.ajax({
                url: '{{ route('resendOtp') }}',
                type: 'GET',
                data: {
                    'email_id': email,
                },
                success: function(id) {

                    $('#id').val(id);


                    alert('Otp sent successfully')
                    $('#email').prop('disabled', true);

                    $('#otpDiv').show();
                    $('#otpVerifyBtn').show();
                    $('#sendOtpBtn').hide();



                },
                error: function(err) {

                    if (err) {

                        $('#error').html(err.responseJSON.error);

                    }
                    console.log(err.responseJSON);
                }
            })
        }

        function otpVerify() {

            $('#otperror').html('');

            let otp = $('#otp').val();
            let id = $('#id').val();

            if (!otp) {
                alert('Please enter OTP')
            }

            $.ajax({
                url: '{{ route('verifyForChangePass') }}',
                type: 'GET',
                data: {
                    'id': id,
                    'otp': otp,
                },
                success: function(data) {
                    $('#otpsucces').html(data.success);

                    console.log(data); 
                    if (data.success) {

                        window.location.href = "{{ url('change-password?id=') }}" + data.id;

                    }

                },
                error: function(err) {

                    if (err) {

                        $('#otperror').html(err.responseJSON.error);

                    }
                    console.log(err.responseJSON);
                }
            })
        }

        function finalSubmitWithoutPay(id) {

            let iagree = $('input[name="iagree"]').prop("checked");

            if (iagree) {


                if (confirm(
                        "Are you sure to submit the application form there after you will not be able to change the entries?"
                    )) {
                    window.location.href = "{{ url('form-final-submit?id=') }}" + id;
                }

            } else {
                alert('Please confirm the declaration')
            }
        }
    </script>
@endsection
