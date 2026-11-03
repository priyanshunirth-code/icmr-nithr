@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Update Password'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="card-header pb-0 text-start">
                            <h4 class="font-weight-bolder">Change password</h4>
                            <p class="mb-0">Set a new password for your email</p>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" action="{{ route('change.password') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <div class="flex flex-col mb-3">
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password">
                                    @error('password')
                                        <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="password" name="confirm-password" class="form-control form-control-lg" placeholder="Confirm Password" aria-label="Password">
                                    @error('confirm-password')
                                        <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-lg btn-primary btn-lg mt-4 mb-0 ">Change Password</button>
                                </div>
                            </form>
                        </div>
                        <div id="alert">
                            @include('components.alert')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>

        @include('layouts.footers.auth.footer')
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            
        })
    </script>
@endsection
