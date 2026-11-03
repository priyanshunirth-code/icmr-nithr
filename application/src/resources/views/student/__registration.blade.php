@extends('layouts.app')

@section('content')
    <main class="main-content mt-0">

        @include('student.studentProfile')
        @php
            $last_date_time = '2023-08-21 23:59:59';
            $last_date_time_for_raise_concern = '2023-11-23 23:59:59';
        @endphp
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header text-center p-0 mx-3 mt-3 position-relative z-index-1">
                            <h3>Advertisement. No. NIRTH/Tech/01/2023 Dated 10.07.2023</h3>
                            <b class="text-danger">Last date: 21th August 2023</b><br>
                            {{--<b class="text-danger">Note: The raise concern button will be open till 23 rd November 2023 till 11:59 p.m.</b>--}}
                            <b class="text-danger">Note: To download 'Admitcard', Please open portal in Computer/Laptop</b>
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

                                                {{--<th class="text-uppercase font-weight-bolder ps-2">
                                                    No. of Posts
                                                </th>--}}

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Result
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Reason<br>for Not Eligible
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
                                                {{--<td>
                                                    <p>12 Posts <br>
                                                        (UR-05, SC-03, ST-01,
                                                        OBC-02, EWS-01) <br>
                                                        PwBD-Blindness or low
                                                        vision -01 Post), <br>
                                                        (Horizontal reservation)
                                                    </p>
                                                </td>--}}
                                                @if (App\Models\Form::check_form_submitted(env('FORMID1')))
                                                    @php
                                                        $id = App\Models\Form::check_form_submitted(env('FORMID1'));
                                                        $form_data = App\Models\FormSorting::find($id);
                                                    @endphp
                                                    <td>
                                                        @if($form_data->result == 'PASS')
                                                            Eligible
                                                        @elseif($form_data->result == 'FAIL')
                                                            Not Eligible
                                                        @endif
                                                    </td>
                                                    <td>{!!$form_data->fail_reason!!}</td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                @endif
                                                <td>


                                                    @if (App\Models\Form::check_form_submitted(env('FORMID1')))
                                                        @php
                                                            $id = App\Models\Form::check_form_submitted(env('FORMID1'));
                                                        @endphp
                                                        @if($form_data->result == 'PASS')
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="print_admitcard({{$id}})">Admitcard</button>
                                                            <i id="spinner_{{$id}}" class="fa fa-spinner fa-pulse fa-2x fa-fw" style="display: none;"></i>
                                                        @endif
                                                        {{--<a href="{{ route('downloadapplication', ['id' => $id]) }}"
                                                            class="btn btn-primary btn-sm">Download</a>--}}
                                                            <br>
                                                        @if($form_data->result == 'FAIL' && date('Y-m-d H:i:s') <= $last_date_time_for_raise_concern)
                                                        <a href="{{ route('raiseconcern', ['id' => $id]) }}"
                                                            class="btn btn-danger btn-sm">Raise Concern</a>
                                                        @endif
                                                    @elseif(date('Y-m-d H:i:s') <= $last_date_time)
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
                                                {{--<td>
                                                    07 Posts <br>
                                                    (UR-02, SC-01, ST-01,
                                                    OBC-02, EWS-01) <br>
                                                    PwBD-Deaf and Hard of
                                                    Hearing -01 Post) <br>
                                                    (Horizontal reservation)

                                                </td>--}}
                                                @if (App\Models\Form::check_form_submitted(env('FORMID2')))
                                                    @php
                                                        $id = App\Models\Form::check_form_submitted(env('FORMID2'));
                                                        $form_data = App\Models\FormSorting::find($id);
                                                    @endphp
                                                    <td>
                                                        @if($form_data->result == 'PASS')
                                                            Eligible
                                                        @elseif($form_data->result == 'FAIL')
                                                            Not Eligible
                                                        @endif
                                                    </td>
                                                    <td>{!!$form_data->fail_reason!!}</td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                @endif
                                                <td>
                                                    @if (App\Models\Form::check_form_submitted(env('FORMID2')))
                                                        @php
                                                            $id = App\Models\Form::check_form_submitted(env('FORMID2'));
                                                        @endphp
                                                        @if($form_data->result == 'PASS')
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="print_admitcard({{$id}})">Admitcard</button>
                                                            <i id="spinner_{{$id}}" class="fa fa-spinner fa-pulse fa-2x fa-fw" style="display: none;"></i>
                                                        @endif
                                                        {{--<a href="{{ route('downloadapplication', ['id' => $id]) }}"
                                                            class="btn btn-primary btn-sm">Download</a>--}}
                                                            <br>
                                                        @if($form_data->result == 'FAIL' && date('Y-m-d H:i:s') <= $last_date_time_for_raise_concern)
                                                        <a href="{{ route('raiseconcern', ['id' => $id]) }}"
                                                            class="btn btn-danger btn-sm">Raise Concern</a>
                                                        @endif
                                                    @elseif(date('Y-m-d H:i:s') <= $last_date_time)
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
                                                {{--<td>
                                                    01 Post (UR)

                                                </td>--}}
                                                @if (App\Models\Form::check_form_submitted(env('FORMID3')))
                                                    @php
                                                        $id = App\Models\Form::check_form_submitted(env('FORMID3'));
                                                        $form_data = App\Models\FormSorting::find($id);
                                                    @endphp
                                                    <td>
                                                        @if($form_data->result == 'PASS')
                                                            Eligible
                                                        @elseif($form_data->result == 'FAIL')
                                                            Not Eligible
                                                        @endif
                                                    </td>
                                                    <td>{!!$form_data->fail_reason!!}</td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                @endif

                                                <td>
                                                    @if (App\Models\Form::check_form_submitted(env('FORMID3')))
                                                        @php
                                                            $id = App\Models\Form::check_form_submitted(env('FORMID3'));
                                                        @endphp
                                                        @if($form_data->result == 'PASS')
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="print_admitcard({{$id}})">Admitcard</button>
                                                            <i id="spinner_{{$id}}" class="fa fa-spinner fa-pulse fa-2x fa-fw" style="display: none;"></i>
                                                        @endif
                                                        {{--<a href="{{ route('downloadapplication', ['id' => $id]) }}"
                                                            class="btn btn-primary btn-sm">Download</a>--}}
                                                            <br>
                                                        @if($form_data->result == 'FAIL' && date('Y-m-d H:i:s') <= $last_date_time_for_raise_concern)
                                                        <a href="{{ route('raiseconcern', ['id' => $id]) }}"
                                                            class="btn btn-danger btn-sm">Raise Concern</a>
                                                        @endif
                                                    @elseif(date('Y-m-d H:i:s') <= $last_date_time)
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
                                                {{--<td>
                                                    01 Post (UR)
                                                </td>--}}
                                                @if (App\Models\Form::check_form_submitted(env('FORMID4')))
                                                    @php
                                                        $id = App\Models\Form::check_form_submitted(env('FORMID4'));
                                                        $form_data = App\Models\FormSorting::find($id);
                                                    @endphp
                                                    <td>
                                                        @if($form_data->result == 'PASS')
                                                            Eligible
                                                        @elseif($form_data->result == 'FAIL')
                                                            Not Eligible
                                                        @endif
                                                    </td>
                                                    <td>{!!$form_data->fail_reason!!}</td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                @endif

                                                <td>
                                                    @if (App\Models\Form::check_form_submitted(env('FORMID4')))
                                                        @php
                                                            $id = App\Models\Form::check_form_submitted(env('FORMID4'));
                                                        @endphp
                                                        @if($form_data->result == 'PASS')
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="print_admitcard({{$id}})">Admitcard</button>
                                                            <i id="spinner_{{$id}}" class="fa fa-spinner fa-pulse fa-2x fa-fw" style="display: none;"></i>
                                                        @endif
                                                        {{--<a href="{{ route('downloadapplication', ['id' => $id]) }}"
                                                            class="btn btn-primary btn-sm">Download</a>--}}
                                                            <br>
                                                        @if($form_data->result == 'FAIL' && date('Y-m-d H:i:s') <= $last_date_time_for_raise_concern)
                                                        <a href="{{ route('raiseconcern', ['id' => $id]) }}"
                                                            class="btn btn-danger btn-sm">Raise Concern</a>
                                                        @endif
                                                    @elseif(date('Y-m-d H:i:s') <= $last_date_time)
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
                                                {{--<td>
                                                    01 Post (UR)
                                                </td>--}}
                                                @if (App\Models\Form::check_form_submitted(env('FORMID5')))
                                                    @php
                                                        $id = App\Models\Form::check_form_submitted(env('FORMID5'));
                                                        $form_data = App\Models\FormSorting::find($id);
                                                    @endphp
                                                    <td>
                                                        @if($form_data->result == 'PASS')
                                                            Eligible
                                                        @elseif($form_data->result == 'FAIL')
                                                            Not Eligible
                                                        @endif
                                                    </td>
                                                    <td>{!!$form_data->fail_reason!!}</td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                @endif

                                                <td>
                                                    @if (App\Models\Form::check_form_submitted(env('FORMID5')))
                                                        @php
                                                            $id = App\Models\Form::check_form_submitted(env('FORMID5'));
                                                        @endphp
                                                        @if($form_data->result == 'PASS')
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="print_admitcard({{$id}})">Admitcard</button>
                                                            <i id="spinner_{{$id}}" class="fa fa-spinner fa-pulse fa-2x fa-fw" style="display: none;"></i>
                                                        @endif
                                                        {{--<a href="{{ route('downloadapplication', ['id' => $id]) }}"
                                                            class="btn btn-primary btn-sm">Download</a>--}}
                                                            <br>
                                                        @if($form_data->result == 'FAIL' && date('Y-m-d H:i:s') <= $last_date_time_for_raise_concern)
                                                        <a href="{{ route('raiseconcern', ['id' => $id]) }}"
                                                            class="btn btn-danger btn-sm">Raise Concern</a>
                                                        @endif
                                                    @elseif(date('Y-m-d H:i:s') <= $last_date_time)
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
                                                {{--<td>
                                                    01 Post (OBC)
                                                </td>--}}
                                                @if (App\Models\Form::check_form_submitted(env('FORMID6')))
                                                    @php
                                                        $id = App\Models\Form::check_form_submitted(env('FORMID6'));
                                                        $form_data = App\Models\FormSorting::find($id);
                                                    @endphp
                                                    <td>
                                                        @if($form_data->result == 'PASS')
                                                            Eligible
                                                        @elseif($form_data->result == 'FAIL')
                                                            Not Eligible
                                                        @endif
                                                    </td>
                                                    <td>{!!$form_data->fail_reason!!}</td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                @endif

                                                <td>
                                                    @if (App\Models\Form::check_form_submitted(env('FORMID6')))
                                                        @php
                                                            $id = App\Models\Form::check_form_submitted(env('FORMID6'));
                                                        @endphp
                                                        @if($form_data->result == 'PASS')
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="print_admitcard({{$id}})">Admitcard</button>
                                                            <i id="spinner_{{$id}}" class="fa fa-spinner fa-pulse fa-2x fa-fw" style="display: none;"></i>
                                                        @endif
                                                        {{--<a href="{{ route('downloadapplication', ['id' => $id]) }}"
                                                            class="btn btn-primary btn-sm">Download</a>--}}
                                                            <br>
                                                        @if($form_data->result == 'FAIL' && date('Y-m-d H:i:s') <= $last_date_time_for_raise_concern)
                                                        <a href="{{ route('raiseconcern', ['id' => $id]) }}"
                                                            class="btn btn-danger btn-sm">Raise Concern</a>
                                                        @endif
                                                    @elseif(date('Y-m-d H:i:s') <= $last_date_time)
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

                                                {{--<th class="text-uppercase font-weight-bolder ps-2">
                                                    No. of Posts
                                                </th>--}}

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Result
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Reason<br>for Not Eligible
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
                                                {{--<td>
                                                    15 Posts <br>
                                                    (UR-09, SC-02, OBC-02, EWS-02)
                                                    <br>
                                                    Ex-Servicemen-03 Posts <br>
                                                    (Horizontal reservation)
                                                </td>--}}
                                                @if (App\Models\Form::check_form_submitted(env('FORMID7')))
                                                    @php
                                                        $id = App\Models\Form::check_form_submitted(env('FORMID7'));
                                                        $form_data = App\Models\FormSorting::find($id);
                                                    @endphp
                                                    <td>
                                                        @if($form_data->result == 'PASS')
                                                            Eligible
                                                        @elseif($form_data->result == 'FAIL')
                                                            Not Eligible
                                                        @endif
                                                    </td>
                                                    <td>{!!$form_data->fail_reason!!}</td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                @endif

                                                <td>
                                                    @if (App\Models\Form::check_form_submitted(env('FORMID7')))
                                                        @php
                                                            $id = App\Models\Form::check_form_submitted(env('FORMID7'));
                                                        @endphp
                                                        @if($form_data->result == 'PASS')
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="print_admitcard({{$id}})">Admitcard</button>
                                                            <i id="spinner_{{$id}}" class="fa fa-spinner fa-pulse fa-2x fa-fw" style="display: none;"></i>
                                                        @endif
                                                        {{--<a href="{{ route('downloadapplication', ['id' => $id]) }}"
                                                            class="btn btn-primary btn-sm">Download</a>--}}
                                                            <br>
                                                        @if($form_data->result == 'FAIL' && date('Y-m-d H:i:s') <= $last_date_time_for_raise_concern)
                                                        <a href="{{ route('raiseconcern', ['id' => $id]) }}"
                                                            class="btn btn-danger btn-sm">Raise Concern</a>
                                                        @endif
                                                    @elseif(date('Y-m-d H:i:s') <= $last_date_time)
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
                                                {{--<td>
                                                    02 Post <br>
                                                    (UR-01, EWS-01)
                                                </td>--}}
                                                @if (App\Models\Form::check_form_submitted(env('FORMID8')))
                                                    @php
                                                        $id = App\Models\Form::check_form_submitted(env('FORMID8'));
                                                        $form_data = App\Models\FormSorting::find($id);
                                                    @endphp
                                                    <td>
                                                        @if($form_data->result == 'PASS')
                                                            Eligible
                                                        @elseif($form_data->result == 'FAIL')
                                                            Not Eligible
                                                        @endif
                                                    </td>
                                                    <td>{!!$form_data->fail_reason!!}</td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                @endif
                                                <td>
                                                    @if (App\Models\Form::check_form_submitted(env('FORMID8')))
                                                        @php
                                                            $id = App\Models\Form::check_form_submitted(env('FORMID8'));
                                                        @endphp
                                                        @if($form_data->result == 'PASS')
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="print_admitcard({{$id}})">Admitcard</button>
                                                            <i id="spinner_{{$id}}" class="fa fa-spinner fa-pulse fa-2x fa-fw" style="display: none;"></i>
                                                        @endif
                                                        {{--<a href="{{ route('downloadapplication', ['id' => $id]) }}"
                                                            class="btn btn-primary btn-sm">Download</a>--}}
                                                            <br>
                                                        @if($form_data->result == 'FAIL' && date('Y-m-d H:i:s') <= $last_date_time_for_raise_concern)
                                                        <a href="{{ route('raiseconcern', ['id' => $id]) }}"
                                                            class="btn btn-danger btn-sm">Raise Concern</a>
                                                        @endif
                                                    @elseif(date('Y-m-d H:i:s') <= $last_date_time)
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

                                                {{--<th class="text-uppercase font-weight-bolder ps-2">
                                                    No. of Posts
                                                </th>--}}

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Result
                                                </th>

                                                <th class="text-uppercase font-weight-bolder ps-2">
                                                    Reason<br>for Not Eligible
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
                                                {{--<td>
                                                    <p> 10 Posts <br>
                                                        (UR-04, SC-02, ST-01, OBC-
                                                        01, EWS-02) <br>
                                                        PwBD-01 Post ((d) and (e)
                                                        (Horizontal reservation) <br>
                                                        Ex-Servicemen-03 Posts (Horizontal
                                                        reservation)
                                                    </p>
                                                </td>--}}
                                                @if (App\Models\Form::check_form_submitted(env('FORMID9')))
                                                    @php
                                                        $id = App\Models\Form::check_form_submitted(env('FORMID9'));
                                                        $form_data = App\Models\FormSorting::find($id);
                                                    @endphp
                                                    <td>
                                                        @if($form_data->result == 'PASS')
                                                            Eligible
                                                        @elseif($form_data->result == 'FAIL')
                                                            Not Eligible
                                                        @endif
                                                    </td>
                                                    <td>{!!$form_data->fail_reason!!}</td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                @endif

                                                <td>
                                                    @if (App\Models\Form::check_form_submitted(env('FORMID9')))
                                                        @php
                                                            $id = App\Models\Form::check_form_submitted(env('FORMID9'));
                                                        @endphp
                                                        @if($form_data->result == 'PASS')
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="print_admitcard({{$id}})">Admitcard</button>
                                                            <i id="spinner_{{$id}}" class="fa fa-spinner fa-pulse fa-2x fa-fw" style="display: none;"></i>
                                                        @endif
                                                        {{--<a href="{{ route('downloadapplication', ['id' => $id]) }}"
                                                            class="btn btn-primary btn-sm">Download</a>--}}<br>
                                                        @if($form_data->result == 'FAIL' && date('Y-m-d H:i:s') <= $last_date_time_for_raise_concern)
                                                        <a href="{{ route('raiseconcern', ['id' => $id]) }}"
                                                            class="btn btn-danger btn-sm">Raise Concern</a>
                                                        @endif
                                                    @elseif(date('Y-m-d H:i:s') <= $last_date_time)
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
                                                {{--<td>
                                                    <p> 02 Post <br>
                                                        (UR-01, OBC-01)
                                                    </p>
                                                </td>--}}
                                                @if (App\Models\Form::check_form_submitted(env('FORMID10')))
                                                    @php
                                                        $id = App\Models\Form::check_form_submitted(env('FORMID10'));
                                                        $form_data = App\Models\FormSorting::find($id);
                                                    @endphp
                                                    <td>
                                                        @if($form_data->result == 'PASS')
                                                            Eligible
                                                        @elseif($form_data->result == 'FAIL')
                                                            Not Eligible
                                                        @endif
                                                    </td>
                                                    <td>{!!$form_data->fail_reason!!}</td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                @endif

                                                <td>
                                                    @if (App\Models\Form::check_form_submitted(env('FORMID10')))
                                                        @php
                                                            $id = App\Models\Form::check_form_submitted(env('FORMID10'));
                                                        @endphp
                                                        @if($form_data->result == 'PASS')
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="print_admitcard({{$id}})">Admitcard</button>
                                                            <i id="spinner_{{$id}}" class="fa fa-spinner fa-pulse fa-2x fa-fw" style="display: none;"></i>
                                                        @endif
                                                        {{--<a href="{{ route('downloadapplication', ['id' => $id]) }}"
                                                            class="btn btn-primary btn-sm">Download</a>--}}
                                                            <br>
                                                        @if($form_data->result == 'FAIL' && date('Y-m-d H:i:s') <= $last_date_time_for_raise_concern)
                                                        <a href="{{ route('raiseconcern', ['id' => $id]) }}"
                                                            class="btn btn-danger btn-sm">Raise Concern</a>
                                                        @endif
                                                    @elseif(date('Y-m-d H:i:s') <= $last_date_time)
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
<script type="text/javascript">
    function print_admitcard(id){
        if(id){
            $.ajax({
                url: '{{ route('printAdmitCard') }}',
                type: "GET",
                data: {
                    id: id
                },
                dataType: 'json',
                beforeSend: function() {
                    $("#spinner_" + id).show();
                },
                success: function(data) {
                    popup(data.page, id);
                },

                error: function(xhr) { // if error occured
                },
                complete: function() {
                    
                }
            });
        }
    }

    function popup(data, id) {
        var base_url = '{{ url('/') }}';
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({
            "position": "absolute",
            "top": "-1000000px"
        });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[
            0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html>');
        frameDoc.document.write('<head>');
        frameDoc.document.write('<title>NIRTH-Admitcard</title>');
        frameDoc.document.write('<link rel="preconnect" href="https://fonts.googleapis.com">');
        frameDoc.document.write('<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>');
        frameDoc.document.write('<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari&display=swap" rel="stylesheet">');
        frameDoc.document.write('<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@700&display=swap" rel="stylesheet">');
        frameDoc.document.write('<link href="' + base_url + '/assets/css/nucleo-icons.css" rel="stylesheet" />');
        frameDoc.document.write('<link href="' + base_url + '/assets/css/nucleo-svg.css" rel="stylesheet" />');
        frameDoc.document.write('<link href="' + base_url + '/assets/css/nucleo-svg.css" rel="stylesheet" />');
        frameDoc.document.write('<link id="pagestyle" href="' + base_url +
            '/assets/css/argon-dashboard.css" rel="stylesheet" />');
        frameDoc.document.write('</head>');
        frameDoc.document.write('<body>');
        frameDoc.document.write(data);
        frameDoc.document.write('</body>');
        frameDoc.document.write('</html>');
        frameDoc.document.close();
        setTimeout(function() {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
            $("#spinner_" + id).hide();
        }, 3000);

        return true;
    }
</script>