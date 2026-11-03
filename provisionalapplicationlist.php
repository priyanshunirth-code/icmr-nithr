<?php
session_start();
include("language.php");
?>
<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Provisional List</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-theme.css" rel="stylesheet">
    <link href="assets/css/iconmoon.css" rel="stylesheet">
    <link href="assets/css/chosen.css" rel="stylesheet">
    <link href="assets/css/jquery.mobile-menu.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="cs-smartstudy-plugin.css" rel="stylesheet">
    <link href="assets/css/color.css" rel="stylesheet">
    <link href="assets/css/widget.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <!-- <link href="assets/css/bootstrap-rtl.css" rel="stylesheet"> Uncomment it if needed! -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="assets/scripts/jquery.js"></script>
    <script src="assets/scripts/modernizr.js"></script>
    <script src="assets/scripts/bootstrap.min.js"></script>
    <style>
        body, .main-section p, .mce-content-body p {
             color: #000 !important; 
        }
    </style>
</head>

<body class="wp-smartstudy">
    <div class="wrapper">

        <!-- Header Start -->
        <?php include("header.php"); ?>

        <div style="border-bottom:1px solid #f4f4f4;" class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="cs-breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li>Provisional Application List</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Start -->
        <div class="main-section">
            <div class="page-section">
                <div class="container">
                    <div class="row">

                        <div class="section-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-section-title text-center">
                                        <!--<h4>Advertisement. No. NIRTH/Tech/01/2023 Dated 10.07.2023</h4>-->
                                        <h4>आईसीएमआर-एनआईआरटीएच, जबलपुर (म.प्र.) में तकनीकी संवर्ग के पदों को भरने के लिए
कम्‍प्‍यूटर आधारित टेस्‍ट (सी.बी.टी.) में सम्मिलित होने हेतु अर्हताप्राप्‍त एवं गैर-अर्हताप्राप्‍त

अभ्‍यर्थियों की
अनंतिम (अस्‍थायी) सूची</h4>
                                        <h4>PROVISIONAL LIST OF ELIGIBLE AND NOT-ELIGIBLE CANDIDATES FOR
APPEARING IN THE COPUTER BASED TEST (CBT) FOR FILLING UP OF TECHNICAL

CADRE POSTS IN THE ICMR-NIRTH JABALPUR (M.P.)</h4>
                                    </div>
                                    <div class="cs-section-title text-left">
<p>
    आईसीएमआर-एनआईआरटीएच, जबलपुर के विज्ञापन सं. एनआईआरटीएच/तक./01/2023 दिनांकित
10.07.2023 तथा पदों की प्रत्‍येक श्रेणी के अंतर्गत प्राप्‍त आवेदनों की संख्‍या के बारे में अनुवर्ती सूचना
(जेबीपी/एनआईआरटीएच/ऐस्‍टे/अप्‍वायंटमेंट/1233 दिनांक‍ित 18.09.2023), के संदर्भ में, आईसीएमआर-
एनआईआरटीएच, जबलपुर (म.प्र.) के तकनीकी संवर्ग के विभिन्‍न पदों को भरने के लिए अर्हताप्राप्‍त एवं गैर-
अर्हताप्राप्‍त पाए गए अभ्‍यर्थियों की अनंतिम (अस्‍थायी) सूची एतद् द्वारा अपलोड की जाती है।अभ्‍यर्थियों की अनंतिम (अस्‍थायी) सूची प्रत्‍येक पद के सामने दी गई लिंक से डाउनलोड की जा सकती है। 
</p>
<p>
    With reference to the advertisement No. NIRTH/Tech/01/2023 dated 10.07.2023 and
