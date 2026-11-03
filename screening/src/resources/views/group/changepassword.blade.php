@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Change Password'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <form role="form" method="POST" action={{ route('group.updatepassword') }} enctype="multipart/form-data">
                        @csrf
                        @error('err')
                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                        @enderror
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <p class="mb-0">Change Password</p>
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Password</label>
                                        <input class="form-control" type="text" name="password" value="{{ old('password')}}">
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <button type="submit" class="btn btn-primary btn-sm ms-auto text-right">Save</button>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth.footer')
    </div>
@endsection
