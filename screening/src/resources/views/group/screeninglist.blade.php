@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Screening Candidates'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h4>{{$group->subject_group}}</h4>
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Slot: {{$slot}}</p>
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Screening Candidates</p>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table table-hover align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            S.NO.</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Action</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Application No.</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Name</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Father Name</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Mother Name</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Result</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Pass Reason</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Fail Reason</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($forms))
                                        @php
                                            $index = 0;
                                        @endphp
                                        @foreach ($forms as $key => $form)
                                            @php
                                                $index++;
                                                $check_form_screening_status = $form->check_form_sorting_process($form->id);
                                            @endphp
                                            <tr style="@if($form->result == 'PASS') background-color: lightgreen; @elseif($form->result == 'FAIL') background-color: red; @elseif($check_form_screening_status) background-color: yellow;@endif">
                                                <td class="text-sm text-center">
                                                    {{ $index }}
                                                </td>
                                                <td>
                                                    @if($group->status == 0)
                                                    <a href="{{route('group.editscreening',['id' => $form->id, 'slot' => $slot])}}" class="btn btn-warning btn-xs">Process Screening</a>
                                                    @endif
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
                                                        {{$form->result}}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0" style="width; 10%;">
                                                        {!!$form->pass_reason!!}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0" style="width; 10%;">
                                                        {!!$form->fail_reason!!}
                                                    </p>
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
