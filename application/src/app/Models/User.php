<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPMailer\PHPMailer\PHPMailer;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'mobile_no',
        'email',
        'password',
    ];
    // protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
    * @return string
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function otpVerify($otp)
    {
        if ($this->id && $this->otp === $otp) {
            // OTP is correct, perform verification logic here
            // For example, update the 'is_verified' column to true
            $this->is_verified = true;
            $this->save();

            return true;
        }

        return false;
    }

    
    public function sendOtp($user)
    {

        if($user && $user->otp){

            $otp = $user->otp;

        }else{
            $otp = rand(100000, 999999);
            User::where('id', $user->id)->update(['otp' => $otp]);
        };
        
        $time = time();
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
                                                                            Advertisement. No. NIRTH/Tech/01/2023 Dated 10.07.2023, Please use the following One Time Password (OTP):.<br /><br /><b>' . $otp . '</b><br /><br />
                                                                            Do not share this OTP with anyone.
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
