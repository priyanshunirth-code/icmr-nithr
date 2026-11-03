@extends('layouts.app')

@section('content')
    <main class="main-content  mt-0">

        @include('student.studentProfile')

        <style>
            td>.form-group>select {
                width: 100px !important;
            }
        </style>

        @php

            // if ($condition) {
            // return redirect()->route('dashboard');
            // }

            $WEXDESC = 'Work Experience';
            $X = false;
            $XII = false;
            $XII_required = false;
            $DIPLOMA = false;
            $BACHELOR = false;
            $MASTER = false;
            $WORKEXP = false;
            $DIPORBACH = false;
            $APPLYFOR = '';

            if ($form_id == env('FORMID1') || $form_id == env('FORMID2')) {
                // Valid for 3
                $APPLYFOR = 'Technical Assistant';
                $X = true;
                $XII = true;
                $BACHELOR = true;
            }

            if ($form_id == env('FORMID3') || $form_id == env('FORMID4') || $form_id == env('FORMID5')) {
                // Diploma or Degree
                $APPLYFOR = 'Technical Assistant';
                $X = true;
                $XII = true;
                $DIPLOMA = false;
                $BACHELOR = false;
                $DIPORBACH = true;
            }

            if ($form_id == env('FORMID5') || $form_id == env('FORMID6')) {
                // Diploma and Experience OR Degree
                $APPLYFOR = 'Technical Assistant';
                $X = true;
                $XII = true;
                $DIPLOMA = false;
                $BACHELOR = false;
                $DIPORBACH = true;
            }
            if ($form_id == env('FORMID7') || $form_id == env('FORMID8')) {
                $APPLYFOR = 'Technician-I';

                // 10th 12th and Diploma
                $X = true;
                $XII = true;
                $XII_required = true;
                $DIPLOMA = true;
                $WORKEXP = false;
            }

            if ($form_id == env('FORMID9') || $form_id == env('FORMID10')) {
                // 10th and EXp
                $APPLYFOR = 'Lab Attendant-I';
                $X = true;
                $WORKEXP = true;
                $WEXDESC = 'One year working experience in a Govt. recognized/approved/registered Laboratory';
            }

        @endphp

        <div class="container-fluid">

            {{-- {{ $formData }} --}}

            <div class="nav-wrapper position-relative my-2">
                <ul class="nav nav-pills nav-fill p-1">
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1 active">
                            <i class="ni ni-laptop text-sm me-2"></i> Registration
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class=" mb-0 px-0 py-1">
                            <i class="ni ni-laptop text-sm me-2"></i> Upload Documents
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="mb-0 px-0 py-1">
                            <i class="ni ni-laptop text-sm me-2"></i> Preview And Payment
                        </div>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center p-0 mx-3 mt-3 position-relative z-index-1">
                            <h3>Apply for {{ $APPLYFOR }} </h3>
                        </div>
                        <form role="form" method="POST" action={{ url('student-form-update') }}
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $formData->id }}">
                            <input type="hidden" name="registration_no" value="{{ $formData->registration_no }}">
                            <div class="card-body">
                                <p class="text-uppercase text-sm h3">Personal Information</p>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="firstname" class="form-control-label">First Name: <span
                                                    class="text-danger">*</span></label>
                                            <input value="{{ $formData->firstname }}" required class="form-control"
                                                id="firstname" type="text" name="firstname">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="middlename" class="form-control-label">Middle Name:</label>
                                            <input value="{{ $formData->middlename }}" class="form-control" type="text"
                                                id="middlename" name="middlename">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lastname" class="form-control-label">Last Name:</label>
                                            <input value="{{ $formData->lastname }}" class="form-control"
                                                id="lastname" type="text" name="lastname">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fathername" class="form-control-label">Father's Name:<span
                                                    class="text-danger">*</span></label>
                                            <input value="{{ $formData->fathername }}" required class="form-control"
                                                type="text" id="fathername" name="fathername">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mothername" class="form-control-label">Mother's Name:<span
                                                    class="text-danger">*</span></label>
                                            <input value="{{ $formData->mothername }}" required class="form-control"
                                                type="text" id="mothername" name="mothername">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gender" class="form-control-label">Gender:<span
                                                    class="text-danger">*</span></label>
                                            <select name="gender" id="gender" class="form-select">
                                                <option value="">Select</option>
                                                <option @if ($formData->gender == 'Male') selected @endif value="Male">
                                                    Male</option>
                                                <option @if ($formData->gender == 'Female') selected @endif value="Female">
                                                    Female</option>
                                                <option @if ($formData->gender == 'Other') selected @endif value="Other">
                                                    Other</option>
                                            </select>

                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dob" class="form-control-label">Date of Birth:<span
                                                    class="text-danger">*</span></label>
                                            <input value="{{ $formData->dob }}" required onchange="getAge(this.value)"
                                                class="form-control" type="date" id="dob" name="dob"
                                                max="2005-07-31">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="present_age" class="form-control-label">Present Age:</label>
                                            <input value="{{ $formData->present_age }}" required class="form-control"
                                                type="text" id="present_age" name="present_age" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nationality" class="form-control-label">Nationality:</label>
                                            <input value="{{ $formData->nationality }}" required class="form-control"
                                                type="text" id="nationality" name="nationality">
                                        </div>
                                    </div>

                                    <div class="col-md-6 my-2">
                                        <div class="form-group">
                                            <fieldset class="row">
                                                <legend class="col-form-label col-md-3 pt-0">PwBD:</legend>
                                                <div class="col-md-9 d-flex gap-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pwd"
                                                            id="pwd1" value="Yes"
                                                            @if ($formData->pwd == 'Yes') checked @endif>
                                                        <label class="form-check-label" for="pwd1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pwd"
                                                            id="pwd2" value="No"
                                                            @if ($formData->pwd == 'No') checked @endif>
                                                        <label class="form-check-label" for="pwd2">
                                                            No
                                                        </label>
                                                    </div>
                                                    <input class="form-control w-50" type="text"
                                                        id="type_of_disablity" name="type_of_disablity"
                                                        placeholder="Type Of Disability"
                                                        @if ($formData->pwd == 'No') style="display: none" @else @required(true) value='{{ $formData->type_of_disablity }}' @endif>
                                                </div>

                                            </fieldset>
                                            <fieldset class="row">
                                                <legend class="col-form-label col-md-3 pt-0">Ex-Servicemen:</legend>
                                                <div class="col-md-9 d-flex gap-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="exsm"
                                                            id="exsm1" value="Yes"
                                                            @if ($formData->exsm == 'Yes') checked @endif>
                                                        <label class="form-check-label" for="exsm1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="exsm"
                                                            id="exsm2" value="No"
                                                            @if ($formData->exsm == 'No') checked @endif>
                                                        <label class="form-check-label" for="exsm2">
                                                            No
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>

                                        </div>

                                        <div class="form-group">


                                            <fieldset class="row">
                                                <legend class="col-form-label col-md-3 pt-0">Marital Status:</legend>
                                                <div class="col-md-9 d-flex gap-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="marital_status" id="married" value="Married"
                                                            @if ($formData->marital_status == 'Married') checked @endif>
                                                        <label class="form-check-label" for="married">
                                                            Married
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="marital_status" id="unmarried" value="Unmarried"
                                                            @if ($formData->marital_status == 'Unmarried') checked @endif>
                                                        <label class="form-check-label" for="unmarried">
                                                            Unmarried
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            @if ($formData->marital_status == 'Divorced') checked @endif
                                                            name="marital_status" id="divorced" value="Divorced">
                                                        <label class="form-check-label" for="divorced">
                                                            Divorced
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                            <fieldset class="row" id="divorced_type_div"
                                                @if ($formData->marital_status == 'Divorced') @else style="display: none;" @endif>
                                                <legend class="col-form-label col-md-4 pt-0">Legally Separated:</legend>
                                                <div class="col-md-8 d-flex gap-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="divorced_type" id="divorced_type1" value="Yes"
                                                            @if ($formData->divorced_type == 'Yes') checked @endif>
                                                        <label class="form-check-label" for="divorced_type1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            @if ($formData->divorced_type == 'No') checked @endif
                                                            name="divorced_type" id="divorced_type2" value="No">
                                                        <label class="form-check-label" for="divorced_type2">
                                                            No
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>

                                            <fieldset class="row">
                                                <legend class="col-form-label col-md-6 pt-0">Are you having Aadhar Card
                                                    No.?</legend>
                                                <div class="col-md-6 d-flex gap-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            @if ($formData->is_having_aadhar_card == 'Yes') checked @endif
                                                            name="is_having_aadhar_card" id="aadhar1" value="Yes">
                                                        <label class="form-check-label" for="aadhar1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="is_having_aadhar_card" id="aadhar2" value="No"
                                                            @if ($formData->is_having_aadhar_card == 'No') checked @endif>
                                                        <label class="form-check-label" for="aadhar2">
                                                            No
                                                        </label>
                                                    </div>


                                                </div>
                                            </fieldset>

                                            <div class="form-group" id="aadhar_card_div"
                                                @if ($formData->is_having_aadhar_card == 'No') style="display: none" @endif>

                                                <label for="aadharNo" class="form-control-label">Aadhar Card No.<span
                                                        class="text-danger">*</span></label>
                                                <input @if ($formData->is_having_aadhar_card == 'Yes') required @endif
                                                    value="{{ $formData->aadhar_no }}" class="form-control"
                                                    type="number" id="aadharNo" name="aadhar_no"
                                                    oninput="validateAadharNo(this)">

                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-6 my-2">
                                        <div class="form-group">
                                            <div class="d-flex gap-2 align-items-center">
                                                <label for="age_relax" class="form-control-label">Are you claiming age
                                                    relaxation?:</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="claiming_age_relaxation" id="age_relaxation1"
                                                        @if ($formData->claiming_age_relaxation == 'Yes') checked @endif value="Yes">
                                                    <label class="form-check-label" for="age_relaxation1">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="claiming_age_relaxation" id="age_relaxation2"
                                                        value="No" @if ($formData->claiming_age_relaxation == 'No') checked @endif>
                                                    <label class="form-check-label" for="age_relaxation2">
                                                        No
                                                    </label>
                                                </div>
                                            </div>

                                        </div>

                                        <div id="age_relaxation_div"
                                            @if ($formData->claiming_age_relaxation == 'No') style="display: none" @endif>

                                            <div class="form-group">

                                                @php
                                                    $cData = explode(',', $formData->claiming_age_relaxation_type);
                                                @endphp

                                                <div class="row">


                                                    <div class="col-4">

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="claiming_age_relaxation_type[]"
                                                                id="age_relaxation_type1" value="OBC"
                                                                @if (in_array('OBC', $cData)) checked @endif>
                                                            <label class="form-check-label" for="age_relaxation_type1">
                                                                OBC
                                                            </label>
                                                        </div>

                                                    </div>
                                                    <div class="col-4">

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="claiming_age_relaxation_type[]"
                                                                id="age_relaxation_type2"
                                                                value="SC"@if (in_array('SC', $cData)) checked @endif>
                                                            <label class="form-check-label" for="age_relaxation_type2">
                                                                SC
                                                            </label>
                                                        </div>

                                                    </div>
                                                    <div class="col-4">

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="claiming_age_relaxation_type[]"
                                                                id="age_relaxation_type3"
                                                                value="ST"@if (in_array('ST', $cData)) checked @endif>
                                                            <label class="form-check-label" for="age_relaxation_type3">
                                                                ST
                                                            </label>
                                                        </div>


                                                    </div>
                                                    <div class="col-4">

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="claiming_age_relaxation_type[]"
                                                                id="age_relaxation_type4"
                                                                value="EWS"@if (in_array('EWS', $cData)) checked @endif>
                                                            <label class="form-check-label" for="age_relaxation_type4">
                                                                EWS
                                                            </label>
                                                        </div>

                                                    </div>
                                                    <div class="col-4">


                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="claiming_age_relaxation_type[]"
                                                                id="age_relaxation_type5"
                                                                value="PwBD"@if (in_array('PwBD', $cData)) checked @endif>
                                                            <label class="form-check-label" for="age_relaxation_type5">
                                                                PwBD
                                                            </label>
                                                        </div>

                                                    </div>

                                                    <div class="col-4">

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="claiming_age_relaxation_type[]"
                                                                id="age_relaxation_type6"
                                                                value="Ex-servicemen"@if (in_array('Ex-servicemen', $cData)) checked @endif>
                                                            <label class="form-check-label" for="age_relaxation_type6">
                                                                Ex-servicemen
                                                            </label>
                                                        </div>

                                                    </div>

                                                    <div class="col-4">

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="claiming_age_relaxation_type[]"
                                                                id="age_relaxation_type7"
                                                                value="Govt Employee"@if (in_array('Govt Employee', $cData)) checked @endif>
                                                            <label class="form-check-label" for="age_relaxation_type7">
                                                                Govt Employee
                                                            </label>
                                                        </div>

                                                    </div>

                                                    <div class="col-8">


                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="claiming_age_relaxation_type[]"
                                                                id="age_relaxation_type8"
                                                                value="Presently working in ICMR funded project"@if (in_array('Presently working in ICMR funded project', $cData)) checked @endif>
                                                            <label class="form-check-label" for="age_relaxation_type8">
                                                                Presently working in ICMR funded project
                                                            </label>
                                                        </div>

                                                    </div>


                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="row" id="id_card_div"
                                        @if ($formData->is_having_aadhar_card == 'Yes') style='display:none' @endif>

                                        <div class="col-md-6 my-2">
                                            <div class="form-group">

                                                <label for="id_card_type" class="form-control-label">Id Card Type:<span
                                                        class="text-danger">*</span></label>
                                                <select @if ($formData->is_having_aadhar_card == 'No') required @endif
                                                    name="id_card_type" id="id_card_type" class="form-select">
                                                    <option value="">Select</option>
                                                    <option @if ($formData->id_card_type == 'Votar Id') selected @endif
                                                        value="Votar Id">Votar Id</option>
                                                    <option @if ($formData->id_card_type == 'Pan Card') selected @endif
                                                        value="Pan Card">Pan Card</option>
                                                    <option @if ($formData->id_card_type == 'Driving License') selected @endif
                                                        value="Driving License">Driving License</option>
                                                    <option @if ($formData->id_card_type == 'ID Card Issued By Govt. Dept.') selected @endif
                                                        value="ID Card Issued By Govt. Dept.">ID Card Issued By Govt.
                                                        Dept.
                                                    </option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-6 my-2">

                                            <div class="form-group">

                                                <label for="id_card_no" class="form-control-label">Id Card No.<span
                                                        class="text-danger">*</span></label>
                                                <input @if ($formData->is_having_aadhar_card == 'No') required @endif
                                                    value="{{ $formData->id_card_no }}" class="form-control"
                                                    type="text" id="id_card_no" name="id_card_no">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="category" class="form-control-label">Category of the
                                                        candidate:<span class="text-danger">*</span></label>
                                                    <select required name="category" id="category" class="form-select">
                                                        <option value="">Select</option>
                                                        <option @if ($formData->category == 'UR') selected @endif
                                                            value="UR">
                                                            UR</option>
                                                        <option @if ($formData->category == 'ST') selected @endif
                                                            value="ST">
                                                            ST</option>
                                                        <option @if ($formData->category == 'SC') selected @endif
                                                            value="SC">
                                                            SC</option>
                                                        <option @if ($formData->category == 'OBC') selected @endif
                                                            value="OBC">
                                                            OBC (NC)</option>
                                                        <option @if ($formData->category == 'EWS') selected @endif
                                                            value="EWS">
                                                            EWS</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="apply_for_category" class="form-control-label">Applying
                                                        for the Category:<span class="text-danger">*</span></label>
                                                    <select required name="apply_for_category" id="apply_for_category"
                                                        class="form-select">
                                                        <option value="">Select</option>
                                                        <option @if ($formData->apply_for_category == 'UR') selected @endif
                                                            value="UR">
                                                            UR</option>
                                                        <option @if ($formData->apply_for_category == 'ST') selected @endif
                                                            value="ST">
                                                            ST</option>
                                                        <option @if ($formData->apply_for_category == 'SC') selected @endif
                                                            value="SC">
                                                            SC</option>
                                                        <option @if ($formData->apply_for_category == 'OBC') selected @endif
                                                            value="OBC">
                                                            OBC (NC)</option>
                                                        <option @if ($formData->apply_for_category == 'EWS') selected @endif
                                                            value="EWS">
                                                            EWS</option>
                                                    </select>

                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label for="mobile_no" class="form-control-label">Mobile No:
                                                <span class="text-danger">*</span></label>
                                            <input required value="{{ auth()->user()->mobile_no }}" class="form-control"
                                                type="number" id="mobile_no" name="mobile_no" readonly>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label for="alternate_mobile_no" class="form-control-label">Alternate Mobile
                                                No.</label>
                                            <input value="{{ $formData->alternate_mobile_no }}" class="form-control"
                                                type="number" id="alternate_mobile_no" name="alternate_mobile_no"
                                                oninput="validateAlternateMobileNo(this)">

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="form-control-label">Email Address:<span
                                                    class="text-danger">*</span></label>
                                            <input required class="form-control" value="{{ auth()->user()->email }}"
                                                type="email" id="email" name="email" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <p class="text-uppercase text-sm"> Address for communication :</p>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="postal_address" class="form-control-label">Address:<span
                                                        class="text-danger">*</span></label>
                                                <textarea required class="form-control" name="postal_address" id="postal_address" cols="30" rows="3">{{ $formData->postal_address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="postal_state" class="form-control-label">State:<span
                                                        class="text-danger">*</span></label>
                                                <select required name="postal_state" id="postal_state"
                                                    onchange="getCityData(this.value,'postal_city')" class="form-select">
                                                    <option value="">Select</option>
                                                    @foreach ($states as $key => $state)
                                                        <option @if ($formData->postal_state == $state->id) selected @endif
                                                            value="{{ $state->id }}">{{ $state->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="postal_city" class="form-control-label">City:<span
                                                        class="text-danger">*</span></label>
                                                <select required name="postal_city" id="postal_city" class="form-select">
                                                    <option value="">Select</option>
                                                    @foreach ($postal_cities as $key => $city)
                                                        <option @if ($formData->postal_city == $city->id) selected @endif
                                                            value="{{ $city->id }}">{{ $city->city }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="postal_code" class="form-control-label">Postal
                                                    code:<span class="text-danger">*</span></label>
                                                <input value="{{ $formData->postal_code }}" required class="form-control"
                                                    type="text" id="postal_code" name="postal_code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p class="text-uppercase text-sm">Permanent Address</p>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="permanent_address" class="form-control-label">Address:<span
                                                        class="text-danger">*</span></label>
                                                <textarea required class="form-control" name="permanent_address" id="permanent_address" cols="30"
                                                    rows="3">{{ $formData->permanent_address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="permanent_state" class="form-control-label">State:<span
                                                        class="text-danger">*</span></label>
                                                <select required requiredt name="permanent_state" id="permanent_state"
                                                    onchange="getCityData(this.value,'permanent_city')"
                                                    class="form-select">
                                                    <option value="">Select</option>
                                                    @foreach ($states as $key => $state)
                                                        <option @if ($formData->permanent_state == $state->id) selected @endif
                                                            value="{{ $state->id }}">{{ $state->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="permanent_city" class="form-control-label">City:<span
                                                        class="text-danger">*</span></label>
                                                <select required name="permanent_city" id="permanent_city"
                                                    class="form-select">
                                                    <option value="">Select</option>
                                                    @foreach ($permanent_cities as $key => $city)
                                                        <option @if ($formData->permanent_city == $city->id) selected @endif
                                                            value="{{ $city->id }}">{{ $city->city }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="permanent_postal_code" class="form-control-label">Postal
                                                    code:<span class="text-danger">*</span></label>
                                                <input value="{{ $formData->permanent_postal_code }}" required
                                                    class="form-control" type="text" id="permanent_postal_code"
                                                    name="permanent_postal_code">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm h3">Educational/Technical/Professional Qualifications:</p>

                                <div class="row">

                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-uppercase text-sm">
                                                            Examination Passed</th>
                                                        <th class="text-uppercase text-sm ps-2">
                                                            Roll
                                                            No.
                                                        </th>
                                                        <th class="text-uppercase text-sm ps-2">
                                                            Date of
                                                            Passing <br> examination
                                                        </th>
                                                        <th class="text-uppercase text-sm ps-2">
                                                            Name of the <br>
                                                            Board/University
                                                        </th>
                                                        <th class="text-uppercase text-sm ps-2">
                                                            Subjects <br> studied
                                                        </th>
                                                        <th class="text-uppercase text-sm ps-2">
                                                            Marks <br> obtained
                                                        </th>
                                                        <th class="text-uppercase text-sm ps-2">
                                                            Maximum <br> marks
                                                        </th>
                                                        <th class="text-uppercase text-sm ps-2">
                                                            Percentage
                                                        </th>
                                                        <th class="text-uppercase text-sm ps-2">
                                                            Class/Division
                                                        </th>
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
                                                            </td>

                                                            <td>
                                                                <input @if ($X) required @endif
                                                                    value="{{ $formData->tenth_roll_no }}"
                                                                    class="form-control" type="text"
                                                                    id="tenth_roll_no" name="tenth_roll_no">
                                                            </td>
                                                            <td>
                                                                <input @if ($X) required @endif
                                                                    value="{{ $formData->tenth_year_of_passing }}"
                                                                    class="form-control" type="date"
                                                                    id="tenth_year_of_passing"
                                                                    name="tenth_year_of_passing">
                                                            </td>
                                                            <td>
                                                                <input @if ($X) required @endif
                                                                    value="{{ $formData->tenth_name_of_university }}"
                                                                    class="form-control" type="text"
                                                                    id="tenth_name_of_university"
                                                                    name="tenth_name_of_university">
                                                            </td>
                                                            <td>
                                                                <input @if ($X) required @endif
                                                                    value="{{ $formData->tenth_subject }}"
                                                                    class="form-control" type="text"
                                                                    id="tenth_subject" name="tenth_subject">
                                                            </td>
                                                            <td>
                                                                <input @if ($X) required @endif
                                                                    value="{{ $formData->tenth_marks }}"
                                                                    onblur="calculatePercentage('tenth')"
                                                                    class="form-control" type="number" id="tenth_marks"
                                                                    name="tenth_marks" step=".01">
                                                            </td>
                                                            <td>
                                                                <input @if ($X) required @endif
                                                                    value="{{ $formData->tenth_outof }}"
                                                                    onblur="calculatePercentage('tenth')"
                                                                    class="form-control" type="number" id="tenth_outof"
                                                                    name="tenth_outof">
                                                            </td>

                                                            <td>
                                                                <input @if ($X) required @endif
                                                                    value="{{ $formData->tenth_percentage }}"
                                                                    class="form-control" type="text"
                                                                    id="tenth_percentage" name="tenth_percentage"
                                                                    readonly>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">

                                                                    <select
                                                                        @if ($X) required @endif
                                                                        name="tenth_division" id="tenth_division"
                                                                        class="form-select">
                                                                        <option value="">Select</option>
                                                                        <option value="First"
                                                                            @if ($formData->tenth_division == 'First') selected @endif>
                                                                            First</option>
                                                                        <option value="Second"
                                                                            @if ($formData->tenth_division == 'Second') selected @endif>
                                                                            Second</option>
                                                                        <option value="Third"
                                                                            @if ($formData->tenth_division == 'Third') selected @endif>
                                                                            Third</option>
                                                                    </select>

                                                                </div>
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
                                                                        @if($XII_required)
                                                                        <span class="text-danger">*</span>
                                                                        @endif
                                                                    </span>
                                                                </span>
                                                            </td>

                                                            <td>
                                                                <input @if ($XII_required) required @endif
                                                                    value="{{ $formData->twelveth_roll_no }}"
                                                                    class="form-control" type="text"
                                                                    id="twelveth_roll_no" name="twelveth_roll_no">
                                                            </td>
                                                            <td>
                                                                <input @if ($XII_required) required @endif
                                                                    value="{{ $formData->twelveth_year_of_passing }}"
                                                                    class="form-control" type="date"
                                                                    id="twelveth_year_of_passing"
                                                                    name="twelveth_year_of_passing">
                                                            </td>
                                                            <td>
                                                                <input @if ($XII_required) required @endif
                                                                    value="{{ $formData->twelveth_name_of_university }}"
                                                                    class="form-control" type="text"
                                                                    id="twelveth_name_of_university"
                                                                    name="twelveth_name_of_university">
                                                            </td>
                                                            <td>
                                                                <input @if ($XII_required) required @endif
                                                                    value="{{ $formData->twelveth_subject }}"
                                                                    class="form-control" type="text"
                                                                    id="twelveth_subject" name="twelveth_subject">
                                                            </td>
                                                            <td>
                                                                <input @if ($XII_required) required @endif
                                                                    value="{{ $formData->twelveth_marks }}"
                                                                    onblur="calculatePercentage('twelveth')"
                                                                    class="form-control" type="number"
                                                                    id="twelveth_marks" name="twelveth_marks" step=".01">
                                                            </td>
                                                            <td>
                                                                <input @if ($XII_required) required @endif
                                                                    value="{{ $formData->twelveth_outof }}"
                                                                    onblur="calculatePercentage('twelveth')"
                                                                    class="form-control" type="number"
                                                                    id="twelveth_outof" name="twelveth_outof">
                                                            </td>

                                                            <td>
                                                                <input @if ($XII_required) required @endif
                                                                    value="{{ $formData->twelveth_percentage }}"
                                                                    class="form-control" type="text"
                                                                    id="twelveth_percentage" name="twelveth_percentage"
                                                                    readonly>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <select name="twelveth_division"
                                                                        @if ($XII_required) required @endif
                                                                        id="twelveth_division" class="form-select">
                                                                        <option value="">Select</option>
                                                                        <option value="First"
                                                                            @if ($formData->twelveth_division == 'First') selected @endif>
                                                                            First</option>
                                                                        <option value="Second"
                                                                            @if ($formData->twelveth_division == 'Second') selected @endif>
                                                                            Second</option>
                                                                        <option value="Third"
                                                                            @if ($formData->twelveth_division == 'Third') selected @endif>
                                                                            Third</option>
                                                                    </select>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif


                                                    @if ($DIPLOMA)
                                                        <tr>

                                                            <td>
                                                                <span class="badge badge-dot me-4">
                                                                    <i class="bg-info"></i>
                                                                    <span class="text-dark text-xs">Diploma</span>
                                                                </span>
                                                            </td>

                                                            <td>
                                                                <input required class="form-control" type="text"
                                                                    value="{{ $formData->diploma_roll_no }}"
                                                                    id="diploma_roll_no" name="diploma_roll_no">
                                                            </td>
                                                            <td>
                                                                <input required class="form-control" type="date"
                                                                    value="{{ $formData->diploma_year_of_passing }}"
                                                                    id="diploma_year_of_passing"
                                                                    name="diploma_year_of_passing">
                                                            </td>
                                                            <td>
                                                                <input required class="form-control" type="text"
                                                                    value="{{ $formData->diploma_name_of_university }}"
                                                                    id="diploma_name_of_university"
                                                                    name="diploma_name_of_university">
                                                            </td>
                                                            <td>
                                                                <input required class="form-control" type="text"
                                                                    value="{{ $formData->diploma_subject }}"
                                                                    id="diploma_subject" name="diploma_subject">
                                                            </td>
                                                            <td>
                                                                <input required onblur="calculatePercentage('diploma')"
                                                                    value="{{ $formData->diploma_marks }}"
                                                                    class="form-control" type="number"
                                                                    id="diploma_marks" name="diploma_marks" step=".01">
                                                            </td>
                                                            <td>
                                                                <input required onblur="calculatePercentage('diploma')"
                                                                    value="{{ $formData->diploma_outof }}"
                                                                    class="form-control" type="number"
                                                                    id="diploma_outof" name="diploma_outof">
                                                            </td>

                                                            <td>
                                                                <input required class="form-control" type="text"
                                                                    value="{{ $formData->diploma_percentage }}"
                                                                    id="diploma_percentage" name="diploma_percentage"
                                                                    readonly>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">

                                                                    <select required name="diploma_division"
                                                                        id="diploma_division" class="form-select">
                                                                        <option value="">Select</option>
                                                                        <option value="First"
                                                                            @if ($formData->diploma_division == 'First') selected @endif>
                                                                            First</option>
                                                                        <option value="Second"
                                                                            @if ($formData->diploma_division == 'Second') selected @endif>
                                                                            Second</option>
                                                                        <option value="Third"
                                                                            @if ($formData->diploma_division == 'Third') selected @endif>
                                                                            Third</option>
                                                                    </select>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif



                                                    @if ($BACHELOR || $DIPORBACH)

                                                        <tr>

                                                            <td>
                                                                <span class="text-dark text-xs">
                                                                    @if ($DIPORBACH)
                                                                        <div class="form-group">
                                                                            Bachelor’s
                                                                            Degree / Diploma<span
                                                                                class="text-danger">*</span>
                                                                            <select id="dipSelect" class="form-select">
                                                                                <option value="Bachelor">Bachelor’s Degree
                                                                                </option>
                                                                                <option value="Diploma">Diploma</option>
                                                                            </select>

                                                                        </div>
                                                                    @else
                                                                        Bachelor’s
                                                                        Degree
                                                                        @if ($BACHELOR)
                                                                            <span class="text-danger">*</span>
                                                                </span>
                                                    @endif
                                                    @endif
                                                    </span>
                                                    </span>
                                                    </td>

                                                    <td>
                                                        <input required class="form-control" type="text"
                                                            value="{{ $formData->bachelor_degree_roll_no }}"
                                                            id="bachelor_degree_roll_no" name="bachelor_degree_roll_no">
                                                    </td>
                                                    <td>
                                                        <input required class="form-control" type="date"
                                                            value="{{ $formData->bachelor_degree_year_of_passing }}"
                                                            id="bachelor_degree_year_of_passing"
                                                            name="bachelor_degree_year_of_passing">
                                                    </td>
                                                    <td>
                                                        <input required class="form-control" type="text"
                                                            value="{{ $formData->bachelor_degree_name_of_university }}"
                                                            id="bachelor_degree_name_of_university"
                                                            name="bachelor_degree_name_of_university">
                                                    </td>
                                                    <td>
                                                        <input required class="form-control" type="text"
                                                            value="{{ $formData->bachelor_degree_subject }}"
                                                            id="bachelor_degree_subject" name="bachelor_degree_subject">
                                                    </td>
                                                    <td>
                                                        <input required onblur="calculatePercentage('bachelor_degree')"
                                                            value="{{ $formData->bachelor_degree_marks }}"
                                                            class="form-control" type="number"
                                                            id="bachelor_degree_marks" name="bachelor_degree_marks" step=".01">
                                                    </td>
                                                    <td>
                                                        <input required onblur="calculatePercentage('bachelor_degree')"
                                                            value="{{ $formData->bachelor_degree_outof }}"
                                                            class="form-control" type="number"
                                                            id="bachelor_degree_outof" name="bachelor_degree_outof">
                                                    </td>

                                                    <td>
                                                        <input required class="form-control" type="text"
                                                            value="{{ $formData->bachelor_degree_percentage }}"
                                                            id="bachelor_degree_percentage"
                                                            name="bachelor_degree_percentage" readonly>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            <select required name="bachelor_degree_division"
                                                                id="bachelor_degree_division" class="form-select">
                                                                <option value="">Select</option>
                                                                <option value="First"
                                                                    @if ($formData->bachelor_degree_division == 'First') selected @endif>
                                                                    First</option>
                                                                <option value="Second"
                                                                    @if ($formData->bachelor_degree_division == 'Second') selected @endif>
                                                                    Second</option>
                                                                <option value="Third"
                                                                    @if ($formData->bachelor_degree_division == 'Third') selected @endif>
                                                                    Third</option>
                                                            </select>

                                                        </div>
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
                                                                <input required class="form-control" type="text"
                                                                    value="{{ $formData->master_degree_roll_no }}"
                                                                    id="master_degree_roll_no"
                                                                    name="master_degree_roll_no">
                                                            </td>
                                                            <td>
                                                                <input required class="form-control" type="date"
                                                                    value="{{ $formData->master_degree_year_of_passing }}"
                                                                    id="master_degree_year_of_passing"
                                                                    name="master_degree_year_of_passing">
                                                            </td>
                                                            <td>
                                                                <input required class="form-control" type="text"
                                                                    value="{{ $formData->master_degree_name_of_university }}"
                                                                    id="master_degree_name_of_university"
                                                                    name="master_degree_name_of_university">
                                                            </td>
                                                            <td>
                                                                <input required class="form-control" type="text"
                                                                    value="{{ $formData->master_degree_subject }}"
                                                                    id="master_degree_subject"
                                                                    name="master_degree_subject">
                                                            </td>
                                                            <td>
                                                                <input required
                                                                    onblur="calculatePercentage('master_degree')"
                                                                    value="{{ $formData->master_degree_marks }}"
                                                                    class="form-control" type="number"
                                                                    id="master_degree_marks" name="master_degree_marks" step=".01">
                                                            </td>
                                                            <td>
                                                                <input required
                                                                    onblur="calculatePercentage('master_degree')"
                                                                    value="{{ $formData->master_degree_outof }}"
                                                                    class="form-control" type="number"
                                                                    id="master_degree_outof" name="master_degree_outof">
                                                            </td>

                                                            <td>
                                                                <input required class="form-control" type="text"
                                                                    value="{{ $formData->master_degree_percentage }}"
                                                                    id="master_degree_percentage"
                                                                    name="master_degree_percentage" readonly>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">

                                                                    <select name="master_degree_division"
                                                                        id="master_degree_division" class="form-select">
                                                                        <option value="">Select</option>
                                                                        <option value="First"
                                                                            @if ($formData->master_degree_division == 'First') selected @endif>
                                                                            First</option>
                                                                        <option value="Second"
                                                                            @if ($formData->master_degree_division == 'Second') selected @endif>
                                                                            Second</option>
                                                                        <option value="Third"
                                                                            @if ($formData->master_degree_division == 'Third') selected @endif>
                                                                            Third</option>
                                                                    </select>

                                                                </div>
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
                                                            <input class="form-control" type="text" id="other_exam"
                                                                value="{{ $formData->other_exam }}" name="other_exam">
                                                        </td>

                                                        <td>
                                                            <input class="form-control" type="text" id="other_roll_no"
                                                                value="{{ $formData->other_roll_no }}"
                                                                name="other_roll_no">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="date"
                                                                id="other_year_of_passing" name="other_year_of_passing"
                                                                value="{{ $formData->other_year_of_passing }}">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                id="other_name_of_university"
                                                                name="other_name_of_university"
                                                                value="{{ $formData->other_name_of_university }}">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text" id="other_subject"
                                                                value="{{ $formData->other_subject }}"
                                                                name="other_subject">
                                                        </td>
                                                        <td>
                                                            <input onblur="calculatePercentage('other')"
                                                                class="form-control" type="number" id="other_marks"
                                                                value="{{ $formData->other_marks }}" name="other_marks" step=".01">
                                                        </td>
                                                        <td>
                                                            <input onblur="calculatePercentage('other')"
                                                                value="{{ $formData->other_outof }}" class="form-control"
                                                                type="number" id="other_outof" name="other_outof">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                value="{{ $formData->other_percentage }}"
                                                                id="other_percentage" name="other_percentage" readonly>
                                                        </td>


                                                        <td>
                                                            <div class="form-group">

                                                                <select name="other_division" id="other_division"
                                                                    class="form-select">
                                                                    <option value="">Select</option>
                                                                    <option value="First"
                                                                        @if ($formData->other_division == 'First') selected @endif>
                                                                        First</option>
                                                                    <option value="Second"
                                                                        @if ($formData->other_division == 'Second') selected @endif>
                                                                        Second</option>
                                                                    <option value="Third"
                                                                        @if ($formData->other_division == 'Third') selected @endif>
                                                                        Third</option>
                                                                </select>

                                                            </div>
                                                        </td>


                                                    </tr>

                                                </tbody>
                                            </table>

                                        </div>

                                    </div>

                                </div>
                                {{-- <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Upload Profile/Signature</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="profile_pic" class="form-control-label">Profile</label>
                                            <input class="form-control" type="file" id="profile_pic"
                                                name="profile_pic">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="signature" class="form-control-label">Signature</label>
                                                <input class="form-control" type="file" id="signature"
                                                    name="signature">
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <hr class="horizontal dark">
                                <legend class="col-form-label col-md-6 pt-0"> {{ $WEXDESC }}:
                                    <span id="dipWork" style="display: none" class="text-danger">*</span>

                                    @if ($WORKEXP)
                                        <span class="text-danger">*</span>
                                    @endif
                                </legend>
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
                                                            <th rowspan="2">Add more</th>

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
                                                    <tbody id="work_exp_tbody">
                                                        @if ($workExperience_count)
                                                            @foreach ($workExperience as $pkey => $pvalue)
                                                                <tr>
                                                                    <td>
                                                                        <input
                                                                            @if ($WORKEXP) required @endif
                                                                            class="form-control work_exp_organisation"
                                                                            type="text" name="work_exp_organisation[]"
                                                                            value="{{ $pvalue->work_exp_organisation }}">
                                                                    </td>
                                                                    <td>
                                                                        <input
                                                                            @if ($WORKEXP) required @endif
                                                                            class="form-control work_exp_period_from"
                                                                            type="date" name="work_exp_period_from[]"
                                                                            value="{{ $pvalue->work_exp_period_from }}">
                                                                    </td>
                                                                    <td>
                                                                        <input
                                                                            @if ($WORKEXP) required @endif
                                                                            class="form-control work_exp_period_to"
                                                                            type="date" name="work_exp_period_to[]"
                                                                            value="{{ $pvalue->work_exp_period_to }}">
                                                                    </td>
                                                                    <td>
                                                                        <input
                                                                            @if ($WORKEXP) required @endif
                                                                            class="form-control work_exp_name_of_the_post"
                                                                            type="text"
                                                                            name="work_exp_name_of_the_post[]"
                                                                            value="{{ $pvalue->work_exp_name_of_the_post }}">
                                                                    </td>

                                                                    <td>
                                                                        <input
                                                                            @if ($WORKEXP) required @endif
                                                                            class="form-control work_exp_nature_of_duties"
                                                                            type="text"
                                                                            name="work_exp_nature_of_duties[]"
                                                                            value="{{ $pvalue->work_exp_nature_of_duties }}">
                                                                    </td>

                                                                    <td>
                                                                        @if ($pkey == 0)
                                                                            <button onclick="addMoreWorkExp()"
                                                                                type="button"
                                                                                class="btn btn-sm btn-primary mt-2">+</button>
                                                                        @else
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-danger mt-2"
                                                                                onclick="removeSingleRow(this);">x</button>
                                                                        @endif
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>

                                                                <td>
                                                                    <input
                                                                        @if ($WORKEXP) required @endif
                                                                        class="form-control work_exp_name_and_address"
                                                                        type="text" name="work_exp_organisation[]">
                                                                </td>

                                                                <td>
                                                                    <input
                                                                        @if ($WORKEXP) required @endif
                                                                        class="form-control work_exp_period_from"
                                                                        type="date" name="work_exp_period_from[]">
                                                                </td>
                                                                <td>
                                                                    <input
                                                                        @if ($WORKEXP) required @endif
                                                                        class="form-control work_exp_period_to"
                                                                        type="date" name="work_exp_period_to[]">
                                                                </td>
                                                                <td>
                                                                    <input
                                                                        @if ($WORKEXP) required @endif
                                                                        class="form-control work_exp_name_of_the_post"
                                                                        type="text" name="work_exp_name_of_the_post[]">
                                                                </td>

                                                                <td>
                                                                    <input
                                                                        @if ($WORKEXP) required @endif
                                                                        class="form-control work_exp_nature_of_duties"
                                                                        type="text" name="work_exp_nature_of_duties[]">
                                                                </td>

                                                                <td>
                                                                    <button onclick="addMoreWorkExp()" type="button"
                                                                        class="btn btn-sm btn-primary mt-2">+</button>
                                                                </td>

                                                            </tr>
                                                        @endif

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Additional Details</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <fieldset class="row">
                                                <legend class="col-form-label col-md-6 pt-0">Do you possess Computer
                                                    Skills:</legend>
                                                <div class="col-md-6 d-flex gap-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="computer_skills" id="computer_skills1"
                                                            @if ($formData->computer_skills == 'Yes') checked @endif
                                                            value="Yes">
                                                        <label class="form-check-label" for="computer_skills1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="computer_skills" id="computer_skills2" value="No"
                                                            @if ($formData->computer_skills == 'No') checked @endif>

                                                        <label class="form-check-label" for="computer_skills2">
                                                            No
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group" id="computerSkillsDiv"
                                            @if ($formData->computer_skills == 'No') style="display: none" @endif>
                                            <div class="form-group">
                                                <label for="computer_skills_description"
                                                    class="form-control-label">Mention Computer Skills In Brief</label>
                                                <textarea class="form-control" name="computer_skills_description" id="computer_skills_description" cols="30"
                                                    rows="3"> {{ $formData->computer_skills_description }} </textarea>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <fieldset class="row">
                                                <legend class="col-form-label col-md-6 pt-0">Previous Service/Experience
                                                    Details in case of Govt. Servants:</legend>
                                                <div class="col-md-6 d-flex gap-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="previous_experiences" id="previous_experiences1"
                                                            value="Yes"
                                                            @if ($formData->previous_experiences == 'Yes') checked @endif>
                                                        <label class="form-check-label" for="previous_experiences1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="previous_experiences" id="previous_experiences2"
                                                            value="No"
                                                            @if ($formData->previous_experiences == 'No') checked @endif>
                                                        <label class="form-check-label" for="previous_experiences2">
                                                            No
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group" id="previousExperiencesDiv"
                                            @if ($formData->previous_experiences == 'No') style="display: none" @endif>

                                            <div class="">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table table-hover table-bordered align-items-center mb-0">
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

                                                                <th rowspan="2">Add more</th>
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

                                                            @if ($prevexps_count)
                                                                @foreach ($prevexps as $pkey => $pvalue)
                                                                    <tr>
                                                                        <td>
                                                                            <input class="form-control organisation"
                                                                                type="text" name="organisation[]"
                                                                                value="{{ $pvalue->organisation }}">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control period_from"
                                                                                type="date" name="period_from[]"
                                                                                value="{{ $pvalue->period_from }}">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control period_to"
                                                                                type="date" name="period_to[]"
                                                                                value="{{ $pvalue->period_to }}">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control name_of_post"
                                                                                type="text" name="name_of_post[]"
                                                                                value="{{ $pvalue->name_of_post }}">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control pay_scale"
                                                                                type="text" name="pay_scale[]"
                                                                                value="{{ $pvalue->pay_scale }}">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control nature_of_duties"
                                                                                type="text" name="nature_of_duties[]"
                                                                                value="{{ $pvalue->nature_of_duties }}">
                                                                        </td>

                                                                        <td>
                                                                            @if ($pkey == 0)
                                                                                <button onclick="addMorePreEx()"
                                                                                    type="button"
                                                                                    class="btn btn-sm btn-primary mt-2">+</button>
                                                                            @else
                                                                                <button type="button"
                                                                                    class="btn btn-sm btn-danger mt-2"
                                                                                    onclick="removeSingleRow(this);">x</button>
                                                                            @endif
                                                                        </td>

                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>

                                                                    <td>
                                                                        <input class="form-control organisation"
                                                                            type="text" name="organisation[]">
                                                                    </td>

                                                                    <td>
                                                                        <input class="form-control period_from"
                                                                            type="date" name="period_from[]">
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control period_to"
                                                                            type="date" name="period_to[]">
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control name_of_post"
                                                                            type="text" name="name_of_post[]">
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control pay_scale"
                                                                            type="text" name="pay_scale[]">
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control nature_of_duties"
                                                                            type="text" name="nature_of_duties[]">
                                                                    </td>

                                                                    <td>
                                                                        <button onclick="addMorePreEx()" type="button"
                                                                            class="btn btn-sm btn-primary mt-2">+</button>
                                                                    </td>

                                                                </tr>
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
                                                <legend class="col-form-label col-md-6 pt-0">Are you still working in any
                                                    of the ICMR’s project:</legend>
                                                <div class="col-md-6 d-flex gap-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="working_in_icmr_project" id="icmr_project1"
                                                            value="Yes"
                                                            @if ($formData->working_in_icmr_project == 'Yes') checked @endif>
                                                        <label class="form-check-label" for="icmr_project1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="working_in_icmr_project" id="icmr_project2"
                                                            value="No"
                                                            @if ($formData->working_in_icmr_project == 'No') checked @endif>
                                                        <label class="form-check-label" for="icmr_project2">
                                                            No
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group" id="icmrsProjectDiv"
                                            @if ($formData->working_in_icmr_project == 'No') style="display: none" @endif>

                                            <div class="">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table table-hover table-bordered align-items-center mb-0">
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
                                                                <th>Add more</th>
                                                            </tr>

                                                        </thead>
                                                        <tbody id="icmr_project_tbody">

                                                            @if ($icmrExperience_count)
                                                                @foreach ($icmrExperience as $pkey => $pvalue)
                                                                    <tr>
                                                                        <td>
                                                                            <input
                                                                                class="form-control icmr_name_of_institute"
                                                                                type="text"
                                                                                id="icmr_name_of_institute"
                                                                                name="icmr_name_of_institute[]"
                                                                                value="{{ $pvalue->icmr_name_of_institute }}">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control icmr_doj"
                                                                                type="date" id="icmr_doj"
                                                                                name="icmr_doj[]"
                                                                                value="{{ $pvalue->icmr_doj }}">
                                                                        </td>

                                                                        <td>
                                                                            <input
                                                                                class="form-control icmr_name_of_project"
                                                                                type="text" id="icmr_name_of_project"
                                                                                name="icmr_name_of_project[]"
                                                                                value="{{ $pvalue->icmr_name_of_project }}">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control icmr_post_name"
                                                                                type="text" id="icmr_post_name"
                                                                                name="icmr_post_name[]"
                                                                                value="{{ $pvalue->icmr_post_name }}">
                                                                        </td>
                                                                        <td>
                                                                            <input
                                                                                class="form-control icmr_nature_of_duties"
                                                                                type="text"
                                                                                id="icmr_nature_of_duties"
                                                                                name="icmr_nature_of_duties[]"
                                                                                value="{{ $pvalue->icmr_nature_of_duties }}">
                                                                        </td>

                                                                        <td>
                                                                            @if ($pkey == 0)
                                                                                <button onclick="addMoreIcmr()"
                                                                                    type="button"
                                                                                    class="btn btn-sm btn-primary mt-2">+</button>
                                                                            @else
                                                                                <button type="button"
                                                                                    class="btn btn-sm btn-danger mt-2"
                                                                                    onclick="removeSingleRow(this);">x</button>
                                                                            @endif
                                                                        </td>

                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>

                                                                    <td>
                                                                        <input class="form-control icmr_name_of_institute"
                                                                            type="text" id="icmr_name_of_institute"
                                                                            name="icmr_name_of_institute[]">
                                                                    </td>

                                                                    <td>
                                                                        <input class="form-control icmr_doj"
                                                                            type="date" id="icmr_doj"
                                                                            name="icmr_doj[]">
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control icmr_name_of_project"
                                                                            type="text" id="icmr_name_of_project"
                                                                            name="icmr_name_of_project[]">
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control icmr_post_name"
                                                                            type="text" id="icmr_post_name"
                                                                            name="icmr_post_name[]">
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control icmr_nature_of_duties"
                                                                            type="text" id="icmr_nature_of_duties"
                                                                            name="icmr_nature_of_duties[]">
                                                                    </td>

                                                                    <td>
                                                                        <button onclick="addMoreIcmr()" type="button"
                                                                            class="btn btn-sm btn-primary mt-2">+</button>
                                                                    </td>
                                                                </tr>
                                                            @endif



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <legend class="col-form-label col-md-6 pt-0">Additional Information:
                                            </legend>

                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="additional_information"
                                                        class="form-control-label">Explain
                                                        Additional Information In Brief</label>
                                                    <textarea class="form-control" name="additional_information" id="additional_information" cols="30"
                                                        rows="3"> {{ $formData->additional_information }} </textarea>
                                                </div>

                                            </div>
                                        </div>



                                    </div>

                                    <div class="col-md-12">


                                        <hr class="horizontal dark">
                                        <div class="form-group">
                                            <fieldset class="row">
                                                <legend class="col-form-label col-md-8 pt-0">Are you claiming a maximum of
                                                    five (05) marks for Post Essential Qualification research/Lab/field
                                                    experience in
                                                    any Government recognized/approved/registered Institution or
                                                    Organization, obtained after
                                                    meeting the Essential Qualification as prescribed in the advertisement?
                                                </legend>
                                                <div class="col-md-4 ">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="is_five_per_weightage" id="is_five_per_weightage1"
                                                            value="Yes"
                                                            @if ($formData->is_five_per_weightage == 'Yes') checked @endif>
                                                        <label class="form-check-label" for="is_five_per_weightage1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="is_five_per_weightage" id="is_five_per_weightage2"
                                                            value="No"
                                                            @if ($formData->is_five_per_weightage == 'No') checked @endif>
                                                        <label class="form-check-label" for="is_five_per_weightage2">
                                                            No
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group" id="is_five_per_weightage_div"
                                            @if ($formData->is_five_per_weightage == 'No') style="display: none" @endif>

                                            <div class="">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table table-hover table-bordered align-items-center mb-0">
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
                                                                <th rowspan="2">Add more</th>
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
                                                        <tbody id="perWei5_tbody">

                                                            @if ($fivePerWei_count)
                                                                @foreach ($fivePerWei as $pkey => $pvalue)
                                                                    <tr>
                                                                        <td>
                                                                            <input
                                                                                class="form-control five_per_weightage_organisation"
                                                                                type="text"
                                                                                id="five_per_weightage_organisation"
                                                                                name="five_per_weightage_organisation[]"
                                                                                value="{{ $pvalue->five_per_weightage_organisation }}">
                                                                        </td>
                                                                        <td>
                                                                            <input
                                                                                class="form-control five_per_weightage_period_from"
                                                                                type="date"
                                                                                id="five_per_weightage_period_from"
                                                                                name="five_per_weightage_period_from[]"
                                                                                value="{{ $pvalue->five_per_weightage_period_from }}">
                                                                        </td>

                                                                        <td>
                                                                            <input
                                                                                class="form-control five_per_weightage_period_to"
                                                                                type="date"
                                                                                id="five_per_weightage_period_to"
                                                                                name="five_per_weightage_period_to[]"
                                                                                value="{{ $pvalue->five_per_weightage_period_to }}">
                                                                        </td>
                                                                        <td>
                                                                            <input
                                                                                class="form-control five_per_weightage_name_of_post"
                                                                                type="text"
                                                                                id="five_per_weightage_name_of_post"
                                                                                name="five_per_weightage_name_of_post[]"
                                                                                value="{{ $pvalue->five_per_weightage_name_of_post }}">
                                                                        </td>
                                                                        <td>
                                                                            <input
                                                                                class="form-control five_per_weightage_pay_scale"
                                                                                type="text"
                                                                                id="five_per_weightage_pay_scale"
                                                                                name="five_per_weightage_pay_scale[]"
                                                                                value="{{ $pvalue->five_per_weightage_pay_scale }}">
                                                                        </td>
                                                                        <td>
                                                                            <input
                                                                                class="form-control five_per_weightage_nature_of_duties"
                                                                                type="text"
                                                                                id="five_per_weightage_nature_of_duties"
                                                                                name="five_per_weightage_nature_of_duties[]"
                                                                                value="{{ $pvalue->five_per_weightage_nature_of_duties }}">
                                                                        </td>

                                                                        <td>
                                                                            @if ($pkey == 0)
                                                                                <button onclick="addMore5PerWei()"
                                                                                    type="button"
                                                                                    class="btn btn-sm btn-primary mt-2">+</button>
                                                                            @else
                                                                                <button type="button"
                                                                                    class="btn btn-sm btn-danger mt-2"
                                                                                    onclick="removeSingleRow(this);">x</button>
                                                                            @endif
                                                                        </td>

                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>

                                                                    <td>
                                                                        <input
                                                                            class="form-control five_per_weightage_organisation"
                                                                            type="text"
                                                                            name="five_per_weightage_organisation[]">
                                                                    </td>

                                                                    <td>
                                                                        <input
                                                                            class="form-control five_per_weightage_period_from"
                                                                            type="date"
                                                                            name="five_per_weightage_period_from[]">
                                                                    </td>
                                                                    <td>
                                                                        <input
                                                                            class="form-control five_per_weightage_period_to"
                                                                            type="date"
                                                                            name="five_per_weightage_period_to[]">
                                                                    </td>


                                                                    <td>
                                                                        <input
                                                                            class="form-control five_per_weightage_name_of_post"
                                                                            type="text"
                                                                            name="five_per_weightage_name_of_post[]">
                                                                    </td>
                                                                    <td>
                                                                        <input
                                                                            class="form-control five_per_weightage_pay_scale"
                                                                            type="text"
                                                                            name="five_per_weightage_pay_scale[]">
                                                                    </td>
                                                                    <td>
                                                                        <input
                                                                            class="form-control five_per_weightage_nature_of_duties"
                                                                            type="text"
                                                                            name="five_per_weightage_nature_of_duties[]">
                                                                    </td>

                                                                    <td>
                                                                        <button onclick="addMore5PerWei()" type="button"
                                                                            class="btn btn-sm btn-primary mt-2">+</button>
                                                                    </td>

                                                                </tr>
                                                            @endif



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                    <div class="card-footer">

                                        <div class="text-end">
                                            <button type="submit" id="saveAndNext"
                                                class="btn btn-primary">Update</button>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>

    @include('student.common.script')
@endsection
