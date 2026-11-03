<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use PHPMailer\PHPMailer\PHPMailer;

class FormResult extends Model
{
    use HasFactory;

    public static function sendResultMail($form, $form_data)
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
            $mail->addAddress($form_data->email, $form_data->firstname . " " . $form_data->lastname);
            $mail->Subject = 'Declaration of provisonal results for the different posts of Techinical Cadre(Technician-1 and Lab Attendant-1)';

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
The provisional results for selection of different posts of Techinical Cadre(Technician-1 and Lab Attendant-1) as advertised (NIRTH/Tech/01/2023 Dated 10.07.2023) have been declared. Lists of selected and waitlisted candidates are uploaded in the ICMR-NIRTH website: https://nirth.res.in/labatt_tech_result.php . Marks [CBT and Experience (wherever applicable)] are also available in your individual registration portal. You can login into the portal using login ID and password to view marks obtained by you and the result of your application.
<br /><br />

                                                                        <p><br />
                                                                        Administrative Officer, ICMR-NIRTH<br>
                                                                            NIRTH Complex, Nagpur Road P.O. - Garha, Jabalpur - 482 003, Madhya Pradesh, INDIA
                                                                        <br /><br />
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
            $form = FormResult::find($form->id);
            $form->sent_result_mail = 1;
            $form->save();

    }
}
