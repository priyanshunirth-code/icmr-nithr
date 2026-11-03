@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Process Shorting'])
    <style type="text/css">
        .table td {
            white-space: pre-wrap;
            vertical-align: top !important;
 
        }
    </style>
    @php
        $X = false;
        $XII = false;
        $XII_required = false;
        $DIPLOMA = false;
        $BACHELOR = false;
        $MASTER = false;
        $WORKEXP = false;
        $DIPORBACH = false;

        if ($group->form_id == env('FORMID1') || $group->form_id == env('FORMID2')) {
            // Valid for 3
            $X = true;
            $XII = true;
            $BACHELOR = true;
        }

        if ($group->form_id == env('FORMID3') || $group->form_id == env('FORMID4') || $group->form_id == env('FORMID5')) {
            // Diploma or Degree
            $X = true;
            $XII = true;
            $DIPLOMA = false;
            $BACHELOR = false;
            $DIPORBACH = true;
        }

        if ($group->form_id == env('FORMID5') || $group->form_id == env('FORMID6')) {
            // Diploma and Experience OR Degree
            $X = true;
            $XII = true;
            $DIPLOMA = false;
            $BACHELOR = false;
            $DIPORBACH = true;
        }
        if ($group->form_id == env('FORMID7') || $group->form_id == env('FORMID8')) {
            // 10th 12th and Diploma
            $X = true;
            $XII = true;
            $XII_required = true;
            $DIPLOMA = true;
            $WORKEXP = false;
        }

        if ($group->form_id == env('FORMID9') || $group->form_id == env('FORMID10')) {
            // 10th and EXp
            $X = true;
            $WORKEXP = true;
            $WEXDESC = 'One year working experience in a Govt. recognized/approved/registered Laboratory';
        }
    @endphp
    <div class="container-fluid mt-3 py-4">
        <div class="row">
            <div class="col-md-1 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="numbers">
                            <h5 class="font-weight-bolder">
                                Slot: {{$slot}}
                            </h5>
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                Total: {{$total}}
                            </p>
                            {{--<p class="text-sm mb-0 text-uppercase font-weight-bold">
                                Completed: {{$slot_wise_complete_shorting}}
                            </p>
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                Pending: {{$slot_wise_pending_shorting}}
                            </p>--}}
                        </div>
                    </div>
                </div>
            </div>
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
            <div class="col-md-5 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-9">
                                <div class="numbers">
                                    <h5 class="font-weight-bolder">
                                        Name: {{ $formData->firstname }} {{ $formData->middlename }} {{ $formData->lastname }}
                                    </h5>
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                        Application No.: {{ $formData->form_id . $formData->application_no }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
              <!--multisteps-form-->
                <div class="multisteps-form">
                <!--progress bar-->
                    <div class="row">
                        <div class="col-12 ml-auto mr-auto mb-4">
                            <div class="multisteps-form__progress">
                                <button class="multisteps-form__progress-btn js-active" id="name" type="button" title="name">Name</button>
                                <button class="multisteps-form__progress-btn" id="photo_sign" type="button" title="Photo & Signature">Photo & Signature</button>
                                <button class="multisteps-form__progress-btn" id="category" type="button" title="Category">Category</button>
                                <button class="multisteps-form__progress-btn" id="application_fees" type="button" title="Application Fees">Application Fees</button>
                                <button class="multisteps-form__progress-btn" id="age_relaxation" type="button" title="Age Relaxation">Age Relaxation</button>
                                <button class="multisteps-form__progress-btn" id="qualification" type="button" title="Qualification">Essential Qualification</button>
                                <button class="multisteps-form__progress-btn" id="experience" type="button" title="Experience">Experience</button>
                            </div>
                        </div>
                    </div>
                    <!--form panels-->
                    <div class="row">
                        <div class="col-12 m-auto">
                            @if (session('error'))
                                <div class="alert text-danger">{{ session('error') }}</div>
                            @endif
                            @if (session('success'))
                                <div class="alert text-success">{{ session('success') }}</div>
                            @endif
                            <form class="multisteps-form__form" style="min-height: 1180px;">
                                <input type="hidden" name="form_id" id="form_id" value="{{$formData->id}}">
                                <input type="hidden" name="group_id" id="group_id" value="{{$group->id}}">
                                <input type="hidden" name="slot" id="slot" value="{{$slot}}">
                                <!--single form panel-->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleOut">
                                    <div class="multisteps-form__content">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:130px">
                                                    <h5 class="font-weight-bolder text-center">Document</h5>
                                                    @php
                                                        $check_document_exist = true;
                                                    @endphp
                                                    @if ($formData->tenth_document)
                                                        <button type="button" class="w3-bar-item w3-button tablink w3-red" onclick="openMarksheet(event, 'tenth')">10th</button>
                                                        @php
                                                            $check_document_exist = false;
                                                        @endphp
                                                    @endif
                                                    @if ($formData->twelveth_document)
                                                        <button type="button" class="w3-bar-item w3-button tablink" onclick="openMarksheet(event, 'twelveth')">12th</button>
                                                        @php
                                                            $check_document_exist = false;
                                                        @endphp
                                                    @endif
                                                </div>
                                                <div style="margin-left:130px">
                                                    @php
                                                        $check_document_exist = true;
                                                    @endphp
                                                    @if ($formData->tenth_document)
                                                        <div id="tenth" class="w3-container n_marksheet" style="@if($check_document_exist) display:block; @else display:none; @endif">
                                                            <embed src="{{ $formData->imageUrl($formData->tenth_document) }}" width="100%" height="650">
                                                        </div>
                                                        @php
                                                            $check_document_exist = false;
                                                        @endphp
                                                    @endif
                                                    @if ($formData->twelveth_document)
                                                        <div id="twelveth" class="w3-container n_marksheet" style="@if($check_document_exist) display:block; @else display:none; @endif">
                                                            <embed src="{{ $formData->imageUrl($formData->twelveth_document) }}" width="100%" height="650">
                                                        </div>
                                                        @php
                                                            $check_document_exist = false;
                                                        @endphp
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{--<label for="firstname" class="form-control-label">Name: </label>--}}
                                                    <h1 class="font-weight-bolder">{{ $formData->firstname }} {{ $formData->middlename }} {{ $formData->lastname }}</h1>
                                                </div>
                                                <div class="form-group">
                                                    <h1 class="font-weight-bolder">DOB: {{ date("d/M/Y",strtotime($formData->dob)) }}</h1>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fathername" class="form-control-label">Father's name: {{ $formData->fathername }}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="mothername" class="form-control-label">Mother's name: {{ $formData->mothername }}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="gender" class="form-control-label">Gender: {{ $formData->gender }}</label>
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-radios">
                                                        <div>
                                                            <input type="radio" id="name_result_pass" name="name_result" value="PASS" onclick="hideShowFailReason('name','pass');" @if($sorting_update_status) @if($form_sorting->name_result == "PASS") checked @endif @endif>
                                                            <label for="name_result_pass">
                                                                <span>
                                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                                </span> PASS
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <input type="radio" id="name_result_fail" name="name_result" value="FAIL" onclick="hideShowFailReason('name','fail');" @if($sorting_update_status) @if($form_sorting->name_result == "FAIL") checked @endif @endif>
                                                            <label for="name_result_fail">
                                                                <span>
                                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                                </span> FAIL
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="name_result_pass_reason" style="@if($sorting_update_status) @if(!$form_sorting->name_result || $form_sorting->name_result == "FAIL") display: none; @endif @else display: none; @endif">
                                                    <label for="name_pass_reason" class="form-control-label">Pass Reason</label>
                                                    <textarea class="form-control" name="name_pass_reason" id="name_pass_reason" rows="2">@if($sorting_update_status) @if($form_sorting->name_result == "PASS") {{$form_sorting->name_pass_reason}} @endif @endif</textarea>
                                                </div>
                                                <div class="form-group" id="name_result_fail_reason" style="@if($sorting_update_status) @if(!$form_sorting->name_result || $form_sorting->name_result == "PASS") display: none; @endif @else display: none; @endif">
                                                    <label for="name_fail_reason" class="form-control-label">Fail Reason</label>
                                                    <textarea class="form-control" name="name_fail_reason" id="name_fail_reason" rows="2">@if($sorting_update_status) @if($form_sorting->name_result == "FAIL") {{$form_sorting->name_fail_reason}} @endif @endif</textarea>
                                                </div>
                                                <div class="button-row d-flex mt-4">
                                                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next" onclick="save_sorting('name');">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--single form panel-->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleOut">
                                    <div class="multisteps-form__content">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-6 text-center">
                                                        <label for="present_age" class="form-control-label">Profile:</label><br>
                                                        @if ($formData->profile_pic)
                                                            <img src="{{ $formData->imageUrl($formData->profile_pic) }}"
                                                                style="width:150px">
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6 text-center">
                                                        <label for="present_age"
                                                            class="form-control-label">Signature:</label><br>
                                                        @if ($formData->signature)
                                                            <img src="{{ $formData->imageUrl($formData->signature) }}"
                                                                style="width:150px">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="custom-radios">
                                                        <div>
                                                            <input type="radio" id="photo_sign_result_pass" name="photo_sign_result" value="PASS" onclick="hideShowFailReason('photo_sign','pass');" @if($sorting_update_status) @if($form_sorting->photo_sign_result == "PASS") checked @endif @endif>
                                                            <label for="photo_sign_result_pass">
                                                                <span>
                                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                                </span> PASS
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <input type="radio" id="photo_sign_result_fail" name="photo_sign_result" value="FAIL" onclick="hideShowFailReason('photo_sign','fail');"@if($sorting_update_status) @if($form_sorting->photo_sign_result == "FAIL") checked @endif @endif>
                                                            <label for="photo_sign_result_fail">
                                                                <span>
                                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                                </span> FAIL
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                                <div class="form-group" id="photo_sign_result_pass_reason" style="@if($sorting_update_status) @if(!$form_sorting->photo_sign_result || $form_sorting->photo_sign_result == "FAIL") display: none; @endif @else display: none; @endif">
                                                    <label for="photo_sign_pass_reason" class="form-control-label">Pass Reason</label>
                                                    <textarea class="form-control" name="photo_sign_pass_reason" id="photo_sign_pass_reason" rows="2">@if($sorting_update_status) @if($form_sorting->photo_sign_result == "PASS") {{$form_sorting->photo_sign_pass_reason}} @endif @endif</textarea>
                                                </div>                                                
                                                <div class="form-group" id="photo_sign_result_fail_reason" style="@if($sorting_update_status) @if(!$form_sorting->photo_sign_result || $form_sorting->photo_sign_result == "PASS") display: none; @endif @else display: none; @endif">
                                                    <label for="photo_sign_fail_reason" class="form-control-label">Fail Reason</label>
                                                    <textarea class="form-control" name="photo_sign_fail_reason" id="photo_sign_fail_reason" rows="2">@if($sorting_update_status) @if($form_sorting->photo_sign_result == "FAIL") {{$form_sorting->photo_sign_fail_reason}} @endif @endif</textarea>
                                                </div>
                                                <div class="button-row d-flex mt-4">
                                                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                                                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next" style="margin-left: 5px;" onclick="save_sorting('photo_sign');">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <!--single form panel-->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleOut">
                                    <div class="multisteps-form__content">
                                        <div class="row">
                                            <div class="col-md-8">
                                                @if ($formData->category_document)
                                                    <embed src="{{ $formData->imageUrl($formData->category_document) }}" width="100%" height="650">
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                @if ($formData->category_document)
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-block btn-xs bg-gradient-primary" onclick="show_annexure('annsix');">Annexure-VI</button>
                                                    <button type="button" class="btn btn-block btn-xs bg-gradient-primary" onclick="show_annexure('annseven');">Annexure-VII</button>
                                                    <button type="button" class="btn btn-block btn-xs bg-gradient-primary" onclick="show_annexure('anneight');">Annexure-VIII</button>
                                                    <button type="button" class="btn btn-block btn-xs bg-gradient-primary" onclick="show_annexure('annnine');">Annexure-XI</button>
                                                    <button type="button" class="btn btn-block btn-xs bg-gradient-primary" onclick="show_annexure('annten');">Annexure-X</button>
                                                </div>
                                                <div class="form-group">
                                                    <div id="annsix" class="annexure" style="display: none;">
                                                        <embed src="{{url('/annex/Ann-VI 10.07.2023_0001.pdf')}}" width="100%" height="650">
                                                    </div>
                                                    <div id="annseven" class="annexure" style="display: none;">
                                                        <embed src="{{url('/annex/Ann-VII 10.07.2023_0001.pdf')}}" width="100%" height="650">
                                                    </div>
                                                    <div id="anneight" class="annexure" style="display: none;">
                                                        <embed src="{{url('/annex/Ann-VIII 10.07.2023_0001.pdf')}}" width="100%" height="650">
                                                    </div>
                                                    <div id="annnine" class="annexure" style="display: none;">
                                                        <embed src="{{url('/annex/Ann-IX 10.07.2023_0001.pdf')}}" width="100%" height="650">
                                                    </div>
                                                    <div id="annten" class="annexure" style="display: none;">
                                                        <embed src="{{url('/annex/Ann-X 10.07.2023_0001.pdf')}}" width="100%" height="650">
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="form-group">
                                                    <p class="text-sm mb-0 font-weight-bold">
                                                        {!!$group->post_categories!!}
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <h3 class="font-weight-bolder">Category of the
                                                        candidate: {{ $formData->category }}</h3>
                                                </div>
                                                <div class="form-group">
                                                    <h3 class="font-weight-bolder">Apply for the Category: {{ $formData->apply_for_category }}</h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-radios">
                                                        <div>
                                                            <input type="radio" id="category_result_pass" name="category_result" value="PASS" onclick="hideShowFailReason('category','pass');" @if($sorting_update_status) @if($form_sorting->category_result == "PASS") checked @endif @endif>
                                                            <label for="category_result_pass">
                                                                <span>
                                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                                </span> PASS
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <input type="radio" id="category_result_fail" name="category_result" value="FAIL" onclick="hideShowFailReason('category','fail');" @if($sorting_update_status) @if($form_sorting->category_result == "FAIL") checked @endif @endif>
                                                            <label for="category_result_fail">
                                                                <span>
                                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                                </span> FAIL
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="category_result_pass_reason" style="@if($sorting_update_status) @if(!$form_sorting->category_result || $form_sorting->category_result == "FAIL") display: none; @endif @else display: none; @endif">
                                                    <label for="category_pass_reason" class="form-control-label">Pass Reason</label>
                                                    <textarea class="form-control" name="category_pass_reason" id="category_pass_reason" rows="2">@if($sorting_update_status) @if($form_sorting->category_result == "PASS") {{$form_sorting->category_pass_reason}} @endif @endif</textarea>
                                                </div>
                                                <div class="form-group" id="category_result_fail_reason" style="@if($sorting_update_status) @if(!$form_sorting->category_result || $form_sorting->category_result == "PASS") display: none; @endif @else display: none; @endif">
                                                    <label for="category_fail_reason" class="form-control-label">Fail Reason</label>
                                                    <textarea class="form-control" name="category_fail_reason" id="category_fail_reason" rows="2">@if($sorting_update_status) @if($form_sorting->category_result == "FAIL") {{$form_sorting->category_fail_reason}} @endif @endif</textarea>
                                                </div>
                                                <div class="button-row d-flex mt-4">
                                                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                                                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next" style="margin-left: 5px;" onclick="save_sorting('category');">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <!--single form panel-->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleOut">
                                    <div class="multisteps-form__content">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:130px">
                                                    <h5 class="font-weight-bolder text-center">Document</h5>
                                                    @php
                                                        $check_document_exist = true;
                                                    @endphp
                                                    @if ($formData->category_document)
                                                        <button type="button" class="w3-bar-item w3-button af_tablink w3-red" onclick="openApplicationFees(event, 'af_category')">Category</button>
                                                        @php
                                                            $check_document_exist = false;
                                                        @endphp
                                                    @endif
                                                    @if ($formData->pwd_document)
                                                        <button type="button" class="w3-bar-item w3-button af_tablink @if($check_document_exist) w3-red @endif" onclick="openApplicationFees(event, 'PwBD')">PwBD</button>
                                                        @php
                                                            $check_document_exist = false;
                                                        @endphp
                                                    @endif
                                                    @if ($formData->exsm_document)
                                                        <button type="button" class="w3-bar-item w3-button af_tablink @if($check_document_exist) w3-red @endif" onclick="openApplicationFees(event, 'ExSM')">Ex-Servicemen</button>
                                                        @php
                                                            $check_document_exist = false;
                                                        @endphp
                                                    @endif
                                                </div>
                                                <div style="margin-left:130px">
                                                    @php
                                                        $check_document_exist = true;
                                                    @endphp
                                                    @if ($formData->category_document)
                                                        <div id="af_category" class="w3-container application_fees" style="@if($check_document_exist) display:block; @else display:none; @endif">
                                                            <embed src="{{ $formData->imageUrl($formData->category_document) }}" width="100%" height="650">
                                                        </div>
                                                        @php
                                                            $check_document_exist = false;
                                                        @endphp
                                                    @endif
                                                    @if ($formData->pwd_document)
                                                        <div id="PwBD" class="w3-container application_fees" style="@if($check_document_exist) display:block; @else display:none; @endif">
                                                            <embed src="{{ $formData->imageUrl($formData->pwd_document) }}" width="100%" height="650">
                                                        </div>
                                                        @php
                                                            $check_document_exist = false;
                                                        @endphp
                                                    @endif
                                                    @if ($formData->exsm_document)
                                                        <div id="ExSM" class="w3-container application_fees" style="@if($check_document_exist) display:block; @else display:none; @endif">
                                                            <embed src="{{ $formData->imageUrl($formData->exsm_document) }}" width="100%" height="650">
                                                        </div>
                                                        @php
                                                            $check_document_exist = false;
                                                        @endphp
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h3 class="font-weight-bolder">Application fees: ₹ 300</h3>
                                                    <p class="text-sm mb-0 font-weight-bold">
                                                        Candidate have to Pay: Male(UR/OBC/EWS)
                                                    </p>
                                                    <p class="text-sm mb-0 font-weight-bold">
                                                        Candidate have not to Pay: Female, Male(SC/ST/PwBD/ExSM)
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <h3 class="font-weight-bolder">Category of the candidate: {{ $formData->category }}</h3>
                                                    <h3 class="font-weight-bolder">PwBD: {{ $formData->pwd }}</h3>
                                                    <h3 class="font-weight-bolder">Ex-Servicemen: {{ $formData->exsm }}</h3>
                                                </div>
                                                <div class="form-group">
                                                    <h3 class="font-weight-bolder">Payment Status: 
                                                        @if (
                                                            $formData->category == 'SC' ||
                                                                $formData->category == 'ST' ||
                                                                $formData->gender == 'Female' ||
                                                                $formData->pwd == 'Yes' ||
                                                                $formData->exsm == 'Yes')
                                                            {{"Free"}}
                                                        @else
                                                            @if($formData->payment_status == "SUCCESS")
                                                                {{"Paid"}}
                                                            @else
                                                                {{"Not Paid"}}
                                                            @endif
                                                        @endif
                                                    </h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-radios">
                                                        <div>
                                                            <input type="radio" id="application_fees_result_pass" name="application_fees_result" value="PASS" onclick="hideShowFailReason('application_fees','pass');" @if($sorting_update_status) @if($form_sorting->application_fees_result == "PASS") checked @endif @endif>
                                                            <label for="application_fees_result_pass">
                                                                <span>
                                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                                </span> PASS
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <input type="radio" id="application_fees_result_fail" name="application_fees_result" value="FAIL" onclick="hideShowFailReason('application_fees','fail');" @if($sorting_update_status) @if($form_sorting->application_fees_result == "FAIL") checked @endif @endif>
                                                            <label for="application_fees_result_fail">
                                                                <span>
                                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                                </span> FAIL
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="application_fees_result_pass_reason" style="@if($sorting_update_status) @if(!$form_sorting->application_fees_result || $form_sorting->application_fees_result == "FAIL") display: none; @endif @else display: none; @endif">
                                                    <label for="application_fees_pass_reason" class="form-control-label">Pass Reason</label>
                                                    <textarea class="form-control" name="application_fees_pass_reason" id="application_fees_pass_reason" rows="2">@if($sorting_update_status) @if($form_sorting->application_fees_result == "PASS") {{$form_sorting->application_fees_pass_reason}} @endif @endif</textarea>
                                                </div>
                                                <div class="form-group" id="application_fees_result_fail_reason" style="@if($sorting_update_status) @if(!$form_sorting->application_fees_result || $form_sorting->application_fees_result == "PASS") display: none; @endif @else display: none; @endif">
                                                    <label for="application_fees_fail_reason" class="form-control-label">Fail Reason</label>
                                                    <textarea class="form-control" name="application_fees_fail_reason" id="application_fees_fail_reason" rows="2">@if($sorting_update_status) @if($form_sorting->application_fees_result == "FAIL") {{$form_sorting->application_fees_fail_reason}} @endif @endif</textarea>
                                                </div>
                                                <div class="button-row d-flex mt-4">
                                                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                                                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next" style="margin-left: 5px;" onclick="save_sorting('application_fees');">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <!--single form panel-->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleOut">
                                    <div class="multisteps-form__content">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:130px">
                                                    <h5 class="font-weight-bolder text-center">Document</h5>
                                                    @php
                                                        $check_document_exist = true;
                                                    @endphp
                                                    @if ($formData->category_document)
                                                        <button type="button" class="w3-bar-item w3-button ar_tablink w3-red" onclick="openAgeRelaxation(event, 'ar_category')">Category</button>
                                                        @php
                                                            $check_document_exist = false;
                                                        @endphp
                                                    @endif
                                                    @if ($formData->pwd_document)
                                                        <button type="button" class="w3-bar-item w3-button ar_tablink @if($check_document_exist) w3-red @endif" onclick="openAgeRelaxation(event, 'ar_PwBD')">PwBD</button>
                                                        @php
                                                            $check_document_exist = false;
                                                        @endphp
                                                    @endif
                                                    @if ($formData->exsm_document)
                                                        <button type="button" class="w3-bar-item w3-button ar_tablink @if($check_document_exist) w3-red @endif" onclick="openAgeRelaxation(event, 'ar_ExSM')">Ex-Servicemen</button>
                                                        @php
                                                            $check_document_exist = false;
                                                        @endphp
                                                    @endif
                                                    @if ($formData->icmr_project_certificate)
                                                        <button type="button" class="w3-bar-item w3-button ar_tablink @if($check_document_exist) w3-red @endif" onclick="openAgeRelaxation(event, 'ar_icmr_project_certificate')">Working in ICMR Project</button>
                                                        @php
                                                            $check_document_exist = false;
                                                        @endphp
                                                    @endif
                                                    @if ($formData->exp_certificate)
                                                        <button type="button" class="w3-bar-item w3-button ar_tablink @if($check_document_exist) w3-red @endif" onclick="openAgeRelaxation(event, 'ar_exp_certificate')">Exp Certificate</button>
                                                        @php
                                                            $check_document_exist = false;
                                                        @endphp
                                                    @endif
                                                    @if ($formData->previous_experiences_certificate)
                                                        <button type="button" class="w3-bar-item w3-button ar_tablink @if($check_document_exist) w3-red @endif" onclick="openAgeRelaxation(event, 'ar_previous_experiences_certificate')">Govt. Servants certificate</button>
                                                        @php
                                                            $check_document_exist = false;
                                                        @endphp
                                                    @endif
                                                </div>
                                                <div style="margin-left:130px">
                                                    @php
                                                        $check_document_exist = true;
                                                    @endphp
                                                    @if ($formData->category_document)
                                                        <div id="ar_category" class="w3-container age_relaxation" style="@if($check_document_exist) display:block; @else display:none; @endif">
                                                            <embed src="{{ $formData->imageUrl($formData->category_document) }}" width="100%" height="650">
                                                            @php
                                                                $check_document_exist = false;
                                                            @endphp
                                                        </div>
                                                    @endif
                                                    @if ($formData->pwd_document)
                                                        <div id="ar_PwBD" class="w3-container age_relaxation" style="@if($check_document_exist) display:block; @else display:none; @endif">
                                                            <embed src="{{ $formData->imageUrl($formData->pwd_document) }}" width="100%" height="650">
                                                            @php
                                                                $check_document_exist = false;
                                                            @endphp
                                                        </div>
                                                    @endif
                                                    @if ($formData->exsm_document)
                                                        <div id="ar_ExSM" class="w3-container age_relaxation" style="@if($check_document_exist) display:block; @else display:none; @endif">
                                                            <embed src="{{ $formData->imageUrl($formData->exsm_document) }}" width="100%" height="650">
                                                            @php
                                                                $check_document_exist = false;
                                                            @endphp
                                                        </div>
                                                    @endif
                                                    @if ($formData->icmr_project_certificate)
                                                        <div id="ar_icmr_project_certificate" class="w3-container age_relaxation" style="@if($check_document_exist) display:block; @else display:none; @endif">
                                                            <embed src="{{ $formData->imageUrl($formData->icmr_project_certificate) }}" width="100%" height="650">
                                                            @php
                                                                $check_document_exist = false;
                                                            @endphp
                                                        </div>
                                                    @endif
                                                    @if ($formData->exp_certificate)
                                                        <div id="ar_exp_certificate" class="w3-container age_relaxation" style="@if($check_document_exist) display:block; @else display:none; @endif">
                                                            <embed src="{{ $formData->imageUrl($formData->exp_certificate) }}" width="100%" height="650">
                                                            @php
                                                                $check_document_exist = false;
                                                            @endphp
                                                        </div>
                                                    @endif
                                                    @if ($formData->previous_experiences_certificate)
                                                        <div id="ar_previous_experiences_certificate" class="w3-container age_relaxation" style="@if($check_document_exist) display:block; @else display:none; @endif">
                                                            <embed src="{{ $formData->imageUrl($formData->previous_experiences_certificate) }}" width="100%" height="650">
                                                            @php
                                                                $check_document_exist = false;
                                                            @endphp
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h3 class="font-weight-bolder">Age Limit: {{ $group->age_limit_text }}</h3>
                                                </div>
                                                <div class="form-group">
                                                    <p class="text-sm mb-0 font-weight-bold">
                                                        {!!$group->post_categories!!}
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <p class="text-sm mb-0 font-weight-bold">Category of the
                                                        candidate: {{ $formData->category }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <p class="text-sm mb-0 font-weight-bold">PwBD: {{ $formData->pwd }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <p class="text-sm mb-0 font-weight-bold">Ex-Servicemen: {{ $formData->exsm }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <p class="text-sm mb-0 font-weight-bold">Previous Service/Experience Details in case of Govt. Servants: {{ $formData->previous_experiences }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <p class="text-sm mb-0 font-weight-bold">Working in ICMR project: {{ $formData->working_in_icmr_project }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <p class="text-sm mb-0 font-weight-bold">Claiming age
                                                relaxation: {{ $formData->claiming_age_relaxation }}</p>
                                                </div>
                                                @if($formData->claiming_age_relaxation_type)
                                                <div class="form-group">
                                                    <p class="text-sm mb-0 font-weight-bold">Age relaxation type: {{ $formData->claiming_age_relaxation_type }}</p>
                                                </div>
                                                @endif
                                                <div class="form-group">
                                                    <h3 class="font-weight-bolder">DOB: {{ date("d/M/Y",strtotime($formData->dob)) }}</h3>
                                                </div>
                                                <div class="form-group">
                                                    <h3 class="font-weight-bolder">Age on 21/Aug/2023:<br>{{ $formData->present_age; }}</h3>

                                                    @php
                                                        $age_arr = explode(" ", $formData->present_age);
                                                        $age_year = $age_arr[0];
                                                        $age_month = $age_arr[2];
                                                        $age_days = $age_arr[4];

                                                        $enable_age_relaxation = true;
                                                    @endphp
                                                    @if($age_year < $group->age_limit || ($age_year == $group->age_limit && $age_month == 0 && $age_days == 0))
                                                        @php
                                                            $enable_age_relaxation = false;
                                                        @endphp
                                                    @endif
                                                </div>
                                                @if($enable_age_relaxation)
                                                <div class="form-group">
                                                    <h3 class="font-weight-bolder">Apply Age Relaxation :- 
                                                    </h3>
                                                    <h5 class="font-weight-bolder">
                                                        @php
                                                            $enable_category_age_relaxation = true; 
                                                        @endphp 
                                                        @if(in_array($formData->category, ["UR","EWS"]))
                                                            @php
                                                                $enable_category_age_relaxation = false; 
                                                            @endphp 
                                                        @elseif( !in_array($formData->category, explode(",",$group->applying_categories)))
                                                            @php
                                                                $enable_category_age_relaxation = false; 
                                                            @endphp 
                                                        @endif
                                                        <input type="checkbox" name="age_relaxation_category" id="age_relaxation_category" class="check_age_relaxation" value="category" style="width: 16px;height: 16px;" onclick="calculate_age_limit();" @if(!$enable_category_age_relaxation) disabled @endif @if(in_array('category',$age_relaxation_types)) checked @endif> Category
                                                    </h5>
                                                    <h5 class="font-weight-bolder"> 
                                                        @php
                                                            $enable_pwbd_age_relaxation = true; 
                                                        @endphp 
                                                        @if($formData->pwd == "No")
                                                            @php
                                                                $enable_pwbd_age_relaxation = false; 
                                                            @endphp 
                                                        @endif
                                                        <input type="checkbox" name="age_relaxation_pwbd" id="age_relaxation_pwbd" class="check_age_relaxation" value="pwbd" style="width: 16px;height: 16px;" onclick="calculate_age_limit();" @if(!$enable_pwbd_age_relaxation) disabled @endif @if(in_array('pwbd',$age_relaxation_types)) checked @endif> PwBD
                                                    </h5>
                                                    <h5 class="font-weight-bolder"> 
                                                        @php
                                                            $enable_exsm_age_relaxation = true; 
                                                        @endphp 
                                                        @if($formData->exsm == "No")
                                                            @php
                                                                $enable_exsm_age_relaxation = false; 
                                                            @endphp 
                                                        @endif
                                                        <input type="checkbox" name="age_relaxation_exsm" id="age_relaxation_exsm" class="check_age_relaxation" value="exsm" style="width: 16px;height: 16px;" onclick="calculate_age_limit();" @if(!$enable_exsm_age_relaxation) disabled @endif @if(in_array('exsm',$age_relaxation_types)) checked @endif> Ex-Servicemen
                                                    </h5>
                                                    <h5 class="font-weight-bolder"> 
                                                        @php
                                                            $enable_previous_experiences_age_relaxation = true; 
                                                        @endphp 
                                                        @if($formData->previous_experiences == "No")
                                                            @php
                                                                $enable_previous_experiences_age_relaxation = false; 
                                                            @endphp 
                                                        @endif
                                                        <input type="checkbox" name="age_relaxation_central_govt_employee" id="age_relaxation_central_govt_employee" class="check_age_relaxation" value="central_govt_employee" style="width: 16px;height: 16px;" onclick="calculate_age_limit();" @if(!$enable_previous_experiences_age_relaxation) disabled @endif @if(in_array('central_govt_employee',$age_relaxation_types)) checked @endif> Central Govt. Employee
                                                    </h5>
                                                    <h5 class="font-weight-bolder"> 
                                                        @php
                                                            $enable_working_in_icmr_project_age_relaxation = true; 
                                                        @endphp 
                                                        @if($formData->working_in_icmr_project == "No")
                                                            @php
                                                                $enable_working_in_icmr_project_age_relaxation = false; 
                                                            @endphp 
                                                        @endif
                                                        <input type="checkbox" name="age_relaxation_working_in_icmr_project" id="age_relaxation_working_in_icmr_project" class="check_age_relaxation" value="working_in_icmr_project" style="width: 16px;height: 16px;" onclick="calculate_age_limit();" @if(!$enable_working_in_icmr_project_age_relaxation) disabled @endif @if(in_array('working_in_icmr_project',$age_relaxation_types)) checked @endif> Working In ICMR PROJECT
                                                    </h5>
                                                </div>
                                                <div class="form-group">
                                                    <h3 class="font-weight-bolder">Age Limit After Relaxation:</h3>
                                                    <input type="text" name="age_limit_after_relaxation" id="age_limit_after_relaxation" class="form-control" value="{{$age_limit}}" readonly>
                                                </div>
                                                @endif
                                                <div class="form-group">
                                                    <div class="custom-radios">
                                                        <div>
                                                            <input type="radio" id="age_relaxation_result_pass" name="age_relaxation_result" value="PASS" onclick="hideShowFailReason('age_relaxation','pass');" @if($sorting_update_status) @if($form_sorting->age_relaxation_result == "PASS") checked @endif @endif>
                                                            <label for="age_relaxation_result_pass">
                                                                <span>
                                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                                </span> PASS
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <input type="radio" id="age_relaxation_result_fail" name="age_relaxation_result" value="FAIL" onclick="hideShowFailReason('age_relaxation','fail');" @if($sorting_update_status) @if($form_sorting->age_relaxation_result == "FAIL") checked @endif @endif>
                                                            <label for="age_relaxation_result_fail">
                                                                <span>
                                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                                </span> FAIL
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="age_relaxation_result_pass_reason" style="@if($sorting_update_status) @if(!$form_sorting->age_relaxation_result || $form_sorting->age_relaxation_result == "FAIL") display: none; @endif @else display: none; @endif">
                                                    <label for="age_relaxation_pass_reason" class="form-control-label">Pass Reason</label>
                                                    <textarea class="form-control" name="age_relaxation_pass_reason" id="age_relaxation_pass_reason" rows="2">@if($sorting_update_status) @if($form_sorting->age_relaxation_result == "PASS") {{$form_sorting->age_relaxation_pass_reason}} @endif @endif</textarea>
                                                </div>
                                                <div class="form-group" id="age_relaxation_result_fail_reason" style="@if($sorting_update_status) @if(!$form_sorting->age_relaxation_result || $form_sorting->age_relaxation_result == "PASS") display: none; @endif @else display: none; @endif">
                                                    <label for="age_relaxation_fail_reason" class="form-control-label">Fail Reason</label>
                                                    <textarea class="form-control" name="age_relaxation_fail_reason" id="age_relaxation_fail_reason" rows="2">@if($sorting_update_status) @if($form_sorting->age_relaxation_result == "FAIL") {{$form_sorting->age_relaxation_fail_reason}} @endif @endif</textarea>
                                                </div>
                                                <div class="button-row d-flex mt-4">
                                                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                                                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next" style="margin-left: 5px;" onclick="save_sorting('age_relaxation');">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <!--single form panel-->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleOut">
                                    <div class="multisteps-form__content">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-bordered align-items-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-uppercase text-xs">
                                                                    Examination</th>
                                                                <th class="text-uppercase text-xs ps-2"></th>
                                                                <th class="text-uppercase text-xs ps-2"></th>
                                                                <th class="text-uppercase text-xs ps-2"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($X)
                                                                <tr>
                                                                    <td>
                                                                        <span class="badge badge-dot me-4">
                                                                            <i class="bg-info"></i>
                                                                            <span class="text-dark text-xs">Xth / (High
                                                                                School)<span class="text-danger">*</span></span>
                                                                        </span>
                                                                        @if ($formData->tenth_document)
                                                                            <button type="button" class="btn btn-block bg-gradient-primary" onclick="show_marksheet('tengthmarksheet');">Marksheet</button>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-dark text-xs"><b>Roll No.: </b>{{$formData->tenth_roll_no}}</span>
                                                                        <span class="text-dark text-xs"><b>Date of Passing Examination: </b>{{$formData->tenth_year_of_passing}}</span>
                                                                        <span class="text-dark text-xs"><b>Board/University: </b>{{$formData->tenth_name_of_university}}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-dark text-xs"><b>Subjects studies: </b>{{$formData->tenth_subject}}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-dark text-xs"><b>Marks obtained: </b>{{$formData->tenth_marks}}</span>
                                                                        <span class="text-dark text-xs"><b>Maximum marks: </b>{{$formData->tenth_outof}}</span>
                                                                        <span class="text-dark text-xs"><b>Percentage: </b>{{$formData->tenth_percentage}}</span>
                                                                        <span class="text-dark text-xs"><b>Class/Division: </b>{{$formData->tenth_division}}</span>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                            @if ($XII)
                                                                <tr>
                                                                    <td>
                                                                        <span class="badge badge-dot me-4">
                                                                            <i class="bg-info"></i>
                                                                            <span class="text-dark text-xs">XIIth /
                                                                                Higher Secondary
                                                                                @if ($XII_required)
                                                                                    <span class="text-danger">*</span>
                                                                                @endif
                                                                            </span>
                                                                        </span>
                                                                        @if ($formData->twelveth_document)
                                                                            <button type="button" class="btn btn-block bg-gradient-primary" onclick="show_marksheet('twelvethmarksheet');">Marksheet</button>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-dark text-xs"><b>Roll No.: </b>{{$formData->twelveth_roll_no}}</span>
                                                                        <span class="text-dark text-xs"><b>Date of Passing Examination: </b>{{$formData->twelveth_year_of_passing}}</span>
                                                                        <span class="text-dark text-xs"><b>Board/University: </b>{{$formData->twelveth_name_of_university}}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-dark text-xs"><b>Subjects studies: </b>{{$formData->twelveth_subject}}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-dark text-xs"><b>Marks obtained: </b>{{$formData->twelveth_marks}}</span>
                                                                        <span class="text-dark text-xs"><b>Maximum marks: </b>{{$formData->twelveth_outof}}</span>
                                                                        <span class="text-dark text-xs"><b>Percentage: </b>{{$formData->twelveth_percentage}}</span>
                                                                        <span class="text-dark text-xs"><b>Class/Division: </b>{{$formData->twelveth_division}}</span>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                            @if ($DIPLOMA)
                                                                <tr>
                                                                    <td>
                                                                        <span class="badge badge-dot me-4">
                                                                            <i class="bg-info"></i>
                                                                            <span class="text-dark text-xs">Diploma
                                                                                @if ($DIPLOMA)
                                                                                    <span class="text-danger">*</span>
                                                                                @endif
                                                                            </span>
                                                                        </span>
                                                                        @if ($formData->diploma_document)
                                                                            <button type="button" class="btn btn-block bg-gradient-primary" onclick="show_marksheet('diplomamarksheet');">Marksheet</button>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-dark text-xs"><b>Roll No.: </b>{{$formData->diploma_roll_no}}</span>
                                                                        <span class="text-dark text-xs"><b>Date of Passing Examination: </b>{{$formData->diploma_year_of_passing}}</span>
                                                                        <span class="text-dark text-xs"><b>Board/University: </b>{{$formData->diploma_name_of_university}}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-dark text-xs"><b>Subjects studies: </b>{{$formData->diploma_subject}}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-dark text-xs"><b>Marks obtained: </b>{{$formData->diploma_marks}}</span>
                                                                        <span class="text-dark text-xs"><b>Maximum marks: </b>{{$formData->diploma_outof}}</span>
                                                                        <span class="text-dark text-xs"><b>Percentage: </b>{{$formData->diploma_percentage}}</span>
                                                                        <span class="text-dark text-xs"><b>Class/Division: </b>{{$formData->diploma_division}}</span>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                            @if ($BACHELOR || $DIPORBACH)
                                                                <tr>
                                                                    <td>
                                                                        <span class="badge badge-dot me-4">
                                                                            <i class="bg-info"></i>
                                                                            <span class="text-dark text-xs">
                                                                                @if ($DIPORBACH)
                                                                                    <div class="form-group">
                                                                                        Bachelor’s
                                                                                        Degree / Diploma<span
                                                                                            class="text-danger">*</span>
                                                                                    </div>
                                                                                @else
                                                                                    Bachelor’s
                                                                                    Degree
                                                                                    @if ($BACHELOR)
                                                                                        <span class="text-danger">*</span>
                                                                                    @endif
                                                                                @endif
                                                                            </span>
                                                                        </span>
                                                                        @if ($formData->bachelor_degree_document)
                                                                            <button type="button" class="btn btn-block bg-gradient-primary" onclick="show_marksheet('bachelordegreemarksheet');">Marksheet</button>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-dark text-xs"><b>Roll No.: </b>{{$formData->bachelor_degree_roll_no}}</span>
                                                                        <span class="text-dark text-xs"><b>Date of Passing Examination: </b>{{$formData->bachelor_degree_year_of_passing}}</span>
                                                                        <span class="text-dark text-xs"><b>Board/University: </b>{{$formData->bachelor_degree_name_of_university}}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-dark text-xs"><b>Subjects studies: </b>{{$formData->bachelor_degree_subject}}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-dark text-xs"><b>Marks obtained: </b>{{$formData->bachelor_degree_marks}}</span>
                                                                        <span class="text-dark text-xs"><b>Maximum marks: </b>{{$formData->bachelor_degree_outof}}</span>
                                                                        <span class="text-dark text-xs"><b>Percentage: </b>{{$formData->bachelor_degree_percentage}}</span>
                                                                        <span class="text-dark text-xs"><b>Class/Division: </b>{{$formData->bachelor_degree_division}}</span>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                            @if ($MASTER)
                                                                <tr>
                                                                    <td>
                                                                        <span class="badge badge-dot me-4">
                                                                            <i class="bg-info"></i>
                                                                            <span class="text-dark text-xs">Master’s
                                                                                Degree
                                                                                @if ($MASTER)
                                                                                    <span class="text-danger">*</span>
                                                                                @endif
                                                                            </span>
                                                                        </span>
                                                                        @if ($formData->master_degree_document)
                                                                            <button type="button" class="btn btn-block bg-gradient-primary" onclick="show_marksheet('masterdegreemarksheet');">Marksheet</button>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-dark text-xs"><b>Roll No.: </b>{{$formData->master_degree_roll_no}}</span>
                                                                        <span class="text-dark text-xs"><b>Date of Passing Examination: </b>{{$formData->master_degree_year_of_passing}}</span>
                                                                        <span class="text-dark text-xs"><b>Board/University: </b>{{$formData->master_degree_name_of_university}}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-dark text-xs"><b>Subjects studies: </b>{{$formData->master_degree_subject}}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-dark text-xs"><b>Marks obtained: </b>{{$formData->master_degree_marks}}</span>
                                                                        <span class="text-dark text-xs"><b>Maximum marks: </b>{{$formData->master_degree_outof}}</span>
                                                                        <span class="text-dark text-xs"><b>Percentage: </b>{{$formData->master_degree_percentage}}</span>
                                                                        <span class="text-dark text-xs"><b>Class/Division: </b>{{$formData->master_degree_division}}</span>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                            <tr>
                                                                <td>
                                                                    <span class="badge badge-dot me-4 m-2">
                                                                        <i class="bg-info"></i>
                                                                        <span class="text-dark text-xs">Other
                                                                            Qualifications</span>
                                                                    </span>
                                                                    <span class="text-dark text-xs">{{$formData->other_exam}}</span>
                                                                    @if ($formData->other_document)
                                                                        <button type="button" class="btn btn-block bg-gradient-primary" onclick="show_marksheet('othermarksheet');">Marksheet</button>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <span class="text-dark text-xs"><b>Roll No.: </b>{{$formData->other_roll_no}}</span>
                                                                    <span class="text-dark text-xs"><b>Date of Passing Examination: </b>{{$formData->other_year_of_passing}}</span>
                                                                    <span class="text-dark text-xs"><b>Board/University: </b>{{$formData->other_name_of_university}}</span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-dark text-xs"><b>Subjects studies: </b>{{$formData->other_subject}}</span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-dark text-xs"><b>Marks obtained: </b>{{$formData->other_marks}}</span>
                                                                    <span class="text-dark text-xs"><b>Maximum marks: </b>{{$formData->other_outof}}</span>
                                                                    <span class="text-dark text-xs"><b>Percentage: </b>{{$formData->other_percentage}}</span>
                                                                    <span class="text-dark text-xs"><b>Class/Division: </b>{{$formData->other_division}}</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    @if ($formData->tenth_document)
                                                        <div id="tengthmarksheet" class="marksheet" style="display: none;">
                                                            <embed src="{{ $formData->imageUrl($formData->tenth_document) }}" width="100%" height="650">
                                                        </div>
                                                    @endif
                                                    @if ($formData->twelveth_document)
                                                        <div id="twelvethmarksheet" class="marksheet" style="display: none;">
                                                            <embed src="{{ $formData->imageUrl($formData->twelveth_document) }}" width="100%" height="650">
                                                        </div>
                                                    @endif
                                                    @if ($formData->diploma_document)
                                                        <div id="diplomamarksheet" class="marksheet" style="display: none;">
                                                            <embed src="{{ $formData->imageUrl($formData->diploma_document) }}" width="100%" height="650">
                                                        </div>
                                                    @endif
                                                    @if ($formData->bachelor_degree_document)
                                                        <div id="bachelordegreemarksheet" class="marksheet" style="display: none;">
                                                            <embed src="{{ $formData->imageUrl($formData->bachelor_degree_document) }}" width="100%" height="650">
                                                        </div>
                                                    @endif
                                                    @if ($formData->master_degree_document)
                                                        <div id="masterdegreemarksheet" class="marksheet" style="display: none;">
                                                            <embed src="{{ $formData->imageUrl($formData->master_degree_document) }}" width="100%" height="650">
                                                        </div>
                                                    @endif
                                                    @if ($formData->other_document)
                                                        <div id="othermarksheet" class="marksheet" style="display: none;">
                                                            <embed src="{{ $formData->imageUrl($formData->other_document) }}" width="100%" height="650">
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="essential_qualification_subject" class="form-control-label">Essential Qualification</label>
                                                    <select class="form-control" name="essential_qualification_subject" id="essential_qualification_subject">
                                                        <option value="">Select</option>
                                                        @if(!empty($subjects))
                                                            @foreach($subjects as $skey => $svalue)
                                                                <option value="{{$svalue->id}}" @if($sorting_update_status) @if($form_sorting->essential_qualification_subject == $svalue->id) selected @endif @endif experience="{{$svalue->experience}}">{{$svalue->subject}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-radios">
                                                        <div>
                                                            <input type="radio" id="essential_qualification_result_pass" name="essential_qualification_result" value="PASS" onclick="hideShowFailReason('essential_qualification','pass');" @if($sorting_update_status) @if($form_sorting->essential_qualification_result == "PASS") checked @endif @endif>
                                                            <label for="essential_qualification_result_pass">
                                                                <span>
                                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                                </span> PASS
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <input type="radio" id="essential_qualification_result_fail" name="essential_qualification_result" value="FAIL" onclick="hideShowFailReason('essential_qualification','fail');" @if($sorting_update_status) @if($form_sorting->essential_qualification_result == "FAIL") checked @endif @endif>
                                                            <label for="essential_qualification_result_fail">
                                                                <span>
                                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                                </span> FAIL
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="essential_qualification_result_pass_reason" style="@if($sorting_update_status) @if(!$form_sorting->essential_qualification_result || $form_sorting->essential_qualification_result == "FAIL") display: none; @endif @else display: none; @endif">
                                                    <label for="essential_qualification_pass_reason" class="form-control-label">Pass Reason</label>
                                                    <textarea class="form-control" name="essential_qualification_pass_reason" id="essential_qualification_pass_reason" rows="2">@if($sorting_update_status) @if($form_sorting->essential_qualification_result == "PASS") {{$form_sorting->essential_qualification_pass_reason}} @endif @endif</textarea>
                                                </div>
                                                <div class="form-group" id="essential_qualification_result_fail_reason" style="@if($sorting_update_status) @if(!$form_sorting->essential_qualification_result || $form_sorting->essential_qualification_result == "PASS") display: none; @endif @else display: none; @endif">
                                                    <label for="essential_qualification_fail_reason" class="form-control-label">Fail Reason</label>
                                                    <textarea class="form-control" name="essential_qualification_fail_reason" id="essential_qualification_fail_reason" rows="2">@if($sorting_update_status) @if($form_sorting->essential_qualification_result == "FAIL") {{$form_sorting->essential_qualification_fail_reason}} @endif @endif</textarea>
                                                </div>
                                                <div class="button-row d-flex mt-4">
                                                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                                                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next" style="margin-left: 5px;" onclick="save_sorting('essential_qualification');">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <!--single form panel-->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleOut">
                                    <div class="multisteps-form__content">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:130px">
                                                    <h5 class="font-weight-bolder text-center">Document</h5>
                                                    @php
                                                        $check_document_exist = true;
                                                    @endphp
                                                    @if ($formData->exp_certificate)
                                                        <button type="button" class="w3-bar-item w3-button ar_tablink @if($check_document_exist) w3-red @endif" onclick="openLSExperience(event, 'ls_exp_certificate')">Exp Certificate</button>
                                                        @php
                                                            $check_document_exist = false;
                                                        @endphp
                                                    @endif
                                                    @if ($formData->previous_experiences_certificate)
                                                        <button type="button" class="w3-bar-item w3-button ar_tablink @if($check_document_exist) w3-red @endif" onclick="openLSExperience(event, 'ls_previous_experiences_certificate')">Govt. Servants certificate</button>
                                                        @php
                                                            $check_document_exist = false;
                                                        @endphp
                                                    @endif
                                                </div>
                                                <div style="margin-left:130px">
                                                    @php
                                                        $check_document_exist = true;
                                                    @endphp
                                                    @if ($formData->exp_certificate)
                                                        <div id="ls_exp_certificate" class="w3-container ls_experience" style="@if($check_document_exist) display:block; @else display:none; @endif">
                                                            <embed src="{{ $formData->imageUrl($formData->exp_certificate) }}" width="100%" height="650">
                                                            @php
                                                                $check_document_exist = false;
                                                            @endphp
                                                        </div>
                                                    @endif
                                                    @if ($formData->previous_experiences_certificate)
                                                        <div id="ls_previous_experiences_certificate" class="w3-container ls_experience" style="@if($check_document_exist) display:block; @else display:none; @endif">
                                                            <embed src="{{ $formData->imageUrl($formData->previous_experiences_certificate) }}" width="100%" height="650">
                                                            @php
                                                                $check_document_exist = false;
                                                            @endphp
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group" id="experience_message">
                                                    @if($sorting_update_status) 
                                                        {{--@if($form_sorting->essential_qualification_subject) --}}
                                                            @if($exp_message)
                                                                <h3 class="font-weight-bolder">Required: {{$exp_message}}</h3>
                                                            @endif 
                                                        {{--@endif --}}
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-radios">
                                                        <div>
                                                            <input type="radio" id="experience_result_pass" name="experience_result" value="PASS" onclick="hideShowFailReason('experience','pass');" @if($sorting_update_status) @if($form_sorting->experience_result == "PASS") checked @endif @endif>
                                                            <label for="experience_result_pass">
                                                                <span>
                                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                                </span> PASS
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <input type="radio" id="experience_result_fail" name="experience_result" value="FAIL" onclick="hideShowFailReason('experience','fail');" @if($sorting_update_status) @if($form_sorting->experience_result == "FAIL") checked @endif @endif>
                                                            <label for="experience_result_fail">
                                                                <span>
                                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                                </span> FAIL
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="experience_result_pass_reason" style="@if($sorting_update_status) @if(!$form_sorting->experience_result || $form_sorting->experience_result == "FAIL") display: none; @endif @else display: none; @endif">
                                                    <label for="experience_pass_reason" class="form-control-label">Pass Reason</label>
                                                    <textarea class="form-control" name="experience_pass_reason" id="experience_pass_reason" rows="2">@if($sorting_update_status) @if($form_sorting->experience_result == "PASS") {{$form_sorting->experience_pass_reason}} @endif @endif</textarea>
                                                </div>
                                                <div class="form-group" id="experience_result_fail_reason" style="@if($sorting_update_status) @if(!$form_sorting->experience_result || $form_sorting->experience_result == "PASS") display: none; @endif @else display: none; @endif">
                                                    <label for="experience_fail_reason" class="form-control-label">Fail Reason</label>
                                                    <textarea class="form-control" name="experience_fail_reason" id="experience_fail_reason" rows="2">@if($sorting_update_status) @if($form_sorting->experience_result == "FAIL") {{$form_sorting->experience_fail_reason}} @endif @endif</textarea>
                                                </div>
                                                <div class="button-row d-flex mt-4">
                                                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                                                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next" style="margin-left: 5px;" onclick="save_sorting('experience');">Next</button>
                                                </div>
                                            </div>
                                        </div>
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
<script>
    function openMarksheet(evt, marksheetName) {
      var i, x, tablinks;
      x = document.getElementsByClassName("n_marksheet");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablink");
      console.log(tablinks);
      console.log(x);
      for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-red", ""); 
      }
      document.getElementById(marksheetName).style.display = "block";
      evt.currentTarget.className += " w3-red";
    }

    function openApplicationFees(evt, documentName) {
      var i, x, tablinks;
      x = document.getElementsByClassName("application_fees");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("af_tablink");
      for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-red", ""); 
      }
      document.getElementById(documentName).style.display = "block";
      evt.currentTarget.className += " w3-red";
    }

    function openAgeRelaxation(evt, documentName) {
      var i, x, tablinks;
      x = document.getElementsByClassName("age_relaxation");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("ar_tablink");
      for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-red", ""); 
      }
      document.getElementById(documentName).style.display = "block";
      evt.currentTarget.className += " w3-red";
    }
    
    function openLSExperience(evt, documentName) {
      var i, x, tablinks;
      x = document.getElementsByClassName("ls_experience");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("ar_tablink");
      for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-red", ""); 
      }
      document.getElementById(documentName).style.display = "block";
      evt.currentTarget.className += " w3-red";
    }

    function hideShowFailReason(reason_div, result){
        if(result == 'pass'){
            $("#" + reason_div + "_result_fail_reason").hide();
            $("#" + reason_div + "_fail_reason").val("");
            $("#" + reason_div + "_fail_reason").prop("required",false);

            $("#" + reason_div + "_result_pass_reason").show();
        }
        else if(result == 'fail'){
            $("#" + reason_div + "_result_fail_reason").show();
            $("#" + reason_div + "_fail_reason").prop("required",true);

            $("#" + reason_div + "_result_pass_reason").hide();
            $("#" + reason_div + "_pass_reason").val("");
        }
    }
    // function hideShowFailReason(reason_div, result, reason_id){
    //     if(result == 'pass'){
    //         $("#" + reason_div).hide();
    //         $("#" + reason_id).val("");
    //         $("#" + reason_id).prop("required",false);
    //     }
    //     else if(result == 'fail'){
    //         $("#" + reason_div).show();
    //         $("#" + reason_id).prop("required",true);
    //     }
    // }

    function calculate_age_limit(){
        var checked_age_relaxation = [];
        var group_id = $("#group_id").val();
        var form_id = $("#form_id").val();

        $(".check_age_relaxation:checked").each(function(){
            checked_age_relaxation.push($(this).val())
        })

        if(checked_age_relaxation.length){
            $.ajax({
                url: '{{ route('group.calculateagerelaxation') }}',
                type: 'POST',
                data: {
                        'form_id': form_id,
                        'group_id': group_id,
                        'checked_age_relaxation': checked_age_relaxation,
                        '_token': '{{csrf_token()}}'
                    },
                success: function(data) {
                    if(data){
                        $("#age_limit_after_relaxation").val(data);
                    }
                },
                error: function(err) {

                }
            })
        }
        else{
            $("#age_limit_after_relaxation").val('{{$group->age_limit}} Years');
        }
    }

    function show_marksheet(marksheet){
        $('.marksheet').hide();
        $('#' + marksheet).show();
    }

    function show_annexure(annexure){
        $('.annexure').hide();
        $('#' + annexure).show();
    }

    function save_sorting(step){
        var data = {};
        if(step == "name"){
            data = {
                    'form_id': $("#form_id").val(),
                    'step': step,
                    'name_result': $('input[name="' + step + '_result"]:checked').val(),
                    'name_pass_reason': $('#' + step + '_pass_reason').val(),
                    'name_fail_reason': $('#' + step + '_fail_reason').val(),
                    '_token': '{{csrf_token()}}'
                };
        }
        if(step == "photo_sign"){
            data = {
                    'form_id': $("#form_id").val(),
                    'step': step,
                    'photo_sign_result': $('input[name="' + step + '_result"]:checked').val(),
                    'photo_sign_pass_reason': $('#' + step + '_pass_reason').val(),
                    'photo_sign_fail_reason': $('#' + step + '_fail_reason').val(),
                    '_token': '{{csrf_token()}}'
                };
        }
        if(step == "category"){
            data = {
                    'form_id': $("#form_id").val(),
                    'step': step,
                    'category_result': $('input[name="' + step + '_result"]:checked').val(),
                    'category_pass_reason': $('#' + step + '_pass_reason').val(),
                    'category_fail_reason': $('#' + step + '_fail_reason').val(),
                    '_token': '{{csrf_token()}}'
                };
            if($('input[name="' + step + '_result"]:checked').val() == "PASS"){
                // $("#age_relaxation_category").prop("checked",true);
                calculate_age_limit();
            }
            else{
                // $("#age_relaxation_category").prop("checked",false);
                calculate_age_limit();
            }
        }
        if(step == "application_fees"){
            data = {
                    'form_id': $("#form_id").val(),
                    'step': step,
                    'application_fees_result': $('input[name="' + step + '_result"]:checked').val(),
                    'application_fees_pass_reason': $('#' + step + '_pass_reason').val(),
                    'application_fees_fail_reason': $('#' + step + '_fail_reason').val(),
                    '_token': '{{csrf_token()}}'
                };
        }
        if(step == "age_relaxation"){
            var checked_age_relaxation = [];
            
            $(".check_age_relaxation:checked").each(function(){
                checked_age_relaxation.push($(this).val())
            })
            data = {
                    'form_id': $("#form_id").val(),
                    'step': step,
                    'age_relaxation_result': $('input[name="' + step + '_result"]:checked').val(),
                    'age_relaxation_pass_reason': $('#' + step + '_pass_reason').val(),
                    'age_relaxation_fail_reason': $('#' + step + '_fail_reason').val(),
                    'age_relaxation_types': checked_age_relaxation,
                    'age_limit_after_relaxation': $("#age_limit_after_relaxation").val(),
                    '_token': '{{csrf_token()}}'
                };
        }
        if(step == "essential_qualification"){
            data = {
                    'form_id': $("#form_id").val(),
                    'step': step,
                    'essential_qualification_result': $('input[name="' + step + '_result"]:checked').val(),
                    'essential_qualification_pass_reason': $('#' + step + '_pass_reason').val(),
                    'essential_qualification_fail_reason': $('#' + step + '_fail_reason').val(),
                    'essential_qualification_subject': $('#essential_qualification_subject').val(),
                    '_token': '{{csrf_token()}}'
                };

            if($("option:selected",'#essential_qualification_subject').attr('experience')){
                $("#experience_message").html("<h3 class='font-weight-bolder'>Required: " + $("option:selected",'#essential_qualification_subject').attr('experience') + "</h3>");
            }
            else{
                $("#experience_message").html('');
            }
        }
        if(step == "experience"){
            data = {
                    'form_id': $("#form_id").val(),
                    'step': step,
                    'experience_result': $('input[name="' + step + '_result"]:checked').val(),
                    'experience_pass_reason': $('#' + step + '_pass_reason').val(),
                    'experience_fail_reason': $('#' + step + '_fail_reason').val(),
                    '_token': '{{csrf_token()}}'
                };
        }

        $.ajax({
            url: '{{ route('group.savesorting') }}',
            type: 'POST',
            data: data,
            success: function(data) {
                if(data){
                    if(step == "experience"){
                        if(data == 8){
                            window.location.href = "{{ route('group.processshortingreview')}}?form_id=" + $("#form_id").val() + "&slot=" + $("#slot").val();
                        }
                        else{
                            alert("Please update all step result!");
                            if(data == 1){
                                $("#name").click();
                            }
                            if(data == 2){
                                $("#photo_sign").click();
                            }
                            if(data == 3){
                                $("#category").click();
                            }
                            if(data == 4){
                                $("#application_fees").click();
                            }
                            if(data == 5){
                                $("#age_relaxation").click();
                            }
                            if(data == 6){
                                $("#qualification").click();
                            }
                            if(data == 7){
                                $("#experience").click();
                            }
                        }
                    }
                }
                else{

                }
            },
            error: function(err) {

            }
        })
    }
</script>
@endsection