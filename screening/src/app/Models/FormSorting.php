<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use PHPMailer\PHPMailer\PHPMailer;

class FormSorting extends Model
{
    use HasFactory;

    public static function calculate_age_relaxation($form_id, $group_id, $checked_age_relaxation){
        
        $group = Group::find($group_id);
        $form_sorting = FormSorting::where("form_id", $form_id)->first();
        $form = Form::find($form_id);

        $age_limit = $group->age_limit;
        if($checked_age_relaxation){
            foreach ($checked_age_relaxation as $key => $type) {
                switch ($type) {
                    case 'category':
                        if($form->category == "SC" || $form->category == "ST"){
                            $age_limit += 5;
                        }
                        elseif($form->category == "OBC"){
                            $age_limit += 3;
                        }

                        break;
                    case 'pwbd':
                        $age_limit += 10;
                        break;
                    case 'exsm':
                        $age_limit += 3;
                        break;
                    case 'central_govt_employee':
                        if($form->category == "SC" || $form->category == "ST"){
                            if($group->group_type == "B"){
                                $age_limit += 5;
                                // $age_limit += 10;
                            }
                            elseif($group->group_type == "C"){
                                $age_limit += 10;
                                // $age_limit += 15;
                            }
                        }
                        elseif($form->category == "OBC"){
                            if($group->group_type == "B"){
                                $age_limit += 5;
                                // $age_limit += 8;
                            }
                            elseif($group->group_type == "C"){
                                $age_limit += 10;
                                // $age_limit += 13;
                            }
                        }
                        else{
                            if($group->group_type == "B"){
                                $age_limit += 5;
                            }
                            elseif($group->group_type == "C"){
                                $age_limit += 10;
                            }
                        }
                        break;
                    case 'working_in_icmr_project':
                        // $projects = IcmrProject::where("form_id",$form_id)->orderBy("icmr_doj","ASC")->get();
                        $project = IcmrProject::selectRaw("TIMESTAMPDIFF( YEAR, icmr_doj, '2023-08-21' ) as year")
                                            ->selectRaw("TIMESTAMPDIFF( MONTH, icmr_doj, '2023-08-21' ) % 12 as month")
                                            ->selectRaw("FLOOR( TIMESTAMPDIFF( DAY, icmr_doj, '2023-08-21' ) % 30.4375 ) as day")
                                            ->where("form_id",$form_id)
                                            ->orderBy("icmr_doj","ASC")
                                            ->first();
                        if(!empty($project)){
                            if($project->year < 5){
                                $age_limit = ($age_limit+$project->year) . " Years " . $project->month . " Month " . $project->day . " Days";
                            }
                            else{
                                $age_limit += 5;
                            }
                        }

                        break;
                    
                    default:
                        // code...
                        break;
                }
            }
        }

        return $age_limit . (is_numeric($age_limit) ? " Years" : "");
    }

    public static function checkFormResult($formsorting_id){
        $sorting = FormSorting::find($formsorting_id);

        if(!$sorting->name_result){
            return 1;
        }
        if(!$sorting->photo_sign_result){
            return 2;
        }
        if(!$sorting->category_result){
            return 3;
        }
        if(!$sorting->application_fees_result){
            return 4;
        }
        if(!$sorting->age_relaxation_result){
            return 5;
        }
        if(!$sorting->essential_qualification_result){
            return 6;
        }
        if(!$sorting->experience_result){
            return 7;
        }

        return 8;
    }
    public static function getCompleteStepCount($formsorting_id){
        $sorting = FormSorting::find($formsorting_id);

        $count = 0;
        if($sorting->name_result){
            $count++;
        }
        if($sorting->photo_sign_result){
            $count++;
        }
        if($sorting->category_result){
            $count++;
        }
        if($sorting->application_fees_result){
            $count++;
        }
        if($sorting->age_relaxation_result){
            $count++;
        }
        if($sorting->essential_qualification_result){
            $count++;
        }
        if($sorting->experience_result){
            $count++;
        }

        return $count;
    }

