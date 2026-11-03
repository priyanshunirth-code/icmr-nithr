<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Log;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\State;
use App\Models\City;
use App\Models\Paymentgateway;
use App\Models\PreviousExperience;
use App\Models\FivePerWeightage;
use App\Models\IcmrProject;
use App\Models\WorkingExperience;
use App\Models\Concern;
use App\Models\Exam;

use Dompdf\Dompdf;
use Dompdf\Options;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('studentRole');
    }

    public function applyFor()
    {
        return view('student.studentReg');
    }

    public function studentReg()
    {
        return view('student.studentReg');
    }

    public function studentFormSave(Request $req)
    {
        // dd($req->all());

        try {

            $form = new Form;
            $last_id = 1;

            $q = Form::where('form_id', $req->form_id)->orderBy('id', 'DESC')->first();

            if ($q) {
                $last_id = $q->application_no + 1;
            }

            $form->application_no = $last_id;
            $form->registration_no = $req->registration_no;
            $form->form_id = $req->form_id;
            $form->firstname = $req->firstname;
            $form->middlename = $req->middlename;
            $form->lastname = $req->lastname;
            $form->fathername = $req->fathername;
            $form->mothername = $req->mothername;
            $form->gender = $req->gender;
            $form->dob = $req->dob;
            $form->present_age = $req->present_age;
            $form->category = $req->category;
            $form->pwd = $req->pwd;
            $form->type_of_disablity = $req->type_of_disablity;
            $form->exsm = $req->exsm;
            // $form->ews = $req->ews;
            $form->marital_status = $req->marital_status;
            $form->postal_address = $req->postal_address;
            $form->postal_state = $req->postal_state;
            $form->postal_city = $req->postal_city;
            $form->postal_code = $req->postal_code;
            $form->permanent_address = $req->permanent_address;
            $form->permanent_state = $req->permanent_state;
            $form->permanent_city = $req->permanent_city;
            $form->permanent_postal_code = $req->permanent_postal_code;
            $form->email = $req->email;
            $form->mobile_no = $req->mobile_no;
            $form->id_card_type = $req->id_card_type;
            $form->id_card_no = $req->id_card_no;
            $form->divorced_type = $req->divorced_type;
            $form->mobile_no = $req->mobile_no;
            $form->alternate_mobile_no = $req->alternate_mobile_no;
            $form->nationality = $req->nationality;
            $form->tenth_roll_no = $req->tenth_roll_no;
            $form->tenth_year_of_passing = $req->tenth_year_of_passing;
            $form->tenth_name_of_university = $req->tenth_name_of_university;
            $form->tenth_marks = $req->tenth_marks;
            $form->tenth_outof = $req->tenth_outof;
            $form->tenth_percentage = $req->tenth_percentage;
            $form->tenth_subject = $req->tenth_subject;
            $form->tenth_division = $req->tenth_division;
            $form->twelveth_roll_no = $req->twelveth_roll_no;
            $form->twelveth_year_of_passing = $req->twelveth_year_of_passing;
            $form->twelveth_name_of_university = $req->twelveth_name_of_university;
            $form->twelveth_marks = $req->twelveth_marks;
            $form->twelveth_outof = $req->twelveth_outof;
            $form->twelveth_percentage = $req->twelveth_percentage;
            $form->twelveth_subject = $req->twelveth_subject;
            $form->twelveth_division = $req->twelveth_division;
            $form->diploma_roll_no = $req->diploma_roll_no;
            $form->diploma_year_of_passing = $req->diploma_year_of_passing;
            $form->diploma_name_of_university = $req->diploma_name_of_university;
            $form->diploma_marks = $req->diploma_marks;
            $form->diploma_outof = $req->diploma_outof;
            $form->diploma_percentage = $req->diploma_percentage;
            $form->diploma_subject = $req->diploma_subject;
            $form->diploma_division = $req->diploma_division;
            $form->bachelor_degree_roll_no = $req->bachelor_degree_roll_no;
            $form->bachelor_degree_year_of_passing = $req->bachelor_degree_year_of_passing;
            $form->bachelor_degree_name_of_university = $req->bachelor_degree_name_of_university;
            $form->bachelor_degree_marks = $req->bachelor_degree_marks;
            $form->bachelor_degree_outof = $req->bachelor_degree_outof;
            $form->bachelor_degree_percentage = $req->bachelor_degree_percentage;
            $form->bachelor_degree_subject = $req->bachelor_degree_subject;
            $form->bachelor_degree_division = $req->bachelor_degree_division;
            $form->master_degree_roll_no = $req->master_degree_roll_no;
            $form->master_degree_year_of_passing = $req->master_degree_year_of_passing;
            $form->master_degree_name_of_university = $req->master_degree_name_of_university;
            $form->master_degree_marks = $req->master_degree_marks;
            $form->master_degree_outof = $req->master_degree_outof;
            $form->master_degree_percentage = $req->master_degree_percentage;
            $form->master_degree_subject = $req->master_degree_subject;
            $form->master_degree_division = $req->master_degree_division;
            $form->other_exam = $req->other_exam;
            $form->other_roll_no = $req->other_roll_no;
            $form->other_year_of_passing = $req->other_year_of_passing;
            $form->other_name_of_university = $req->other_name_of_university;
            $form->other_marks = $req->other_marks;
            $form->other_outof = $req->other_outof;
            $form->other_percentage = $req->other_percentage;
            $form->other_subject = $req->other_subject;
            $form->other_division = $req->other_division;
            $form->computer_skills = $req->computer_skills;
            $form->computer_skills_description = $req->computer_skills_description;
            $form->working_in_icmr_project = $req->working_in_icmr_project;
            $form->additional_information = $req->additional_information;
            $form->claiming_age_relaxation = $req->claiming_age_relaxation;
            if ($req->claiming_age_relaxation == 'Yes') {

                $form->claiming_age_relaxation_type = implode(',', $req->claiming_age_relaxation_type);
            }

            $form->is_having_aadhar_card = $req->is_having_aadhar_card;
            $form->aadhar_no = $req->aadhar_no;
            $form->is_five_per_weightage = $req->is_five_per_weightage;
            $form->previous_experiences = $req->previous_experiences;

            $form->apply_for_category = $req->apply_for_category;

            $form->process = 1;

            $form->save();

            if (($req->is_five_per_weightage == 'Yes') && $req->five_per_weightage_organisation[0]) {

                foreach ($req->five_per_weightage_organisation as $key => $value) {
                    $five_per_weightage_organisation = $value;
                    $five_per_weightage_period_from = $req->five_per_weightage_period_from[$key];
                    $five_per_weightage_period_to = $req->five_per_weightage_period_to[$key];
                    $five_per_weightage_name_of_post = $req->five_per_weightage_name_of_post[$key];
                    $five_per_weightage_pay_scale = $req->five_per_weightage_pay_scale[$key];
                    $five_per_weightage_nature_of_duties = $req->five_per_weightage_nature_of_duties[$key];

                    $fovePerWei = new FivePerWeightage;

                    $fovePerWei->registration_no = $req->registration_no;
                    $fovePerWei->form_id = $form->id;
                    $fovePerWei->five_per_weightage_organisation = $five_per_weightage_organisation;
                    $fovePerWei->five_per_weightage_period_from = $five_per_weightage_period_from;
                    $fovePerWei->five_per_weightage_period_to = $five_per_weightage_period_to;
                    $fovePerWei->five_per_weightage_name_of_post = $five_per_weightage_name_of_post;
                    $fovePerWei->five_per_weightage_pay_scale = $five_per_weightage_pay_scale;
                    $fovePerWei->five_per_weightage_nature_of_duties = $five_per_weightage_nature_of_duties;

                    $fovePerWei->save();
                }
            }

            if (($req->working_in_icmr_project == 'Yes') && $req->icmr_name_of_institute[0]) {

                foreach ($req->icmr_name_of_institute as $key => $value) {
                    $icmr_name_of_institute = $value;
                    $icmr_doj = $req->icmr_doj[$key];
                    $icmr_name_of_project = $req->icmr_name_of_project[$key];
                    $icmr_post_name = $req->icmr_post_name[$key];
                    $icmr_nature_of_duties = $req->icmr_nature_of_duties[$key];

                    $icmrExperience = new IcmrProject;

                    $icmrExperience->registration_no = $req->registration_no;
                    $icmrExperience->form_id = $form->id;
                    $icmrExperience->icmr_name_of_institute = $icmr_name_of_institute;
                    $icmrExperience->icmr_doj = $icmr_doj;
                    $icmrExperience->icmr_name_of_project = $icmr_name_of_project;
                    $icmrExperience->icmr_post_name = $icmr_post_name;
                    $icmrExperience->icmr_nature_of_duties = $icmr_nature_of_duties;

                    $icmrExperience->save();
                }
            }

            if ($req->work_exp_organisation[0]) {
                foreach ($req->work_exp_organisation as $key => $value) {
                    $work_exp_organisation = $value;
                    $work_exp_period_from = $req->work_exp_period_from[$key];
                    $work_exp_period_to = $req->work_exp_period_to[$key];
                    $work_exp_name_of_the_post = $req->work_exp_name_of_the_post[$key];
                    $work_exp_nature_of_duties = $req->work_exp_nature_of_duties[$key];

                    $workExperience = new WorkingExperience;

                    $workExperience->registration_no = $req->registration_no;
                    $workExperience->form_id = $form->id;
                    $workExperience->work_exp_organisation = $work_exp_organisation;
                    $workExperience->work_exp_period_from = $work_exp_period_from;
                    $workExperience->work_exp_period_to = $work_exp_period_to;
                    $workExperience->work_exp_name_of_the_post = $work_exp_name_of_the_post;
                    $workExperience->work_exp_nature_of_duties = $work_exp_nature_of_duties;

                    $workExperience->save();
                }
            }

            if (($req->previous_experiences == 'Yes') && $req->organisation[0]) {
                foreach ($req->organisation as $key => $value) {
                    $organisation = $value;
                    $period_from = $req->period_from[$key];
                    $period_to = $req->period_to[$key];
                    $name_of_post = $req->name_of_post[$key];
                    $pay_scale = $req->pay_scale[$key];
                    $nature_of_duties = $req->nature_of_duties[$key];

                    $previousexperience = new PreviousExperience;

                    $previousexperience->registration_no = $req->registration_no;
                    $previousexperience->form_id = $form->id;
                    $previousexperience->organisation = $organisation;
                    $previousexperience->period_from = $period_from;
                    $previousexperience->period_to = $period_to;
                    $previousexperience->name_of_post = $name_of_post;
                    $previousexperience->pay_scale = $pay_scale;
                    $previousexperience->nature_of_duties = $nature_of_duties;

                    $previousexperience->save();
                }
            }

            return redirect()->route('studentDocsUpload', ['id' => $form->id]);

        } catch (\Exception $exc) {


            Log::saveLogs($exc->getMessage(), 'studentController/studentFormSave', auth()->user()->id);

            return redirect()->route('ErrorPage');

        }
    }

    public function studentDocUpload(Request $req)
    {
        try {

            $form = Form::where('registration_no',auth()->user()->registration_no)->where('id',$req->id)->first();

            // if($form->process == 2){
            //     return redirect()->route('studentFormPreview', ['id' => $formExist->id]);
            // }
            if ($form->process == 3) {
                return redirect()->route('registration');
            } else {

                $prevexps_count = PreviousExperience::where("form_id", $form->id)->count();
                $workExperience_count = WorkingExperience::where("form_id", $form->id)->count();
                $icmrExperience_count = IcmrProject::where("form_id", $form->id)->count();
                $fivePerWei_count = FivePerWeightage::where("form_id", $form->id)->count();
                return view('student.studentDocUpload', compact('form', 'prevexps_count', 'workExperience_count', 'icmrExperience_count', 'fivePerWei_count'));
            }
        } catch (\Exception $exc) {


            Log::saveLogs($exc->getMessage(), 'studentController/studentDocUpload', auth()->user()->id);
            return redirect()->route('ErrorPage');

        }
    }

    public function applyForm(Request $req)
    {
        try {
            $formExist = Form::where('registration_no', auth()->user()->registration_no)->where('form_id', $req->form_id)->first();

            if ($formExist) {
                // if($formExist->process == 1){
                //     return redirect()->route('studentDocsUpload', ['id' => $formExist->id]);
                // }
                // if($formExist->process == 2){
                //     return redirect()->route('studentFormPreview', ['id' => $formExist->id]);
                // }
                if ($formExist->process == 3) {
                    return redirect()->route('registration');
                } else {
                    return redirect()->route('stuEditForm', ['form_id' => $formExist->form_id, 'id' => $formExist->id]);
                }
            }

            $states = State::orderBy('name', 'ASC')->get();
            return view('student.studentReg', ["form_id" => $req->form_id, 'states' => $states, 'formExist' => $formExist]);

        } catch (\Exception $exc) {


            Log::saveLogs($exc->getMessage(), 'studentController/applyForm', auth()->user()->id);

            return redirect()->route('ErrorPage');

        }

    }

    public function stuEditForm(Request $req)
    {

        try {
            // $formData = Form::findOrFail($req->id);
            $formData = Form::where('registration_no',auth()->user()->registration_no)->where('id',$req->id)->first();

            if ($formData->form_id === $req->form_id) {

                $states = State::orderBy('name', 'ASC')->get();
                $postal_cities = City::where("state_id", $formData->postal_state)->orderBy('city', 'ASC')->get();
                $permanent_cities = City::where("state_id", $formData->permanent_state)->orderBy('city', 'ASC')->get();

                $prevexps = PreviousExperience::where("form_id", $formData->id)->get();
                $workExperience = WorkingExperience::where("form_id", $formData->id)->get();
                $icmrExperience = IcmrProject::where("form_id", $formData->id)->get();
                $fivePerWei = FivePerWeightage::where("form_id", $formData->id)->get();


                $prevexps_count = PreviousExperience::where("form_id", $formData->id)->count();
                $workExperience_count = WorkingExperience::where("form_id", $formData->id)->count();
                $icmrExperience_count = IcmrProject::where("form_id", $formData->id)->count();
                $fivePerWei_count = FivePerWeightage::where("form_id", $formData->id)->count();

                return view('student.editRegForm', ["fivePerWei" => $fivePerWei, "icmrExperience" => $icmrExperience, "workExperience" => $workExperience, "form_id" => $req->form_id, 'states' => $states, 'formData' => $formData, 'postal_cities' => $postal_cities, 'permanent_cities' => $permanent_cities, 'prevexps' => $prevexps, 'prevexps_count' => $prevexps_count, "fivePerWei_count" => $fivePerWei_count, "icmrExperience_count" => $icmrExperience_count, "workExperience_count" => $workExperience_count]);

            } else {
                abort(404);
            }
        } catch (\Exception $exc) {


            Log::saveLogs($exc->getMessage(), 'studentController/stuEditForm', auth()->user()->id);

            return redirect()->route('ErrorPage');

        }

    }

    public function studentDocsSave(Request $request)
    {
        try {
            $id = $request->id;

            // $form = Form::find($id);
            $form = Form::where('registration_no',auth()->user()->registration_no)->where('id',$id)->first();

            $registration_no = $form->registration_no;
            $form_id = $form->form_id;

            $profile_pic = "";
            $signature = "";
            $pwd_document = "";
            $exsm_document = "";
            $exp_certificate = "";
            $category_document = "";
            $tenth_document = "";
            $twelveth_document = "";
            $diploma_document = "";
            $bachelor_degree_document = "";
            $master_degree_document = "";
            $other_document = "";
            $five_per_weightage_certificate = "";
            $icmr_project_certificate = "";

            if ($request->profile_pic) {

                if ($form->profile_pic) {
                    unlink(base_path() . "/storage/app/public/" . $form->profile_pic);
                }

                $imgName = "PIC" . $request->profile_pic->getClientOriginalName();
                $profile_pic = $request->profile_pic->storeAs(
                    'formdocument/' . env('REGISTRATION_PREFIX') . $registration_no . '/' . $form_id,
                    $imgName,
                    'public'
                );
                $form->profile_pic = $profile_pic;
            }

            if ($request->signature) {
                if ($form->signature) {
                    unlink(base_path() . "/storage/app/public/" . $form->signature);
                }
                $imgName = "SIG" . $request->signature->getClientOriginalName();
                $signature = $request->signature->storeAs(
                    'formdocument/' . env('REGISTRATION_PREFIX') . $registration_no . '/' . $form_id,
                    $imgName,
                    'public'
                );
                $form->signature = $signature;
            }

            if ($request->pwd_document) {
                if ($form->pwd_document) {
                    unlink(base_path() . "/storage/app/public/" . $form->pwd_document);
                }

                $imgName = "PWD" . $request->pwd_document->getClientOriginalName();
                $pwd_document = $request->pwd_document->storeAs(
                    'formdocument/' . env('REGISTRATION_PREFIX') . $registration_no . '/' . $form_id,
                    $imgName,
                    'public'
                );
                $form->pwd_document = $pwd_document;
            }

            if ($request->exsm_document) {

                if ($form->exsm_document) {
                    unlink(base_path() . "/storage/app/public/" . $form->exsm_document);
                }

                $imgName = "EXSM" . $request->exsm_document->getClientOriginalName();
                $exsm_document = $request->exsm_document->storeAs(
                    'formdocument/' . env('REGISTRATION_PREFIX') . $registration_no . '/' . $form_id,
                    $imgName,
                    'public'
                );
                $form->exsm_document = $exsm_document;
            }

            if ($request->exp_certificate) {

                if ($form->exp_certificate) {
                    unlink(base_path() . "/storage/app/public/" . $form->exp_certificate);
                }

                $imgName = "EXP" . $request->exp_certificate->getClientOriginalName();
                $exp_certificate = $request->exp_certificate->storeAs(
                    'formdocument/' . env('REGISTRATION_PREFIX') . $registration_no . '/' . $form_id,
                    $imgName,
                    'public'
                );
                $form->exp_certificate = $exp_certificate;
            }

            if ($request->category_document) {

                if ($form->category_document) {
                    unlink(base_path() . "/storage/app/public/" . $form->category_document);
                }

                $imgName = "CASTE" . $request->category_document->getClientOriginalName();
                $category_document = $request->category_document->storeAs(
                    'formdocument/' . env('REGISTRATION_PREFIX') . $registration_no . '/' . $form_id,
                    $imgName,
                    'public'
                );
                $form->category_document = $category_document;
            }

            if ($request->tenth_document) {

                if ($form->tenth_document) {
                    unlink(base_path() . "/storage/app/public/" . $form->tenth_document);
                }

                $imgName = "TENTH" . $request->tenth_document->getClientOriginalName();
                $tenth_document = $request->tenth_document->storeAs(
                    'formdocument/' . env('REGISTRATION_PREFIX') . $registration_no . '/' . $form_id,
                    $imgName,
                    'public'
                );
                $form->tenth_document = $tenth_document;
            }

            if ($request->twelveth_document) {

                if ($form->twelveth_document) {
                    unlink(base_path() . "/storage/app/public/" . $form->twelveth_document);
                }

                $imgName = "TWELVETH" . $request->twelveth_document->getClientOriginalName();
                $twelveth_document = $request->twelveth_document->storeAs(
                    'formdocument/' . env('REGISTRATION_PREFIX') . $registration_no . '/' . $form_id,
                    $imgName,
                    'public'
                );
                $form->twelveth_document = $twelveth_document;
            }

            if ($request->diploma_document) {

                if ($form->diploma_document) {
                    unlink(base_path() . "/storage/app/public/" . $form->diploma_document);
                }

                $imgName = "DIPLOMA" . $request->diploma_document->getClientOriginalName();
                $diploma_document = $request->diploma_document->storeAs(
                    'formdocument/' . env('REGISTRATION_PREFIX') . $registration_no . '/' . $form_id,
                    $imgName,
                    'public'
                );
                $form->diploma_document = $diploma_document;
            }

            if ($request->bachelor_degree_document) {

                if ($form->bachelor_degree_document) {
                    unlink(base_path() . "/storage/app/public/" . $form->bachelor_degree_document);
                }

                $imgName = "BACHLOR" . $request->bachelor_degree_document->getClientOriginalName();
                $bachelor_degree_document = $request->bachelor_degree_document->storeAs(
                    'formdocument/' . env('REGISTRATION_PREFIX') . $registration_no . '/' . $form_id,
                    $imgName,
                    'public'
                );
                $form->bachelor_degree_document = $bachelor_degree_document;
            }

            if ($request->master_degree_document) {

                if ($form->master_degree_document) {
                    unlink(base_path() . "/storage/app/public/" . $form->master_degree_document);
                }

                $imgName = "MASTER" . $request->master_degree_document->getClientOriginalName();
                $master_degree_document = $request->master_degree_document->storeAs(
                    'formdocument/' . env('REGISTRATION_PREFIX') . $registration_no . '/' . $form_id,
                    $imgName,
                    'public'
                );
                $form->master_degree_document = $master_degree_document;
            }

            if ($request->other_document) {

                if ($form->other_document) {
                    unlink(base_path() . "/storage/app/public/" . $form->other_document);
                }

                $imgName = "OTHER" . $request->other_document->getClientOriginalName();
                $other_document = $request->other_document->storeAs(
                    'formdocument/' . env('REGISTRATION_PREFIX') . $registration_no . '/' . $form_id,
                    $imgName,
                    'public'
                );
                $form->other_document = $other_document;
            }

            if ($request->five_per_weightage_certificate) {

                if ($form->five_per_weightage_certificate) {
                    unlink(base_path() . "/storage/app/public/" . $form->five_per_weightage_certificate);
                }

                $imgName = "FPW" . $request->five_per_weightage_certificate->getClientOriginalName();
                $five_per_weightage_certificate = $request->five_per_weightage_certificate->storeAs(
                    'formdocument/' . env('REGISTRATION_PREFIX') . $registration_no . '/' . $form_id,
                    $imgName,
                    'public'
                );
                $form->five_per_weightage_certificate = $five_per_weightage_certificate;
            }

            if ($request->icmr_project_certificate) {

                if ($form->icmr_project_certificate) {
                    unlink(base_path() . "/storage/app/public/" . $form->icmr_project_certificate);
                }


                $imgName = "ICMRPR" . $request->icmr_project_certificate->getClientOriginalName();
                $icmr_project_certificate = $request->icmr_project_certificate->storeAs(
                    'formdocument/' . env('REGISTRATION_PREFIX') . $registration_no . '/' . $form_id,
                    $imgName,
                    'public'
                );
                $form->icmr_project_certificate = $icmr_project_certificate;
            }

            if ($request->previous_experiences_certificate) {

                if ($form->previous_experiences_certificate) {
                    unlink(base_path() . "/storage/app/public/" . $form->previous_experiences_certificate);
                }

                $imgName = "PEX" . $request->previous_experiences_certificate->getClientOriginalName();
                $previous_experiences_certificate = $request->previous_experiences_certificate->storeAs(
                    'formdocument/' . env('REGISTRATION_PREFIX') . $registration_no . '/' . $form_id,
                    $imgName,
                    'public'
                );
                $form->previous_experiences_certificate = $previous_experiences_certificate;
            }

            if ($request->any_other_document) {

                if ($form->any_other_document) {
                    unlink(base_path() . "/storage/app/public/" . $form->any_other_document);
                }

                $imgName = "AOTH" . $request->any_other_document->getClientOriginalName();
                $any_other_document = $request->any_other_document->storeAs(
                    'formdocument/' . env('REGISTRATION_PREFIX') . $registration_no . '/' . $form_id,
                    $imgName,
                    'public'
                );
                $form->any_other_document = $any_other_document;
            }

            $form->save();

            return redirect()->route('studentDocsUpload', ['id' => $form->id]);

        } catch (\Exception $exc) {


            Log::saveLogs($exc->getMessage(), 'studentController/studentDocsSave', auth()->user()->id);

            return redirect()->route('ErrorPage');

        }

    }


    public function studentFormPreviewFunc(Request $req)
    {

        try {
            // $formData = Form::find($req->id);
            $formData = Form::where('registration_no',auth()->user()->registration_no)->where('id',$req->id)->first();


            if ($formData->process == 3) {
                return redirect()->route('registration');
            } else {
                $formData->process = 2;
                $formData->save();

                $prevexps = PreviousExperience::where("form_id", $req->id)->get();
                $workExperience = WorkingExperience::where("form_id", $req->id)->get();
                $icmrExperience = IcmrProject::where("form_id", $req->id)->get();
                $fivePerWei = FivePerWeightage::where("form_id", $req->id)->get();

                $prevexps_count = PreviousExperience::where("form_id", $formData->id)->count();
                $workExperience_count = WorkingExperience::where("form_id", $formData->id)->count();
                $icmrExperience_count = IcmrProject::where("form_id", $formData->id)->count();
                $fivePerWei_count = FivePerWeightage::where("form_id", $formData->id)->count();


                return view('student.formPreview', compact('formData', 'prevexps', 'workExperience', 'icmrExperience', 'fivePerWei', 'prevexps_count', 'workExperience_count', 'icmrExperience_count', 'fivePerWei_count'));
            }

        } catch (\Exception $exc) {


            Log::saveLogs($exc->getMessage(), 'studentController/studentFormPreviewFunc', auth()->user()->id);

            return redirect()->route('ErrorPage');

        }

    }

    public function formsubmitandpay(Request $request)
    {
        try {
            $id = $request->id;
            $clientTxnId = "TXN" . rand(100000, 999999);
            // $form = Form::find($id);
            $form = Form::where('registration_no',auth()->user()->registration_no)->where('id',$id)->first();


            $form->payment_status = "Pending";
            $form->transaction_id = $clientTxnId;
            // $form->process = 3;

            $form->save();

            $data = array(
                'payerName' => $form->firstname . " " . $form->middlename . " " . $form->lastname,
                'payerMobile' => $form->mobile_no,
                'payerEmail' => $form->email,
                'payerAddress' => $form->postal_address,
                'clientTxnId' => $clientTxnId,
                'amount' => '300',
                'callbackUrl' => route("paymentresponse")
            );

            Paymentgateway::apply_payment($data);

        } catch (\Exception $exc) {


            Log::saveLogs($exc->getMessage(), 'studentController/formsubmitandpay', auth()->user()->id);
            return redirect()->route('ErrorPage');


        }
    }

    public function formsubmitandwithoutpay(Request $request)
    {
        try {


            $id = $request->id;
            // $form = Form::find($id);
            $form = Form::where('registration_no',auth()->user()->registration_no)->where('id',$id)->first();

            $form->process = 3;

            $form->save();

            $user = User::where('registration_no', $form->registration_no)->first();
            Form::sendSuccessStatusMail($user, $form);

            return redirect()->route('registration');



        } catch (\Exception $exc) {


            Log::saveLogs($exc->getMessage(), 'studentController/formsubmitandwithoutpay', auth()->user()->id);
            return redirect()->route('ErrorPage');


        }

    }

    public function paymentresponse(Request $request)
    {
        try {
            Paymentgateway::payment_response($request);
        } catch (\Exception $exc) {


            Log::saveLogs($exc->getMessage(), 'studentController/paymentresponse', auth()->user()->id);


        }
    }


    public function studentFormUpdate(Request $req)
    {

        try {
            // dd($req->all());die;
            $id = $req->id;
            // $form = Form::find($id);
            $form = Form::where('registration_no',auth()->user()->registration_no)->where('id',$id)->first();

            // $form->registration_no = $req->registration_no;
            // $form->form_id = $req->form_id;
            $form->firstname = $req->firstname;
            $form->middlename = $req->middlename;
            $form->lastname = $req->lastname;
            $form->fathername = $req->fathername;
            $form->mothername = $req->mothername;
            $form->gender = $req->gender;
            $form->dob = $req->dob;
            $form->present_age = $req->present_age;
            $form->category = $req->category;
            $form->pwd = $req->pwd;
            $form->type_of_disablity = $req->type_of_disablity;
            $form->exsm = $req->exsm;
            // $form->ews = $req->ews;
            $form->marital_status = $req->marital_status;
            $form->postal_address = $req->postal_address;
            $form->postal_state = $req->postal_state;
            $form->postal_city = $req->postal_city;
            $form->postal_code = $req->postal_code;
            $form->permanent_address = $req->permanent_address;
            $form->permanent_state = $req->permanent_state;
            $form->permanent_city = $req->permanent_city;
            $form->permanent_postal_code = $req->permanent_postal_code;
            $form->email = $req->email;
            $form->mobile_no = $req->mobile_no;
            $form->id_card_type = $req->id_card_type;
            $form->id_card_no = $req->id_card_no;
            $form->divorced_type = $req->divorced_type;
            $form->mobile_no = $req->mobile_no;
            $form->alternate_mobile_no = $req->alternate_mobile_no;
            $form->nationality = $req->nationality;
            $form->tenth_roll_no = $req->tenth_roll_no;
            $form->tenth_year_of_passing = $req->tenth_year_of_passing;
            $form->tenth_name_of_university = $req->tenth_name_of_university;
            $form->tenth_marks = $req->tenth_marks;
            $form->tenth_outof = $req->tenth_outof;
            $form->tenth_percentage = $req->tenth_percentage;
            $form->tenth_subject = $req->tenth_subject;
            $form->tenth_division = $req->tenth_division;
            $form->twelveth_roll_no = $req->twelveth_roll_no;
            $form->twelveth_year_of_passing = $req->twelveth_year_of_passing;
            $form->twelveth_name_of_university = $req->twelveth_name_of_university;
            $form->twelveth_marks = $req->twelveth_marks;
            $form->twelveth_outof = $req->twelveth_outof;
            $form->twelveth_percentage = $req->twelveth_percentage;
            $form->twelveth_subject = $req->twelveth_subject;
            $form->twelveth_division = $req->twelveth_division;
            $form->diploma_roll_no = $req->diploma_roll_no;
            $form->diploma_year_of_passing = $req->diploma_year_of_passing;
            $form->diploma_name_of_university = $req->diploma_name_of_university;
            $form->diploma_marks = $req->diploma_marks;
            $form->diploma_outof = $req->diploma_outof;
            $form->diploma_percentage = $req->diploma_percentage;
            $form->diploma_subject = $req->diploma_subject;
            $form->diploma_division = $req->diploma_division;
            $form->bachelor_degree_roll_no = $req->bachelor_degree_roll_no;
            $form->bachelor_degree_year_of_passing = $req->bachelor_degree_year_of_passing;
            $form->bachelor_degree_name_of_university = $req->bachelor_degree_name_of_university;
            $form->bachelor_degree_marks = $req->bachelor_degree_marks;
            $form->bachelor_degree_outof = $req->bachelor_degree_outof;
            $form->bachelor_degree_percentage = $req->bachelor_degree_percentage;
            $form->bachelor_degree_subject = $req->bachelor_degree_subject;
            $form->bachelor_degree_division = $req->bachelor_degree_division;
            $form->master_degree_roll_no = $req->master_degree_roll_no;
            $form->master_degree_year_of_passing = $req->master_degree_year_of_passing;
            $form->master_degree_name_of_university = $req->master_degree_name_of_university;
            $form->master_degree_marks = $req->master_degree_marks;
            $form->master_degree_outof = $req->master_degree_outof;
            $form->master_degree_percentage = $req->master_degree_percentage;
            $form->master_degree_subject = $req->master_degree_subject;
            $form->master_degree_division = $req->master_degree_division;
            $form->other_exam = $req->other_exam;
            $form->other_roll_no = $req->other_roll_no;
            $form->other_year_of_passing = $req->other_year_of_passing;
            $form->other_name_of_university = $req->other_name_of_university;
            $form->other_marks = $req->other_marks;
            $form->other_outof = $req->other_outof;
            $form->other_percentage = $req->other_percentage;
            $form->other_subject = $req->other_subject;
            $form->other_division = $req->other_division;
            $form->computer_skills = $req->computer_skills;
            $form->computer_skills_description = $req->computer_skills_description;
            $form->working_in_icmr_project = $req->working_in_icmr_project;
            $form->additional_information = $req->additional_information;
            $form->claiming_age_relaxation = $req->claiming_age_relaxation;

            if ($req->claiming_age_relaxation == 'Yes') {

                $form->claiming_age_relaxation_type = implode(',', $req->claiming_age_relaxation_type);
            }


            $form->is_having_aadhar_card = $req->is_having_aadhar_card;
            $form->aadhar_no = $req->aadhar_no;
            $form->is_five_per_weightage = $req->is_five_per_weightage;
            $form->previous_experiences = $req->previous_experiences;

            $form->apply_for_category = $req->apply_for_category;

            if ($req->is_five_per_weightage == 'No') {

                $form->five_per_weightage_certificate = NULL;
            }

            if ($req->working_in_icmr_project == 'No') {

                $form->icmr_project_certificate = NULL;
            }

            if ($req->previous_experiences == 'No') {

                $form->previous_experiences_certificate = NULL;
            }



            // $form->process = 1;
            // $form->process = 1;
            // $form->process = 1;

            $form->save();

            PreviousExperience::where("form_id", $id)->delete();
            FivePerWeightage::where("form_id", $id)->delete();
            IcmrProject::where("form_id", $id)->delete();
            WorkingExperience::where("form_id", $id)->delete();

            // $workExperience_count = WorkingExperience::where("form_id",$formData->id)->count();

            if (($req->is_five_per_weightage == 'Yes') && $req->five_per_weightage_organisation[0]) {

                foreach ($req->five_per_weightage_organisation as $key => $value) {
                    $five_per_weightage_organisation = $value;
                    $five_per_weightage_period_from = $req->five_per_weightage_period_from[$key];
                    $five_per_weightage_period_to = $req->five_per_weightage_period_to[$key];
                    $five_per_weightage_name_of_post = $req->five_per_weightage_name_of_post[$key];
                    $five_per_weightage_pay_scale = $req->five_per_weightage_pay_scale[$key];
                    $five_per_weightage_nature_of_duties = $req->five_per_weightage_nature_of_duties[$key];

                    $fovePerWei = new FivePerWeightage;

                    $fovePerWei->registration_no = $form->registration_no;
                    $fovePerWei->form_id = $form->id;
                    $fovePerWei->five_per_weightage_organisation = $five_per_weightage_organisation;
                    $fovePerWei->five_per_weightage_period_from = $five_per_weightage_period_from;
                    $fovePerWei->five_per_weightage_period_to = $five_per_weightage_period_to;
                    $fovePerWei->five_per_weightage_name_of_post = $five_per_weightage_name_of_post;
                    $fovePerWei->five_per_weightage_pay_scale = $five_per_weightage_pay_scale;
                    $fovePerWei->five_per_weightage_nature_of_duties = $five_per_weightage_nature_of_duties;

                    $fovePerWei->save();
                }
            }

            if (($req->working_in_icmr_project == 'Yes') && $req->icmr_name_of_institute[0]) {

                foreach ($req->icmr_name_of_institute as $key => $value) {
                    $icmr_name_of_institute = $value;
                    $icmr_doj = $req->icmr_doj[$key];
                    $icmr_name_of_project = $req->icmr_name_of_project[$key];
                    $icmr_post_name = $req->icmr_post_name[$key];
                    $icmr_nature_of_duties = $req->icmr_nature_of_duties[$key];

                    $icmrExperience = new IcmrProject;

                    $icmrExperience->registration_no = $form->registration_no;
                    $icmrExperience->form_id = $form->id;
                    $icmrExperience->icmr_name_of_institute = $icmr_name_of_institute;
                    $icmrExperience->icmr_doj = $icmr_doj;
                    $icmrExperience->icmr_name_of_project = $icmr_name_of_project;
                    $icmrExperience->icmr_post_name = $icmr_post_name;
                    $icmrExperience->icmr_nature_of_duties = $icmr_nature_of_duties;

                    $icmrExperience->save();
                }
            }

            // $work_exp_organisationArr = (array) $req->work_exp_organisation;

            // if($work_exp_organisationArr[0]==NUll){

            //     $form->exp_certificate = NULL;
            // }

            if ($req->work_exp_organisation[0]) {

                foreach ($req->work_exp_organisation as $key => $value) {
                    $work_exp_organisation = $value;
                    $work_exp_period_from = $req->work_exp_period_from[$key];
                    $work_exp_period_to = $req->work_exp_period_to[$key];
                    $work_exp_name_of_the_post = $req->work_exp_name_of_the_post[$key];
                    $work_exp_nature_of_duties = $req->work_exp_nature_of_duties[$key];

                    $workExperience = new WorkingExperience;

                    $workExperience->registration_no = $form->registration_no;
                    $workExperience->form_id = $form->id;
                    $workExperience->work_exp_organisation = $work_exp_organisation;
                    $workExperience->work_exp_period_from = $work_exp_period_from;
                    $workExperience->work_exp_period_to = $work_exp_period_to;
                    $workExperience->work_exp_name_of_the_post = $work_exp_name_of_the_post;
                    $workExperience->work_exp_nature_of_duties = $work_exp_nature_of_duties;

                    $workExperience->save();
                }
            }

            if ($req->previous_experiences == 'Yes') {
                foreach ($req->organisation as $key => $value) {
                    $organisation = $value;
                    $period_from = $req->period_from[$key];
                    $period_to = $req->period_to[$key];
                    $name_of_post = $req->name_of_post[$key];
                    $pay_scale = $req->pay_scale[$key];
                    $nature_of_duties = $req->nature_of_duties[$key];

                    $previousexperience = new PreviousExperience;

                    $previousexperience->registration_no = $form->registration_no;
                    $previousexperience->form_id = $form->id;
                    $previousexperience->organisation = $organisation;
                    $previousexperience->period_from = $period_from;
                    $previousexperience->period_to = $period_to;
                    $previousexperience->name_of_post = $name_of_post;
                    $previousexperience->pay_scale = $pay_scale;
                    $previousexperience->nature_of_duties = $nature_of_duties;

                    $previousexperience->save();
                }
            }


            return redirect()->route('studentDocsUpload', ['id' => $form->id]);

        } catch (\Exception $exc) {


            Log::saveLogs($exc->getMessage(), 'studentController/studentFormUpdate', auth()->user()->id);

            return redirect()->route('ErrorPage');

        }

    }

    
    public function printAdmitCard(Request $request){
        $id = $request->id;

        // $formData = Form::find($id);
        $formData = Form::where('registration_no',auth()->user()->registration_no)->where('id',$id)->first();
        $exam_detail = Exam::where('application_no', $formData->form_id . $formData->application_no)->first();

        // return view("student.printAdmitCard",compact("formData","exam_detail"));

        $page = view("student.printAdmitCard",compact("formData","exam_detail"))->render();
        echo json_encode(['page' => "$page"]);
    }
    
    public function raiseconcern(Request $request){
        try {
            $id  = $request->id;
            $action  = '';
            if($request->action){
                $action = $request->action;
            }

            $form = Form::find($id);
            $concerns = Concern::where("form_id",$id)->get();

            return view('student.raiseconcern', compact('id', 'form', 'concerns','action'));
        } catch (Exception $exc) {
            Log::saveLogs($exc->getMessage(), 'studentController/raiseconcern', auth()->user()->id);

            return redirect()->route('ErrorPage');
        }
    }

    public function saveraiseconcern(Request $request){
        try {
            $form_id = $request->form_id;
            $concern = $request->concern;
            $submit = $request->submit;

            $concernObj = new Concern;

            $concernObj->form_id = $form_id;
            $concernObj->concern = $concern;
            $concernObj->status = 0;
            if($submit == 'submit'){
                $concernObj->final_submit = 1;
            }
            else{
                $concernObj->final_submit = 0;
            }
            if($concernObj->save()){
                // $job_form_id = Form::where('registration_no', auth()->user()->registration_no)->get();

                // return redirect()->route('registration', ['job_form_id' => $job_form_id]);

                return redirect()->route('raiseconcern', ['id' => $form_id]);
            }
        } catch (Exception $exc) {
            Log::saveLogs($exc->getMessage(), 'studentController/saveraiseconcern', auth()->user()->id);

            return redirect()->route('ErrorPage');
        }
    }

    public function updateraiseconcern(Request $request){
        try {
            $form_id = $request->form_id;
            $concern = $request->concern;
            $submit = $request->submit;

            $concernObj = Concern::where("form_id", $form_id)->first();

            $concernObj->form_id = $form_id;
            $concernObj->concern = $concern;
            $concernObj->status = 0;
            if($submit == 'submit'){
                $concernObj->final_submit = 1;
            }
            else{
                $concernObj->final_submit = 0;
            }
            if($concernObj->save()){
                // $job_form_id = Form::where('registration_no', auth()->user()->registration_no)->get();

                // return redirect()->route('registration', ['job_form_id' => $job_form_id]);

                return redirect()->route('raiseconcern', ['id' => $form_id]);
            }
        } catch (Exception $exc) {
            Log::saveLogs($exc->getMessage(), 'studentController/saveraiseconcern', auth()->user()->id);

            return redirect()->route('ErrorPage');
        }
    }
}
