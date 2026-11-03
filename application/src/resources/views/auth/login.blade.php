@extends('layouts.app')

@section('content')
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <!--<div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">-->
                        <!--    <div class="card card-plain">-->
                        <!--        <div class="card-header pb-0 text-start">-->
                        <!--            <h4 class="font-weight-bolder">Sign In</h4>-->
                        <!--            <p class="mb-0">Enter your email and password to sign in</p>-->
                        <!--        </div>-->
                        <!--        <div class="card-body">-->
                        <!--            <form role="form" method="POST" action="{{ route('login.perform') }}">-->
                        <!--                @csrf-->
                        <!--                @method('post')-->
                        <!--                <div class="flex flex-col mb-3">-->
                        <!--                    <input type="email" name="email" placeholder="Email"-->
                        <!--                        class="form-control form-control-lg" aria-label="Email">-->
                        <!--                    @error('email')-->
                        <!--                        <p class="text-danger text-xs pt-1"> {{ $message }} </p>-->
                        <!--                    @enderror-->
                        <!--                </div>-->
                        <!--                <div class="flex flex-col mb-3">-->
                        <!--                    <input type="password" name="password" placeholder="Password"-->
                        <!--                        class="form-control form-control-lg" aria-label="Password">-->
                        <!--                    @error('password')-->
                        <!--                        <p class="text-danger text-xs pt-1"> {{ $message }} </p>-->
                        <!--                    @enderror-->
                        <!--                </div>-->

                        <!--                <div class="text-center">-->
                        <!--                    <button type="submit"-->
                        <!--                        class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>-->
                        <!--                </div>-->

                        <!--            </form>-->
                        <!--        </div>-->
                        <!--        <div class="card-footer text-center pt-0 px-lg-2 px-1">-->
                        <!--            <p class="mb-1 text-sm mx-auto">-->
                        <!--                Forgot you password? Reset your password-->
                        <!--                <a href="{{ route('reset-password') }}"-->
                        <!--                    class="text-primary text-gradient font-weight-bold">here</a>-->
                        <!--            </p>-->
                        <!--        </div>-->
                        <!--        @if(date("Y-m-d H:i:s") <= "2023-08-21 23:59:59")-->
                        <!--        <div class="card-footer text-center pt-0 px-lg-2 px-1">-->
                        <!--            <p class="mb-4 text-sm mx-auto">-->
                        <!--                Don't have an account?-->
                        <!--                <a href="{{ route('register') }}"-->
                        <!--                    class="text-primary text-gradient font-weight-bold">Register Here</a>-->
                        <!--            </p>-->
                        <!--        </div>-->
                        <!--        @endif-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div
                            class="col-12 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
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