    public static function sendResultMail($form)
    {
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host = 'mail.nirth.res.in';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'donotreply@nirth.res.in';
            $mail->Password = 'REDACTED';
            $mail->setFrom('donotreply@nirth.res.in', 'ICMR NIRTH');
            $mail->addAddress($form->email, $form->firstname . " " . $form->lastname);
            $mail->Subject = 'Notice for using scribe by the PwBD/PwD during the CBT - ICMR-NIRTH Advertisement. No. NIRTH/Tech/01/2023 Dated 10.07.2023';

            $mail->isHTML(true);
            $mail->Body = '<!doctype html>
                        <html>
                            <head>
                                <meta name="viewport" content="width=device-width" />
                                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                                <style>
                                    body {
                                        background-color: #f6f6f6;
                                        font-family: sans-serif;
                                        -webkit-font-smoothing: antialiased;
                                        font-size: 14px;
                                        line-height: 1.4;
                                        margin: 0;
                                        padding: 0;
                                        -ms-text-size-adjust: 100%;
                                        -webkit-text-size-adjust: 100%;
                                    }
                                      table {
                                        border-collapse: separate;
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                        width: 100%;
                                      }
                                      table td {
                                        font-family: sans-serif;
                                        font-size: 14px;
                                        vertical-align: top;
                                      }
                                      /* -------------------------------------
                                      BODY & CONTAINER
                                      ------------------------------------- */
                                      .body {
                                        background-color: #f6f6f6;
                                        width: 100%;
                                      }
                                      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */

                                      .container {
                                        display: block;
                                        margin: 0 auto !important;
                                        /* makes it centered */
                                        max-width: 680px;
                                        padding: 10px;
                                        width: 680px;
                                      }
                                      /* This should also be a block element, so that it will fill 100% of the .container */

                                      .content {
                                        box-sizing: border-box;
                                        display: block;
                                        margin: 0 auto;
                                        max-width: 680px;
                                        padding: 10px;
                                      }
                                      /* -------------------------------------
                                      HEADER, FOOTER, MAIN
                                      ------------------------------------- */

                                      .main {
                                        background: #fff;
                                        border-radius: 3px;
                                        width: 100%;
                                      }
                                      .wrapper {
                                        box-sizing: border-box;
                                        padding: 20px;
                                      }
                                      .footer {
                                        clear: both;
                                        padding-top: 10px;
                                        text-align: center;
                                        width: 100%;
                                      }
                                      .footer td,
                                      .footer p,
                                      .footer span,
                                      .footer a {
                                        color: #999999;
                                        font-size: 12px;
                                        text-align: center;
                                      }
                                      hr {
                                        border: 0;
                                        border-bottom: 1px solid #f6f6f6;
                                        margin: 20px 0;
                                      }
                                      /* -------------------------------------
                                      RESPONSIVE AND MOBILE FRIENDLY STYLES
                                      ------------------------------------- */

                                        @mediaonly screen and (max-width: 620px) {
                                        table[class=body] .content {
                                          padding: 0 !important;
                                        }
                                        table[class=body] .container {
                                          padding: 0 !important;
                                          width: 100% !important;
                                        }
                                        table[class=body] .main {
                                          border-left-width: 0 !important;
                                          border-radius: 0 !important;
                                          border-right-width: 0 !important;
                                        }
                                      }
                                </style>
                            </head>
                            <body class="">
                                <table border="0" cellpadding="0" cellspacing="0" class="body">
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td class="container">
                                            <div class="content">
                                            <!-- START CENTERED WHITE CONTAINER -->
                                                <table class="main">
                                                    <!-- START MAIN CONTENT AREA -->
                                                    <tr>
                                                        <td class="wrapper">
                                                            <table border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td>
                                                                        Dear candidate,</p><br />
                                                                        
A notice has been published on 14.12.2023 in ICMR-NIRTH website informing all Persons with
Benchmark Disabilities (PwBD) candidates applied for the Technical Cadre Posts at ICMR-NIRTH,
Jabalpur against Advertisement No.NIRTH/Tech/01/2023, dated 10.07.2023 that, the Computer Based
Test(CBT) will be conducted between 26-28 th December 2023. There are possibilities for using scribe by
the Persons with Benchmark Disabilities/Persons with Disabilities during the CBT. Candidates requiring
scribe facilities can avail through filling the annexed forms and as per attached guidelines. List of
candidates who can avail the facilities has been published in ICMR-NIRTH website.<br><br>
The PwBD /PwD candidate requires scribe either by the nomination of examination Institute or by
own, he/she should submit the prior intimation of the request / relevant certificates prescribed above to the
Institute address by email to nirthrecruitmentcell@gmail.com for making appropriate arrangements by 20 th
December 5.00 p.m. in the attached proforma. <br /><br />


                                                                        <p><br />
                                                                        प्रशासनिक अधिकारी, आईसीएमआर-एनआईआरटीएच<br>
                                                                        Administrative Officer, ICMR-NIRTH<br>
                                                                            NIRTH Complex, Nagpur Road P.O. - Garha, Jabalpur - 482 003, Madhya Pradesh, INDIA
                                                                        <br /><br />
                                                                        Enclosure: PWBD guidelines and proforma
                                                                        <br /><br />
                                                                        नोट: यह एक ऑटो जेनरेटेड मेल है। कृपया इस ईमेल का जवाब न दें।<br>
                                                                        Note: This is an auto generated mail. Please do not reply to this email.
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
                            </body>
                        </html>
                    ';
            $attachmentPath = public_path('annex/GuidelinesandAnnexure.pdf');
            $mail->addAttachment($attachmentPath, 'GuidelinesandAnnexure.pdf');
            $mail->send();
            echo "Mail Sent<br>";
            $form = Form::find($form->id);
            $form->pwbd_notice_mail_sent = 1;
            $form->save();

    }

//     public static function sendResultMail($form)
//     {
//             $mail = new PHPMailer;
//             $mail->isSMTP();
//             $mail->SMTPDebug = 0;
//             $mail->Host = 'mail.nirth.res.in';
//             $mail->Port = 587;
//             $mail->SMTPAuth = true;
//             $mail->Username = 'donotreply@nirth.res.in';
//             $mail->Password = 'REDACTED';
//             $mail->setFrom('donotreply@nirth.res.in', 'ICMR NIRTH');
//             $mail->addAddress($form->email, $form->firstname . " " . $form->lastname);
//             $mail->Subject = 'Application status - ICMR-NIRTH Advertisement. No. NIRTH/Tech/01/2023 Dated 10.07.2023';

//             $mail->isHTML(true);
//             $mail->Body = '<!doctype html>
//                         <html>
//                             <head>
//                                 <meta name="viewport" content="width=device-width" />
//                                 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
//                                 <style>
//                                     body {
//                                         background-color: #f6f6f6;
//                                         font-family: sans-serif;
//                                         -webkit-font-smoothing: antialiased;
//                                         font-size: 14px;
//                                         line-height: 1.4;
//                                         margin: 0;
//                                         padding: 0;
//                                         -ms-text-size-adjust: 100%;
//                                         -webkit-text-size-adjust: 100%;
//                                     }
//                                       table {
//                                         border-collapse: separate;
//                                         mso-table-lspace: 0pt;
//                                         mso-table-rspace: 0pt;
//                                         width: 100%;
//                                       }
//                                       table td {
//                                         font-family: sans-serif;
//                                         font-size: 14px;
//                                         vertical-align: top;
//                                       }
//                                       /* -------------------------------------
//                                       BODY & CONTAINER
//                                       ------------------------------------- */
//                                       .body {
//                                         background-color: #f6f6f6;
//                                         width: 100%;
//                                       }
//                                       /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */

//                                       .container {
//                                         display: block;
//                                         margin: 0 auto !important;
//                                         /* makes it centered */
//                                         max-width: 680px;
//                                         padding: 10px;
//                                         width: 680px;
//                                       }
//                                       /* This should also be a block element, so that it will fill 100% of the .container */

//                                       .content {
//                                         box-sizing: border-box;
//                                         display: block;
//                                         margin: 0 auto;
//                                         max-width: 680px;
//                                         padding: 10px;
//                                       }
//                                       /* -------------------------------------
//                                       HEADER, FOOTER, MAIN
//                                       ------------------------------------- */

//                                       .main {
//                                         background: #fff;
//                                         border-radius: 3px;
//                                         width: 100%;
//                                       }
//                                       .wrapper {
//                                         box-sizing: border-box;
//                                         padding: 20px;
//                                       }
//                                       .footer {
//                                         clear: both;
//                                         padding-top: 10px;
//                                         text-align: center;
//                                         width: 100%;
//                                       }
//                                       .footer td,
//                                       .footer p,
//                                       .footer span,
//                                       .footer a {
//                                         color: #999999;
//                                         font-size: 12px;
//                                         text-align: center;
//                                       }
//                                       hr {
//                                         border: 0;
//                                         border-bottom: 1px solid #f6f6f6;
//                                         margin: 20px 0;
//                                       }
//                                       /* -------------------------------------
//                                       RESPONSIVE AND MOBILE FRIENDLY STYLES
//                                       ------------------------------------- */

//                                         @mediaonly screen and (max-width: 620px) {
//                                         table[class=body] .content {
//                                           padding: 0 !important;
//                                         }
//                                         table[class=body] .container {
//                                           padding: 0 !important;
//                                           width: 100% !important;
//                                         }
//                                         table[class=body] .main {
//                                           border-left-width: 0 !important;
//                                           border-radius: 0 !important;
//                                           border-right-width: 0 !important;
//                                         }
//                                       }
//                                 </style>
//                             </head>
//                             <body class="">
//                                 <table border="0" cellpadding="0" cellspacing="0" class="body">
//                                     <tr>
//                                         <td>&nbsp;</td>
//                                         <td class="container">
//                                             <div class="content">
//                                             <!-- START CENTERED WHITE CONTAINER -->
//                                                 <table class="main">
//                                                     <!-- START MAIN CONTENT AREA -->
//                                                     <tr>
//                                                         <td class="wrapper">
//                                                             <table border="0" cellpadding="0" cellspacing="0">
//                                                                 <tr>
//                                                                     <td>
//                                                                         <p>प्रिय अभ्‍यर्थी,<br />
//                                                                         Dear candidate,</p><br />
                                                                        
// विज्ञापन संख्‍या- एनआईआरटीएच/तक/01/2023 दिनांकित 10.07.2023 एवं कम्‍प्‍यूटर आधारित
// टेस्‍ट (सी.बी.टी.) में सम्मिलित होने के लिए अर्हताप्राप्‍त एवं गैर-अर्हताप्राप्‍त अभ्‍यर्थियों की अनंतिम सूची,
// जो आईसीएमआर-एनआईआरटीएच की वेबसाइट पर नं. एनआईआरटीएच/तक/भर्ती/1527/2023 दिनांकित
// 14.11.2023 द्वारा प्रकाशित की गई थी, कम्‍प्‍यूटर आधारित टेस्‍ट (सी.बी.टी.) में सम्मिलित होने के लिए <b>तकनीशियन-1 (जैविक विज्ञान) और तकनीशियन-1 (कंप्यूटर विज्ञान)</b> की अर्हताप्राप्‍त अभ्‍यर्थियों की संशोधित अनंतिम सूची एतद् द्वारा अपलोड की जाती है। आप नीचे दी हुई लिंक
// को क्लिक करके या उपयुक्‍त लिंक का प्रयोग करते हुए सीधे हमारे संस्‍थान की वेबसाइट पर जाकर यह सूची
// देख सकते हैं।<br />
// सूची देखने के लिए लिंक : https://nirth.res.in/rerevisedprovisionalapplicationlist.php <br /><br />
// With reference to the advertisement No. NIRTH/Tech/01/2023 dated 10.07.2023 and
// provisional list of eligible and not-eligible candidates for appearing in the computer based test (CBT)
// published on the ICMR-NIRTH website vide No.NIRTH/Tech/Rect/ 1527 /2023, Dated 14.11.2023
// and after considering the concerns raised by not-eligible candidates, a revised provisional list of
// eligible candidates for <b>TECHNICIAN-1 (BIOLOGICAL SCIENCE) AND TECHNICIAN-1 (COMPUTER SCIENCE)</b> for appearing in the computer based test (CBT) is hereby uploaded. You can
// access the list by clicking the following link or directly visiting the website using appropriate link.<br />
// Link to access the list is : https://nirth.res.in/rerevisedprovisionalapplicationlist.php <br /><br />


//                                                                         <p><br />
//                                                                         प्रशासनिक अधिकारी, आईसीएमआर-एनआईआरटीएच<br>
//                                                                         Administrative Officer, ICMR-NIRTH<br>
//                                                                             NIRTH Complex, Nagpur Road P.O. - Garha, Jabalpur - 482 003, Madhya Pradesh, INDIA
//                                                                         <br /><br />
//                                                                         नोट: यह एक ऑटो जेनरेटेड मेल है। कृपया इस ईमेल का जवाब न दें।<br>
//                                                                         Note: This is an auto generated mail. Please do not reply to this email.
//                                                                         </p>
//                                                                     </td>
//                                                                 </tr>
//                                                             </table>
//                                                         </td>
//                                                     </tr>
//                                                 </table>
//                                             </div>
//                                         </td>
//                                         <td>&nbsp;</td>
//                                     </tr>
//                                 </table>
//                             </body>
//                         </html>
//                     ';
//             $mail->send();
//             echo "Mail Sent<br>";
//             $form = Form::find($form->id);
//             $form->re_final_result_mail_sent = 1;
//             $form->save();

//     }


