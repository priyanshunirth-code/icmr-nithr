@extends('layouts.app')

@section('content')
    <style type="text/css">
        @media print {

            body {
                background: transparent;
            }

            @page {
                margin: 30px;
                size: A4 landscape;
            }
        }
        @page {
            margin: 30px;
            size: A4 landscape;
        }

        table td,
        table th {
            font-size: 12px;
        }
        p{
            font-size: 12px;
        }
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
        body{
            font-family: initial;
            color: #000 !important;
        }

        table td, table th {
            padding-left: 10px;
            padding-right: 10px;
        }
        .text-center{
            text-align: center;
        }
        h4{
            font-size: 14px;
        }
        .mb-0{
            margin-bottom: 0;
        }
    </style>
    <main class="main-content">
        <div class="container">
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td colspan="6" class="text-center" style="border-left-style: hidden;border-top-style: hidden;border-right-style: hidden;">
                            <p></p>
                            <p>
                                <strong style="font-size: 16px;">Attendance Report</strong><br>
                                <strong style="font-size: 14px;">{{ $exam_center }}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="" style="border-left-style: hidden;border-top-style: hidden;border-right-style: hidden;">
                            <p><strong>Name of Post:</strong> {{$post}}</p>
                            <p><strong>Date of Examination:</strong> {{explode(",",$exam_date_and_time)[0]}}</p>
                            <p><strong>Candidate Reporting Time:</strong> {{$exam->reporting_time}}</p>
                            <p><strong>Slot Start Time:</strong> {{explode("-",explode(",",$exam_date_and_time)[1])[0]}}</p>
                            <p><strong>Slot End Time:</strong> {{explode("-",explode(",",$exam_date_and_time)[1])[1]}}</p>
                            <p><strong>Exam Center Lab Name:</strong> {{$exam_center}}</p>
                            <p><strong>Name of Attendance officer:</strong></p>
                            <p><strong>Contact Details:</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <th width="10">Sr.No.</th>
                        <th>Candidate Name</th>
                        <th>Application No</th>
                        <th>Candidate Photograph</th>
                        <th>Candidate Uploaded Signature</th>
                        <th>Signature</th>
                    </tr>
                    @if($forms)
                        @foreach($forms as $key => $value)
                            <tr>
                                <td>{{ ($key+1) }}</td>
                                <td>{{ $value->firstname . " " . $value->middlename . " " . $value->lastname}}</td>
                                <td class="text-center">{{ $value->eapplication_no }}</td>
                                <td><img src="{{ App\Models\Form::imageUrl($value->profile_pic) }}" style="width:100px"></td>
                                <td><img src="{{ App\Models\Form::imageUrl($value->signature) }}" style="width:70px"></td>
                                <td></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6" style="border-left-style: hidden;border-bottom-style: hidden;border-right-style: hidden;">
                            <p></p>
                            <p></p>
                            <p></p>
                            <p></p>
                            <p>Attendance Officer Signature</p>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </main>

@endsection