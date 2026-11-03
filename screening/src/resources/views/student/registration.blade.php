@extends('layouts.app')

@section('content')
    <main class="main-content mt-0">

        @include('student.studentProfile')
        @php
        $last_date_time = "2023-08-21 23:59:59";
        @endphp
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header text-center p-0 mx-3 mt-3 position-relative z-index-1">
                            <h3>Advertisement. No. NIRTH/Tech/01/2023 Dated 10.07.2023</h3>
                            <b class="text-danger">Last date: 21th August 2023</b>
                        </div>

                        {{-- {{$job_form_id}} --}}

                        <div class="card-body pt-2">

                            <div class="table1">


                                {{-- <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">House</span> --}}
                                <a href="javascript:;" class="card-title h5 d-block text-darker">
                                    Technical Assistant –<span class="text-primary "> 23 Posts </span> :
                                </a>

                                <div class="table-responsive">
                                    <table class="table table-hover align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase font-weight-bolder">
                                                    S.No
                                                </th>

                                                <th class="text-uppercase text-center font-weight-bolder ps-2">
                                                    Name of the Post
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Classification &amp; discipline of the Post
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    No. of Posts
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Action
                                                </th>

                                            </tr>

                                        </thead>
                                        <tbody>

                                            <tr>

                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Technical
                                                    Assistant
                                                </td>
                                                <td>
                                                    Group-B <br>
                                                    (Technical)
                                                    (Biological
                                                    Sciences)
                                                </td>
                                                <td>
                                                    <p>12 Posts <br>
                                                        (UR-05, SC-03, ST-01,
                                                        OBC-02, EWS-01) <br>
                                                        PwBD-Blindness or low
                                                        vision -01 Post), <br>
                                                        (Horizontal reservation)
                                                    </p>
                                                </td>

                                                <td>
                                                    @if(App\Models\Form::check_form_submitted(env('FORMID1')))
                                                        @php
                                                            $id = App\Models\Form::check_form_submitted(env('FORMID1'));
                                                        @endphp
                                                        {{--<a href="{{route('downloadapplication',['id'=>$id])}}" class="btn btn-danger btn-sm">Download</a>--}}
                                                        <a href="https://nirth.res.in/application/src/storage/app/public/formdocument/{{env('REGISTRATION_PREFIX') . auth()->user()->registration_no}}/{{env('FORMID1')}}/application.pdf" class="btn btn-danger btn-sm" download target="_blank">Download</a>
                                                    @elseif(date("Y-m-d H:i:s") <= $last_date_time)
                                                    <a href="{{ route('stuAppyForm', ['form_id' => env('FORMID1')]) }}"
                                                        class="btn btn-primary btn-sm">
                                                        @if ($formData->contains('form_id', env('FORMID1')))
                                                            Edit
                                                        @else
                                                            Apply Now
                                                        @endif
                                                    </a>
                                                    @endif
                                                </td>

                                            </tr>


                                            <tr>

                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    Technical
                                                    Assistant
                                                </td>
                                                <td>
                                                    Group-B <br>
                                                    (Technical)
                                                    (Social
                                                    Sciences)
                                                </td>
                                                <td>
                                                    07 Posts <br>
                                                    (UR-02, SC-01, ST-01,
                                                    OBC-02, EWS-01) <br>
                                                    PwBD-Deaf and Hard of
                                                    Hearing -01 Post) <br>
                                                    (Horizontal reservation)

                                                </td>

                                                <td>
                                                    @if(App\Models\Form::check_form_submitted(env('FORMID2')))
                                                        @php
                                                            $id = App\Models\Form::check_form_submitted(env('FORMID2'));
                                                        @endphp
                                                        {{--<a href="{{route('downloadapplication',['id'=>$id])}}" class="btn btn-danger btn-sm">Download</a>--}}
                                                        <a href="https://nirth.res.in/application/src/storage/app/public/formdocument/{{env('REGISTRATION_PREFIX') . auth()->user()->registration_no}}/{{env('FORMID2')}}/application.pdf" class="btn btn-danger btn-sm" download target="_blank">Download</a>
                                                    @elseif(date("Y-m-d H:i:s") <= $last_date_time)
                                                    <a href="{{ route('stuAppyForm', ['form_id' => env('FORMID2')]) }}"
                                                        class="btn btn-primary btn-sm">
                                                        @if ($formData->contains('form_id', env('FORMID2')))
                                                            Edit
                                                        @else
                                                            Apply Now
                                                        @endif
                                                    </a>
                                                    @endif
                                                </td>

                                            </tr>


                                            <tr>

                                                <td>
                                                    3
                                                </td>
                                                <td>
                                                    Technical
                                                    Assistant
                                                </td>
                                                <td>
                                                    Group-B <br>
                                                    (Technical) <br>
                                                    (Computer
                                                    Science/Information <br>
                                                    Technology)
                                                </td>
                                                <td>
                                                    01 Post (UR)

                                                </td>

                                                <td>
                                                    @if(App\Models\Form::check_form_submitted(env('FORMID3')))
                                                        @php
                                                            $id = App\Models\Form::check_form_submitted(env('FORMID3'));
                                                        @endphp
                                                        {{--<a href="{{route('downloadapplication',['id'=>$id])}}" class="btn btn-danger btn-sm">Download</a>--}}
                                                        <a href="https://nirth.res.in/application/src/storage/app/public/formdocument/{{env('REGISTRATION_PREFIX') . auth()->user()->registration_no}}/{{env('FORMID3')}}/application.pdf" class="btn btn-danger btn-sm" download target="_blank">Download</a>
                                                    @elseif(date("Y-m-d H:i:s") <= $last_date_time)
                                                    <a href="{{ route('stuAppyForm', ['form_id' => env('FORMID3')]) }}"
                                                        class="btn btn-primary btn-sm">
                                                        @if ($formData->contains('form_id', env('FORMID3')))
                                                            Edit
                                                        @else
                                                            Apply Now
                                                        @endif
                                                    </a>
                                                    @endif
                                                </td>

                                            </tr>


                                            <tr>

                                                <td>
                                                    4
                                                </td>
                                                <td>
                                                    Technical
                                                    Assistant
                                                </td>
                                                <td>
                                                    Group-B <br>
                                                    (Technical)
                                                    (Electronics <br>
                                                    &amp;
                                                    Communication <br>
                                                    Engineering)
                                                </td>
                                                <td>
                                                    01 Post (UR)
                                                </td>

                                                <td>
                                                    @if(App\Models\Form::check_form_submitted(env('FORMID4')))
                                                        @php
                                                            $id = App\Models\Form::check_form_submitted(env('FORMID4'));
                                                        @endphp
                                                        {{--<a href="{{route('downloadapplication',['id'=>$id])}}" class="btn btn-danger btn-sm">Download</a>--}}
                                                        <a href="https://nirth.res.in/application/src/storage/app/public/formdocument/{{env('REGISTRATION_PREFIX') . auth()->user()->registration_no}}/{{env('FORMID4')}}/application.pdf" class="btn btn-danger btn-sm" download target="_blank">Download</a>
                                                    @elseif(date("Y-m-d H:i:s") <= $last_date_time)
                                                    <a href="{{ route('stuAppyForm', ['form_id' => env('FORMID4')]) }}"
                                                        class="btn btn-primary btn-sm">
                                                        @if ($formData->contains('form_id', env('FORMID4')))
                                                            Edit
                                                        @else
                                                            Apply Now
                                                        @endif
                                                    </a>
                                                    @endif
                                                </td>

                                            </tr>


                                            <tr>

                                                <td>
                                                    5
                                                </td>
                                                <td>
                                                    Technical
                                                    Assistant
                                                </td>
                                                <td>
                                                    Group-B <br>
                                                    (Technical)
                                                    (Electrical
                                                    Engineering)
                                                </td>
                                                <td>
                                                    01 Post (UR)
                                                </td>

                                                <td>
                                                    @if(App\Models\Form::check_form_submitted(env('FORMID5')))
                                                        @php
                                                            $id = App\Models\Form::check_form_submitted(env('FORMID5'));
                                                        @endphp
                                                        {{--<a href="{{route('downloadapplication',['id'=>$id])}}" class="btn btn-danger btn-sm">Download</a>--}}
                                                        <a href="https://nirth.res.in/application/src/storage/app/public/formdocument/{{env('REGISTRATION_PREFIX') . auth()->user()->registration_no}}/{{env('FORMID5')}}/application.pdf" class="btn btn-danger btn-sm" download target="_blank">Download</a>
                                                    @elseif(date("Y-m-d H:i:s") <= $last_date_time)
                                                    <a href="{{ route('stuAppyForm', ['form_id' => env('FORMID5')]) }}"
                                                        class="btn btn-primary btn-sm">
                                                        @if ($formData->contains('form_id', env('FORMID5')))
                                                            Edit
                                                        @else
                                                            Apply Now
                                                        @endif
                                                    </a>
                                                    @endif
                                                </td>

                                            </tr>


                                            <tr>

                                                <td>
                                                    6
                                                </td>
                                                <td>
                                                    Technical
                                                    Assistant
                                                </td>
                                                <td>
                                                    Group-B <br>
                                                    (Technical) <br>
                                                    (Civil
                                                    Engineering)
                                                </td>
                                                <td>
                                                    01 Post (OBC)
                                                </td>

                                                <td>
                                                    @if(App\Models\Form::check_form_submitted(env('FORMID6')))
                                                        @php
                                                            $id = App\Models\Form::check_form_submitted(env('FORMID6'));
                                                        @endphp
                                                        {{--<a href="{{route('downloadapplication',['id'=>$id])}}" class="btn btn-danger btn-sm">Download</a>--}}
                                                        <a href="https://nirth.res.in/application/src/storage/app/public/formdocument/{{env('REGISTRATION_PREFIX') . auth()->user()->registration_no}}/{{env('FORMID6')}}/application.pdf" class="btn btn-danger btn-sm" download target="_blank">Download</a>
                                                    @elseif(date("Y-m-d H:i:s") <= $last_date_time)
                                                    <a href="{{ route('stuAppyForm', ['form_id' => env('FORMID6')]) }}"
                                                        class="btn btn-primary btn-sm">
                                                        @if ($formData->contains('form_id', env('FORMID6')))
                                                            Edit
                                                        @else
                                                            Apply Now
                                                        @endif
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                        <div class="card-body pt-2">

                            <div class="table1">


                                {{-- <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">House</span> --}}
                                <a href="javascript:;" class="card-title h5 d-block text-darker">
                                    Technician-1 –<span class="text-primary "> 17 Posts </span> :
                                </a>

                                <div class="table-responsive">
                                    <table class="table table-hover align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase font-weight-bolder">
                                                    S.No
                                                </th>

                                                <th class="text-uppercase text-center font-weight-bolder ps-2">
                                                    Name of the Post
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Classification &amp; discipline of the Post
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    No. of Posts
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Action
                                                </th>

                                            </tr>

                                        </thead>
                                        <tbody>

                                            <tr>

                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Technician-1
                                                </td>
                                                <td>
                                                    Group-C <br>
                                                    (Technical)
                                                    (Biological
                                                    Science)
                                                </td>
                                                <td>
                                                    15 Posts <br>
                                                    (UR-09, SC-02, OBC-02, EWS-02)
                                                    <br>
                                                    Ex-Servicemen-03 Posts <br>
                                                    (Horizontal reservation)
                                                </td>

                                                <td>
                                                    @if(App\Models\Form::check_form_submitted(env('FORMID7')))
                                                        @php
                                                            $id = App\Models\Form::check_form_submitted(env('FORMID7'));
                                                        @endphp
                                                        {{--<a href="{{route('downloadapplication',['id'=>$id])}}" class="btn btn-danger btn-sm">Download</a>--}}
                                                        <a href="https://nirth.res.in/application/src/storage/app/public/formdocument/{{env('REGISTRATION_PREFIX') . auth()->user()->registration_no}}/{{env('FORMID7')}}/application.pdf" class="btn btn-danger btn-sm" download target="_blank">Download</a>
                                                    @elseif(date("Y-m-d H:i:s") <= $last_date_time)
                                                    <a href="{{ route('stuAppyForm', ['form_id' => env('FORMID7')]) }}"
                                                        class="btn btn-primary btn-sm">
                                                        @if ($formData->contains('form_id', env('FORMID7')))
                                                            Edit
                                                        @else
                                                            Apply Now
                                                        @endif
                                                    </a>
                                                    @endif
                                                </td>

                                            </tr>

                                            <tr>

                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    Technician-1
                                                </td>
                                                <td>
                                                    Group-C <br>
                                                    (Technical) <br>
                                                    (Computer Science)
                                                </td>
                                                <td>
                                                    02 Post <br>
                                                    (UR-01, EWS-01)
                                                </td>
                                                <td>
                                                    @if(App\Models\Form::check_form_submitted(env('FORMID8')))
                                                        @php
                                                            $id = App\Models\Form::check_form_submitted(env('FORMID8'));
                                                        @endphp
                                                        {{--<a href="{{route('downloadapplication',['id'=>$id])}}" class="btn btn-danger btn-sm">Download</a>--}}
                                                        <a href="https://nirth.res.in/application/src/storage/app/public/formdocument/{{env('REGISTRATION_PREFIX') . auth()->user()->registration_no}}/{{env('FORMID8')}}/application.pdf" class="btn btn-danger btn-sm" download target="_blank">Download</a>
                                                    @elseif(date("Y-m-d H:i:s") <= $last_date_time)
                                                    <a href="{{ route('stuAppyForm', ['form_id' => env('FORMID8')]) }}"
                                                        class="btn btn-primary btn-sm">
                                                        @if ($formData->contains('form_id', env('FORMID8')))
                                                            Edit
                                                        @else
                                                            Apply Now
                                                        @endif
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                        <div class="card-body pt-2">

                            <div class="table1">


                                {{-- <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">House</span> --}}
                                <a href="javascript:;" class="card-title h5 d-block text-darker">
                                    Lab. Attendant-1 - <span class="text-primary "> 12 Posts </span> :
                                </a>

                                <div class="table-responsive">
                                    <table class="table table-hover align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase font-weight-bolder">
                                                    S.No
                                                </th>

                                                <th class="text-uppercase text-center font-weight-bolder ps-2">
                                                    Name of the Post
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Classification &amp; discipline of the Post
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    No. of Posts
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Action
                                                </th>

                                            </tr>

                                        </thead>
                                        <tbody>

                                            <tr>

                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Lab Attendant-1
                                                </td>
                                                <td>
                                                    Group-C
                                                    (Technical)
                                                </td>
                                                <td>
                                                    <p> 10 Posts <br>
                                                        (UR-04, SC-02, ST-01, OBC-
                                                        01, EWS-02) <br>
                                                        PwBD-01 Post ((d) and (e)
(Horizontal reservation) <br>
                                                        Ex-Servicemen-03 Posts (Horizontal
                                                        reservation)
                                                    </p>
                                                </td>

                                                <td>
                                                    @if(App\Models\Form::check_form_submitted(env('FORMID9')))
                                                        @php
                                                            $id = App\Models\Form::check_form_submitted(env('FORMID9'));
                                                        @endphp
                                                        {{--<a href="{{route('downloadapplication',['id'=>$id])}}" class="btn btn-danger btn-sm">Download</a>--}}
                                                        <a href="https://nirth.res.in/application/src/storage/app/public/formdocument/{{env('REGISTRATION_PREFIX') . auth()->user()->registration_no}}/{{env('FORMID9')}}/application.pdf" class="btn btn-danger btn-sm" download target="_blank">Download</a>
                                                    @elseif(date("Y-m-d H:i:s") <= $last_date_time)
                                                    <a href="{{ route('stuAppyForm', ['form_id' => env('FORMID9')]) }}"
                                                        class="btn btn-primary btn-sm">
                                                        @if ($formData->contains('form_id', env('FORMID9')))
                                                            Edit
                                                        @else
                                                            Apply Now
                                                        @endif
                                                    </a>
                                                    @endif
                                                </td>

                                            </tr>


                                            <tr>

                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    Lab Attendant-1
                                                </td>
                                                <td>
                                                    Group-C
                                                    (Technical) <br>
                                                    (Refrigeration and air
                                                    conditioning)
                                                </td>
                                                <td>
                                                    <p> 02 Post <br>
                                                        (UR-01, OBC-01)
                                                    </p>
                                                </td>

                                                <td >
                                                    @if(App\Models\Form::check_form_submitted(env('FORMID10')))
                                                        @php
                                                            $id = App\Models\Form::check_form_submitted(env('FORMID10'));
                                                        @endphp
                                                        {{--<a href="{{route('downloadapplication',['id'=>$id])}}" class="btn btn-danger btn-sm">Download</a>--}}
                                                        <a href="https://nirth.res.in/application/src/storage/app/public/formdocument/{{env('REGISTRATION_PREFIX') . auth()->user()->registration_no}}/{{env('FORMID10')}}/application.pdf" class="btn btn-danger btn-sm" download target="_blank">Download</a>
                                                    @elseif(date("Y-m-d H:i:s") <= $last_date_time)
                                                    <a href="{{ route('stuAppyForm', ['form_id' => env('FORMID10')]) }}"
                                                        class="btn btn-primary btn-sm">
                                                        @if ($formData->contains('form_id', env('FORMID10')))
                                                            Edit
                                                        @else
                                                            Apply Now
                                                        @endif
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
    {{-- @include('layouts.footers.guest.footer') --}}
@endsection