subsequent information on the number of application received under each category of the
post (JBP/NIRTH/Estt/appointment/1233 dated 18.09.2023), provisional list of candidates
found to be Eligible and Not-Eligible for CBT for filling up of the various Technical Cadre
Posts of ICMR-NIRTH, Jabalpur are hereby uploaded. The provisional list of candidates can be downloaded from the links given against each post (Annexure A to J).
</p>
                                        <!--<p class="text-center">
                                            कम्‍प्‍यूटर आधारित टेस्‍ट (सी.बी.टी.) का पाठ्यक्रम<br>
                                            SYLLABUS FOR COMPUTER BASED TEST (C.B.T.)<br>
                                            <a href="https://nirth.res.in/application/syllabus/Syllabus.pdf" target="_blank" class="cs-btn small cs-bgcolor">Download Syllabus</a>
                                        </p>-->
                                    </div>

                                </div>
                                <hr>
                                <div class="cs-shortcode-table" id="candidatelist">
                                    <h2>Technical Assistant</h2>
                                    <table class="table table-hover align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th width="5%">
                                                    S.No
                                                </th>
                                                <th width="60%">
                                                    Classification &amp; discipline of the Post
                                                </th>
                                                <th>
                                                    ELIGIBLE AND NOT-ELIGIBLE CANDIDATES
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>

                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Group-B 
                                                    (Technical)
                                                    (Biological
                                                    Sciences)
                                                </td>
                                                <td>
                                                    <a href="https://nirth.res.in/application/list/Annexure-A - TA (Biological Sciences).pdf" target="_blank" class="cs-btn small cs-bgcolor">Annexure - A</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    Group-B 
                                                    (Technical)
                                                    (Social
                                                    Sciences)
                                                </td>
                                                <td>
                                                    <a href="https://nirth.res.in/application/list/Annexure-B - TA (Social Sciences).pdf" target="_blank" class="cs-btn small cs-bgcolor">Annexure - B</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3
                                                </td>
                                                <td>
                                                    Group-B 
                                                    (Technical) 
                                                    (Computer
                                                    Science/Information 
                                                    Technology)
                                                </td>
                                                <td>
                                                    <a href="https://nirth.res.in/application/list/Annexure-C - TA (Computer Science & Information Technology).pdf" target="_blank" class="cs-btn small cs-bgcolor">Annexure - C</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4
                                                </td>
                                                <td>
                                                    Group-B 
                                                    (Technical)
                                                    (Electronics 
                                                    &amp;
                                                    Communication 
                                                    Engineering)
                                                </td>
                                                <td>
                                                    <a href="https://nirth.res.in/application/list/Annexure-D - TA (Electronics & Communication Engineering).pdf" target="_blank" class="cs-btn small cs-bgcolor">Annexure - D</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5
                                                </td>
                                                <td>
                                                    Group-B 
                                                    (Technical)
                                                    (Electrical
                                                    Engineering)
                                                </td>
                                                <td>
                                                    <a href="https://nirth.res.in/application/list/Annexure-E - TA (Electrical Engineering).pdf" target="_blank" class="cs-btn small cs-bgcolor">Annexure - E</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    6
                                                </td>
                                                <td>
                                                    Group-B 
                                                    (Technical) 
                                                    (Civil
                                                    Engineering)
                                                </td>
                                                <td>
                                                    <a href="https://nirth.res.in/application/list/Annexure-F - TA (Civil Engineering).pdf" target="_blank" class="cs-btn small cs-bgcolor">Annexure - F</a>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="cs-shortcode-table">
                                    <hr>
                                    <h2>Technician-1</h2>
                                    
                                    <table class="table table-hover align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th width="5%">
                                                    S.No
                                                </th>
                                                <th width="60%">
                                                    Classification &amp; discipline of the Post
                                                </th>
                                                <th>
                                                    ELIGIBLE AND NOT-ELIGIBLE CANDIDATES
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>

                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Group-C 
                                                    (Technical)
                                                    (Biological
                                                    Science)
                                                </td>
                                                <td>
                                                    <a href="https://nirth.res.in/application/list/Annexure-G - Tech-I (Biological Science).pdf" target="_blank" class="cs-btn small cs-bgcolor">Annexure - G</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    Group-C 
                                                    (Technical) 
                                                    (Computer Science)
                                                </td>
                                                <td>
                                                    <a href="https://nirth.res.in/application/list/Annexure-H - Tech-I (Computer Science).pdf" target="_blank" class="cs-btn small cs-bgcolor">Annexure - H</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="cs-shortcode-table">
                                    <hr>
                                    <h2>Lab. Attendant-1</h2>
                                    
                                    <table class="table table-hover align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th width="5%">
                                                    S.No
                                                </th>
                                                <th width="60%">
                                                    Classification &amp; discipline of the Post
                                                </th>
                                                <th>
                                                    ELIGIBLE AND NOT-ELIGIBLE CANDIDATES
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>

                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Group-C
                                                    (Technical)
                                                </td>
                                                <td>
                                                    <a href="https://nirth.res.in/application/list/Annexure-I - Lab Attn-I (Technical).pdf" target="_blank" class="cs-btn small cs-bgcolor">Annexure - I</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    Group-C
                                                    (Technical) 
                                                    (Refrigeration and air
                                                    conditioning)
                                                </td>
                                                <td>
                                                    <a href="https://nirth.res.in/application/list/Annexure-J - Lab Attn-I (Refrigeration & Air Conditioning).pdf" target="_blank" class="cs-btn small cs-bgcolor">Annexure - J</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-section-title text-left">
<p>
    सी.बी.टी. के लिए अभ्‍यर्थियों का अनंतिम चयन निम्‍नलिखित शर्तों पर आधारित है :<br>
