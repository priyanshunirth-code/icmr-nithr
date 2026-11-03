@extends('layouts.app')

@section('content')
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Change password</h4>
                                    <p class="mb-0">Set a new password for your email</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('change.perform') }}">
                                        @csrf

                                        <div class="flex flex-col mb-3">
                                            <input disabled type="email" name="email" class="form-control form-control-lg"
                                                placeholder="Email" value="{{ $email }}" aria-label="Email">
                                            @error('email')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>

                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <div class="flex flex-col mb-3">
                                            <input type="password" name="password" class="form-control form-control-lg"
                                                placeholder="Password" aria-label="Password">
                                            @error('password')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="password" name="confirm-password"
                                                class="form-control form-control-lg" placeholder="Password"
                                                aria-label="Password">
                                            @error('confirm-password')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Change Password</button>
                                        </div>
                                    </form>
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
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">The Last Date For Application For The Regular Posts of Technical Cadre (Technical Assistant/Technician I/Lab. Attendant I). Advertisement. No. NIRTH/Tech/01/2023 Is Now Over.</h4>
                                <!--<h4 class="mt-5 text-white font-weight-bolder position-relative">Advertisement. No.
                                    NIRTH/Tech/01/2023 Dated 10.07.2023</h4>
                                <p class="position-relative text-white"><b>Last Date:- 21th August 2023</b></p>-->
                                <p class="position-relative text-white"><b>Application Process Is Closed</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
