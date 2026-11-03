<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Form;
use App\Models\FormSorting;

class CronController extends Controller
{
    public function updategrouppassword(){
        try {
            $users = User::where("role",'group')->get();
            
            if(!empty($users)){
                foreach ($users as $key => $user) {
                    $password = $user->random_password(10);
                    $user->password = $password;
                    $user->password_string = $password;
                    $user->save();
                }
            }
        } catch (Exception $exc) {
            Log::saveLogs($exc->getMessage(), 'cron/cronpasswordchange', 0);
        }
    }

    public function send_result_mail(){
        try {
            $forms = Form::whereNull('pwbd_notice_mail_sent')
                    ->where("form_id",'TAGBBS')->whereIN("application_no",explode(",", '67,167,176,476,728,1225,1571,1640,1681,1691,1865,1892,1964,2043,2129,2190,2278,2481,2690,2887,3056,3347'))
                    ->get();
            // $forms = Form::whereNull('pwbd_notice_mail_sent')
            //         ->where("form_id",'TAGBSS')->whereIN("application_no",explode(",", '18,176,248,299,342'))
            //         ->get();
            // $forms = Form::whereNull('pwbd_notice_mail_sent')
            //         ->where("form_id",'TAGBEC')->whereIN("application_no",explode(",", '169,174'))
            //         ->get();
            // $forms = Form::whereNull('pwbd_notice_mail_sent')
            //         ->where("form_id",'TAGBTE')->whereIN("application_no",explode(",", '120'))
            //         ->get();
            // $forms = Form::whereNull('pwbd_notice_mail_sent')
            //         ->where("form_id",'TAGBCS')->whereIN("application_no",explode(",", '4,69,337'))
            //         ->get();
            // $forms = Form::whereNull('pwbd_notice_mail_sent')
            //         ->where("form_id",'T1GCBS')->whereIN("application_no",explode(",", '246,383,546,979,1040'))
            //         ->get();
            // $forms = Form::whereNull('pwbd_notice_mail_sent')
            //         ->where("form_id",'T1GCCS')->whereIN("application_no",explode(",", '128'))
            //         ->get();
            // $forms = Form::whereNull('pwbd_notice_mail_sent')
            //         ->where("form_id",'LAGCT')->whereIN("application_no",explode(",", '143,155,218,238,270,331,510,591,623'))
            //         ->get();
            // $forms = Form::whereNull('pwbd_notice_mail_sent')
            //         ->where("form_id",'LAGCR')->whereIN("application_no",explode(",", '27'))
            //         ->get();
            
            if(!empty($forms)){
                foreach ($forms as $key => $form) {
                    FormSorting::sendResultMail($form);
                }
            }

        } catch (Exception $exc) {
            Log::saveLogs($exc->getMessage(), 'cron/cronsendresultmail', 0);
        }
    }

    // public function send_result_mail(){
    //     try {
    //         $forms = Form::whereNull('re_final_result_mail_sent')
    //                 ->where(function($query){
    //                     $query->where("form_id",'T1GCBS')->orWhere("form_id",'T1GCCS');
    //                 })->get();
            
    //         if(!empty($forms)){
    //             foreach ($forms as $key => $form) {

    //                 FormSorting::sendResultMail($form);
    //             }
    //         }

    //     } catch (Exception $exc) {
    //         Log::saveLogs($exc->getMessage(), 'cron/cronsendresultmail', 0);
    //     }
    // }

    public function send_admitcard_mail(){
        try {
            // $form = Form::find(7823);
            // FormSorting::sendAdmitCardMail($form);

            $forms = Form::whereNull('admin_card_mail_sent')
                    ->where('result','PASS')
                    ->get();
            
            if(!empty($forms)){
                foreach ($forms as $key => $form) {
                    FormSorting::sendAdmitCardMail($form);
                }
            }

        } catch (Exception $exc) {
            Log::saveLogs($exc->getMessage(), 'cron/cronsendadmitcardmail', 0);
        }
    }
}
