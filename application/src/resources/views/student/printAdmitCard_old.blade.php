@extends('layouts.app')

@section('content')
    <style type="text/css">
        @media print {

            body {
                background: transparent;
            }

            @page {
                size: A4;
            }
        }

        @page {
            margin: 30px;
            size: A4;
        }

        table td,
        table th {
            font-size: 12px;
        }
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
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
        body{
            font-family: initial;
            color: #000 !important;
        }

        table td, table th {
            padding-left: 10px;
        }
        h6{
            font-size: 12px;
            color: #000;
            margin-top: 0;
            margin-bottom: 0;
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
        .font-weight-bolder {
            font-weight: bold !important;
            font-size: 12px;
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
            $APPLYFOR = 'Technician-1';
        }
        
        if ($formData->form_id == env('FORMID9') || $formData->form_id == env('FORMID10')) {
            $APPLYFOR = 'Lab Attendant-1';
        }
        
    @endphp

    <main class="main-content mt-0">
        <div class="container">

            <!-- <div class="bgLogo"></div> -->

            <table style="width: 100%;border: 0;">
                <tr>
                    <td class="text-center" style="border: 0;">
                        <h4 class="mb-0">Admitcard</h4>
                        <span><b>Exam Name:</b> ICMR-NIRTH({{ $APPLYFOR }}) Exam</span><br>
                        <span>This hall ticket was generated on <b> {{date("F d,Y")}} at {{date("H:i:s")}}.</b></span>
                    </td>
                </tr>
            </table>
            <table style="width: 100%" border="1">
                <tr>
                    <td class="font-weight-bolder" width="120">Registration No:</td>
                    <td colspan="2" class="text-uppercase" style="border-right-width: 1px;">{{ $formData->form_id . $formData->application_no }}
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bolder">Full Name of candidate</td>
                    <td class="text-uppercase">{{ $formData->firstname }} {{ $formData->middlename }} {{ $formData->lastname }}</td>
                    <td class="text-center" rowspan="3" width="200" style="padding-left: 0;">
                        <h6>Candidate Photo & Sign</h6>
                        <hr style="margin-top: 0.5rem;margin-bottom: 0.5rem">
                        @if ($formData->profile_pic)
                            <img src="{{ $formData->imageUrl($formData->profile_pic) }}" style="width:75px"><br>
                        @endif
                        <hr style="margin-top: 0.5rem;margin-bottom: 0.5rem">
                        @if ($formData->signature)
                            <img src="{{ $formData->imageUrl($formData->signature) }}" style="width:70px">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bolder">Date of Birth</td>
                    <td class="text-uppercase">{{ date('d/m/Y', strtotime($formData->dob)) }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bolder">Mobile Number</td>
                    <td class="text-uppercase">{{ $formData->mobile_no }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bolder">Examination Center</td>
                    <td colspan="2" class="text-uppercase">THAKUR POLYTECHNIC-LAB 6,KANDIVALI, THAKUR COMPLEX, KANDIVALI EAST, MUMBAI, MAHARASHTRA 400101</td>
                </tr>
                <tr>
                    <td class="font-weight-bolder">Post</td>
                    <td colspan="2" class="text-uppercase">{{ $APPLYFOR }}</td>
                </tr>
            </table>
            <table style="width: 100%" border="1" class="text-center">
                <tr>
                    <td class="font-weight-bolder" style="width: 25%;">Reporting Time</td>
                    <td class="font-weight-bolder" style="width: 25%;">Exam Date & Time</td>
                    <td class="font-weight-bolder" style="width: 25%;">Duration of Exam</td>
                    <td class="font-weight-bolder" style="width: 25%;">-</td>
                </tr>
                <tr>
                    <td>{{ date("H:i A")}}</td>
                    <td>20 August 2023, 01:00 PM - 03:00 PM</td>
                    <td>120 Minutes</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td colspan="2">
                        
                        <h6 style="margin-bottom: 0;margin-top: 70px;">Signature of Invigilator with date</h6>
                        <span>(Hall Ticket with Signature of Invigilator is mandatory during
document verification on later stage of recruitment process)</span>
                    </td>
                    <td colspan="2">
                        
                        <h6 style="margin-bottom: 0;margin-top: 47px;">Signature of candidate</h6>
                        <span>(To be signed in front of Invigilator)</span>
                    </td>
                </tr>
            </table>
            <table style="width: 100%;border: 0;">
                <tr>
                    <td class="font-weight-bolder text-center" style="border: 0;font-size: 1rem;">
                        Important Instructions For Candidate
                    </td>
                </tr>
                <tr>
                    <td class="" style="border: 0;text-align: justify;padding-left: 0;">
                            1. Request for change of Examination Centre venue will not be entertained. 2. Dress modestly and appropriately for the examination. Avoid wearing any
jackets, face mask, cap, scarf, face scarf, goggles, any objectionable or revealing clothing. Adhere to any dress code specified by the examination
authorities in the instructions. 3. You may be subject to physical frisking and identity verification before entering the examination hall, cooperate with
the process as part of security measures. 4. Failure to comply with instructions, disruptive behaviour, or violation of any examination rules will result in
immediate disqualification. 5. Candidate should also bring printed copy of Admit Card, and any one Photo ID Proof in original. Take one a self-attested
photocopy of the Photo ID proof for submission. Write your user id on the same. 6. Photo Id Proof may include any one of the following: (i) Pan Card (ii)
Aadhaar Card, IN ABSENCE OF ORIGINAL PHOTO ID PROOF, and ADMIT CARD, CANDIDATE WILL NOT BE ALLOWED TO ENTER IN THE
EXAMINATION CENTRE PREMISES. 7. Candidate should report timely as indicated in Admit Card. 8. Candidate coming late i.e., after the time of
reporting given on Admit Card will not be permitted to appear in the Examination in any condition. 9. Candidates should follow safe distancing at the
Examination Centre. The attendant/ friend/ relative is strictly prohibited from entering the Examination venue. No grouping allowed, inside or outside
area of the Examination venue. 10. Candidate is not allowed to carry any Papers, Books, Notes etc. in the examination Hall. Use of Calculators, Slide
rules, Mobile, Calculator, Watches/Smart Watches or any such devices and any other study/reference material is NOT allowed inside the examination
hall. Any Candidate found using, or in possession of such unauthorized material or indulging in copying or adopting unfair means is liable to be
summarily disqualified. 11. Mobiles phones/ Pagers/ Calculators/ Scanning Devices/ Any other electronic gadgets/ Scales/ Algorithm Tables are strictly
prohibited inside the examination hall. Examination Centre will not be responsible for its safety/ loss. There is no storage arrangement for these items at
the Centre. 12. The Candidate appearing for the Examination should ensure that he/she fulfils the eligibility conditions for admission to the examination.
The admission at all stages of the Examination for which he/she is admitted viz., Examination will be purely provisional, subject to his/her satisfying the
eligibility conditions. If on verification at any time before or after the Examination, it is found that the candidate does not fulfil any of the eligibility
conditions, his/her candidature for the examination shall stand cancelled without any notice or further reference. Hence the candidate is provisionally
permitted to appear for the Examination. 13. Issue of Admit Card for the Examination does not confer any right of Acceptance of candidature and should
not be construed as an acknowledgement of fulfilling the eligibility criteria. 14. Traveling & other expenses incurred for attending the Examination will
be borne by the candidate himself/herself. 15. Any attempt to influence will lead to disqualification of candidate. Canvassing in any form by the
candidate would entail his/her disqualification. 16. 17. Find your Examination Hall as shown in the seating plan displayed at the entrance of the
Examination center. 18. Please ensure you that you have singed on the attendance sheet before entering in Examination Hall. Invigilator/ Supervisor will
show you where to sit. 19. Your signature on the attendance sheet and other documents should match the signature used during the application process.
Mismatched signatures may lead to verification procedures or rejection to appear for examination. 20. During the examination, do not leave your seat
without permission from the invigilator. Do not communicate with other candidates in any form. 21. Candidates wish to use washroom can do so before
the start of the exam. Candidates shall not be allowed to use the washroom during the examination time once she/ he entered in the examination hall.
22. All questions in the exams are Multiple-Choice Questions. There is negative marking for wrong answers. No mark will be awarded or deducted for
not attempting a question. Candidate is, therefore, advised to keep this in mind while answering the questions. 23. Answer option from the given four
options once selected and submitted by the candidates cannot be changed later under any circumstances. 24. Candidates have to answer the question or
skip the question to go to next question in the sequence. Question once skipped cannot be shown to candidates again. 25. After the commencement of
the Examination, no candidate will be allowed to leave the examination hall before completion of the time of the Examination. 26. Candidate are advised
to follow the instruction carefully given by the Supervisor / Invigilator, if not the candidate will be liable to such punishment as decides by the
Examination Center Head. The Candidate creating any obstruction in the work of functionaries or guilty of any inappropriate behaviour will be debarred
from the Examination with immediate effect. 27. This admit card is subject to verification of your application and is being provisionally issued based on
the information submitted by the candidate w.r.t his/her submission of application form for the above recruitment. If at any stage of time, any
discrepancies in any of the eligibility criteria are found, the candidature of the candidate will be cancelled. 28. Smoking and taking tea/ refreshment/
chewing gum/ mouth freshener/ mint, etc., by the candidates in the Examination Hall is strictly<span style="display: block; page-break-after: always;"></span> prohibited. 29. Candidate shall attend the mock test of 5
minutes before the starting of actual Examination. To acquaint with the interface of the Examination. After mock completion of the mock test candidate
can start the actual examination on instructions from invigilator/ supervisor. 30. Use the provided rough sheet and the pen for any rough work. Do not
tear or remove any part of the rough sheet, write your user id on the sheet. Keep the rough sheet and the pen on the same place after completion of your
Examination. 31. Display your Hall Ticket and identity card on your desk throughout the examination. The Hall Ticket must be shown to the invigilator
on request. 32. Familiarize yourself with the specific examination rules and guidelines provided by the invigilator before the Examination starts. 33.
Read the instruction for the Examination carefully. 34. Read each question carefully before answering. Ensure that you understand the requirements
before submitting the response. 35. Please note that all the candidates will be under strict supervision and surveillance through the cameras installed on
each computer and in the examination hall, in case any suspicious activity observed from any of the candidate his/ her examination shall be stopped and
his/her suspicious activities shall lead to disqualification. 36. While processing your result, the concerned authorities shall verify the footage of all the
cameras and the snap shots taken by the camera installed on your computer and if they observe any suspicious or unnecessary and frequent movements
then they may reserve your result or reject such candidates at the state of result declaration or selection of the candidate. 37. Follow all security
measures and protocols implemented by the examination center to ensure a fair and secure examination environment. 38. Utilize the entire allotted time
for the examination the examination shall be closed automatically on completion of the time, if it is not completed by the candidate. 39. If you have any
questions or face any issues during the examination, raise your hand to seek help from the invigilator. Do not communicate with other candidates. 40.
Behave respectfully with the invigilators and follow their instructions. Any form of misconduct, including creating disturbances or engaging in
inappropriate behaviour, will lead to disqualification. 41. Use of unfair means, such as copying from unauthorized sources, carrying notes, or using
electronic devices, is strictly prohibited and will result in immediate disqualification. 42. Do not attempt to impersonate another candidate or allow
anyone else to take the examination on your behalf. Such actions are illegal and will lead to strict legal action. 43. Engaging in any form of malpractice,
such as tampering with computer or examination software, will result in disqualification and legal consequences. 44. In the event of any unavoidable
technical issues or disruptions during the examination that impact the conduct of the examination, candidates may need to appear for the examination
on the next scheduled time on the same day or any other day as determined by the examination authorities. 45. In case of the issue is temporary and
technical issue resolves immediately, candidates can start examination from the point where they left the Examination due to technical issue/ power
failure, candidate will not lose a second in the process. All the attempted questions will be seen attempted and candidates can continue attempting the
next questions. 46. Preserve the Hall Ticket even after the examination, as it may be required for further stages of the selection process. 47. The result
declaration date and other important updates will be communicated through the official website of the examination.
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bolder" style="border: 0;padding-top: 45px;">
                        Signature of the applicants<br>
                        Date:
                    </td>
                </tr>
                <tr>
                    <td style="border: 0;font-style: italic;">
                        (By signing the above, I acknowledge that I have provisionally permitted to appear for the Examination, and I have read, understood, and agreed to
abide by all the instructions mentioned above and the Terms and Conditions mentioned on the Admit Card and the official website for the recruitment
process. I understand that non-compliance or any violation may lead to disqualification from the examination and further legal consequences.)
                    </td>
                </tr>
                <tr>
                    <td class="text-center" style="border: 0;">
                        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{ $formData->firstname }} {{ $formData->middlename }} {{ $formData->lastname }} {{ $formData->form_id . $formData->application_no }}&choe=UTF-8" style="width: 100px" />
                        <h6>Please scan above QR Code</h6>
                    </td>
                </tr>
            </table>
        </div>
    </main>
@endsection
