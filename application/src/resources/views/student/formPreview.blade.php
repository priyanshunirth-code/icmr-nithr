@extends('layouts.app')

@section('content')
    <main class="main-content mt-0">

        @include('student.studentProfile')

        @php

            // if ($condition) {
            // return redirect()->route('dashboard');
            // }

            $WEXDESC = 'Work Experience';
            $X = false;
            $XII = false;
            $DIPLOMA = false;
            $BACHELOR = false;
            $MASTER = false;
            $WORKEXP = false;
            $DIPORBACH = false;
            $APPLYFOR = '';

            if ($formData->form_id == env('FORMID1') || $formData->form_id == env('FORMID2')) {
                // Valid for 3
                $APPLYFOR = 'Technical Assistant';
                $X = true;
                $XII = true;
                $BACHELOR = true;
            }

            if ($formData->form_id == env('FORMID3') || $formData->form_id == env('FORMID4') || $formData->form_id == env('FORMID5')) {
                // Diploma or Degree
                $APPLYFOR = 'Technical Assistant';
                $X = true;
                $XII = true;
                $DIPLOMA = false;
                $BACHELOR = false;
                $DIPORBACH = true;
            }

            if ($formData->form_id == env('FORMID5') || $formData->form_id == env('FORMID6')) {
                // Diploma and Experience OR Degree
                $APPLYFOR = 'Technical Assistant';
                $X = true;
                $XII = true;
                $DIPLOMA = false;
                $BACHELOR = false;
                $DIPORBACH = true;
            }
            if ($formData->form_id == env('FORMID7') || $formData->form_id == env('FORMID8')) {
                $APPLYFOR = 'Technician-I';

                // 10th 12th and Diploma
                $X = true;
                $XII = true;
                $DIPLOMA = true;
                $WORKEXP = false;
            }

            if ($formData->form_id == env('FORMID9') || $formData->form_id == env('FORMID10')) {
                // 10th and EXp
                $APPLYFOR = 'Lab Attendant-I';
                $X = true;
                $WORKEXP = true;
                $WEXDESC = 'One year working experience in a Govt. recognized/approved/registered Laboratory';
            }

        @endphp

        <div class="container-fluid">

            <div class="nav-wrapper position-relative my-2">
                <ul class="nav nav-pills nav-fill p-1">

                    <li class="nav-item">
                        <div class="mb-0 px-0 py-1 ">
                            <i class="ni ni-laptop text-sm me-2"></i> Registration
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="mb-0 px-0 py-1 ">
                            <i class="ni ni-laptop text-sm me-2"></i> Upload Documents
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link mb-0 px-0 py-1 active">
                            <i class="ni ni-laptop text-sm me-2"></i> Preview And Payment
                        </div>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        {{-- {{ $formData }} --}}
                        <div class="card-header text-center p-0 mx-3 mt-3 position-relative z-index-1">
                            <h3>Application for the post of {{ $APPLYFOR }} </h3>
                        </div>
                        {{-- <form role="form" method="POST" action={{ url('student-form-save') }}
                            enctype="multipart/form-data"> --}}

                        <div class="card-body">
                            <p class="text-uppercase text-sm h3">Presonal Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstname" class="form-control-label">Name:</label>
                                                <span>{{ $formData->firstname }} {{ $formData->middlename }}
                                                    {{ $formData->lastname }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fathername" class="form-control-label">Father's name:</label>
                                                <span>{{ $formData->fathername }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mothername" class="form-control-label">Mother's name:</label>
                                                <span>{{ $formData->mothername }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender" class="form-control-label">Gender:</label>
                                                <span>{{ $formData->gender }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dob" class="form-control-label">Date Of Birth:</label>
                                                <span>{{ date('d/M/Y', strtotime($formData->dob)) }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="present_age" class="form-control-label">Present Age:</label>
                                                <span>{{ $formData->present_age }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="present_age" class="form-control-label">Nationality</label>
                                                <span>{{ $formData->nationality }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <label for="present_age"
                                                class="form-control-label text-left">Profile:</label><br>
                                            @if ($formData->profile_pic)
                                                <img src="{{ $formData->imageUrl($formData->profile_pic) }}"
                                                    style="width:150px">
                                            @endif
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <label for="present_age"
                                                class="form-control-label text-left">Signature:</label><br>
                                            @if ($formData->signature)
                                                <img src="{{ $formData->imageUrl($formData->signature) }}"
                                                    style="width:150px">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 my-2">
                                    <div class="form-group">
                                        <fieldset>
                                            <legend class="col-form-label col-md-3 pt-0">PwBD:</legend>
                                            <span>{{ $formData->pwd }}</span>
                                            @if ($formData->pwd_document)
                                                <a href="{{ $formData->imageUrl($formData->pwd_document) }}"
                                                    target="_blank"><i class="fa fa-file-pdf-o" style="color:red"></i></a>
                                            @endif
                                        </fieldset>
                                        <fieldset>
                                            <legend class="col-form-label col-md-3 pt-0">Ex-Servicemen:</legend>
                                            <span>{{ $formData->exsm }}</span>
                                            @if ($formData->exsm_document)
                                                <a href="{{ $formData->imageUrl($formData->exsm_document) }}"
                                                    target="_blank"><i class="fa fa-file-pdf-o" style="color:red"></i></a>
                                            @endif
                                        </fieldset>
                                        <fieldset>
                                            <legend class="col-form-label col-md-3 pt-0">Marital Status:</legend>
                                            <span>{{ $formData->marital_status }}</span>
                                        </fieldset>
                                        <fieldset id="divorced_type_div"
                                            style="@if ($formData->marital_status != 'Divorced') display: none; @endif">
                                            <legend class="col-form-label col-md-4 pt-0">Legally Separated:</legend>
                                            <span>{{ $formData->divorced_type }}</span>
                                        </fieldset>
                                        <fieldset>
                                            <legend class="col-form-label col-md-6 pt-0">Are you having Aadhar Card
                                                No.?</legend>
                                            <span>{{ $formData->is_having_aadhar_card }}</span>
                                        </fieldset>
                                        <div class="form-group" id="aadhar_card_div"
                                            style="@if ($formData->is_having_aadhar_card == 'No') display: none; @endif">
                                            <label for="aadharNo" class="form-control-label">Aadhar Card No.</label>
                                            <span>{{ $formData->aadhar_no }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 my-2">
                                    <div class="form-group">
                                        <div class="d-flex gap-2 align-items-center">
                                            <label for="age_relax" class="form-control-label">Are you claiming age
                                                relaxation?:</label>
                                            <span>{{ $formData->claiming_age_relaxation }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <span>{{ $formData->claiming_age_relaxation_type }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="id_card_div"
                                    style="@if ($formData->is_having_aadhar_card == 'Yes') display: none; @endif">
                                    <div class="col-md-6 my-2">
                                        <div class="form-group">
                                            <label for="idcard_type" class="form-control-label">Id Card Type:</label>
                                            <span>{{ $formData->id_card_type }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="form-group">
                                            <label for="idcard_no" class="form-control-label">Id Card No.</label>
                                            <span>{{ $formData->id_card_no }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category" class="form-control-label">Category of the
                                            candidate:</label>
                                        <span>{{ $formData->category }}</span>
                                        @if ($formData->category_document)
                                            <a href="{{ $formData->imageUrl($formData->category_document) }}"
                                                target="_blank"><i class="fa fa-file-pdf-o" style="color:red"></i></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category" class="form-control-label">Applying
                                            for the Category:</label>
                                        <span>{{ $formData->apply_for_category }}</span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile_no" class="form-control-label">Mobile No.</label>
                                        <span>{{ $formData->mobile_no }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alternate_mobile_no" class="form-control-label">Alternate Mobile
                                            No.</label>
                                        <span>{{ $formData->alternate_mobile_no }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">Email Address</label>
                                        <span>{{ $formData->email }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <p class="text-uppercase text-sm">Postal Address (Present)</p>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="postal_address" class="form-control-label">Address</label>
                                            <span>{{ $formData->postal_address }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="postal_state" class="form-control-label">State:</label>
                                            <span>{{ $formData->postal_state1->name }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="postal_city" class="form-control-label">City:</label>
                                            <span>{{ $formData->postal_city1->city }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="postal_code" class="form-control-label">Postal code</label>
                                            <span>{{ $formData->postal_code }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <p class="text-uppercase text-sm">Permanent Address</p>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="permamnent_address" class="form-control-label">Address</label>
                                            <span>{{ $formData->permamnent_address }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="permamnent_state" class="form-control-label">State:</label>
                                            @if ($formData->permanent_state)
                                                <span>{{ $formData->permanent_state1->name }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="permamnent_city" class="form-control-label">City:</label>
                                            @if ($formData->permanent_state1)
                                                <span>{{ $formData->permanent_city1->city }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="permamnent_postal_code" class="form-control-label">Postal
                                                code</label>
                                            <span>{{ $formData->permanent_postal_code }}</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm h3">Educational/Technical/Professional Qualifications:</p>

                            <div class="row">

                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table table-hover align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Examination Passed</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Roll
                                                        No.
                                                    </th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Year of <br>
                                                        Passing
                                                    </th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Name of the
                                                        Board/University
                                                    </th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Subject
                                                    </th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Marks
                                                    </th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Out Of
                                                    </th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Percentag
                                                    </th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Division
                                                    </th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Marksheet
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>

                                                    <td>
                                                        <span class="badge badge-dot me-4">
                                                            <i class="bg-info"></i>
                                                            <span class="text-dark text-xs">Xth / (HSC)</span>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->tenth_roll_no }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->tenth_year_of_passing }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->tenth_name_of_university }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->tenth_subject }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->tenth_marks }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->tenth_outof }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->tenth_percentage }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->tenth_division }}</span>
                                                    </td>
                                                    <td>
                                                        @if ($formData->tenth_document)
                                                            <a href="{{ $formData->imageUrl($formData->tenth_document) }}"
                                                                target="_blank"><i class="fa fa-file-pdf-o"
                                                                    style="color:red"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="badge badge-dot me-4">
                                                            <i class="bg-info"></i>
                                                            <span class="text-dark text-xs">XIIth /
                                                                Intermediate</span>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->twelveth_roll_no }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->twelveth_year_of_passing }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->twelveth_name_of_university }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->twelveth_subject }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->twelveth_marks }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->twelveth_outof }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->twelveth_percentage }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->twelveth_division }}</span>
                                                    </td>
                                                    <td>
                                                        @if ($formData->twelveth_document)
                                                            <a href="{{ $formData->imageUrl($formData->twelveth_document) }}"
                                                                target="_blank"><i class="fa fa-file-pdf-o"
                                                                    style="color:red"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="badge badge-dot me-4">
                                                            <i class="bg-info"></i>
                                                            <span class="text-dark text-xs">Diploma</span>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->diploma_roll_no }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->diploma_year_of_passing }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->diploma_name_of_university }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->diploma_subject }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->diploma_marks }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->diploma_outof }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->diploma_percentage }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->diploma_division }}</span>
                                                    </td>
                                                    <td>
                                                        @if ($formData->diploma_document)
                                                            <a href="{{ $formData->imageUrl($formData->diploma_document) }}"
                                                                target="_blank"><i class="fa fa-file-pdf-o"
                                                                    style="color:red"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>

                                                @if ($BACHELOR || $DIPORBACH)
                                                    <tr>
                                                        <td>
                                                            <span class="badge badge-dot me-4">
                                                                <i class="bg-info"></i>
                                                                <span class="text-dark text-xs">
                                                                    @if ($DIPORBACH)
                                                                    Bachelor’s
                                                                                Degree / Diploma
                                                                    @else

                                                                    Bachelor’s
                                                                    Degree
                                                    @endif
                                                </span>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $formData->bachelor_degree_roll_no }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $formData->bachelor_degree_year_of_passing }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $formData->bachelor_degree_name_of_university }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $formData->bachelor_degree_subject }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $formData->bachelor_degree_marks }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $formData->bachelor_degree_outof }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $formData->bachelor_degree_percentage }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $formData->bachelor_degree_division }}</span>
                                                        </td>
                                                        <td>
                                                            @if ($formData->bachelor_degree_document)
                                                                <a href="{{ $formData->imageUrl($formData->bachelor_degree_document) }}"
                                                                    target="_blank"><i class="fa fa-file-pdf-o"
                                                                        style="color:red"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif

                                                @if ($MASTER)
                                                    <tr>
                                                        <td>
                                                            <span class="badge badge-dot me-4">
                                                                <i class="bg-info"></i>
                                                                <span class="text-dark text-xs">Master’s
                                                                    Degree</span>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $formData->master_degree_roll_no }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $formData->master_degree_year_of_passing }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $formData->master_degree_name_of_university }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $formData->master_degree_subject }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $formData->master_degree_marks }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $formData->master_degree_outof }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $formData->master_degree_percentage }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $formData->master_degree_division }}</span>
                                                        </td>
                                                        <td>
                                                            @if ($formData->master_degree_document)
                                                                <a href="{{ $formData->imageUrl($formData->master_degree_document) }}"
                                                                    target="_blank"><i class="fa fa-file-pdf-o"
                                                                        style="color:red"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif

                                                <tr>

                                                    <td>
                                                        <span class="badge badge-dot me-4 m-2">
                                                            <i class="bg-info"></i>
                                                            <span class="text-dark text-xs">Other
                                                                Qualifications</span>
                                                        </span><br>
                                                        <span>{{ $formData->other_exam }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->other_roll_no }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->other_year_of_passing }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->other_name_of_university }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->other_subject }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->other_marks }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->other_outof }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->other_percentage }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $formData->other_division }}</span>
                                                    </td>
                                                    <td>
                                                        @if ($formData->other_document)
                                                            <a href="{{ $formData->imageUrl($formData->other_document) }}"
                                                                target="_blank"><i class="fa fa-file-pdf-o"
                                                                    style="color:red"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            @if (!empty($workExperience))
                                <hr class="horizontal dark">
                                <legend class="col-form-label col-md-6 pt-0"> Work Experience: <span
                                        class="text-danger">*</span> </legend>
                                <div class="row">
                                    <div class="form-group">

                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered align-items-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="2" class="text-uppercase text-sm">
                                                                Name &amp; Address <br> of the Employer/Organization
                                                            </th>

                                                            <th colspan="2"
                                                                class="text-uppercase text-center text-sm ps-2">
                                                                period
                                                            </th>

                                                            <th rowspan="2" class="text-uppercase text-sm ps-2">
                                                                Name of the Post
                                                            </th>

                                                            <th rowspan="2" class="text-uppercase text-sm ps-2">
                                                                Nature of Duties performed
                                                            </th>

                                                            <th rowspan="2" class="text-uppercase text-sm ps-2">
                                                                Certificate
                                                            </th>

                                                        </tr>
                                                        <tr>
                                                            <th class="text-uppercase text-center text-sm ps-2">
                                                                from
                                                            </th>
                                                            <th class="text-uppercase text-center text-sm ps-2">
                                                                to
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($workExperience as $pkey => $pvalue)
                                                            <tr>

                                                                <td>
                                                                    <span>{{ $pvalue->work_exp_organisation }}</span>
                                                                </td>
                                                                <td>
                                                                    <span>
                                                                        @if ($pvalue->work_exp_period_from)
                                                                            {{ date('d/M/Y', strtotime($pvalue->work_exp_period_from)) }}
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span>
                                                                        @if ($pvalue->work_exp_period_to)
                                                                            {{ date('d/M/Y', strtotime($pvalue->work_exp_period_to)) }}
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span>{{ $pvalue->work_exp_name_of_the_post }}</span>
                                                                </td>
                                                                <td>
                                                                    <span>{{ $pvalue->work_exp_nature_of_duties }}</span>
                                                                </td>
                                                                <td>
                                                                    @if ($formData->exp_certificate)
                                                                        <a href="{{ $formData->imageUrl($formData->exp_certificate) }}"
                                                                            target="_blank"><i class="fa fa-file-pdf-o"
                                                                                style="color:red"></i></a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endif


                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Additional Details</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <fieldset class="d-flex">
                                            <legend class="col-form-label col-md-6 pt-0">Do you possess Computer
                                                Skills:</legend>
                                            <span>{{ $formData->computer_skills }}</span>
                                        </fieldset>
                                    </div>
                                    <div class="form-group" id="computerSkillsDiv"
                                        style="@if ($formData->computer_skills == 'No') display: none @endif">
                                        <div class="form-group">
                                            <label for="computer_skills_description" class="form-control-label">Mention
                                                Computer Skills In Brief</label>
                                            <span>{{ $formData->computer_skills_description }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <fieldset class="d-flex">
                                            <legend class="col-form-label col-md-6 pt-0">Previous Service/Experience
                                                Details in case of Govt. Servants:</legend>
                                            <span>{{ $formData->previous_experiences }}</span>
                                        </fieldset>
                                    </div>
                                    <div class="form-group" id="previousExperiencesDiv"
                                        style="@if ($formData->previous_experiences == 'No') display: none @endif">
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered align-items-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="2" class="text-uppercase text-sm">
                                                                Name &amp; Address of the <br> Employer/Organization
                                                            </th>

                                                            <th colspan="2"
                                                                class="text-uppercase text-center text-sm ps-2">
                                                                period
                                                            </th>

                                                            <th rowspan="2" class="text-uppercase text-sm ps-2">
                                                                Name of the Post
                                                            </th>

                                                            <th rowspan="2" class="text-uppercase text-sm ps-2">
                                                                Scale of Pay drawing <br> (as per 6 th / 7 th CPC) <br>
                                                                and Basic
                                                                Pay
                                                            </th>
                                                            <th rowspan="2" class="text-uppercase text-sm ps-2">
                                                                Nature of Duties <br> performed
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-uppercase text-center text-sm ps-2">
                                                                from
                                                            </th>
                                                            <th class="text-uppercase text-center text-sm ps-2">
                                                                to
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="preex_tbody">
                                                        @if ($prevexps)
                                                            @foreach ($prevexps as $key => $exp)
                                                                <tr>
                                                                    <td>
                                                                        <span>{{ $exp->organisation }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>
                                                                            @if ($exp->period_from)
                                                                                {{ date('d/M/Y', strtotime($exp->period_from)) }}
                                                                            @endif
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span>
                                                                            @if ($exp->period_to)
                                                                                {{ date('d/M/Y', strtotime($exp->period_to)) }}
                                                                            @endif
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{ $exp->name_of_post }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{ $exp->pay_scale }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{ $exp->nature_of_duties }}</span>
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <fieldset class="d-flex">
                                            <span class="col-form-label col-md-6 pt-0">Are you still working in any
                                                of the ICMR’s project:</span>
                                            <span>{{ $formData->working_in_icmr_project }}</span>
                                        </fieldset>
                                    </div>
                                    <div class="form-group" id="icmrsProjectDiv"
                                        style="@if ($formData->working_in_icmr_project == 'No') display: none @endif">
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered align-items-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-uppercase text-sm">
                                                                Name of the Institute
                                                            </th>

                                                            <th class="text-uppercase text-center text-sm ps-2">
                                                                Date of Joining in the Project
                                                            </th>

                                                            <th class="text-uppercase text-sm ps-2">
                                                                Name of the Project
                                                            </th>

                                                            <th class="text-uppercase text-sm ps-2">
                                                                Post held and Salary Drawn
                                                            </th>
                                                            <th class="text-uppercase text-sm ps-2">
                                                                Nature of Duties
                                                            </th>
                                                            <th class="text-uppercase text-sm ps-2">
                                                                Certificate
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (!empty($icmrExperience))
                                                            @foreach ($icmrExperience as $pkey => $pvalue)
                                                                <tr>
                                                                    <td>
                                                                        <span>{{ $pvalue->icmr_name_of_institute }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>
                                                                            @if ($pvalue->icmr_doj)
                                                                                {{ date('d/M/Y', strtotime($pvalue->icmr_doj)) }}
                                                                            @endif
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{ $pvalue->icmr_name_of_project }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{ $pvalue->icmr_post_name }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{ $pvalue->icmr_nature_of_duties }}</span>
                                                                    </td>
                                                                    <td>
                                                                        @if ($formData->icmr_project_certificate)
                                                                            <a href="{{ $formData->imageUrl($formData->icmr_project_certificate) }}"
                                                                                target="_blank"><i
                                                                                    class="fa fa-file-pdf-o"
                                                                                    style="color:red"></i></a>
                                                                        @endif
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <fieldset class="row">
                                            <legend class="col-form-label col-md-6 pt-0">Additional Information:
                                            </legend>
                                            <span>{{ $formData->additionalInformationCheck }}</span>
                                        </fieldset>
                                    </div>
                                    <div class="form-group" id="additionalInformationDiv"
                                        style="@if ($formData->additionalInformationCheck == 'No') display: none @endif">
                                        <div class="form-group">
                                            <label for="computer_skills_description" class="form-control-label">Explain
                                                Computer Skills In Brief</label>
                                            <span>{{ $formData->additional_information }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr class="horizontal dark">
                                    <div class="form-group">
                                        <fieldset class="d-flex">
                                            <legend class="col-form-label col-md-10 pt-0">Are you claiming a maximum of
                                                five (05) marks for Post Essential Qualification research/Lab/field
                                                experience in
                                                any Government recognized/approved/registered Institution or
                                                Organization, obtained after
                                                meeting the Essential Qualification as prescribed in the advertisement?
                                            </legend>
                                            <span>{{ $formData->is_five_per_weightage }}</span>
                                        </fieldset>
                                    </div>
                                    <div class="form-group" id="is_five_per_weightage_div"
                                        style="@if ($formData->is_five_per_weightage == 'No') display: none @endif">
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered align-items-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="2" class="text-uppercase text-sm">
                                                                Name &amp; Address of the <br> Employer/Organization
                                                            </th>

                                                            <th colspan="2"
                                                                class="text-uppercase text-center text-sm ps-2">
                                                                period
                                                            </th>

                                                            <th rowspan="2" class="text-uppercase text-sm ps-2">
                                                                Name of the Post
                                                            </th>
                                                            <th rowspan="2" class="text-uppercase text-sm ps-2">
                                                                Scale of Pay drawing <br> (as per 6 th / 7 th CPC) <br>
                                                                and Basic
                                                                Pay
                                                            </th>
                                                            <th rowspan="2" class="text-uppercase text-sm ps-2">
                                                                Nature of Duties <br> performed
                                                            </th>
                                                            <th rowspan="2" class="text-uppercase text-sm ps-2">
                                                                Cetificate
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-uppercase text-center text-sm ps-2">
                                                                from
                                                            </th>
                                                            <th class="text-uppercase text-center text-sm ps-2">
                                                                to
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @if ($fivePerWei)
                                                            @foreach ($fivePerWei as $key => $exp)
                                                                <tr>
                                                                    <td>
                                                                        <span>{{ $exp->five_per_weightage_organisation }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>


                                                                            @if ($exp->five_per_weightage_period_from)


                                                                                {{ date('d/M/Y', strtotime($exp->five_per_weightage_period_from)) }}
                                                                            @endif
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span>
                                                                            @if ($exp->five_per_weightage_period_to)
                                                                                {{ date('d/M/Y', strtotime($exp->five_per_weightage_period_to)) }}
                                                                            @endif
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{ $exp->five_per_weightage_name_of_post }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{ $exp->five_per_weightage_pay_scale }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{ $exp->five_per_weightage_nature_of_duties }}</span>
                                                                    </td>
                                                                    <td>
                                                                        @if ($formData->five_per_weightage_certificate)
                                                                            <a href="{{ $formData->imageUrl($formData->five_per_weightage_certificate) }}"
                                                                                target="_blank"><i
                                                                                    class="fa fa-file-pdf-o"
                                                                                    style="color:red"></i></a>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif

                                                        {{-- <tr>
                                                            <td>
                                                                <span>{{ $formData->five_per_weightage_organisation }}</span>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    @if ($formData->five_per_weightage_period_from)
                                                                        {{ date('d/M/Y', strtotime($formData->five_per_weightage_period_from)) }}
                                                                    @endif
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    @if ($formData->five_per_weightage_period_to)
                                                                        {{ date('d/M/Y', strtotime($formData->five_per_weightage_period_to)) }}
                                                                    @endif
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span>{{ $formData->five_per_weightage_name_of_post }}</span>
                                                            </td>
                                                            <td>
                                                                <span>{{ $formData->five_per_weightage_pay_scale }}</span>
                                                            </td>
                                                            <td>
                                                                <span>{{ $formData->five_per_weightage_nature_of_duties }}</span>
                                                            </td>
                                                            <td>
                                                                @if ($formData->five_per_weightage_certificate)
                                                                    <a href="{{ $formData->imageUrl($formData->five_per_weightage_certificate) }}"
                                                                        target="_blank"><i class="fa fa-file-pdf-o"
                                                                            style="color:red"></i></a>
                                                                @endif
                                                            </td>
                                                        </tr> --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <div class="form-check">
                                    <input required type="checkbox" class="form-check-input" name="iagree"
                                        id="iagree" />
                                </div>
                                <label for="iagree">
                                    I affirm that information given in this application is true and correct to the best of
                                    my
                                    knowledge and belief and no related information has been concealed. I also fully
                                    understand
                                    that if at any stage it is found that any attempt has been made by me to willfully
                                    conceal or
                                    misrepresent the facts, my candidature may summarily be rejected and employment be
                                    terminated. Further, I also understand that in case of any willful concealment or
                                    misrepresentation of the facts by me, ICMR-NIRTH may take any legal action against me
                                    and I may also be debarred from appearing in any of the examinations for regular as well
                                    as
                                    the regular/contractual posts at ICMR-NIRTH, Jabalpur.<br>
                                    I have also satisfied myself that I am eligible for the post applied in all respects and
                                    fulfill all
                                    the eligibility criteria as mentioned in the Vacancy Notification. I understand that in
                                    case, at
                                    any stage of recruitment or thereafter, it is found that I do not fulfill the required
                                    qualification
                                    or is otherwise not eligible, my candidature may be cancelled without assigning any
                                    reason
                                    or notice thereof to me irrespective of my marks obtained in the CBT/written test.
                                </label>
                            </div>
                            <div class="card-footer">
                                <div class="text-center">

                                    <a href="{{ route('studentDocsUpload', ['id' => $formData->id]) }}"
                                        class="btn btn-primary">Back</a>

                                    @if (
                                        $formData->category == 'SC' ||
                                            $formData->category == 'ST' ||
                                            $formData->gender == 'Female' ||
                                            $formData->pwd == 'Yes' ||
                                            $formData->exsm == 'Yes')
                                        <button onclick="finalSubmitWithoutPay('{{ $formData->id }}')"
                                            class="btn btn-primary">Submit</button>
                                    @else
                                        <a onclick="finalSubmitWithPay('{{ $formData->id }}');"
                                            class="btn btn-primary">Submit And Pay</a>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function finalSubmitWithoutPay(id) {

            let iagree = $('input[name="iagree"]').prop("checked");

            if (iagree) {


                if (confirm(
                        "Are you sure to submit the application form thereafter you will not be able to change the entries?"
                    )) {
                    // window.location.href = "{{ route('formsubmitandwithoutpay', ['id' => '+id+']) }}";
                    window.location.href = "{{ url('form-final-submit?id=') }}" + id;
                }

            } else {
                alert('Please confirm the declaration')
            }
        }

        function finalSubmitWithPay(id) {

            let iagree = $('input[name="iagree"]').prop("checked");

            if (iagree) {

                if (confirm(
                        "Are you sure to submit the application form there after you will not be able to change the entries?"
                    )) {

                    // window.location.href = "{{ route('formsubmitandpay', ['id' => '+id+']) }}";
                    window.location.href = "{{ url('form-submit-and-pay?id=') }}" + id;
                }
            } else {
                alert('Please confirm the declaration')
            }

        }
    </script>

@endsection
