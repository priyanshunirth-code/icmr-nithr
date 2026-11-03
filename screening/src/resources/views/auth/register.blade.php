@extends('layouts.app')

@section('content')
    {{-- @include('layouts.navbars.guest.navbar') --}}


    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">

                    <div class="row">
                        <div class="col-md-6">
                            {{-- <p class="text-center w-100">

                                1.Please use the latest Google chrome OR Mozilla firefox browser to fill the application form.
                                <br>2.The applicants are advised to submit their applications well in advance without waiting for last date and time of submission to avoid delayed submission due to server problem or any other technical glitches.



                            </p> --}}
                        </div>
                    </div>

                    <div class="row">



                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header text-center pt-4">
                                    <h5>Please Register here</h5>



                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('register.perform') }}">
                                        @csrf

                                        <div class="flex flex-col mb-3">
                                            <input type="text" name="full_name" class="form-control"
                                                placeholder="Full Name" aria-label="Name" value="{{ old('full_name') }}">
                                            @error('full_name')
                                                <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                            @enderror
                                        </div>

                                        <div class="flex flex-col mb-3">
                                            <input type="number" id="mobile_no" name="mobile_no" class="form-control"
                                                placeholder="Mobile No." value="{{ old('mobile_no') }}">

                                            @error('mobile_no')
                                                <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                            @enderror

                                        </div>

                                        <div class="flex flex-col mb-3">
                                            <div class="input-group">

                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="Email" aria-label="Email" value="{{ old('email') }}">

                                                {{-- <input type="button" id="varify_no" value="Varify"
                                                    class="btn btn-primary mb-0" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalMessage"> --}}
                                            </div>

                                            @error('email')
                                                <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <div class="input-group">

                                                <input type="password" name="password" class="form-control"
                                                id="password"   placeholder="Password" aria-label="Password">
                                                <div onclick="showPass('password');"
                                                    class="btn btn-primary btn-sm mb-0"> <span
                                                        class="ni ni-active-40"></span> </div>
                                                @error('password')
                                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="flex flex-col mb-3">
                                            <div class="input-group">

                                                <input type="password" name="confirm-password" class="form-control"
                                                    placeholder="confirm-password" id="confirm-password" aria-label="confirm-password">
                                                <div type="button"
                                                    onclick="showPass('confirm-password');"
                                                    class="btn btn-primary btn-sm mb-0"> <span
                                                        class="ni ni-active-40"></span> </div>
                                                @error('confirm-password')
                                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-check form-check-info text-start">
                                            <input class="form-check-input" type="checkbox" name="terms"
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                I have read the <a target="_blank"
                                                    href="{{ asset('annex/Final Advertisement For Registration.pdf') }}"
                                                    class="text-dark font-weight-bolder"> Advertisement </a> and agree to
                                                the <a target="_blank"
                                                    href="{{ asset('annex/Final Terms and Condition for registration.pdf') }}"
                                                    class="text-dark font-weight-bolder">Terms and
                                                    Conditions</a>
                                            </label>
                                            @error('terms')
                                                <p class='text-danger text-xs'> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn bg-gradient-dark w-100 my-4 mb-2">Register</button>
                                        </div>
                                        <p class="text-sm mt-3 mb-0">Already have an account? <a
                                                href="{{ route('login') }}" class="text-dark font-weight-bolder">Sign
                                                in</a></p>
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
                                <p class="position-relative text-white"><b>Last Date:- 21th August 2023</b></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalMessage" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message to @CT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="verificationForm">
                        @csrf

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="email" class="form-control col-md-12" name="emailVal" id="emailVal"
                                placeholder="Ex: 9522765577" readonly>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Human Verification:</label>
                            <div id="recaptcha-container" style="transform:scale(0.9);transform-origin:0 0"></div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $("#varify_no").click(function() {

                $("#is_verified_no").val('Yes');
                let emailVal = $("#email").val();
                $("#emailVal").val(emailVal);



                // alert("The paragraph was clicked.");
            });

        });

        function showPass(fieldId) {
            var passwordField = $('#'+fieldId);

            if (passwordField.attr('type') === 'password') {
                passwordField.attr('type', 'text');
            } else {
                passwordField.attr('type', 'password');
            }
        }
    </script>
@endsection
