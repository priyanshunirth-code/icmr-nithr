@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid mt-3 py-4">

        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Applications</p>
                                    <h5 class="font-weight-bolder">
                                        {{$formcount}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">{{$FIRST_APPLYFOR}}</p>
                                    <h5 class="font-weight-bolder">
                                        {{$total_first_application}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Group-B(Technical)(Biological Sciences)</p>
                                    <h5 class="font-weight-bolder">
                                        {{$total_form_id1_application}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Group-B(Technical)(Social Sciences)</p>
                                    <h5 class="font-weight-bolder">
                                        {{$total_form_id2_application}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Group-B(Technical)(Computer Science/Information Technology)</p>
                                    <h5 class="font-weight-bolder">
                                        {{$total_form_id3_application}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Group-B(Technical)(Electronics & Communication Engineering)</p>
                                    <h5 class="font-weight-bolder">
                                        {{$total_form_id4_application}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Group-B(Technical)(Electrical Engineering)</p>
                                    <h5 class="font-weight-bolder">
                                        {{$total_form_id5_application}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Group-B(Technical)(Civil Engineering)</p>
                                    <h5 class="font-weight-bolder">
                                        {{$total_form_id6_application}}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">{{$SECOND_APPLYFOR}}</p>
                                    <h5 class="font-weight-bolder">
                                        {{$total_second_application}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Group-C(Technical)(Biological Sciences)</p>
                                    <h5 class="font-weight-bolder">
                                        {{$total_form_id7_application}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Group-B(Technical)(Computer Science)</p>
                                    <h5 class="font-weight-bolder">
                                        {{$total_form_id8_application}}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">{{$THIRD_APPLYFOR}}</p>
                                    <h5 class="font-weight-bolder">
                                        {{$total_third_application}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Group-C(Technical)</p>
                                    <h5 class="font-weight-bolder">
                                        {{$total_form_id9_application}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Group-B(Technical)(Refrigeration and air conditioning)</p>
                                    <h5 class="font-weight-bolder">
                                        {{$total_form_id10_application}}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection