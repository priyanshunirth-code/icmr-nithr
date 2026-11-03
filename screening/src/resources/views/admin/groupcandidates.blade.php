@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Candidates'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h4>{{$group->subject_group}}</h4>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <div id="datatable-title" style="display: none;">{{$group->subject_group}}</div>
                            <table class="table table-hover align-items-center mb-0" id="example2">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            S.NO.</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Application No.</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Name</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Father Name</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Mother Name</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">DOB</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Present Age</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Category</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Applied Category</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">PwBD</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Type Of Disability</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">ExSM</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Working in ICMR project</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Previous Service/Experience Details in case of Govt. Servants</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Screening Status</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Result</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Fail Reason</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Pass Reason</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($forms))
                                        @foreach ($forms as $key => $form)
                                            @php
                                                $check_form_screening_status = $form->check_form_sorting_process($form->id);
                                            @endphp
                                            <tr style="@if($form->result == 'PASS') background-color: lightgreen; @elseif($form->result == 'FAIL') background-color: red; @elseif($check_form_screening_status) background-color: yellow;@endif">
                                                <td class="text-sm text-center">
                                                    {{ $key+1 }}
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $form->form_id . $form->application_no }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $form->firstname . " " . $form->middlename . " " . $form->lastname }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $form->fathername }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $form->mothername }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ date("d-M-Y",strtotime($form->dob)) }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $form->present_age }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $form->category }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $form->apply_for_category }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $form->pwd }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $form->type_of_disablity }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $form->exsm }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $form->working_in_icmr_project }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $form->previous_experiences }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        @if($form->short_status == 1)
                                                            {{ "Done" }}
                                                        @else
                                                            {{ "Pending" }}
                                                        @endif
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{$form->result}}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {!!$form->fail_reason!!}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {!!$form->pass_reason!!}
                                                    </p>
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.editscreening',['id' => $form->id, 'group_id' => $group->id])}}" class="btn btn-warning btn-xs">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth.footer')
    </div>
@endsection
