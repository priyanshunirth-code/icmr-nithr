@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Short Completed Application Document'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Short Completed Application Document</h6>
                        <div class="d-flex">
                            <form id="searchPaymentStatus" method="get" action="{{ route('admin.short_completed_application_document') }}">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <select name="form_id" class="form-select">
                                                <option value="">Select</option>
                                                @if(!empty($form_ids))
                                                    @foreach($form_ids as $key => $value)
                                                        <option value="{{$value}}">{{$value}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-sm btn-primary">Short</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth.footer')
    </div>
    <script type="text/javascript">
    </script>
@endsection
