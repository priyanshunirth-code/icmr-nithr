@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Process Shorting'])
    <div class="container-fluid mt-3 py-4">
        <div class="row">
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
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-xs">S No.</th>
                                                <th class="text-uppercase text-xs">Step</th>
                                                <th class="text-uppercase text-xs ps-2">Result</th>
                                                <th class="text-uppercase text-xs ps-2">Pass Reason</th>
                                                <th class="text-uppercase text-xs ps-2">Fail Reason</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">1</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">Name</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="@if($form_sorting->name_result == 'PASS') text-success @elseif($form_sorting->name_result == 'FAIL') text-danger @endif text-xs">{{$form_sorting->name_result}}</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">{{$form_sorting->name_pass_reason}}</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">{{$form_sorting->name_fail_reason}}</span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">2</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">Photo & Signature</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="@if($form_sorting->photo_sign_result == 'PASS') text-success @elseif($form_sorting->photo_sign_result == 'FAIL') text-danger @endif text-xs">{{$form_sorting->photo_sign_result}}</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">{{$form_sorting->photo_sign_pass_reason}}</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">{{$form_sorting->photo_sign_fail_reason}}</span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">3</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">Category</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="@if($form_sorting->category_result == 'PASS') text-success @elseif($form_sorting->category_result == 'FAIL') text-danger @endif text-xs">{{$form_sorting->category_result}}</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">{{$form_sorting->category_pass_reason}}</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">{{$form_sorting->category_fail_reason}}</span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">4</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">Application Fees</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="@if($form_sorting->application_fees_result == 'PASS') text-success @elseif($form_sorting->application_fees_result == 'FAIL') text-danger @endif text-xs">{{$form_sorting->application_fees_result}}</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">{{$form_sorting->application_fees_pass_reason}}</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">{{$form_sorting->application_fees_fail_reason}}</span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">5</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">Age Relaxation</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="@if($form_sorting->age_relaxation_result == 'PASS') text-success @elseif($form_sorting->age_relaxation_result == 'FAIL') text-danger @endif text-xs">{{$form_sorting->age_relaxation_result}}</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">{{$form_sorting->age_relaxation_pass_reason}}</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">{{$form_sorting->age_relaxation_fail_reason}}</span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">6</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">Essential Qualification</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="@if($form_sorting->essential_qualification_result == 'PASS') text-success @elseif($form_sorting->essential_qualification_result == 'FAIL') text-danger @endif text-xs">{{$form_sorting->essential_qualification_result}}</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">{{$form_sorting->essential_qualification_pass_reason}}</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">{{$form_sorting->essential_qualification_fail_reason}}</span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">7</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">Experience</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="@if($form_sorting->experience_result == 'PASS') text-success @elseif($form_sorting->experience_result == 'FAIL') text-danger @endif text-xs">{{$form_sorting->experience_result}}</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">{{$form_sorting->experience_pass_reason}}</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <span class="text-dark text-xs">{{$form_sorting->experience_fail_reason}}</span>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    @if ($formData->profile_pic)
                                        <button type="button" class="btn btn-block bg-gradient-primary" onclick="show_document('profile_pic');">Profile Pic</button>
                                    @endif
                                    @if ($formData->signature)
                                        <button type="button" class="btn btn-block bg-gradient-primary" onclick="show_document('signature');">Signature</button>
                                    @endif
                                    @if ($formData->category_document)
                                        <button type="button" class="btn btn-block bg-gradient-primary" onclick="show_document('category');">Category</button>
                                    @endif
                                    @if ($formData->pwd_document)
                                        <button type="button" class="btn btn-block bg-gradient-primary" onclick="show_document('pwd');">PwBD</button>
                                    @endif
                                    @if ($formData->exsm_document)
                                        <button type="button" class="btn btn-block bg-gradient-primary" onclick="show_document('exsm');">Ex-Servicemen</button>
                                    @endif
                                    @if ($formData->icmr_project_certificate)
                                        <button type="button" class="btn btn-block bg-gradient-primary" onclick="show_document('icmr_project_certificate');">Working in ICMR Project</button>
                                    @endif
                                    @if ($formData->exp_certificate)
                                        <button type="button" class="btn btn-block bg-gradient-primary" onclick="show_document('exp_certificate');">Exp Certificate</button>
                                    @endif
                                    @if ($formData->previous_experiences_certificate)
                                        <button type="button" class="btn btn-block bg-gradient-primary" onclick="show_document('previous_experiences_certificate');">Govt. Servants certificate</button>
                                    @endif

                                    @if ($formData->tenth_document)
                                        <button type="button" class="btn btn-block bg-gradient-primary" onclick="show_document('tenth');">10th Marksheet</button>
                                    @endif
                                    @if ($formData->twelveth_document)
                                        <button type="button" class="btn btn-block bg-gradient-primary" onclick="show_document('twelveth');">12th Marksheet</button>
                                    @endif
                                    @if ($formData->diploma_document)
                                        <button type="button" class="btn btn-block bg-gradient-primary" onclick="show_document('diploma');">Diploma</button>
                                    @endif
                                    @if ($formData->bachelor_degree_document)
                                        <button type="button" class="btn btn-block bg-gradient-primary" onclick="show_document('bachelor_degree');">Bachelor's Degree / Diploma</button>
                                    @endif
                                    @if ($formData->master_degree_document)
                                        <button type="button" class="btn btn-block bg-gradient-primary" onclick="show_document('master_degree');">Master's Degree / Diploma</button>
                                    @endif
                                    @if ($formData->other_document)
                                        <button type="button" class="btn btn-block bg-gradient-primary" onclick="show_document('other');">Other</button>
                                    @endif
                                </div>
                                <div>
                                    @if ($formData->profile_pic)
                                        <img src="{{ $formData->imageUrl($formData->profile_pic) }}" class="document" id="profile_pic" style="width:150px; display: none;">
                                    @endif
                                    @if ($formData->signature)
                                        <img src="{{ $formData->imageUrl($formData->signature) }}" class="document" id="signature" style="width:150px; display: none;">
                                    @endif
                                    @if ($formData->category_document)
                                        <embed src="{{ $formData->imageUrl($formData->category_document) }}" width="100%" height="650" class="document" id="category" style="display: none;">
                                    @endif
                                    @if ($formData->pwd_document)
                                        <embed src="{{ $formData->imageUrl($formData->pwd_document) }}" width="100%" height="650" class="document" id="pwd" style="display: none;">
                                    @endif
                                    @if ($formData->exsm_document)
                                        <embed src="{{ $formData->imageUrl($formData->exsm_document) }}" width="100%" height="650" class="document" id="exsm" style="display: none;">
                                    @endif
                                    @if ($formData->exp_certificate)
                                        <embed src="{{ $formData->imageUrl($formData->exp_certificate) }}" width="100%" height="650" class="document" id="exp_certificate" style="display: none;">
                                    @endif
                                    @if ($formData->previous_experiences_certificate)
                                        <embed src="{{ $formData->imageUrl($formData->previous_experiences_certificate) }}" width="100%" height="650" class="document" id="previous_experiences_certificate" style="display: none;">
                                    @endif
                                    @if ($formData->tenth_document)
                                        <embed src="{{ $formData->imageUrl($formData->tenth_document) }}" width="100%" height="650" class="document" id="tenth" style="display: none;">
                                    @endif
                                    @if ($formData->twelveth_document)
                                        <embed src="{{ $formData->imageUrl($formData->twelveth_document) }}" width="100%" height="650" class="document" id="twelveth" style="display: none;">
                                    @endif
                                    @if ($formData->diploma_document)
                                        <embed src="{{ $formData->imageUrl($formData->diploma_document) }}" width="100%" height="650" class="document" id="diploma" style="display: none;">
                                    @endif
                                    @if ($formData->bachelor_degree_document)
                                        <embed src="{{ $formData->imageUrl($formData->bachelor_degree_document) }}" width="100%" height="650" class="document" id="bachelor_degree" style="display: none;">
                                    @endif
                                    @if ($formData->master_degree_document)
                                        <embed src="{{ $formData->imageUrl($formData->master_degree_document) }}" width="100%" height="650" class="document" id="master_degree" style="display: none;">
                                    @endif
                                    @if ($formData->other_document)
                                        <embed src="{{ $formData->imageUrl($formData->other_document) }}" width="100%" height="650" class="document" id="other" style="display: none;">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="button-row mt-4" style="text-align: end;">
                            <a href="{{ url()->previous() }}" class="btn btn-danger ml-auto" title="Back">Back</a>
                            @if($stepComplete == 7)
                            <a href="{{ route('admin.savefinalsorting',['form_id'=>$formData->id,'group_id'=>$group_id]) }}" class="btn btn-primary ml-auto" title="Submit">Submit</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
    <script type="text/javascript">
        function show_document(documents){
            $('.document').hide();
            $('#' + documents).show();
        }
    </script>
@endsection