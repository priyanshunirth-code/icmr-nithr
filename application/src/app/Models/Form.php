<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;
use Storage;
use PHPMailer\PHPMailer\PHPMailer;

class Form extends Model
{
    use HasFactory;

    function postal_state1()
    {
        return $this->belongsTo(State::class, 'postal_state');
    }
    function permanent_state1()
    {
        return $this->belongsTo(State::class, 'permanent_state');
    }
    function postal_city1()
    {
        return $this->belongsTo(City::class, 'postal_city');
    }
    function permanent_city1()
    {
        return $this->belongsTo(City::class, 'permanent_city');
    }

    // public static function check_form_submitted($form_id){
    //     $form = Form::where("registration_no", auth()->user()->registration_no)->where("form_id", $form_id)->first();

    //     if(!empty($form)){
    //         if($form->process == 3){
    //             return $form->id;
    //         }else{
    //             return false;
    //         }
    //     }
    //     else{
    //         return false;
    //     }
    // }
    public static function check_form_submitted($form_id){
        // $form = Form::where("registration_no", auth()->user()->registration_no)->where("form_id", $form_id)->first();
        // $form = Form::where("registration_no", auth()->user()->registration_no)->where("form_id", $form_id)->orderBy('id',"desc")->first();
        $form = FormSorting::where("registration_no", auth()->user()->registration_no)->where("form_id", $form_id)->first();

        if(!empty($form)){
            if($form->process == 3){
                return $form->id;
            }else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    public static function imageUrl($imagePath)
    {
        //return url(Storage::url($imagePath));
        //  return url("src/storage/app/public/" . $imagePath);
         return "https://nirth.res.in/application/src/storage/app/public/" . $imagePath;

    }
    
    // protected $fillable = [];
    // protected $guarded = [];
    
    public static function sendSuccessStatusMail($user,$form)
    {

        if ($user && $form) {
            $APPLYFOR = "";
            if ($form->form_id == env('FORMID1') || $form->form_id == env('FORMID2')) {
                $APPLYFOR = 'Technical Assistant';
            }

            if ($form->form_id == env('FORMID3') || $form->form_id == env('FORMID4') || $form->form_id == env('FORMID5')) {
                $APPLYFOR = 'Technical Assistant';
            }

            if ($form->form_id == env('FORMID5') || $form->form_id == env('FORMID6')) {
                $APPLYFOR = 'Technical Assistant';
            }
            if ($form->form_id == env('FORMID7') || $form->form_id == env('FORMID8')) {
                $APPLYFOR = 'Technician-I';
            }

            if ($form->form_id == env('FORMID9') || $form->form_id == env('FORMID10')) {
                $APPLYFOR = 'Lab Attendant-I';
            }

            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host = 'mail.nirth.res.in';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'donotreply@nirth.res.in';
            $mail->Password = 'REDACTED';
            $mail->setFrom('donotreply@nirth.res.in', 'ICMR NIRTH');
            $mail->addAddress($user->email, $user->full_name);
            $mail->Subject = 'Notification - ICMR-NIRTH Advertisement. No. NIRTH/Tech/01/2023 Dated 10.07.2023';

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
                                                                        <p>Dear ' . $user->full_name . ',<br /><br />

                                                                        Your Application for ' . $APPLYFOR . ' has been successfully submitted and <br />
                                                                        Application Fee Charge received successfully.
                                                                        <br /><br />
                                                                        Please visit https://www.nirth.res.in/application/  and login to download the submitted application form.
                                                                        <br /><br />
                                                                        Your Application details are as follows :-<br />
                                                                        Registration Number: ' . env('REGISTRATION_PREFIX') . $form->registration_no . '<br />
                                                                        Application No: ' . $form->form_id . $form->application_no . '<br />
                                                                        Post: ' . $APPLYFOR . '<br />
                                                                        Name: ' . $user->full_name . '<br />
                                                                        DOB: ' . date('d/M/Y', strtotime($form->dob)) . '<br />
                                                                        </p>
                                                                        <p><br />
                                                                            ICMR NIRTH<br>
                                                                            NIRTH Complex, Nagpur Road P.O. - Garha, Jabalpur - 482 003, Madhya Pradesh, INDIA
                                                                        <br /><br />
                                                                        Note: This is an auto generated mail. Please do not reply to this email.
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- END MAIN CONTENT AREA -->
                                                </table>
                                                <!-- START FOOTER -->
                                                <!-- <div class="footer"> -->
                                                    <!-- <table border="0" cellpadding="0" cellspacing="0"> -->
                                                        <!-- <tr> -->
                                                            <!-- <td class="content-block"> -->
                                                                <!-- <span>{companyname}</span> -->
                                                            <!-- </td> -->
                                                        <!-- </tr> -->
                                                    <!-- </table> -->
                                                <!-- </div> -->
                                                <!-- END FOOTER -->
                                            <!-- END CENTERED WHITE CONTAINER -->
                                            </div>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
                            </body>
                        </html>
                    ';
            $mail->send();

            $form = Form::find($form->id);
            $form->success_mail_sent = 1;
            $form->save();
        }

    }

    public static function sendFailedStatusMail($user,$form)
    {

        if ($user && $form) {
            $APPLYFOR = "";
            if ($form->form_id == env('FORMID1') || $form->form_id == env('FORMID2')) {
                $APPLYFOR = 'Technical Assistant';
            }

            if ($form->form_id == env('FORMID3') || $form->form_id == env('FORMID4') || $form->form_id == env('FORMID5')) {
                $APPLYFOR = 'Technical Assistant';
            }

            if ($form->form_id == env('FORMID5') || $form->form_id == env('FORMID6')) {
                $APPLYFOR = 'Technical Assistant';
            }
            if ($form->form_id == env('FORMID7') || $form->form_id == env('FORMID8')) {
                $APPLYFOR = 'Technician-I';
            }

            if ($form->form_id == env('FORMID9') || $form->form_id == env('FORMID10')) {
                $APPLYFOR = 'Lab Attendant-I';
            }

            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host = 'mail.nirth.res.in';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'donotreply@nirth.res.in';
            $mail->Password = 'REDACTED';
            $mail->setFrom('donotreply@nirth.res.in', 'ICMR NIRTH');
            $mail->addAddress($user->email, $user->full_name);
            $mail->Subject = 'Notification - ICMR-NIRTH Advertisement. No. NIRTH/Tech/01/2023 Dated 10.07.2023';

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
                                                                        <p>Dear ' . $user->full_name . ',<br /><br />

                                                                        Your Application for ' . $APPLYFOR . ' has been saved but not submitted due to non-payment of Application Fee.<br /><br />

                                                                        Please visit https://www.nirth.res.in/application/  and login to pay for final submission of application form.<br /><br />

                                                                        Please wait for 30 min and re-check by login if payment has been deducted from your account and not reflecting in your form
                                                                        <br />
                                                                        </p>
                                                                        <p><br />
                                                                            ICMR NIRTH<br>
                                                                            NIRTH Complex, Nagpur Road P.O. - Garha, Jabalpur - 482 003, Madhya Pradesh, INDIA
                                                                            <br />
                                                                            Note: This is an auto generated mail. Please do not reply to this email.
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- END MAIN CONTENT AREA -->
                                                </table>
                                                <!-- START FOOTER -->
                                                <!-- <div class="footer"> -->
                                                    <!-- <table border="0" cellpadding="0" cellspacing="0"> -->
                                                        <!-- <tr> -->
                                                            <!-- <td class="content-block"> -->
                                                                <!-- <span>{companyname}</span> -->
                                                            <!-- </td> -->
                                                        <!-- </tr> -->
                                                    <!-- </table> -->
                                                <!-- </div> -->
                                                <!-- END FOOTER -->
                                            <!-- END CENTERED WHITE CONTAINER -->
                                            </div>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
                            </body>
                        </html>
                    ';
            $mail->send();

            $form = Form::find($form->id);
            $form->failed_mail_sent = 1;
            $form->save();
        }

    }

    public static function sendMailForCompleteApplication($user,$form)
    {

        if ($user && $form) {

            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host = 'mail.nirth.res.in';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'donotreply@nirth.res.in';
            $mail->Password = 'REDACTED';
            $mail->setFrom('donotreply@nirth.res.in', 'ICMR NIRTH');
            $mail->addAddress($user->email, $user->full_name);
            $mail->Subject = 'Online registration Advertisement. No. NIRTH/Tech/01/2023 Dated 10.07.2023';

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
                                                                        <p>Hello ' . $user->full_name . '<br /><br />
                                                                             For first time registration in online registration portal against
                                                                            Advertisement. No. NIRTH/Tech/01/2023 Dated 10.07.2023, Thanks For Apply.<br /><br /><b> </b><br /><br />
                                                                            Your Registration No:'.env('REGISTRATION_PREFIX') . $form->registration_no. '
                                                                            <br>
                                                                          and  your Applicayion No:'.$form->form_id . $form->application_no. '

                                                                          are applied successfully
                                                                        </p>
                                                                        <p><br />
                                                                            ICMR NIRTH<br>
                                                                            NIRTH Complex, Nagpur Road P.O. - Garha, Jabalpur - 482 003, Madhya Pradesh, INDIA
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- END MAIN CONTENT AREA -->
                                                </table>
                                                <!-- START FOOTER -->
                                                <!-- <div class="footer"> -->
                                                    <!-- <table border="0" cellpadding="0" cellspacing="0"> -->
                                                        <!-- <tr> -->
                                                            <!-- <td class="content-block"> -->
                                                                <!-- <span>{companyname}</span> -->
                                                            <!-- </td> -->
                                                        <!-- </tr> -->
                                                    <!-- </table> -->
                                                <!-- </div> -->
                                                <!-- END FOOTER -->
                                            <!-- END CENTERED WHITE CONTAINER -->
                                            </div>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
                            </body>
                        </html>
                    ';
            $mail->send();
        }

    }

    public static function getApplicationCountDetail($form_ids, $status = ''){
        $query = Form::whereIn("form_id", $form_ids);

        if($status){
            if($status == 'FREE'){
                $query = $query->where("process", 3);
                $query = $query->whereNull("payment_status");
            }
            elseif($status == 'NOTCOMPLETE'){
                $query = $query->where("process", "!=", 3);
            }
            else{
                $query = $query->where("payment_status", $status);
            }
        }

        $form = $query->count();

        return $form;
    }
}
