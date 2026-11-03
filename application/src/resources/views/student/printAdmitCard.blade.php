@extends('layouts.app')

@section('content')
    <style type="text/css">
        .hindifont {
            font-family: 'Noto Sans Devanagari', sans-serif;
        }
        @media print {

            body {
                background: transparent;
            }

            @page {
                margin: 30px;
                size: A4;
            }
        }
        @page {
            margin: 30px;
            size: A4;
        }

        table td,
        table th {
            font-size: 10px;
        }
        p{
            font-size: 10px;
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
                        <td colspan="3" class="text-center" style="border-left-style: hidden;border-top-style: hidden;">
                            <p></p>
                            <p><strong>ICMR-National Institute of Research in Tribal Health, Jabalpur - 482003</strong><br><strong>Admit Card</strong><br><strong>{{ $exam_detail->post }}</strong></p>
                        </td>
                        <td rowspan="2" width="110" class="text-center">
                            <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{ $formData->form_id . $formData->application_no }}&choe=UTF-8" style="width: 100px" />
                            <img src="https://barcode.tec-it.com/barcode.ashx?data={{ $formData->form_id . $formData->application_no }}" style="width: 100px" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Application No.</strong></p>
                        </td>
                        <td colspan="2">
                            <p><strong>{{ $exam_detail->application_no}}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Date of Birth</strong></p>
                        </td>
                        <td colspan="2">
                            <p><strong>{{ date('d/m/Y', strtotime($formData->dob)) }}</strong></p>
                        </td>
                        <td rowspan="4" width="110" class="text-center">
                            @if ($formData->profile_pic)
                                <img src="{{ $formData->imageUrl($formData->profile_pic) }}" style="width:100px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Name</strong></p>
                        </td>
                        <td colspan="2">
                            <p><strong>{{ $formData->firstname }} {{ $formData->middlename }} {{ $formData->lastname }}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>PwBD</strong></p>
                        </td>
                        <td colspan="2">
                            <p><strong>{{ $formData->pwd }}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Examination Centre</strong></p>
                        </td>
                        <td colspan="2">
                            <p><strong>{{ $exam_detail->exam_center}}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Exam Date</strong></p>
                        </td>
                        <td>
                            <p><strong>Reporting Time</strong></p>
                        </td>
                        <td>
                            <p><strong>Exam Time</strong></p>
                        </td>
                        <td rowspan="2" width="110" class="text-center">
                            @if ($formData->signature)
                                <img src="{{ $formData->imageUrl($formData->signature) }}" style="width:70px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2">
                            <p><strong>{{ explode(",",$exam_detail->exam_date_and_time)[0]}}</strong></p>
                        </td>
                        <td rowspan="2">
                            <p><strong>{{ $exam_detail->reporting_time . "-" .date("h:i A", strtotime("+30 minutes", strtotime($exam_detail->reporting_time)))}}</strong></p>
                        </td>
                        <td rowspan="2">
                            <p><strong>{{ explode(",",$exam_detail->exam_date_and_time)[1]}}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2" width="110" class="text-center">
                            <p><strong>Paste Recent Photo</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p><strong>Important Instructions: -</strong></p>
                            <p>
                                <strong>1. </strong>
                                <strong class="hindifont">उम्मीदवारों को प्रवेश पत्र की प्रति लानी होगी, और दिए गए स्थान पर एक पासपोर्ट फोटो चिपकानी होगी।</strong><strong> Candidates must bring printed copy of the admit card, and paste a recent passport size photograph in the space provided.</strong>
                            </p>
                            <p>
                                <strong>2. </strong>
                                <strong class="hindifont">अभ्यर्थियों को वैध पहचान प्रमाण की मूल प्रति लानी होगी। (पैन कार्ड, आधार कार्ड, मतदाता पहचान-पत्र, ड्राइविंग लाइसेंस, पासपोर्ट)</strong><strong> Candidates must bring a valid identity proof in original. (Pan Card, Aadhaar Card, Voter Id Card, Driving License, Passport)</strong>
                            </p>
                            <p>
                                <strong>3. </strong>
                                <strong class="hindifont">अभ्यर्थियों को 2 नवीनतम पासपोर्ट फोटो लाने होंगे।</strong><strong> Candidates must bring 2 latest passport size photographs.</strong>
                            </p>
                            <p>
                                <strong>4. </strong>
                                <strong class="hindifont">उम्मीदवारों को ऊपर बताई गई चीजों के अलावा कोई अन्य चीज नहीं लानी चाहिए।</strong><strong> Candidates must not bring any other thing apart from those mentioned above.</strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>
                                <strong class="hindifont">मूल फोटो पहचान प्रमाण और प्रिंट किये हुए प्रवेश-पत्र के बिना अभ्यर्थी को परीक्षा केंद्र के परिसर में प्रवेश करने की अनुमति नहीं दी जाएगी।</strong> 
                                <strong>IN ABSENCE OF ORIGINAL PHOTO ID PROOF, and printed ADMIT CARD, CANDIDATE WILL NOT BE ALLOWED TO ENTER IN THE EXAMINATION CENTRE PREMISES.</strong>
                            </p>
                            <p>
                                <strong class="hindifont">देर से, यानी प्रवेश-पत्र में उल्लिखित समय के बाद आने वाले अभ्यर्थी को किसी भी स्थिति में परीक्षा में बैठने की अनुमति नहीं दी जाएगी।</strong><strong> Candidate coming late i.e., after the time of reporting given on Admit Card will not be permitted to appear in the Examination in any condition.</strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="border-left-style: hidden;border-right-style: hidden;border-bottom-style: hidden;">
                            <p style="text-align: justify;" class="hindifont">
                                उपरोक्त पर हस्ताक्षर करके, मैं अभिस्‍वीकृति देता/देती हूं कि मुझे परीक्षा में सम्मिलित होने के लिए अनंतिम रूप से अनुमति प्रदान की गई है, और मैंने प्रवेश-पत्र के साथ संलग्न उम्मीदवार के लिए सामान्य निर्देशों (अनुलग्नक), आधिकारिक वेबसाइट और विज्ञापन में उल्लिखित निबंधनों और शर्तो को पढ़, समझ लिया है और उनका पालन करने के लिए सहमत हूं। मैं यह समझता/ समझती हूं कि इनका अनुपालन न करना या किसी प्रकार के उल्‍लंघन से मुझे परीक्षा के लिए अयोग्‍य ठहराया जा सकता है और आगे कानूनी परिणाम हो सकते हैं।
                            </p>
                            <p style="text-align: justify;">
                                By signing the above, I acknowledge that I have been provisionally permitted to appear for the Examination, and I have read, understood, and agreed to abide by all the General Instructions for Candidate (Annexure) attached with the Admit Card, the official website and the advertisement for the recruitment process. I understand that non-compliance or any violation may lead to disqualification from the examination and further legal consequences.
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <table style="border-style: hidden;width: 100%;">
                <tr>
                    <td>
                        <p class="hindifont">निरीक्षक की उपस्थिति में अभ्यर्थी के हस्ताक्षर</p>
                        <p>Signature of the applicant in the presence of invigilator</p>
                        <p><span class="hindifont">दिनांक</span> / Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/ 01 / 2024</p>                        
                    </td>
                    <td style="text-align: right;border-style: hidden;">
                        <p class="hindifont">निरीक्षक के हस्ताक्षर</p>
                        <p>Invigilator's signature</p>
                    </td>
                </tr>
                <tr>
                    <td class="text-center" colspan="2" style="border-style: hidden;">
                        <p class="hindifont"><strong>यह प्रवेश-पत्र एक नवीनतम पासपोर्ट फोटो ऊपर चिपका करके परीक्षा केंद्र में ही जमा करना होगा।</strong></p>
                        <strong><p>This admit card along with a latest passport size photo affixed above has to be submitted in the exam centre only.</p></strong>
                    </td>
                </tr>
            </table>
            <table style="width: 100%;page-break-before: always;">
                <tr>
                    <td class="text-center" style="border-style: hidden;">
                        <strong><p class="hindifont">अभ्यर्थी के लिए सामान्य निर्देश</p>
                        <p>General Instructions for Candidate</p></strong>
                    </td>
                </tr>
                <tr>
                    <td style="border-style: hidden;text-align: justify;">
                        <ol start="1">
                            <li>
                                <p class="hindifont">प्रवेश-पत्र का जारी किया जाना यह प्रमाणित नहीं करता है कि आपको परीक्षा में उपस्थित होने के लिए अर्ह पाया गया है। आपको दृढ़तापूर्वक यह परामर्श है कि परीक्षा में उपस्थित होने के पूर्व अपनी अर्हता की जांच कर लें।</p>
                                <p>The issue of Admit Card does not certify that you have been found eligible to appear at the examination. You are strongly advised to check your eligibility before appearing in the examination.</p>
                            </li>
                        </ol>
                        <ol start="2">
                            <li>
                                <p class="hindifont">मात्र यह तथ्य कि आपको प्रवेश-पत्र जारी किया गया है, इसका तात्पर्य यह नहीं है कि आपकी अभ्यर्थिता को आईसीएमआर-एनआईआरटीएच द्वारा अंतिम रूप से अविवाद्य कर दिया गया है अथवा यह कि परीक्षा के लिए अपने आवेदन-पत्र में आपके द्वारा जो प्रविष्टियां की गईं, उन्हें आईसीएमआर-एनआईआरटीएच द्वारा सत्य एवं सही स्वीकार कर लिया गया है।</p>
                                <p>The mere fact that you have been issued an Admit Card does not mean that your candidature has been finally cleared as indisputable by ICMR-NIRTH or that the entries made by you in your application for the examination has been accepted as true and correct by ICMR-NIRTH.</p>
                            </li>
                        </ol>
                        <ol start="3">
                            <li>
                                <p class="hindifont">कृपया नोट करें कि आईसीएमआर-एनआईआरटीएच अर्हताप्राप्त अभ्यर्थियों का सत्यापन, यानी मूल दस्तावेजों के संबंध में आयु, शैक्षणिक योग्यताओं और श्रेणी का सत्यापन ऑनलाइन परीक्षा के परिणाम के आधार पर योग्यता प्राप्त करने वाले अभ्यर्थियों के दस्तावेज सत्यापन के समय ही करेगा। इसलिए आप कृपया यह नोट करें कि यदि किसी अवस्था में आप विज्ञापन में दिए अनुसार अर्हता संबंधी मापदंड पूरा नहीं करते हैं या आवेदन में आपके द्वारा दी गई जानकारी सही नहीं है, तो आपकी अभ्यर्थिता निरस्त की जा सकेगी।</p>
                                <p>Please note that ICMR-NIRTH will do the verification of qualified candidates in respect of original documents i.e. age, educational qualifications and category etc. only at the time of document verification of the candidates who qualify on the basis of the result of the online examination. Therefore, you please note that if in any case you do not fulfil the eligibility criteria as given in the advertisement or the information given by you in the application is not correct, your candidature is liable to be cancelled.</p>
                            </li>
                        </ol>
                        <ol start="4">
                            <li>
                                <p class="hindifont">यदि साथी-लेखक (स्क्राइब) की सुविधा अशक्तता (पीडब्लूडी) वाले उम्मीदवार ने स्वयं उपलब्ध की है, तो अभ्यर्थी को परीक्षा केंद्र में वेबसाइट में उल्लेख किए अनुसार अनुलग्नक प्रस्तुत करना है।</p>
                                <p>If the PwD candidate has availed the facility of a scribe, then the candidate has to submit the enclosures as mentioned on the website at the examination centre.</p>
                            </li>
                        </ol>
                        <ol start="5">
                            <li>
                                <p class="hindifont">परीक्षा केंद्र के स्थान को परिवर्तित करने के अनुरोध को स्वीकार नहीं किया जाएगा।</p>
                                <p>Request for change of Examination Centre venue will not be entertained.</p>
                            </li>
                        </ol>
                        <ol start="6">
                            <li>
                                <p class="hindifont">अभ्यर्थी परीक्षा के लिए शालीन और उपयुक्त तरीके से वेशभूषा धारण करें।</p>
                                <p>Dress modestly and appropriately for the examination.</p>
                            </li>
                        </ol>
                        <ol start="7">
                            <li>
                                <p class="hindifont">अभ्यर्थियों की परीक्षा हॉल में प्रवेश करने के पूर्व फिजीकल फ्रिस्किंग और पहचान का सत्यापन किया जा सकता है। अभ्यर्थी सुरक्षा उपायों के हिस्से के तौर पर इस प्रक्रिया में सहयोग करेंगे।</p>
                                <p>You may be subject to physical frisking and identity verification before entering the examination hall, cooperate with the process as part of security measures.</p>
                            </li>
                        </ol>
                        <ol start="8">
                            <li>
                                <p class="hindifont">अनुदेशों का पालन करने में विफलता, व्यवधानकारी व्यवहार, या परीक्षा संबंधी किन्हीं नियमों का उल्लंघन के परिणामस्वरूप तत्काल अयोग्य घोषित कर दिया जाएगा।</p>
                                <p>Failure to comply with instructions, disruptive behaviour, or violation of any examination rules will result in immediate disqualification.</p>
                            </li>
                        </ol>
                        <ol start="9">
                            <li>
                                <p class="hindifont">अभ्यर्थी प्रवेश-पत्र की प्रिण्टेड कॉपी और मूल रूप में कोई एक फोटो पहचान प्रमाण भी लाएंगे। अभ्यर्थी फोटो पहचान प्रमाण की एक स्व-प्रमाणित प्रति भी प्रस्तुत करने के लिए लाएंगे। अभ्यर्थी पहचान प्रमाण की फोटोकॉपी के ऊपरी हिस्से में लॉग-इन यूजर आईडी अवश्य लिखें।</p>
                                <p>Candidate should also bring printed copy of Admit Card, and any one Photo ID Proof in original. Take one a self-attested photocopy of the Photo ID proof for submission. Write your user id on the same.</p>
                            </li>
                        </ol>
                        <ol start="10">
                            <li>
                                <p class="hindifont">फोटो पहचान के प्रमाण में इनमें से कोई एक शामिल हो सकता है : 1) <strong class="hindifont">पैन कार्ड 2) आधार कार्ड 3) मतदाता पहचान-पत्र 4) ड्राइविंग लाइसेंस 5) पासपोर्ट ; मूल फोटो पहचान प्रमाण और प्रवेश-पत्र के बिना अभ्यर्थी को परीक्षा केंद्र के परिसर में प्रवेश करने की अनुमति नहीं दी जाएगी।</strong></p>
                                <p>Photo Id Proof may include any one of the following: <strong>1) Pan Card 2) Aadhaar Card 3) Voter Id Card 4) Driving License 5) Passport. IN ABSENCE OF ORIGINAL PHOTO ID PROOF, and ADMIT CARD, CANDIDATE WILL NOT BE ALLOWED TO ENTER IN THE EXAMINATION CENTRE PREMISES.</strong></p>
                            </li>
                        </ol>
                        <ol start="11">
                            <li>
                                <p class="hindifont">अभ्यर्थी प्रवेश-पत्र में दर्शाए रिपोर्टिंग समय के अनुसार नियत समय पर रिपोर्ट करें।</p>
                                <p>Candidate should report timely as indicated in Admit Card.</p>
                            </li>
                        </ol>
                    </td>
                </tr>
                <tr style="page-break-before: always;">
                    <td style="border-style: hidden;text-align: justify;">
                        <ol start="12">
                            <li>
                                <p class="hindifont">देर से, यानी प्रवेश-पत्र में उल्लिखित समय के बाद आने वाले अभ्यर्थी को किसी भी स्थिति में परीक्षा में बैठने की अनुमति नहीं दी जाएगी।</p>
                                <p>Candidate coming late i.e., after the time of reporting given on Admit Card will not be permitted to appear in the Examination in any condition.</p>
                            </li>
                        </ol>
                        <ol start="13">
                            <li>
                                <p class="hindifont">अभ्यर्थी परीक्षा-केंद्र में सुरक्षित दूरी बनाए रखने का पालन करें। किसी परिचारक/मित्र/रिश्तेदार की परीक्षा स्थल में प्रवेश की सख्ती से मनाही है। परीक्षा स्थल के अंदर या बाहर किसी प्रकार की ग्रुपिंग की अनुमति नहीं है।</p>
                                <p>Candidates should follow safe distancing at the Examination Centre. The attendant/ friend/ relative is strictly prohibited from entering the Examination venue. No grouping allowed, inside or outside area of the Examination venue.</p>
                            </li>
                        </ol>
                        <ol start="14">
                            <li>
                                <p class="hindifont">अभ्यर्थी को परीक्षा हॉल में किसी प्रकार का कोई पेपर, पुस्तक, पेन पेन्सिल, स्टेशनरी आदि ले जाने की अनुमति नहीं है। परीक्षा हॉल के अंदर केल्कुलेटर्स, स्लाइड रूल्स, मोबाइल फोन, वॉचेज/स्मार्ट वॉचेज या ऐसे कोई डिवाइसेज और कोई अन्य अध्ययन/संदर्भ सामग्री के उपयोग की अनुमति नहीं है। कोई अभ्यर्थी ऐसी अनधिकृत सामग्री का उपयोग करते या उसके पास पाए जाने पर या नकल करने में लिप्त होने या अनुचित साधनों का प्रयोग करते पाए जाने पर सरसरी तौर पर अयोग्य किए जाने योग्य है।</p>
                                <p>Candidate is not allowed to carry any Papers, Books, Notes etc. in the examination Hall. Use of Calculators, Slide rules, Mobile, Calculator, Watches/Smart Watches or any such devices and any other study/reference material is NOT ALLOWED inside the examination hall. Any Candidate found using, or in possession of such unauthorized material or indulging in copying or adopting unfair means is liable to be summarily disqualified.</p>
                            </li>
                        </ol>
                        <ol start="15">
                            <li>
                                <p class="hindifont">मोबाइल फोन्स/ पेजर्स/ केल्कुलेटर्स/ स्केनिंग डिवाइसेज/ कोई अन्य इलेक्ट्रॉनिक गेजेट्स/ स्केल्स/ एल्गोरिथम टेबिल्स/ पर्स/ आभूषण इत्यादि की परीक्षा हॉल के अंदर सख्ती से मनाही है। परीक्षा केंद्र इसकी सुरक्षा/नुकसान के लिए जिम्मेदार नहीं होगा। केंद्र पर इन सामानों की कोई भण्डारण व्यवस्था नहीं है।</p>
                                <p>Mobiles phones/ Pagers/ Calculators/ Scanning Devices/ Any other electronic gadgets/ Scales/ Algorithm Tables/ Purse/ Jewellery etc. are strictly prohibited inside the examination hall. Examination Centre will not be responsible for its safety/ loss. There is no storage arrangement for these items at the Centre.</p>
                            </li>
                        </ol>
                        <ol start="16">
                            <li>
                                <p class="hindifont">परीक्षा में उपस्थित हो रहे अभ्यर्थी यह सुनिश्चित कर लें कि वे परीक्षा में प्रवेश की अर्हता संबंधी शर्तें पूरी करते हैं। परीक्षा की सभी अवस्थाओं में परीक्षा में प्रवेश जिसके लिए उसे प्रवेश दिया गया है वह विशुद्धत: अनंतिम होगा, उसके अर्हता संबंधी शर्तों को संतुष्ट करने के अध्यधीन होगा। यदि सत्यापन की किसी अवस्था में, परीक्षा के पहले या बाद में, यह पाया जाता है कि अभ्यर्थी अर्हता की शर्तों में से किसी शर्त को पूरा नहीं करता है, तो बिना किसी नोटिस या आगे संदर्भित किए परीक्षा के लिए उसकी अभ्यर्थिता निरस्त हो जाएगी। इसलिए अभ्यर्थी यह अवश्य सुनिश्चित कर लें कि वे अर्हता संबंधी शर्तों को पूरा करते हैं।</p>
                                <p>The Candidate appearing for the Examination should ensure that he/she fulfils the eligibility conditions for admission to the examination. The admission at all stages of the Examination for which he/she is admitted viz., Examination will be purely provisional, subject to his/her satisfying the eligibility conditions. If on verification at any time before or after the Examination, it is found that the candidate does not fulfil any of the eligibility conditions, his/her candidature for the examination shall stand cancelled without any notice or further reference. Hence the candidate is provisionally permitted to appear for the Examination.</p>
                            </li>
                        </ol>
                        <ol start="17">
                            <li>
                                <p class="hindifont">परीक्षा के लिए प्रवेश-पत्र का जारी होने से अभ्यर्थिता की स्वीकार्यता का कोई अधिकार नहीं दिया जाता और इसका अर्थ अर्हता संबंधी मापदंड को पूरा करने की अभिस्वीकृति के रूप में नहीं लिया जाना चाहिए।</p>
                                <p>Issue of Admit Card for the Examination does not confer any right of Acceptance of candidature and should not be construed as an acknowledgement of fulfilling the eligibility criteria.</p>
                            </li>
                        </ol>
                        <ol start="18">
                            <li>
                                <p class="hindifont">परीक्षा में सम्मिलित होने के लिए यात्रा संबंधी एवं अन्य खर्चें स्वयं अभ्यर्थी द्वारा वहन किए जाएंगे।</p>
                                <p>Travelling &amp; other expenses incurred for attending the Examination will be borne by the candidate himself/herself.</p>
                            </li>
                        </ol>
                        <ol start="19">
                            <li>
                                <p class="hindifont">प्रभावित करने का कोई प्रयास अभ्यर्थी को अयोग्यता की ओर अग्रसर करेगा। अभ्यर्थी द्वारा किसी भी रूप में पक्ष-प्रचार उसकी अयोग्यता को आवश्यक बना देगा।</p>
                                <p>Any attempt to influence will lead to disqualification of candidate. Canvassing in any form by the candidate would entail his/her disqualification.</p>
                            </li>
                        </ol>
                        <ol start="20">
                            <li>
                                <p class="hindifont">अभ्यर्थी परीक्षा केंद्र के प्रवेश पर प्रदर्शित बैठक-व्यवस्था में दिखाए अनुसार अपना परीक्षा हॉल आवश्यक रूप से प्राप्त करें।</p>
                                <p>Find your Examination Hall as shown in the seating plan displayed at the entrance of the Examination center.</p>
                            </li>
                        </ol>
                        <ol start="21">
                            <li>
                                <p class="hindifont">अभ्यर्थी आवश्यक रूप से यह सुनिश्चित कर लें कि परीक्षा हॉल में प्रवेश के पूर्व उन्होंने उपस्थिति पत्रक में हस्ताक्षर कर दिए हैं। निरीक्षक/पर्यवेक्षक अभ्यर्थियों को उनकी सीट दिखाएंगे।</p>
                                <p>Please ensure you that you have signed on the attendance sheet before entering in Examination Hall. Invigilator/ Supervisor will show you where to sit.</p>
                            </li>
                        </ol>
                        <ol start="22">
                            <li>
                                <p class="hindifont">उपस्थिति पत्रक और अन्य दस्तावेजों में अभ्यर्थी के हस्ताक्षर आवेदन प्रक्रिया के दौरान प्रयुक्त हस्ताक्षर से मेल खाने चाहिए। मेल न खाने वाले हस्ताक्षरों के कारण सत्यापन प्रक्रियाएं की जा सकती हैं अथवा परीक्षा में बैठने को रद्द किया जा सकता है।</p>
                                <p>Your signature on the attendance sheet and other documents should match the signature used during the application process. Mismatched signatures may lead to verification procedures or rejection to appear for examination.</p>
                            </li>
                        </ol>
                        <ol start="23">
                            <li>
                                <p class="hindifont">परीक्षा की पूरी समयावधि के दौरान अभ्यर्थी निरीक्षक की अनुमति के बिना अपनी सीट न छोड़ें। परीक्षा हॉल के अंदर अभ्यर्थी अन्य अभ्यर्थियों से किसी रूप में संवाद नहीं करेंगे।</p>
                                <p>During the examination, do not leave your seat without permission from the invigilator. Do not communicate with other candidates in any form.</p>
                            </li>
                        </ol>
                    </td>
                </tr>
                <tr style="page-break-before: always;">
                    <td style="border-style: hidden;text-align: justify;">
                        <ol start="24">
                            <li>
                                <p class="hindifont">परीक्षा में सभी प्रश्न बहु-विकल्पी प्रश्न हैं। गलत उत्तरों के लिए निगेटिव मार्किंग है। किसी प्रश्न का उत्तर न देने पर न कोई अंक दिया या काटा नहीं जाएगा। अत: अभ्यर्थी को सलाह दी जाती है कि प्रश्नों के उत्तर देते समय इसे ध्यान में रखें।</p>
                                <p>All questions in the exams are Multiple-Choice Questions. There is negative marking for wrong answers. No mark will be awarded or deducted for not attempting a question. Candidate is, therefore, advised to keep this in mind while answering the questions.</p>
                            </li>
                        </ol>
                        <ol start="25">
                            <li>
                                <p class="hindifont">दिए गए विकल्पों में से एक बार उत्तर का विकल्प चयन कर अभ्यर्थियों द्वारा प्रस्तुत कर दिए जाने पर बाद में उसे किसी भी परिस्थिति में बदला नहीं जा सकता है।</p>
                                <p>Answer option from the given four options once selected and submitted by the candidates cannot be changed later under any circumstances.</p>
                            </li>
                        </ol>
                        <ol start="26">
                            <li>
                                <p class="hindifont">अभ्यर्थियों को क्रम में अगले प्रश्न पर जाने के लिए प्रश्न का उत्तर देना है या प्रश्न को छोड़ना है। एक बार जिस प्रश्न को छोड़ दिया जाएगा, वह अभ्यर्थी को पुन: नहीं दिखाया जा सकता।</p>
                                <p>Candidates have to answer the question or skip the question to go to next question in the sequence. Question once skipped cannot be shown to candidates again.</p>
                            </li>
                        </ol>
                        <ol start="27">
                            <li>
                                <p class="hindifont">परीक्षा प्रारंभ हो जाने के बाद, किसी भी अभ्यर्थी को परीक्षा का समय पूरा होने के पहले परीक्षा हॉल से जाने की अनुमति नहीं दी जाएगी।</p>
                                <p>After the commencement of the Examination, no candidate will be allowed to leave the examination hall before completion of the time of the Examination.</p>
                            </li>
                        </ol>
                        <ol start="28">
                            <li>
                                <p class="hindifont">अभ्यर्थी को सलाह दी जाती है कि पर्यवेक्षक/निरीक्षक द्वारा दिए गए अनुदेशों का सावधानीपूर्वक पालन करें, यदि नहीं, तो अभ्यर्थी को परीक्षा केंद्र के प्रमुख द्वारा निर्णीत किए अनुसार दंड दिया जाएगा। कोई अभ्यर्थी फंक्शनरीज के कार्य में अवरोध पैदा करता है या किसी अनुपयुक्त व्यवहार का दोषी है, उसे तुरंत प्रभाव से परीक्षा से वंचित कर दिया जाएगा।</p>
                                <p>Candidate are advised to follow the instruction carefully given by the Supervisor / Invigilator, if not the candidate will be liable to such punishment as decides by the Examination Center Head. The Candidate creating any obstruction in the work of functionaries or guilty of any inappropriate behaviour will be debarred from the Examination with immediate effect.</p>
                            </li>
                        </ol>
                        <ol start="29">
                            <li>
                                <p class="hindifont">यह प्रवेश-पत्र अभ्यर्थी के आवेदन के सत्यापन के अध्यधीन है और उपर्युक्त विज्ञापन के लिए उसके आवेदन की प्रस्तुति के संदर्भ में अभ्यर्थी द्वारा प्रस्तुत की गई जानकारी के आधार पर अनंतिम रूप से जारी किया जा रहा है। यदि किसी समय अवस्था पर, किसी भी अर्हता संबंधी मापदंड में कोई भी विसंगतियां पाई जाती हैं, अभ्यर्थी की अभ्यर्थिता निरस्त कर दी जाएगी।</p>
                                <p>This admit card is subject to verification of your application and is being provisionally issued based on the information submitted by the candidate w.r.t his/her submission of application form for the above recruitment. If at any stage of time, any discrepancies in any of the eligibility criteria are found, the candidature of the candidate will be cancelled.</p>
                            </li>
                        </ol>
                        <ol start="30">
                            <li>
                                <p class="hindifont">अभ्यर्थियों द्वारा परीक्षा हॉल में धूम्रपान करना और चाय/रिफ्रेशमेंट लेना/गम/माउथ फ्रेशनर/मिंट चबाना आदि सख्ती से वर्जित है।</p>
                                <p>Smoking and taking tea/ refreshment/ chewing gum/ mouth freshener/ mint, etc., by the candidates in the Examination Hall is strictly prohibited.</p>
                            </li>
                        </ol>
                        <ol start="31">
                            <li>
                                <p class="hindifont">परीक्षा के इण्टरफेस से परिचित कराने के लिए वास्तविक परीक्षा प्रारंभ होने के 5 मिनट पूर्व अभ्यर्थी मॉक टेस्ट के लिए प्रयास करेंगे। मॉक टेस्ट पूरा होने के बाद अभ्यर्थी निरीक्षक/पर्यवेक्षक के अनुदेशों के अनुसार वास्तविक परीक्षा प्रारंभ कर सकते हैं।</p>
                                <p>Candidate shall attend the mock test of 5 minutes before the starting of actual Examination. To acquaint with the interface of the Examination. After mock completion of the mock test candidate can start the actual examination on instructions from invigilator/ supervisor.</p>
                            </li>
                        </ol>
                        <ol start="32">
                            <li>
                                <p class="hindifont">अभ्यर्थी उपलब्ध कराई गई रफ शीट और पेन का प्रयोग रफ कार्य के लिए कर सकते हैं। अभ्यर्थी रफ शीट का कोई हिस्सा न फाडेंगे और न हटाएंगे। अभ्यर्थी रफ शीट पर अपना यूजर आईडी लिखेंगे और परीक्षा समाप्ति के बाद उसी स्थान पर रफ शीट और पेन रखेंगे।</p>
                                <p>Use the provided rough sheet and the pen for any rough work. Do not tear or remove any part of the rough sheet, write your user id on the sheet. Keep the rough sheet and the pen on the same place after completion of your Examination.</p>
                            </li>
                        </ol>
                        <ol start="33">
                            <li>
                                <p class="hindifont">अभ्यर्थी परीक्षा की पूरी समयावधि के दौरान अपने डेस्क पर प्रवेश-पत्र और पहचान-पत्र प्रदर्शित करेंगे। निरीक्षक को उनके कहने पर प्रवेश-पत्र दिखाया जाए।</p>
                                <p>Display your Hall Ticket and identity card on your desk throughout the examination. The Hall Ticket must be shown to the invigilator on request</p>
                            </li>
                        </ol>
                        <ol start="34">
                            <li>
                                <p class="hindifont">अभ्यर्थी परीक्षा प्रारंभ होने के पूर्व पर्यवेक्षक द्वारा बताए गए विनिर्दिष्ट नियमों और मार्गदर्शी सिद्धांतों से स्वयं को परिचित कर लें।</p>
                                <p>Familiarize yourself with the specific examination rules and guidelines provided by the invigilator before the Examination starts.</p>
                            </li>
                        </ol>
                        <ol start="35">
                            <li>
                                <p class="hindifont">अभ्यर्थी परीक्षा के लिए दिए गए अनुदेशों को ध्यानपूर्वक पढ़ लें।</p>
                                <p>Read the instruction for the Examination carefully.</p>
                            </li>
                        </ol>
                        <ol start="36">
                            <li>
                                <p class="hindifont">अभ्यर्थी उत्तर देने के पहले प्रत्येक प्रश्न को ध्यान से पढ़ लें। अभ्यर्थी यह सुनिश्चित कर लें कि उत्तर प्रस्तुत करने के पहले उन्होंने अपेक्षित बातों को समझ लिया है।</p>
                                <p>Read each question carefully before answering. Ensure that you understand the requirements before submitting the response.</p>
                            </li>
                        </ol>
                    </td>
                </tr>
                <tr style="page-break-before: always;">
                    <td style="border-style: hidden;text-align: justify;">
                        <ol start="37">
                            <li>
                                <p class="hindifont">कृपया नोट करें कि सभी अभ्यर्थी प्रत्येक कम्प्यूटर और परीक्षा हॉल में संस्थापित कैमरों के माध्यम से सख्त पर्यवेक्षण और निगरानी में रहेंगे, किसी भी अभ्यर्थी से कोई संदिग्ध गतिविधि देखे जाने की स्थिति में उस अभ्यर्थी की परीक्षा रोग दी जाएगी और उसकी संदिग्ध गतिविधि के कारण उसे अयोग्य कर दिया जाएगा।</p>
                                <p>Please note that all the candidates will be under strict supervision and surveillance through the cameras installed on each computer and in the examination hall, in case any suspicious activity observed from any of the candidate his/ her examination shall be stopped and his/her suspicious activities shall lead to disqualification.</p>
                            </li>
                        </ol>
                        <ol start="38">
                            <li>
                                <p class="hindifont">परिणाम प्रोसेस करते समय, सम्बद्ध प्राधिकारी सभी कैमरों की फुटेज और आपके कम्प्यूटर पर संस्थापित कैमरे द्वारा लिए गए स्नेप शॉट्स को सत्यापित करेंगे और यदि वे कोई संदिग्ध या अनावश्यक और पुनरावर्तक संचलन देखते हैं तो वे परिणाम को सुरक्षित रख सकते हैं या परिणामों की घोषणा या अभ्यर्थी के चयन की अवस्था में ऐसे अभ्यर्थियों को रद्द कर सकते हैं।</p>
                                <p>While processing your result, the concerned authorities shall verify the footage of all the cameras and the snap shots taken by the camera installed on your computer and if they observe any suspicious or unnecessary and frequent movements then they may reserve your result or reject such candidates at the state of result declaration or selection of the candidate.</p>
                            </li>
                        </ol>
                        <ol start="39">
                            <li>
                                <p class="hindifont">निष्पक्ष और सुरक्षित परीक्षा का वातावरण सुनिश्चित करने के लिए परीक्षा केंद्र द्वारा कार्यान्वित किए गए सभी सुरक्षा उपायों और प्रोटोकॉल्स का पालन किया जाए।</p>
                                <p>Follow all security measures and protocols implemented by the examination center to ensure a fair and secure examination environment.</p>
                            </li>
                        </ol>
                        <ol start="40">
                            <li>
                                <p class="hindifont">अभ्यर्थी को परीक्षा के लिए आवंटित पूरे समय का उपयोग करना चाहिए। परीक्षा समय पूरा होने पर स्वत: बंद हो जाएगी, भले ही अभ्यर्थी द्वारा उसे पूर्ण नहीं किया गया हो।</p>
                                <p>Utilize the entire allotted time for the examination. The examination shall be closed automatically on completion of the time, even if it is not completed by the candidate.</p>
                            </li>
                        </ol>
                        <ol start="41">
                            <li>
                                <p class="hindifont">अभ्यर्थी निरीक्षक के साथ सम्मानपूर्वक व्यवहार करें और उनके अनुदेशों का पालन करें। किसी प्रकार का कदाचार, जिसमें बाधा उत्पन्न करना या अनुपयुक्त व्यवहार में संलिप्त होना शामिल है, उसके कारण उसे अयोग्य कर दिया जाएगा।</p>
                                <p>Behave respectfully with the invigilators and follow their instructions. Any form of misconduct, including creating disturbances or engaging in inappropriate behaviour, will lead to disqualification.</p>
                            </li>
                        </ol>
                        <ol start="42">
                            <li>
                                <p class="hindifont">अनुचित साधनों का प्रयोग, जैसे अनधिकृत स्रोतों से नकल करना, नोट्स लाना, या इलेक्ट्रॉनिक डिवाइसेज का प्रयोग करना, इसे सख्ती से प्रतिबंधित किया जाता है और इसके परिणामस्वरूप तुरंत अयोग्य कर दिया जाएगा।</p>
                                <p>Use of unfair means, such as copying from unauthorized sources, carrying notes, or using electronic devices, is strictly prohibited and will result in immediate disqualification.</p>
                            </li>
                        </ol>
                        <ol start="43">
                            <li>
                                <p class="hindifont">अथ्यर्थी किसी अन्य अभ्यर्थी का प्रतिरूप धारण करने का प्रयास न करे अथवा किसी अन्य को अपनी ओर से परीक्षा में उपस्थित न होने दे। इस प्रकार के कृत्य गैर-कानूनी हैं और इसके लिए कड़ी कानूनी कार्रवाई की जाएगी।</p>
                                <p>Do not attempt to impersonate another candidate or allow anyone else to take the examination on your behalf. Such actions are illegal and will lead to strict legal action.</p>
                            </li>
                        </ol>
                        <ol start="44">
                            <li>
                                <p class="hindifont">किसी प्रकार के अनाचार में संलिप्त होना, जैसे कम्प्यूटर या परीक्षा सॉफ्टवेयर में गड़बड़ी करने के परिणामस्वरूप अयोग्य कर दिया जाएगा और कानूनी कार्रवाई की जाएगी।</p>
                                <p>Engaging in any form of malpractice, such as tampering with computer or examination software, will result in disqualification and legal consequences.</p>
                            </li>
                        </ol>
                        <ol start="45">
                            <li>
                                <p class="hindifont">किन्हीं अपरिहार्य तकनीकी समस्याओं या परीक्षा के दौरान व्यवधान आने की स्थिति में, जिसका असर परीक्षा संचालन पर हो, अभ्यर्थियों को उसी दिन या किसी अन्य दिन निर्धारित किए गए अगले समय पर, जैसा परीक्षा प्राधिकारियों द्वारा निश्चित किया जाए, परीक्षा में सम्मिलित होना होगा।</p>
                                <p>In the event of any unavoidable technical issues or disruptions during the examination that impact the conduct of the examination, candidates may need to appear for the examination on the next scheduled time on the same day or any other day as determined by the examination authorities.</p>
                            </li>
                        </ol>
                        <ol start="46">
                            <li>
                                <p class="hindifont">यदि समस्या अस्थायी है और तकनीकी समस्या का तुरंत समाधान कर लिया जाता है, अभ्यर्थी उसी बिंदु से परीक्षा प्रारंभ कर सकते हैं, जहां उन्होंने तकनीकी समस्या/विद्युत प्रवाह बंद होने के कारण परीक्षा छोड़ी थी, अभ्यर्थी को इस प्रक्रिया में कोई समय, प्रयास या अंक नहीं गंवाना पड़ेंगे। सभी प्रयास किए गए प्रश्न प्रयास किए हुए दिखाई देंगे और अभ्यर्थी अगले प्रश्नों के उत्तर देना जारी रख सकेंगे।</p>
                                <p>In case of the issue is temporary and technical issue resolves immediately, candidates can start examination from the point where they left the Examination due to technical issue/ power failure, candidate will not lose a second in the process. All the attempted questions will be seen attempted and candidates can continue attempting the next questions.</p>
                            </li>
                        </ol>
                        <ol start="47">
                            <li>
                                <p class="hindifont">अभ्यर्थी परीक्षा हो जाने के बाद भी प्रवेश-पत्र को सुरक्षित रखेंगे, क्योंकि चयन प्रक्रिया के अगले चरणों में इसकी आवश्यकता पड़ सकती है।</p>
                                <p>Preserve the Hall Ticket even after the examination, as it may be required for further stages of the selection process.</p>
                            </li>
                        </ol>
                        <ol start="48">
                            <li>
                                <p class="hindifont">परिणामों की घोषणा की तारीख और अन्य महत्वपूर्ण अद्यतन जानकारियां परीक्षा की आधिकारिक वेबसाइट के माध्यम से संप्रेषित की जाएंगी।</p>
                                <p>The result declaration date and other important updates will be communicated through the official website of the examination.</p>
                            </li>
                        </ol>
                    </td>
                </tr>
            </table>
        </div>
    </main>

@endsection