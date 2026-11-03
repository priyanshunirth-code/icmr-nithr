@extends('layouts.app')

@section('content')
    {{-- <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                @include('layouts.navbars.guest.navbar')
            </div>
        </div>
    </div> --}}


    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">

                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div id="alert">
                                @include('components.alert')
                            </div>
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">OTP Verification</h4>
                                    <p class="mb-0">Check your email and confirm OTP</p>
                                </div>

                                <div class="card-body">

                                    <form role="form" method="POST" action="{{ route('verifiyOtp') }}">
                                        @csrf

                                        <div class="flex flex-col mb-3">
                                            <input readonly value="{{ $user->email }}" type="email" name="email"
                                                class="form-control form-control-lg" placeholder="Email" aria-label="Email">
                                            @error('email')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>

                                        <div class="flex flex-col mb-3">
                                            <input type="text" name="otp" class="form-control form-control-lg"
                                                placeholder="Enter OTP">
                                            @error('otp')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>

                                        <div class="text-center">
                                            <button type='submit' class="btn btn-primary m-2">Submit</button>

                                            <button id="resendotpbtn" type='button' class="btn btn-danger m-2"
                                                onclick="sendOtp('{{ $user->id }}')">Resend
                                                OTP</button>
                                        </div>

                                    </form>
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
                                <p class="position-relative text-white"><b>Last Date:- 10th August 2023</b></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>



    <script>
        function enableButton() {

            // Disable the button
            $('#resendotpbtn').prop('disabled', true);


            // Enable the button after a 5-second delay
            setTimeout(function() {
                $('#resendotpbtn').prop('disabled', false);

            }, 30000);
        }

        function sendOtp(id) {
            enableButton();

            $.ajax({
                url: '{{ route('resendOtp') }}',
                type: 'GET',
                data: {
                    'id': id
                },
                success: function(data) {

                    alert('Otp sent successfully')

                },
                error: function(err) {

                }
            })
        }
    </script>
@endsection