1. अनंतिम रूप से अर्हताप्राप्‍त अभ्‍यर्थी सी.बी.टी. के लिए उपयुक्‍त हैं।<br>
2. अभ्‍यर्थी की गैर-अर्हता की घोषणा के के कारणों को उनके संबंधित<a href="https://nirth.res.in/application/" target="_blank"><b> लॉगिन पोर्टल</b></a>  पर देखा जा सकता
है। ऐसे अभ्‍यर्थी दिनांक <b>23 नवंबर, 2023 को रात्रि 11.59</b> बजे तक केवल उनके <a href="https://nirth.res.in/application/" target="_blank"><b>लॉगिन पोर्टल</b></a> के
माध्‍यम से कन्‍सर्न रेज कर सकते हैं। किसी अन्‍य प्रकार से होने वाले एवं <b>23 नवंबर, 2023 को
रात्रि 11.59</b> बजे के बाद प्राप्‍त पत्राचार पर विचार नहीं किया जाएगा।<br>
3. गैर-अर्हताप्राप्‍त अभ्यर्थियों द्वारा जो कन्‍सर्न्‍स उठाए जाएंगे, उनकी फिर से जांच की जाएगी और
सी.बी.टी. के लिए अनंतिम रूप से अर्हताप्राप्‍त अभ्‍यर्थियों की संशोधित सूची (यदि लागू है) इस
वेबसाइट (www.nirth.res.in और www.main.icmr.nic.in) पर प्रकाशित की जाएगी।
</p>
<p>
    The provisional selection of the candidates for CBT is based on following conditions :<br>
1. The provisionally eligible candidates are suitable for CBT.<br>
2. Reasons for declaration of not-eligibility of the candidate can be viewed in their
respective <a href="https://nirth.res.in/application/" target="_blank"><b>LOGIN PORTAL</b></a>. Such candidate may raise their concern by <b>23 rd November
2023 till 11:59 p.m.</b> through their <a href="https://nirth.res.in/application/" target="_blank"><b>LOGIN PORTAL</b></a> only. Communication in any other form
and received after <b>23 rd November 2023, 11:59 p.m.</b> will not be entertained.<br>
3. Concerns raised by each non-eligible candidate will be re-checked and revised list (if
applicable) of provisionally eligible candidates for CBT will be published in this
website (www.nirth.res.in and www.main.icmr.nic.in).
</p>
<p>
    <b>नोट:</b><br>
(i) जिन अभ्‍यर्थियों ने वैध ओ.बी.सी. प्रमाण-पत्र प्रस्‍तुत किया है (विज्ञापन के क्रम संख्‍या 16 के
अनुसार निर्धारित अवधि के दौरान जारी किया गया), लेकिन निर्धारित प्रपत्र (जैसा अनुलग्‍नक 9
में है) से थोड़ा भिन्‍न रूप में है, उन्‍हें इस शर्त के साथ सी.बी.टी. के लिए अनंतिम (अस्‍थायी)
रूप से मान्‍य किया गया है कि वे अर्हता संबंधी अन्‍य मानदंड पूरे करेगे। आगे यदि उनकी
अभ्‍यर्थिता पर विचार किया जाता है तो ऐसे अभ्‍यर्थियों को निर्धारित प्रपत्र में वैध और अद्यतन
ओ.बी.सी. प्रमाण-पत्र प्रस्‍तुत करना होगा।<br>
(ii) इस अवस्‍था में कोई नए/अतिरिक्‍त दस्‍तावेज की प्रस्‍तुति स्‍वीकार्य नहीं होगी।
</p>
<p>
    <b>Note:</b><br>
(i) Candidates who have submitted valid OBC certificates (issued during the prescribed
period as per clause No.16 of the advertisement), but marginally deviating from the
prescribed format (as in Annexure IX of the advertisement) are provisionally
considered for CBT, provided they fulfil other eligibility criteria. Such candidates
will be required to submit valid and updated OBC certificates in the prescribed
format, if their candidature will be considered further.<br>
(ii) Submission of any fresh/additional document will not be entertained at this stage.
</p>
                                        
                                        <p class="text-right" style="margin-bottom:0">
                                            प्रशासनिक अधिकारी,
                                            आईसीएमआर-एनआईआरटीएच
                                        </p>
                                        <p class="text-right">
                                            Administrative Officer,
                                            ICMR-NIRTH
                                        </p>
                                        <hr>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main End -->

        <!-- Footer Start -->
        <?php include("footer.php"); ?>
        <!-- Footer End -->
    </div>
    <script>
        var a = document.getElementsByClassName("sn");
        for (var i = 0; i < a.length; i++) {
            a[i].innerHTML = (i + 1) + ".";
        }
    </script>
    <script src="assets/scripts/responsive.menu.js"></script>
    <script src="assets/scripts/chosen.select.js"></script>
    <script src="assets/scripts/slick.js"></script>
    <script src="assets/scripts/jquery.mobile-menu.min.js"></script>
    <!-- Put all Functions in functions.js -->
    <script src="assets/scripts/functions.js"></script>
</body>

</html>