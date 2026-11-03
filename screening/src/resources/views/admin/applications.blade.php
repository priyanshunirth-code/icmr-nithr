@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Applications'])
    <style type="text/css">
        p{
            word-break: break-all;
            white-space: normal;
        }
    </style>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Applications</h6>
                        <!-- <div class="d-flex justify-content-between"> -->
                            <form id="searchPaymentStatus" method="get" action="{{ route('admin.applications') }}">
                                <div class="row px-5">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select name="form_id" class="form-select">
                                                <option value="">All</option>
                                                <option value="{{env('FORMID1')}}" @if($form_id == env('FORMID1')) selected @endif>Technical Assistant Group-B (Technical) (Biological Sciences)</option>
                                                <option value="{{env('FORMID2')}}" @if($form_id == env('FORMID2')) selected @endif>Technical Assistant Group-B (Technical) (Social Sciences)</option>
                                                <option value="{{env('FORMID3')}}" @if($form_id == env('FORMID3')) selected @endif>Technical Assistant Group-B (Technical) (Computer Science Information Technology) </option>
                                                <option value="{{env('FORMID4')}}" @if($form_id == env('FORMID4')) selected @endif>Technical Assistant Group-B (Technical) (Electronics & Communication Engineering)</option>
                                                <option value="{{env('FORMID5')}}" @if($form_id == env('FORMID5')) selected @endif>Technical Assistant Group-B (Technical) (Electrical Engineering)</option>
                                                <option value="{{env('FORMID6')}}" @if($form_id == env('FORMID6')) selected @endif>Technical Assistant Group-B (Technical) (Civil Engineering)</option>
                                                <option value="{{env('FORMID7')}}" @if($form_id == env('FORMID7')) selected @endif>Technician-1 Group-C (Technical) (Biological Science)</option>
                                                <option value="{{env('FORMID8')}}" @if($form_id == env('FORMID8')) selected @endif>Technician-1 Group-C (Technical) (Computer Science)</option>
                                                <option value="{{env('FORMID9')}}" @if($form_id == env('FORMID9')) selected @endif>Lab Attendant-1 Group-C (Technical)</option>
                                                <option value="{{env('FORMID10')}}" @if($form_id == env('FORMID10')) selected @endif>Lab Attendant-1 Group-C (Technical) (Refrigeration and air conditioning)</option>

                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select name="result" class="form-select">
                                                <option value="">All</option>
                                                <option value="PASS" @if($result == 'PASS') selected @endif>PASS</option>                                            
                                                <option value="FAIL" @if($result == 'FAIL') selected @endif>FAIL</option>                                            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-sm btn-primary">Search</button>
                                        <a href="{{route('admin.exportExcel',['form_id' => $form_id,'result'=>$result])}}" class="btn btn-primary btn-sm">Excel</a>
                                    </div>
                                </div>
                            </form>
                        <!-- </div> -->
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <div id="datatable-title" style="display: none;">All Aplications</div>
                            <table class="table align-items-center mb-0" id="example3">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            S.NO.</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Application No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Father's<br>Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Mother's<br>Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Gender</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            DOB</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Present<br>Age</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Claiming<br>Age?</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Claiming<br>type</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Category</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Category<br>Document</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            PwD</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            PwD<br>Document</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Ex Service<br>Man</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Ex Servicemen Document</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            EWS</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            EWS<br>Document</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Marital<br>Status</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Divorced<br>Type</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Postal<br>Address</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Postal<br>State</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Postal<br>City</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Postal<br>Code</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Permanent<br>Address</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Permanent<br>State</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Permanent<br>City</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Permanent<br>Postal<br>Code</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Mobile No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Alt<br>Mobile No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Id Card</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Id Card No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nationality</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            10Th<br>Roll No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            10Th Year<br>of passing</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            10Th Name of<br>university</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            10Th<br>Subject</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            10Th<br>Marks</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            10Th<br>Out Of</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            10Th<br>Percentage</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            10Th<br>Division</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            10Th<br>Document</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            12Th<br>Roll No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            12Th Year<br>of passing</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            12Th Name of<br>university</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            12Th<br>Subject</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            12Th<br>Marks</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            12Th<br>Out Of</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            12Th<br>Percentage</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            12Th<br>Division</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            12Th<br>Document</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Diploma<br>Roll No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Diploma Year<br>of passing</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Diploma Name of<br>university</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Diploma<br>Subject</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Diploma<br>Marks</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Diploma<br>Out Of</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Diploma<br>Percentage</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Diploma<br>Division</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Diploma<br>Document</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Bachelor Degree<br>Roll No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Bachelor Degree<br>Year of passing</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Bachelor Degree<br>Name of university</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Bachelor Degree<br>Subject</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Bachelor<br>Degree Marks</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Bachelor Degree<br>Out Of</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Bachelor Degree<br>Percentage</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Bachelor Degree<br>Division</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Bachelor Degree<br>Document</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Master Degree<br>Roll No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Master Degree<br>Year of passing</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Master Degree<br>Name of university</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Master Degree<br>Subject</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Master Degree<br>Marks</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Master Degree<br>Out Of</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Master Degree<br>Percentage</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Master Degree<br>Division</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Master Degree<br>Document</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Other Exam</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Other<br>Roll No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Other Year<br>of passing</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Other Name of<br>university</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Other<br>Subject</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Other<br>Marks</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Other<br>Out Of</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Other<br>Percentage</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Other<br>Division</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Other<br>Document</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Computer<br>Skills</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Computer Skills<br>Description</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Previous<br>Experiences</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Working in<br>icmr project?</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Additional<br>information</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Result</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Pass Reason</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Fail Reason</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($forms))
                                        @foreach ($forms as $key => $form)
                                            @php
                                                $check_form_screening_status = $form->check_form_sorting_process($form->id);
                                            @endphp
                                            <tr style="@if($form->result == 'PASS') background-color: lightgreen; @elseif($form->result == 'FAIL') background-color: red; @elseif($check_form_screening_status) background-color: yellow;@endif">
                                                <td>
                                                    {{ $key+1 }}
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->form_id }}{{ $form->application_no }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->firstname }}
                                                        {{ $form->middlename }} {{ $form->lastname }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->fathername }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->mothername }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->gender }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->dob }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->present_age }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->claiming_age_relaxation }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->claiming_age_relaxation_type }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->category }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        @if ($form->category_document)
                                                            <button type="button" class="btn btn-link" title="View"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                onclick="viewdocument('{{ $form->imageUrl($form->category_document) }}');"><i
                                                                    class="fa fa-file"></i>
                                                            </button>
                                                        @endif
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->pwd }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        @if ($form->pwd_document)
                                                            <button type="button" class="btn btn-link" title="View"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                onclick="viewdocument('{{ $form->imageUrl($form->pwd_document) }}');"><i
                                                                    class="fa fa-file"></i>
                                                            </button>
                                                        @endif
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->exsm }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        @if ($form->exsm_document)
                                                            <button type="button" class="btn btn-link" title="View"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                onclick="viewdocument('{{ $form->imageUrl($form->exsm_document) }}');"><i
                                                                    class="fa fa-file"></i>
                                                            </button>
                                                        @endif
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->ews }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        @if ($form->ews_document)
                                                            <button type="button" class="btn btn-link" title="View"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                onclick="viewdocument('{{ $form->imageUrl($form->ews_document) }}');"><i
                                                                    class="fa fa-file"></i>
                                                            </button>
                                                        @endif
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->marital_status }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->divorced_type }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->postal_address }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->postal_state1->name }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->postal_city1->city }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->postal_code }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->permanent_address }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->permanent_state1->name }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->permanent_city1->city }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->permanent_postal_code }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->email }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->mobile_no }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->alternate_mobile_no }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->id_card_type }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->id_card_no }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->nationality }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->tenth_roll_no }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->tenth_year_of_passing }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->tenth_name_of_university }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->tenth_subject }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->tenth_marks }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->tenth_outof }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->tenth_percentage }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->tenth_division }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        @if ($form->tenth_document)
                                                            <button type="button" class="btn btn-link" title="View"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                onclick="viewdocument('{{ $form->imageUrl($form->tenth_document) }}');"><i
                                                                    class="fa fa-file"></i>
                                                            </button>
                                                        @endif
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->twelveth_roll_no }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->twelveth_year_of_passing }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->twelveth_name_of_university }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->twelveth_subject }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->twelveth_marks }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->twelveth_outof }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->twelveth_percentage }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->twelveth_division }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        @if ($form->twelveth_document)
                                                            <button type="button" class="btn btn-link" title="View"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                onclick="viewdocument('{{ $form->imageUrl($form->twelveth_document) }}');"><i
                                                                    class="fa fa-file"></i>
                                                            </button>
                                                        @endif
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->diploma_roll_no }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->diploma_year_of_passing }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->diploma_name_of_university }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->diploma_subject }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->diploma_marks }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->diploma_outof }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->diploma_percentage }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->diploma_division }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        @if ($form->diploma_document)
                                                            <button type="button" class="btn btn-link" title="View"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                onclick="viewdocument('{{ $form->imageUrl($form->diploma_document) }}');"><i
                                                                    class="fa fa-file"></i>
                                                            </button>
                                                        @endif
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->bachelor_degree_roll_no }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->bachelor_degree_year_of_passing }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->bachelor_degree_name_of_university }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->bachelor_degree_subject }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->bachelor_degree_marks }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->bachelor_degree_outof }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->bachelor_degree_percentage }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->bachelor_degree_division }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        @if ($form->bachelor_degree_document)
                                                            <button type="button" class="btn btn-link" title="View"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                onclick="viewdocument('{{ $form->imageUrl($form->bachelor_degree_document) }}');"><i
                                                                    class="fa fa-file"></i>
                                                            </button>
                                                        @endif
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->master_degree_roll_no }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->master_degree_year_of_passing }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->master_degree_name_of_university }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->master_degree_subject }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->master_degree_marks }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->master_degree_outof }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->master_degree_percentage }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->master_degree_division }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        @if ($form->master_degree_document)
                                                            <button type="button" class="btn btn-link" title="View"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                onclick="viewdocument('{{ $form->imageUrl($form->master_degree_document) }}');"><i
                                                                    class="fa fa-file"></i>
                                                            </button>
                                                        @endif
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->other_exam }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->other_roll_no }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->other_year_of_passing }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->other_name_of_university }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->other_subject }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->other_marks }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->other_outof }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->other_percentage }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->other_division }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        @if ($form->other_document)
                                                            <button type="button" class="btn btn-link" title="View"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                onclick="viewdocument('{{ $form->imageUrl($form->other_document) }}');"><i
                                                                    class="fa fa-file"></i>
                                                            </button>
                                                        @endif
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $form->computer_skills }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->computer_skills_description }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->previous_experiences }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->working_in_icmr_project }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->additional_information }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $form->result }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {!! $form->pass_reason !!}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {!! $form->fail_reason !!}</p>
                                                </td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div>{{ $forms->links('pagination') }}</div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal right fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" style="min-width: 700px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Document</h1>
                        <button type="button" class=" close" data-bs-dismiss="modal"
                            aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row" id="document" style="display:none;">
                            <div class="col-md-12">
                                <embed class="w-100" src="" height="500" alt="" id="document_embed">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="" class="btn btn-success btn-sm" download=""
                            id="document_download">Download</a>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth.footer')
    </div>
    <script type="text/javascript">
        function viewdocument(image_url) {
            $("#document_embed").attr("src", image_url);
            // $("#document_embed").attr("alt", file_name);
            // $("#exampleModalLabel").html(file_name);
            $("#document_download").attr("href", image_url);
            $("#document").show();
        }
    </script>
@endsection
