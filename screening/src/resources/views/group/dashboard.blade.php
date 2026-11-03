@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid mt-3 py-4">

        <div class="row">
            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="numbers">
                                    <h5 class="font-weight-bolder">
                                        {{$subject_group}}
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                                Total Applications: {{$total_form}}
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Complete Screening: {{$complete_shorting}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Pending Screening: {{$pending_shorting}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($group->status == 1)
        <div class="row mt-4">
            <div class="col-md-3 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="numbers text-center">
                            <h5 class="font-weight-bolder text-danger">
                                All screening marked completed
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @include('layouts.footers.auth.footer')
    </div>
@endsection