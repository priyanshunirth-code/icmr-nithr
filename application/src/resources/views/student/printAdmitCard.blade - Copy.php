@extends('layouts.app')

@section('content')
    <style type="text/css">
        @media print {

            body {
                background: transparent;
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

            tr td {
                padding: 50px;
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


        .bgLogo {
            width: 480px;
            height: 105px;
            background: url("{{ asset('img/icmr-new-logo.jpg') }}") no-repeat center center;
            filter: blur(5px);
            transform: rotate(-20deg);
            /* Rotate the image by 30 degrees */
            /* Adjust the blur amount as needed */
            position: absolute;
            top: 60%;
            left: 30%;
            z-index: -1;
        }

        /* Cut here section */
        .cut-here {
            text-align: center;
            margin: 20px 0px;
            border-top: 2px dashed #000;
        }

        .pic {
            height: 200px;
            width: 200px;
        }

        .sig {
            width: 200px;
            height: 100px;
        }

        .thumb {
            width: 200px;
            height: 100px;
        }
    </style>

    @php
        
        $APPLYFOR = '';
        
        if ($formData->form_id == env('FORMID1') || $formData->form_id == env('FORMID2')) {
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
        <div class="container">

            <div class="bgLogo"></div>

            <table style="width: 100%" border="1">
                <tr>
                    <td colspan="3" class="text-center"><img src="{{ asset('img/icmr-new-logo.jpg') }}" alt=""></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center font-weight-bolder">Application for the post of:
                        {{ $APPLYFOR }} <br>Admit Card (PART-1)</td>
                </tr>
                <tr>
                    <td colspan="2" class="font-weight-bolder">Roll No:
                        {{ $formData->form_id . $formData->application_no }}</td>
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
                            <img src="{{ $formData->imageUrl($formData->profile_pic) }}" style="width:100px"><br>
                        @endif
                        @if ($formData->signature)
                            <img src="{{ $formData->imageUrl($formData->signature) }}" style="width:100px">
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
                        <td colspan="2">
                            <span class="text-xxs font-weight-bolder">Aadhar Card No.:</span>
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
                    <td colspan="2" class="font-weight-bolder">Test Centre:
                        <br>Global clg jabalpur madhya pradesh 482005
                    </td>
                    <td class="text-center font-weight-bolder">Examination Date: 11/11/1111
                        <br>

                        <span class="text-xs font-weight-bolder">Examination Time: 11:11 AM to 11:11 PM</span> <br>
                        <span class="text-xxs font-weight-bolder">Reporting Time : <b>11:11 AM </b> Last entry in the
                            examination centre: <b>11:22 PM</b></span>
                    </td>
                </tr>
                <tr>

                    <td colspan="3">
                        <b class="text-danger">Note:- </b>

                        <ol>
                            <li class="text-xxs font-weight-bolder">Admit Card Download: Ensure you download your admit card
                                well in advance of the examination date from the official website of the recruiting
                                authority.</li>
                            <li class="text-xxs font-weight-bolder">Admit Card Download: Ensure you download your admit card
                                well in advance of the examination date from the official website of the recruiting
                                authority.</li>
                            <li class="text-xxs font-weight-bolder">Admit Card Download: Ensure you download your admit card
                                well in advance of the examination date from the official website of the recruiting
                                authority.</li>
                            <li class="text-xxs font-weight-bolder">Admit Card Download: Ensure you download your admit card
                                well in advance of the examination date from the official website of the recruiting
                                authority.</li>
                            <li class="text-xxs font-weight-bolder">Admit Card Download: Ensure you download your admit card
                                well in advance of the examination date from the official website of the recruiting
                                authority.</li>
                            <li class="text-xxs font-weight-bolder">Admit Card Download: Ensure you download your admit card
                                well in advance of the examination date from the official website of the recruiting
                                authority.</li>
                            <li class="text-xxs font-weight-bolder">Admit Card Download: Ensure you download your admit card
                                well in advance of the examination date from the official website of the recruiting
                                authority.</li>
                            <li class="text-xxs font-weight-bolder">Admit Card Download: Ensure you download your admit card
                                well in advance of the examination date from the official website of the recruiting
                                authority.</li>
                        </ol>

                    </td>
                </tr>

            </table>
            <div class="cut-here">
                {{-- <p><strong>Cut Here</strong></p> --}}
            </div>
            <table style="width: 100%" border="1">

                <tr>
                    <td colspan="8" class="text-center font-weight-bolder">Application for the post of:
                        {{ $APPLYFOR }} <br>Admit Card (PART-2)
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="font-weight-bolder">Roll No:
                        {{ $formData->form_id . $formData->application_no }}
                    </td>
                    <td colspan="4" class="font-weight-bolder">Registration Date:
                        {{ date('d/M/Y', strtotime($formData->updated_at)) }}
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="6" class="text-center">
                        <div class="text-center pic">
                            <p>Photo</p>

                        </div>
                    </td>
                    <td colspan="2" rowspan="6" class="text-center">
                        <div class="text-center sig">
                            <p>Thumb</p>

                        </div>
                        <hr>
                        <div class="text-center thumb">
                            <p>Signature</p>

                        </div>
                    </td>
                    <td>
                        <span class="text-xxs font-weight-bolder">Name:</span>
                        <span class="text-xxs">{{ $formData->firstname }} {{ $formData->middlename }}
                            {{ $formData->lastname }}</span>
                    </td>
                    <td>
                        <span class="text-xxs font-weight-bolder">Father's name:</span>
                        <span class="text-xxs">{{ $formData->fathername }}</span>
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

            </table>
            <br><br><br><br><br><br>
        </div>
    </main>
@endsection
