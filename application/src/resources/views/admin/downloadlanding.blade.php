@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Applications'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body px-/0 pt-0 pb-2">
                        <div><strong>Total Student: {{$total_student}}</strong></div>
                        <div><strong>Total Application Downloaded: {{$total_application_downloaded}}</strong></div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