    public static function sendAdmitCardMail($form)
    {
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host = 'mail.nirth.res.in';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'donotreply@nirth.res.in';
            $mail->Password = 'REDACTED';
            $mail->setFrom('donotreply@nirth.res.in', 'ICMR NIRTH');
            $mail->addAddress($form->email, $form->firstname . " " . $form->lastname);
            $mail->Subject = 'Notice Regarding Admit Card Download - ICMR-NIRTH Advertisement. No. NIRTH/Tech/01/2023 Dated 10.07.2023';

            $mail->isHTML(true);
            $mail->Body = '<!doctype html>
                        <html>
                            <head>
                                <meta name="viewport" content="width=device-width" />
                                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                                <style>
                                    body {
                                        background-color: #f6f6f6;
                                        font-family: sans-serif;
                                        -webkit-font-smoothing: antialiased;
                                        font-size: 14px;
                                        line-height: 1.4;
                                        margin: 0;
                                        padding: 0;
                                        -ms-text-size-adjust: 100%;
                                        -webkit-text-size-adjust: 100%;
                                    }
                                      table {
                                        border-collapse: separate;
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                        width: 100%;
                                      }
                                      table td {
                                        font-family: sans-serif;
                                        font-size: 14px;
                                        vertical-align: top;
                                      }
                                      /* -------------------------------------
                                      BODY & CONTAINER
                                      ------------------------------------- */
                                      .body {
                                        background-color: #f6f6f6;
                                        width: 100%;
                                      }
                                      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */

                                      .container {
                                        display: block;
                                        margin: 0 auto !important;
                                        /* makes it centered */
                                        max-width: 680px;
                                        padding: 10px;
                                        width: 680px;
                                      }
                                      /* This should also be a block element, so that it will fill 100% of the .container */

                                      .content {
                                        box-sizing: border-box;
                                        display: block;
                                        margin: 0 auto;
                                        max-width: 680px;
                                        padding: 10px;
                                      }
                                      /* -------------------------------------
                                      HEADER, FOOTER, MAIN
                                      ------------------------------------- */

                                      .main {
                                        background: #fff;
                                        border-radius: 3px;
                                        width: 100%;
                                      }
                                      .wrapper {
                                        box-sizing: border-box;
                                        padding: 20px;
                                      }
                                      .footer {
                                        clear: both;
                                        padding-top: 10px;
                                        text-align: center;
                                        width: 100%;
                                      }
                                      .footer td,
                                      .footer p,
                                      .footer span,
                                      .footer a {
                                        color: #999999;
                                        font-size: 12px;
                                        text-align: center;
                                      }
                                      hr {
                                        border: 0;
                                        border-bottom: 1px solid #f6f6f6;
                                        margin: 20px 0;
                                      }
                                      /* -------------------------------------
                                      RESPONSIVE AND MOBILE FRIENDLY STYLES
                                      ------------------------------------- */

                                        @mediaonly screen and (max-width: 620px) {
                                        table[class=body] .content {
                                          padding: 0 !important;
                                        }
                                        table[class=body] .container {
                                          padding: 0 !important;
                                          width: 100% !important;
                                        }
                                        table[class=body] .main {
                                          border-left-width: 0 !important;
                                          border-radius: 0 !important;
                                          border-right-width: 0 !important;
                                        }
                                      }
                                </style>
                            </head>
                            <body class="">
                                <table border="0" cellpadding="0" cellspacing="0" class="body">
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td class="container">
                                            <div class="content">
                                            <!-- START CENTERED WHITE CONTAINER -->
                                                <table class="main">
                                                    <!-- START MAIN CONTENT AREA -->
                                                    <tr>
                                                        <td class="wrapper">
                                                            <table border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td>
                                                                        Dear candidate,</p><br /><br />
                                                                        
अनंतिम रूप से पात्र सभी उम्मीदवारों के लिए कंप्यूटर आधारित टेस्ट (सीबीटी)
के लिए प्रवेश पत्र उनके संबंधित लॉगिन आईडी और पासवर्ड का उपयोग करके
निम्नलिखित लिंक से डाउनलोड किया जा सकता है: <br /><br />
Admit Card for Computer Based Test (CBT) for all the provisionally eligible
candidates can be downloaded by using their respective login id and password,
using the following link: <br /><br />
https://nirth.res.in/application/
<br /><br />

                                                                        <p><br />
                                                                        प्रशासनिक अधिकारी, आईसीएमआर-एनआईआरटीएच<br>
                                                                        Administrative Officer, ICMR-NIRTH<br>
                                                                            NIRTH Complex, Nagpur Road P.O. - Garha, Jabalpur - 482 003, Madhya Pradesh, INDIA
                                                                        <br /><br />
                                                                        नोट: यह एक ऑटो जेनरेटेड मेल है। कृपया इस ईमेल का जवाब न दें।<br>
                                                                        Note: This is an auto generated mail. Please do not reply to this email.
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
                            </body>
                        </html>
                    ';
            
            $mail->send();
            echo "Mail Sent<br>";
            $form = Form::find($form->id);
            $form->admin_card_mail_sent = 1;
            $form->save();

    }
}
