<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('adminRole');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */

    public function index()
    {
        $formcount = Form::count();

        $FIRST_APPLYFOR = 'Technical Assistant';
        $form_ids = [env('FORMID1'), env('FORMID2'), env('FORMID3'), env('FORMID4'), env('FORMID5'), env('FORMID6')];
        $total_first_application = Form::getApplicationCountDetail($form_ids, '');
        $total_first_application_success = Form::getApplicationCountDetail($form_ids, 'SUCCESS');
        $total_first_application_pending = Form::getApplicationCountDetail($form_ids, 'Pending');
        $total_first_application_failed = Form::getApplicationCountDetail($form_ids, 'FAILED');
        $total_first_application_free = Form::getApplicationCountDetail($form_ids, 'FREE');
        $total_first_application_not_complete = Form::getApplicationCountDetail($form_ids, 'NOTCOMPLETE');

        /*FORMID1*/
        $form_id1 = [env('FORMID1')];
        $total_form_id1_application = Form::getApplicationCountDetail($form_id1, '');
        $total_form_id1_application_success = Form::getApplicationCountDetail($form_id1, 'SUCCESS');
        $total_form_id1_application_pending = Form::getApplicationCountDetail($form_id1, 'Pending');
        $total_form_id1_application_failed = Form::getApplicationCountDetail($form_id1, 'FAILED');
        $total_form_id1_application_free = Form::getApplicationCountDetail($form_id1, 'FREE');
        $total_form_id1_application_not_complete = Form::getApplicationCountDetail($form_id1, 'NOTCOMPLETE');
        /*FORMID2*/
        $form_id2 = [env('FORMID2')];
        $total_form_id2_application = Form::getApplicationCountDetail($form_id2, '');
        $total_form_id2_application_success = Form::getApplicationCountDetail($form_id2, 'SUCCESS');
        $total_form_id2_application_pending = Form::getApplicationCountDetail($form_id2, 'Pending');
        $total_form_id2_application_failed = Form::getApplicationCountDetail($form_id2, 'FAILED');
        $total_form_id2_application_free = Form::getApplicationCountDetail($form_id2, 'FREE');
        $total_form_id2_application_not_complete = Form::getApplicationCountDetail($form_id2, 'NOTCOMPLETE');
        /*FORMID3*/
        $form_id3 = [env('FORMID3')];
        $total_form_id3_application = Form::getApplicationCountDetail($form_id3, '');
        $total_form_id3_application_success = Form::getApplicationCountDetail($form_id3, 'SUCCESS');
        $total_form_id3_application_pending = Form::getApplicationCountDetail($form_id3, 'Pending');
        $total_form_id3_application_failed = Form::getApplicationCountDetail($form_id3, 'FAILED');
        $total_form_id3_application_free = Form::getApplicationCountDetail($form_id3, 'FREE');
        $total_form_id3_application_not_complete = Form::getApplicationCountDetail($form_id3, 'NOTCOMPLETE');
        /*FORMID4*/
        $form_id4 = [env('FORMID4')];
        $total_form_id4_application = Form::getApplicationCountDetail($form_id4, '');
        $total_form_id4_application_success = Form::getApplicationCountDetail($form_id4, 'SUCCESS');
        $total_form_id4_application_pending = Form::getApplicationCountDetail($form_id4, 'Pending');
        $total_form_id4_application_failed = Form::getApplicationCountDetail($form_id4, 'FAILED');
        $total_form_id4_application_free = Form::getApplicationCountDetail($form_id4, 'FREE');
        $total_form_id4_application_not_complete = Form::getApplicationCountDetail($form_id4, 'NOTCOMPLETE');
        /*FORMID5*/
        $form_id5 = [env('FORMID5')];
        $total_form_id5_application = Form::getApplicationCountDetail($form_id5, '');
        $total_form_id5_application_success = Form::getApplicationCountDetail($form_id5, 'SUCCESS');
        $total_form_id5_application_pending = Form::getApplicationCountDetail($form_id5, 'Pending');
        $total_form_id5_application_failed = Form::getApplicationCountDetail($form_id5, 'FAILED');
        $total_form_id5_application_free = Form::getApplicationCountDetail($form_id5, 'FREE');
        $total_form_id5_application_not_complete = Form::getApplicationCountDetail($form_id5, 'NOTCOMPLETE');
        /*FORMID6*/
        $form_id6 = [env('FORMID6')];
        $total_form_id6_application = Form::getApplicationCountDetail($form_id6, '');
        $total_form_id6_application_success = Form::getApplicationCountDetail($form_id6, 'SUCCESS');
        $total_form_id6_application_pending = Form::getApplicationCountDetail($form_id6, 'Pending');
        $total_form_id6_application_failed = Form::getApplicationCountDetail($form_id6, 'FAILED');
        $total_form_id6_application_free = Form::getApplicationCountDetail($form_id6, 'FREE');
        $total_form_id6_application_not_complete = Form::getApplicationCountDetail($form_id6, 'NOTCOMPLETE');

        /*......................................................*/
        $SECOND_APPLYFOR = 'Technician-I';
        $form_ids = [env('FORMID7'), env('FORMID8')];
        $total_second_application = Form::getApplicationCountDetail($form_ids, '');
        $total_second_application_success = Form::getApplicationCountDetail($form_ids, 'SUCCESS');
        $total_second_application_pending = Form::getApplicationCountDetail($form_ids, 'Pending');
        $total_second_application_failed = Form::getApplicationCountDetail($form_ids, 'FAILED');
        $total_second_application_free = Form::getApplicationCountDetail($form_ids, 'FREE');
        $total_second_application_not_complete = Form::getApplicationCountDetail($form_ids, 'NOTCOMPLETE');

        /*FORMID7*/
        $form_id7 = [env('FORMID7')];
        $total_form_id7_application = Form::getApplicationCountDetail($form_id7, '');
        $total_form_id7_application_success = Form::getApplicationCountDetail($form_id7, 'SUCCESS');
        $total_form_id7_application_pending = Form::getApplicationCountDetail($form_id7, 'Pending');
        $total_form_id7_application_failed = Form::getApplicationCountDetail($form_id7, 'FAILED');
        $total_form_id7_application_free = Form::getApplicationCountDetail($form_id7, 'FREE');
        $total_form_id7_application_not_complete = Form::getApplicationCountDetail($form_id7, 'NOTCOMPLETE');
        /*FORMID8*/
        $form_id8 = [env('FORMID8')];
        $total_form_id8_application = Form::getApplicationCountDetail($form_id8, '');
        $total_form_id8_application_success = Form::getApplicationCountDetail($form_id8, 'SUCCESS');
        $total_form_id8_application_pending = Form::getApplicationCountDetail($form_id8, 'Pending');
        $total_form_id8_application_failed = Form::getApplicationCountDetail($form_id8, 'FAILED');
        $total_form_id8_application_free = Form::getApplicationCountDetail($form_id8, 'FREE');
        $total_form_id8_application_not_complete = Form::getApplicationCountDetail($form_id8, 'NOTCOMPLETE');
        /*......................................................*/
        $THIRD_APPLYFOR = 'Lab Attendant-I';
        $form_ids = [env('FORMID9'), env('FORMID10')];
        $total_third_application = Form::getApplicationCountDetail($form_ids, '');
        $total_third_application_success = Form::getApplicationCountDetail($form_ids, 'SUCCESS');
        $total_third_application_pending = Form::getApplicationCountDetail($form_ids, 'Pending');
        $total_third_application_failed = Form::getApplicationCountDetail($form_ids, 'FAILED');
        $total_third_application_free = Form::getApplicationCountDetail($form_ids, 'FREE');
        $total_third_application_not_complete = Form::getApplicationCountDetail($form_ids, 'NOTCOMPLETE');

        /*FORMID9*/
        $form_id9 = [env('FORMID9')];
        $total_form_id9_application = Form::getApplicationCountDetail($form_id9, '');
        $total_form_id9_application_success = Form::getApplicationCountDetail($form_id9, 'SUCCESS');
        $total_form_id9_application_pending = Form::getApplicationCountDetail($form_id9, 'Pending');
        $total_form_id9_application_failed = Form::getApplicationCountDetail($form_id9, 'FAILED');
        $total_form_id9_application_free = Form::getApplicationCountDetail($form_id9, 'FREE');
        $total_form_id9_application_not_complete = Form::getApplicationCountDetail($form_id9, 'NOTCOMPLETE');
        /*FORMID10*/
        $form_id10 = [env('FORMID10')];
        $total_form_id10_application = Form::getApplicationCountDetail($form_id10, '');
        $total_form_id10_application_success = Form::getApplicationCountDetail($form_id10, 'SUCCESS');
        $total_form_id10_application_pending = Form::getApplicationCountDetail($form_id10, 'Pending');
        $total_form_id10_application_failed = Form::getApplicationCountDetail($form_id10, 'FAILED');
        $total_form_id10_application_free = Form::getApplicationCountDetail($form_id10, 'FREE');
        $total_form_id10_application_not_complete = Form::getApplicationCountDetail($form_id10, 'NOTCOMPLETE');

        return view('pages.dashboard',compact('formcount', 'FIRST_APPLYFOR','total_first_application','total_first_application_success','total_first_application_pending','total_first_application_failed','total_first_application_free','total_first_application_not_complete','total_form_id1_application','total_form_id1_application_success','total_form_id1_application_pending','total_form_id1_application_failed','total_form_id1_application_free','total_form_id1_application_not_complete','total_form_id2_application','total_form_id2_application_success','total_form_id2_application_pending','total_form_id2_application_failed','total_form_id2_application_free','total_form_id2_application_not_complete','total_form_id3_application','total_form_id3_application_success','total_form_id3_application_pending','total_form_id3_application_failed','total_form_id3_application_free','total_form_id3_application_not_complete','total_form_id4_application','total_form_id4_application_success','total_form_id4_application_pending','total_form_id4_application_failed','total_form_id4_application_free','total_form_id4_application_not_complete','total_form_id5_application','total_form_id5_application_success','total_form_id5_application_pending','total_form_id5_application_failed','total_form_id5_application_free','total_form_id5_application_not_complete','total_form_id6_application','total_form_id6_application_success','total_form_id6_application_pending','total_form_id6_application_failed','total_form_id6_application_free','total_form_id6_application_not_complete','SECOND_APPLYFOR','total_second_application','total_second_application_success','total_second_application_pending','total_second_application_failed','total_second_application_free','total_second_application_not_complete','total_form_id7_application','total_form_id7_application_success','total_form_id7_application_pending','total_form_id7_application_failed','total_form_id7_application_free','total_form_id7_application_not_complete','total_form_id8_application','total_form_id8_application_success','total_form_id8_application_pending','total_form_id8_application_failed','total_form_id8_application_free','total_form_id8_application_not_complete','THIRD_APPLYFOR','form_ids','total_third_application','total_third_application_success','total_third_application_pending','total_third_application_failed','total_third_application_free','total_third_application_not_complete','total_form_id9_application','total_form_id9_application_success','total_form_id9_application_pending','total_form_id9_application_failed','total_form_id9_application_free','total_form_id9_application_not_complete','total_form_id10_application','total_form_id10_application_success','total_form_id10_application_pending','total_form_id10_application_failed','total_form_id10_application_free','total_form_id10_application_not_complete'));
    }
}