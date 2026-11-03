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

        /*FORMID1*/
        $form_id1 = [env('FORMID1')];
        $total_form_id1_application = Form::getApplicationCountDetail($form_id1, '');
        /*FORMID2*/
        $form_id2 = [env('FORMID2')];
        $total_form_id2_application = Form::getApplicationCountDetail($form_id2, '');
        /*FORMID3*/
        $form_id3 = [env('FORMID3')];
        $total_form_id3_application = Form::getApplicationCountDetail($form_id3, '');
        /*FORMID4*/
        $form_id4 = [env('FORMID4')];
        $total_form_id4_application = Form::getApplicationCountDetail($form_id4, '');
        /*FORMID5*/
        $form_id5 = [env('FORMID5')];
        $total_form_id5_application = Form::getApplicationCountDetail($form_id5, '');
        /*FORMID6*/
        $form_id6 = [env('FORMID6')];
        $total_form_id6_application = Form::getApplicationCountDetail($form_id6, '');

        /*......................................................*/
        $SECOND_APPLYFOR = 'Technician-I';
        $form_ids = [env('FORMID7'), env('FORMID8')];
        $total_second_application = Form::getApplicationCountDetail($form_ids, '');

        /*FORMID7*/
        $form_id7 = [env('FORMID7')];
        $total_form_id7_application = Form::getApplicationCountDetail($form_id7, '');
        /*FORMID8*/
        $form_id8 = [env('FORMID8')];
        $total_form_id8_application = Form::getApplicationCountDetail($form_id8, '');
        /*......................................................*/
        $THIRD_APPLYFOR = 'Lab Attendant-I';
        $form_ids = [env('FORMID9'), env('FORMID10')];
        $total_third_application = Form::getApplicationCountDetail($form_ids, '');

        /*FORMID9*/
        $form_id9 = [env('FORMID9')];
        $total_form_id9_application = Form::getApplicationCountDetail($form_id9, '');
        /*FORMID10*/
        $form_id10 = [env('FORMID10')];
        $total_form_id10_application = Form::getApplicationCountDetail($form_id10, '');

        return view('pages.dashboard',compact('formcount', 'FIRST_APPLYFOR','total_first_application','total_form_id1_application','total_form_id2_application','total_form_id3_application','total_form_id4_application','total_form_id5_application','total_form_id6_application','SECOND_APPLYFOR','total_second_application','total_form_id7_application','total_form_id8_application','THIRD_APPLYFOR','form_ids','total_third_application','total_form_id9_application','total_form_id10_application'));
    }
}