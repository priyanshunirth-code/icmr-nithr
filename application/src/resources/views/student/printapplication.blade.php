@extends('layouts.app')

@section('content')
    <style type="text/css">
        @media print {
            @page {
                margin: 5px;
                size: A4;
            }

            table,
            table td,
            table th {
                border: solid black;
            }

            table {
                border-width: 1px 1px 0 0;
            }

            table td,
            table th {
                border-width: 0 0 1px 1px;
            }
        }

        @page {
            margin: 5px;
            size: A4;
        }

        table,
        table td,
        table th {
            border: solid black;
        }

        table {
            border-width: 1px 1px 0 0;
        }

        table td,
        table th {
            border-width: 0 0 1px 1px;
        }
    </style>

    @php

        $APPLYFOR = '';

        if (($formData->form_id) == env('FORMID1') || $formData->form_id == env('FORMID2')) {
            $APPLYFOR = 'Technical Assistant';
        }

        if ($formData->form_id == env('FORMID3') || $formData->form_id == env('FORMID4') || $formData->form_id == env('FORMID5')) {
            $APPLYFOR = 'Technical Assistant';
        }

        if ($formData->form_id == env('FORMID5') || $formData->form_id == env('FORMID6')) {
            $APPLYFOR = 'Technical Assistant';
        }
        if ($formData->form_id == env('FORMID7') || $formData->form_id == env('FORMID8')) {
            $APPLYFOR = 'Technician-I';
        }

        if ($formData->form_id == env('FORMID9') || $formData->form_id == env('FORMID10')) {
            $APPLYFOR = 'Lab Attendant-I';
        }

    @endphp

    <main class="main-content mt-0">
        <div class="">
            <table style="width: 100%" border="1">
                <tr>
                    <!--<td colspan="3" class="text-center"><img src="{{ asset('img/icmr-new-logo.jpg') }}" alt=""></td>-->
                    <td colspan="3" class="text-center"><img src="https://nirth.res.in/application/img/icmr-new-logo.jpg" alt=""></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center font-weight-bolder">Application for the post of:
                        {{ $APPLYFOR }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bolder">Application No: {{ $formData->form_id . $formData->application_no }}</td>
                    <td></td>
                    <td class="font-weight-bolder">Registration Date: {{ date('d/M/Y', strtotime($formData->updated_at)) }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="text-xxs font-weight-bolder">Name:</span>
                        <span class="text-xxs">{{ $formData->firstname }} {{ $formData->middlename }}
                            {{ $formData->lastname }}</span>
                    </td>
                    <td>
                        <span class="text-xxs font-weight-bolder">Father's name:</span>
                        <span class="text-xxs">{{ $formData->fathername }}</span>
                    </td>
                    <td rowspan="6" class="text-center">
                        @if ($formData->profile_pic)
                            <!--<img src="{{ $formData->imageUrl($formData->profile_pic) }}" style="width:100px"><br>-->
                            <img src="https://nirth.res.in/application/src/storage/app/public/{{$formData->profile_pic}}" style="width:100px"><br>
                        @endif
                        @if ($formData->signature)
                            <!--<img src="{{ $formData->imageUrl($formData->signature) }}" style="width:100px">-->
                            <img src="https://nirth.res.in/application/src/storage/app/public/{{$formData->signature}}" style="width:100px">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="text-xxs font-weight-bolder">Mother's name:</span>
                        <span class="text-xxs">{{ $formData->mothername }}</span>
                    </td>
                    <td>
                        <span class="text-xxs font-weight-bolder">Gender:</span>
                        <span class="text-xxs">{{ $formData->gender }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="text-xxs font-weight-bolder">Date Of Birth:</span>
                        <span class="text-xxs">{{ date('d/M/Y', strtotime($formData->dob)) }}</span>
                    </td>
                    <td>
                        <span class="text-xxs font-weight-bolder">Present Age:</span>
                        <span class="text-xxs">{{ $formData->present_age }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="text-xxs font-weight-bolder">Nationality:</span>
                        <span class="text-xxs">{{ $formData->nationality }}</span>
                    </td>
                    <td>
                        <span class="text-xxs font-weight-bolder">PwBD:</span>
                        <span class="text-xxs">{{ $formData->pwd }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="text-xxs font-weight-bolder">Ex-Servicemen:</span>
                        <span class="text-xxs">{{ $formData->exsm }}</span>
                    </td>
                    <td>
                        <span class="text-xxs font-weight-bolder">Marital Status:</span>
                        <span class="text-xxs">{{ $formData->marital_status }}</span>
                    </td>
                </tr>
                @if ($formData->marital_status == 'Divorced')
                    <tr>
                        <td colspan="2">
                            <span class="text-xxs font-weight-bolder">Legally Separated:</span>
                            <span class="text-xxs">{{ $formData->divorced_type }}</span>
                        </td>
                    </tr>
                @endif
                <tr>
                    <td>
                        <span class="text-xxs font-weight-bolder">Are you having Aadhar Card No.?:</span>
                        <span class="text-xxs">{{ $formData->is_having_aadhar_card }}</span>
                    </td>
                    @if ($formData->is_having_aadhar_card == 'Yes')
                        <td>
                            <span class="text-xxs font-weight-bolder">Aadhar Card No.:</span><br>
                            <span class="text-xxs">{{ $formData->aadhar_no }}</span>
                        </td>
                    @else
                        <td>
                            <span class="text-xxs font-weight-bolder">Id Card Type:</span>
                            <span class="text-xxs">{{ $formData->id_card_type }}</span>
                        </td>
                        <td>
                            <span class="text-xxs font-weight-bolder">Id Card No:</span>
                            <span class="text-xxs">{{ $formData->id_card_no }}</span>
                        </td>
                    @endif
                </tr>
                <tr>
                    <td>
                        <span class="text-xxs font-weight-bolder">Are you claiming age relaxation?:</span>
                        <span class="text-xxs">{{ $formData->claiming_age_relaxation }}</span>
                    </td>
                    <td>
                        <span class="text-xxs">{{ $formData->claiming_age_relaxation_type }}</span>
                    </td>
                    <td>
                        <span class="text-xxs font-weight-bolder">Category of the candidate :</span>
                        <span class="text-xxs">{{ $formData->category }}</span>

                        <span class="text-xxs font-weight-bolder">Applying for the Category :</span>
                        <span class="text-xxs">{{ $formData->apply_for_category }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="text-xxs font-weight-bolder">Mobile No.:</span>
                        <span class="text-xxs">{{ $formData->mobile_no }}</span>
                    </td>
                    <td>
                        <span class="text-xxs font-weight-bolder">Alternate Mobile No.:</span>
                        <span class="text-xxs">{{ $formData->alternate_mobile_no }}</span>
                    </td>
                    <td>
                        <span class="text-xxs font-weight-bolder">Email Address:</span>
                        <span class="text-xxs">{{ $formData->email }}</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <span class="text-xxs font-weight-bolder">Address for communication</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="text-xxs font-weight-bolder">Address:</span>
                        <span class="text-xxs">{{ $formData->postal_address }}, {{ $formData->postal_code }}</span>
                    </td>
                    <td>
                        <span class="text-xxs font-weight-bolder">State:</span>
                        <span class="text-xxs">
                            @if ($formData->postal_state)
                                {{ $formData->postal_state1->name }}
                            @endif
                        </span>
                    </td>
                    <td>
                        <span class="text-xxs font-weight-bolder">City:</span>
                        <span class="text-xxs">
                            @if ($formData->postal_city)
                                {{ $formData->postal_city1->city }}
                            @endif
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <span class="text-xxs font-weight-bolder">Permanent Address</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="text-xxs font-weight-bolder">Address:</span>
                        <span class="text-xxs">{{ $formData->permanent_address }},
                            {{ $formData->permanent_postal_code }}</span>
                    </td>
                    <td>
                        <span class="text-xxs font-weight-bolder">State:</span>
                        <span class="text-xxs">
                            @if ($formData->permanent_state)
                                {{ $formData->permanent_state1->name }}
                            @endif
                        </span>
                    </td>
                    <td>
                        <span class="text-xxs font-weight-bolder">City:</span>
                        <span class="text-xxs">
                            @if ($formData->permanent_city)
                                {{ $formData->permanent_city1->city }}
                            @endif
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <span class="text-xxs font-weight-bolder">Educational/Technical/Professional Qualifications</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table style="width: 100%" border="1">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark">
                                    Examination Passed</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                    Roll
                                    No.
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                    Year of <br>
                                    Passing
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                    Name of the
                                    Board/University
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                    Subjects
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                    Marks<br> Obtained
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                    Maximum<br> Marks
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                    Percentage
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                    Class/Division
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <span class="badge badge-dot me-4">
                                        <i class="bg-info"></i>
                                        <span class="text-dark text-xxs">Xth / (HSC)</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->tenth_roll_no }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->tenth_year_of_passing }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->tenth_name_of_university }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->tenth_subject }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->tenth_marks }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->tenth_outof }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->tenth_percentage }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->tenth_division }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="badge badge-dot me-4">
                                        <i class="bg-info"></i>
                                        <span class="text-dark text-xxs">XIIth /
                                            Intermediate</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->twelveth_roll_no }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->twelveth_year_of_passing }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->twelveth_name_of_university }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->twelveth_subject }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->twelveth_marks }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->twelveth_outof }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->twelveth_percentage }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->twelveth_division }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="badge badge-dot me-4">
                                        <i class="bg-info"></i>
                                        <span class="text-dark text-xxs">Diploma</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->diploma_roll_no }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->diploma_year_of_passing }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->diploma_name_of_university }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->diploma_subject }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->diploma_marks }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->diploma_outof }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->diploma_percentage }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->diploma_division }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="badge badge-dot me-4">
                                        <i class="bg-info"></i>
                                        <span class="text-dark text-xxs">Bachelor’s
                                            Degree</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->bachelor_degree_roll_no }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->bachelor_degree_year_of_passing }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->bachelor_degree_name_of_university }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->bachelor_degree_subject }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->bachelor_degree_marks }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->bachelor_degree_outof }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->bachelor_degree_percentage }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->bachelor_degree_division }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="badge badge-dot me-4">
                                        <i class="bg-info"></i>
                                        <span class="text-dark text-xxs">Master’s
                                            Degree</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->master_degree_roll_no }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->master_degree_year_of_passing }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->master_degree_name_of_university }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->master_degree_subject }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->master_degree_marks }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->master_degree_outof }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->master_degree_percentage }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->master_degree_division }}</span>
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    <span class="badge badge-dot me-4 m-2">
                                        <i class="bg-info"></i>
                                        <span class="text-dark text-xxs">Other
                                            Qualifications</span>
                                    </span><br>
                                    <span class="text-xxs">{{ $formData->other_exam }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->other_roll_no }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->other_year_of_passing }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->other_name_of_university }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->other_subject }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->other_marks }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->other_outof }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->other_percentage }}</span>
                                </td>
                                <td>
                                    <span class="text-xxs">{{ $formData->other_division }}</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                @if (!empty($workExperience))
                    <tr>
                        <td colspan="3">
                            <span class="text-xxs font-weight-bolder">Work Experience</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <table style="width: 100%" border="1">
                                <thead>
                                    <tr>
                                        <th rowspan="2"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            Name &amp; Address <br> of the Employer/Organization
                                        </th>

                                        <th colspan="2"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            period
                                        </th>

                                        <th rowspan="2"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            Name of the Post
                                        </th>

                                        <th rowspan="2"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            Nature of Duties performed
                                        </th>
                                    </tr>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            from
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            to
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workExperience as $pkey => $pvalue)
                                        <tr>
                                            <td>
                                                <span class="text-xxs">{{ $pvalue->work_exp_organisation }}</span>
                                            </td>
                                            <td>
                                                <span class="text-xxs">
                                                    @if ($pvalue->work_exp_period_from)
                                                        {{ date('d/M/Y', strtotime($pvalue->work_exp_period_from)) }}
                                                    @endif
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-xxs">
                                                    @if ($pvalue->work_exp_period_to)
                                                        {{ date('d/M/Y', strtotime($pvalue->work_exp_period_to)) }}
                                                    @endif
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-xxs">{{ $pvalue->work_exp_name_of_the_post }}</span>
                                            </td>
                                            <td>
                                                <span class="text-xxs">{{ $pvalue->work_exp_nature_of_duties }}</span>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endif

                <tr>
                    <td colspan="3">Additional Details</td>
                </tr>
                <tr>
                    <td>
                        <span class="text-xxs font-weight-bolder">Do you possess Computer Skills:</span>
                        <span class="text-xxs">{{ $formData->computer_skills }}</span>
                    </td>
                    <td colspan="2">
                        <span class="text-xxs font-weight-bolder">Mention Computer Skills In Brief</span>
                        <span class="text-xxs">{{ $formData->computer_skills_description }}</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <span class="text-xxs font-weight-bolder">Previous Service/Experience Details in case of Govt.
                            Servants:</span>
                        <span class="text-xxs">{{ $formData->previous_experiences }}</span>
                    </td>
                </tr>

                @if ($formData->previous_experiences == 'Yes')
                    <tr>
                        <td colspan="3">
                            <table style="width: 100%" border="1">
                                <thead>
                                    <tr>
                                        <th rowspan="2"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            Name &amp; Address of the <br> Employer/Organization
                                        </th>

                                        <th colspan="2"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            period
                                        </th>
                                        <th rowspan="2"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            Name of the Post
                                        </th>
                                        <th rowspan="2"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            Scale of Pay drawing <br> (as per 6 th / 7 th CPC) <br>
                                            and Basic
                                            Pay
                                        </th>
                                        <th rowspan="2"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            Nature of Duties <br> performed
                                        </th>
                                    </tr>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            from
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            to
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="preex_tbody">
                                    @if (!empty($prevexps))
                                        @foreach ($prevexps as $key => $exp)
                                            <tr>
                                                <td>
                                                    <span class="text-xxs">{{ $exp->organisation }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-xxs">
                                                        @if ($exp->period_from)
                                                            {{ date('d/M/Y', strtotime($exp->period_from)) }}
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-xxs">
                                                        @if ($exp->period_to)
                                                            {{ date('d/M/Y', strtotime($exp->period_to)) }}
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-xxs">{{ $exp->name_of_the_post }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-xxs">{{ $exp->scale_of_pay }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-xxs">{{ $exp->nature_of_duties }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endif

                <tr>
                    <td colspan="3">
                        <span class="text-xxs font-weight-bolder">Are you still working in any of the ICMR’s project:</span>
                        <span class="text-xxs">{{ $formData->working_in_icmr_project }}</span>
                    </td>
                </tr>

                @if ($formData->working_in_icmr_project == 'Yes')
                    <tr>
                        <td colspan="3">
                            <table style="width: 100%" border="1">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            Name of the Institute
                                        </th>

                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            DOJ
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            Name Of the Project
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            Name of the Post
                                        </th>
                                        {{-- <th rowspan="2"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            Scale of Pay drawing <br> (as per 6 th / 7 th CPC) <br>
                                            and Basic
                                            Pay
                                        </th>--}}
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            Nature of Duties <br> performed
                                        </th>
                                    </tr>
                                    {{--<tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                                from
                                        </th>
                                        <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                        to
                                        </th>
                                    </tr>--}}
                                </thead>
                                <tbody id="preex_tbody">
                                    @if (!empty($icmrExperience))
                                        @foreach ($icmrExperience as $ikey => $iexp)
                                            <tr>
                                                <td>
                                                    <span class="text-xxs">{{ $iexp->icmr_name_of_institute }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-xxs">
                                                        @if ($iexp->icmr_doj)
                                                            {{ date('d/M/Y', strtotime($iexp->icmr_doj)) }}
                                                        @endif
                                                    </span>
                                                </td>

                                                <td>
                                                    <span class="text-xxs">{{ $iexp->icmr_name_of_project }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-xxs">{{ $iexp->icmr_post_name }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-xxs">{{ $iexp->icmr_nature_of_duties }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endif

                <tr>
                    <td colspan="3">
                        <span class="text-xxs font-weight-bolder">Additional Information:</span>
                        <span class="text-xxs">{{ $formData->additional_information }}</span>
                    </td>
                </tr>

                @if ($formData->is_five_per_weightage == 'Yes')
                <tr>
                    <td colspan="3">
                        <span class="text-xxs font-weight-bolder">Are you claiming a maximum of five (05) marks for Post Essential Qualification research/Lab/field experience in any Government recognized/approved/registered Institution or Organization, obtained after meeting the Essential Qualification as prescribed in the advertisement:</span>
                        <span class="text-xxs">{{ $formData->is_five_per_weightage }}</span>
                    </td>
                </tr>

                    <tr>
                        <td colspan="3">
                            <table style="width: 100%" border="1">
                                <thead>
                                    <tr>
                                        <th rowspan="2"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            Name &amp; Address of the <br> Employer/Organization
                                        </th>
                                        <th colspan="2"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            period
                                        </th>
                                        <th rowspan="2"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            Name of the Post
                                        </th>
                                        <th rowspan="2"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            Scale of Pay drawing <br> (as per 6 th / 7 th CPC) <br>
                                            and Basic
                                            Pay
                                        </th>
                                        <th rowspan="2"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">
                                            Nature of Duties <br> performed
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase text-center text-sm text-dark ps-2">
                                            from
                                        </th>
                                        <th class="text-uppercase text-center text-sm text-dark ps-2">
                                            to
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($fivePerWei))
                                        @foreach ($fivePerWei as $fkey => $fexp)

                                        <tr>
                                            <td>
                                                <span
                                                    class="text-xxs">{{ $fexp->five_per_weightage_organisation }}</span>
                                            </td>
                                            <td>
                                                <span class="text-xxs">
                                                    @if ($fexp->five_per_weightage_period_from)
                                                        {{ date('d/M/Y', strtotime($fexp->five_per_weightage_period_from)) }}
                                                    @endif
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-xxs">
                                                    @if ($fexp->five_per_weightage_period_to)
                                                        {{ date('d/M/Y', strtotime($fexp->five_per_weightage_period_to)) }}
                                                    @endif
                                                </span>
                                            </td>
                                            <td>
                                                <span
                                                    class="text-xxs">{{ $fexp->five_per_weightage_name_of_post }}</span>
                                            </td>
                                            <td>
                                                <span class="text-xxs">{{ $fexp->five_per_weightage_pay_scale }}</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="text-xxs">{{ $fexp->five_per_weightage_nature_of_duties }}</span>
                                            </td>
                                        </tr>

                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endif
            </table>
        </div>
    </main>
@endsection
