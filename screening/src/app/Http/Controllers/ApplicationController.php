<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\State;
use App\Models\Paymentgateway;
use App\Models\User;
use App\Models\PreviousExperience;
use App\Models\WorkingExperience;
use App\Models\IcmrProject;
use App\Models\FivePerWeightage;
use App\Models\Group;
use App\Models\FormSorting;
use App\Models\PostSubject;
use Dompdf\Dompdf;
use Dompdf\Options;
use Storage;
use File;
use Schema;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminRole');
    }

    public function applications(Request $request){
        try {
            // ini_set('memory_limit', '1200M');
            $form_id = $request->form_id;
            $result = $request->result;

            $query = Form::orderBy("form_id","ASC")->orderBy("application_no","ASC");

            if($form_id){
                $query = $query->where("form_id", $form_id);
            }
            if($result){
                $query = $query->where("result", $result);
            }

            // $forms = $query->get();
            $forms = $query->paginate(50);

            return view("admin.applications", compact("forms","form_id","result"));
        } catch (\Exception $exc) {

        }
    }

    public function exportExcel(Request $request)
    {
        // $pe_columns = Schema::getColumnListing('previous_experiences');
        // $fpw_columns = Schema::getColumnListing('five_per_weightages');
        // $we_columns = Schema::getColumnListing('working_experiences');
        // $ip_columns = Schema::getColumnListing('icmr_projects');

        // $column_arr = ["id","registration_no","form_id","created_at","updated_at"];

        // foreach ($column_arr as $key => $column) {
        //     if (($key = array_search($column, $pe_columns)) !== false) {
        //         unset($pe_columns[$key]);
        //     }
        //     if (($key = array_search($column, $fpw_columns)) !== false) {
        //         unset($fpw_columns[$key]);
        //     }
        //     if (($key = array_search($column, $we_columns)) !== false) {
        //         unset($we_columns[$key]);
        //     }
        //     if (($key = array_search($column, $ip_columns)) !== false) {
        //         unset($ip_columns[$key]);
        //     }
        // }

        // $data = json_decode(json_encode(DB::select('CALL get_users_unpaid_invoices')), True);
        // $data = Form::get()->toArray();

        $form_id = $request->form_id;
        $result = $request->result;

        $query = Form::select("forms.*")->selectRaw("CONCAT(form_id,'',application_no) as application_no")->selectRaw("postal_states.name as postal_state")->selectRaw("postal_cities.city as postal_city")->selectRaw("permanent_states.name as permanent_state")->selectRaw("permanent_cities.city as permanent_city")->orderBy("form_id","ASC")->join("states as postal_states","postal_states.id","=","forms.postal_state")->join("cities as postal_cities","postal_cities.id","=","forms.postal_city")->join("states as permanent_states","permanent_states.id","=","forms.permanent_state")->join("cities as permanent_cities","permanent_cities.id","=","forms.permanent_city")->orderBy("application_no","ASC");
        if($form_id){
            $query = $query->where("forms.form_id",$form_id);
        }
        if($result){
            $query = $query->where("result", $result);
        }
        $data = $query->get()->toArray();
        function cleanData(&$str)
        {
            if ($str == 't') $str = 'TRUE';
            if ($str == 'f') $str = 'FALSE';
            if (preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str) || preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$str)) {
                $str = " $str";
            }
            if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
        }

        // filename for download
        $filename = "all_application_" . date('Ymdhis') . ".csv";

        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: text/csv");

        $out = fopen("php://output", 'w');

        $flag = false;
        foreach ($data as $row) {
            unset($row['id']);
            unset($row['registration_no']);
            unset($row['form_id']);
            unset($row['process']);
            unset($row['payment_status']);
            unset($row['transaction_id']);
            unset($row['payment_date']);
            unset($row['amount']);
            unset($row['payment_mode']);
            unset($row['paid_amount']);
            unset($row['enquiry_payment_status']);
            unset($row['challan_number']);
            unset($row['sabpaisaTxnId']);
            unset($row['application_download_status']);
            unset($row['success_mail_sent']);
            unset($row['failed_mail_sent']);
            unset($row['short_status']);
            unset($row['category_document']);
            unset($row['pwd_document']);
            unset($row['exsm_document']);
            unset($row['ews_document']);
            unset($row['tenth_document']);
            unset($row['twelveth_document']);
            unset($row['diploma_document']);
            unset($row['bachelor_degree_document']);
            unset($row['master_degree_document']);
            unset($row['other_document']);
            unset($row['profile_pic']);
            unset($row['exp_certificate']);
            unset($row['five_per_weightage_certificate']);
            unset($row['icmr_project_certificate']);
            unset($row['any_other_document']);
            unset($row['signature']);
            unset($row['created_at']);
            unset($row['updated_at']);
            
            // $prevexps = PreviousExperience::where("form_id", $form->id)->get();
            // $fivePerWei = FivePerWeightage::where("form_id", $form->id)->get();
            // $workExperience = WorkingExperience::where("form_id", $form->id)->get();
            // $icmrExperience = IcmrProject::where("form_id", $form->id)->get();

            if (!$flag) {
                // display field/column names as first row
                // $columns = array_keys($row);
                // $columns = array_merge($columns,$pe_columns,$fpw_columns,$we_columns,$ip_columns);
                // fputcsv($out, $columns, ',', '"');
                fputcsv($out, array_keys($row), ',', '"');
                $flag = true;
            }
            array_walk($row, __NAMESPACE__ . '\cleanData');
            fputcsv($out, array_values($row), ',', '"');
        }

        fclose($out);
    }

    public function pendingpaymentjobapplications(Request $request){
        try {
            $keyword = $request->keyword;

            $prefix = env('REGISTRATION_PREFIX');
            $str = $keyword;

            if (substr($str, 0, strlen($prefix)) == $prefix) {
                $str = substr($str, strlen($prefix));
            }

            $query = Form::orderBy("payment_status","ASC");

            if($keyword){
                $query = $query->where(function($qry) use ($keyword, $str){
                        $qry->where("firstname", $keyword)
                        ->orWhere("middlename", $keyword)
                        ->orWhere("lastname", $keyword)
                        ->orWhere("payment_status", $keyword)
                        ->orWhere("registration_no", $str);
                    });
            }
            $query = $query->where(function($qry){
                        $qry->where("payment_status","FAILED")
                        ->orWhere("payment_status","Pending");
                    });

            $forms = $query->paginate(50);

            return view("admin.pendingpaymentapplications", compact("forms","keyword"));
        } catch (\Exception $exc) {
        }
    }

    public function groups(){
        try {
            $groups = Group::orderBy("id")->get();

            return view("admin.groups", compact("groups"));
        } catch (Exception $exc) {
            
        }
    }

    public function updateassignto(Request $request){
        try {
            $id = $request->group_id;
            $assign_to = $request->assign_to;

            $group = Group::find($id);
            $group->assign_to = $assign_to;

            if($group->save()){
                echo true;
            }
            else{
                echo false;
            }
        } catch (Exception $exc) {
            
        }
    }

    public function groupapplicants(Request $request){
        try {
            $group_id = $request->group_id;
            $group = Group::find($group_id);

            $forms = Form::getAllApplicationsLimitOffset($group->form_id, $group->from_sno, $group->to_sno);

            return view("admin.groupcandidates", compact("group","forms"));
        } catch (Exception $exc) {
            
        }
    }

    public function editscreening(Request $request){
        try {
            $group = Group::find($request->group_id);

            $total_form = $group->to_sno - $group->from_sno + 1;
            $subject_group = $group->subject_group;

            $complete_shorting = Group::getTotalApplicationsLimitOffset($group->form_id, $group->from_sno, $group->to_sno, '');

            $all_forms = Form::getApplicationsLimitOffset($group->form_id, $group->from_sno, ($group->to_sno-$complete_shorting));
            $pending_shorting = count($all_forms);

            $total_tab = ceil($total_form/env('LIMIT'));

            $formData = Form::find($request->id);

            $form_sorting = FormSorting::where("form_id", $formData->id)->first();
            $sorting_update_status = false;

            $age_limit = $group->age_limit;
            $age_relaxation_types = [];
            $exp_message = "";
            $subjects = PostSubject::where("form_id", $group->form_id)->get();
            if(!empty($form_sorting)){
                $sorting_update_status = true;

                $checked_age_relaxation = [];

                if($form_sorting->age_relaxation_types){
                    $checked_age_relaxation = json_decode($form_sorting->age_relaxation_types);
                    $age_relaxation_types = json_decode($form_sorting->age_relaxation_types);
                }
                $age_limit = FormSorting::calculate_age_relaxation($formData->id, $group->id, $checked_age_relaxation);
                if($form_sorting->essential_qualification_subject){
                    $subject = PostSubject::where("id", $form_sorting->essential_qualification_subject)->first();
                    $exp_message = $subject->experience;
                }
                else{
                    $exp_message = $subjects[0]->experience;
                }
            }

            return view("admin.editscreening", compact("subject_group","total_form","formData","group","form_sorting","sorting_update_status","age_limit","subjects","age_relaxation_types","exp_message","pending_shorting","complete_shorting"));
        } catch (Exception $exc) {
            
        }
    }

    public function save_sorting(Request $request){
        try {
            $form_id = $request->form_id;
            $step = $request->step;

            switch ($step) {
                case 'name':
                    $form_sorting = FormSorting::where("form_id", $form_id)->first();

                    if(empty($form_sorting)){
                        $form_sorting = new FormSorting;
                    }

                    $form_sorting->form_id = $form_id;
                    $form_sorting->name_result = $request->name_result;
                    $form_sorting->name_pass_reason = $request->name_pass_reason;
                    $form_sorting->name_fail_reason = $request->name_fail_reason;

                    if($form_sorting->save()){
                        echo true;
                    }
                    else{
                        echo false;
                    }

                    break;
                case 'photo_sign':
                    $form_sorting = FormSorting::where("form_id", $form_id)->first();

                    if(empty($form_sorting)){
                        $form_sorting = new FormSorting;
                    }

                    $form_sorting->form_id = $form_id;
                    $form_sorting->photo_sign_result = $request->photo_sign_result;
                    $form_sorting->photo_sign_pass_reason = $request->photo_sign_pass_reason;
                    $form_sorting->photo_sign_fail_reason = $request->photo_sign_fail_reason;

                    if($form_sorting->save()){
                        echo true;
                    }
                    else{
                        echo false;
                    }
                    
                    break;
                case 'category':
                    $form_sorting = FormSorting::where("form_id", $form_id)->first();

                    if(empty($form_sorting)){
                        $form_sorting = new FormSorting;
                    }

                    $form_sorting->form_id = $form_id;
                    $form_sorting->category_result = $request->category_result;
                    $form_sorting->category_pass_reason = $request->category_pass_reason;
                    $form_sorting->category_fail_reason = $request->category_fail_reason;

                    if($form_sorting->save()){
                        echo true;
                    }
                    else{
                        echo false;
                    }
                    
                    break;
                case 'application_fees':
                    $form_sorting = FormSorting::where("form_id", $form_id)->first();

                    if(empty($form_sorting)){
                        $form_sorting = new FormSorting;
                    }

                    $form_sorting->form_id = $form_id;
                    $form_sorting->application_fees_result = $request->application_fees_result;
                    $form_sorting->application_fees_pass_reason = $request->application_fees_pass_reason;
                    $form_sorting->application_fees_fail_reason = $request->application_fees_fail_reason;

                    if($form_sorting->save()){
                        echo true;
                    }
                    else{
                        echo false;
                    }
                    
                    break;
                case 'age_relaxation':
                    $form_sorting = FormSorting::where("form_id", $form_id)->first();

                    if(empty($form_sorting)){
                        $form_sorting = new FormSorting;
                    }

                    $form_sorting->form_id = $form_id;
                    $form_sorting->age_relaxation_result = $request->age_relaxation_result;
                    $form_sorting->age_relaxation_pass_reason = $request->age_relaxation_pass_reason;
                    $form_sorting->age_relaxation_fail_reason = $request->age_relaxation_fail_reason;
                    $form_sorting->age_relaxation_types = ($request->age_relaxation_types)?json_encode($request->age_relaxation_types) : "";
                    $form_sorting->age_limit_after_relaxation = $request->age_limit_after_relaxation;

                    if($form_sorting->save()){
                        echo true;
                    }
                    else{
                        echo false;
                    }
                    
                    break;
                case 'essential_qualification':
                    $form_sorting = FormSorting::where("form_id", $form_id)->first();

                    if(empty($form_sorting)){
                        $form_sorting = new FormSorting;
                    }

                    $form_sorting->form_id = $form_id;
                    $form_sorting->essential_qualification_result = $request->essential_qualification_result;
                    $form_sorting->essential_qualification_pass_reason = $request->essential_qualification_pass_reason;
                    $form_sorting->essential_qualification_fail_reason = $request->essential_qualification_fail_reason;
                    $form_sorting->essential_qualification_subject = $request->essential_qualification_subject;

                    if($form_sorting->save()){
                        echo true;
                    }
                    else{
                        echo false;
                    }
                    
                    break;
                case 'experience':
                    $form_sorting = FormSorting::where("form_id", $form_id)->first();

                    if(empty($form_sorting)){
                        $form_sorting = new FormSorting;
                    }

                    $form_sorting->form_id = $form_id;
                    $form_sorting->experience_result = $request->experience_result;
                    $form_sorting->experience_pass_reason = $request->experience_pass_reason;
                    $form_sorting->experience_fail_reason = $request->experience_fail_reason;

                    if($form_sorting->save()){
                        $pending_step = FormSorting::checkFormResult($form_sorting->id);
                        echo $pending_step;
                        // echo true;
                    }
                    else{
                        echo false;
                    }
                    
                    break;
                
                default:
                    break;
            }
        } catch (Exception $exc) {
            
        }
    }

    public function calculate_age_relaxation(Request $request){
        try {
            $form_id = $request->form_id;
            $group_id = $request->group_id;
            $checked_age_relaxation = $request->checked_age_relaxation;

            $age_limit = FormSorting::calculate_age_relaxation($form_id, $group_id, $checked_age_relaxation);

            echo $age_limit;
        } catch (Exception $exc) {
            
        }
    }

    public function processshortingreview(Request $request){
        try {
            $form_id = $request->form_id;
            $group_id = $request->group_id;
            $formData = Form::find($form_id);
            $form_sorting = FormSorting::where("form_id", $form_id)->first();
            $stepComplete = FormSorting::getCompleteStepCount($form_sorting->id);

            if($form_sorting->essential_qualification_subject){
                $subject = PostSubject::where("id", $form_sorting->essential_qualification_subject)->first();
                $form_sorting->subject = $subject->subject;
                $form_sorting->exp_message = $subject->experience;
            }
            
            return view("admin.processshortingreview", compact("formData","form_sorting","stepComplete","group_id"));
        } catch (Exception $exc) {
            
        }
    }

    public function savefinalsorting(Request $request){
        try {
            $form_id = $request->form_id;
            $group_id = $request->group_id;
            
            $form_sorting = FormSorting::where("form_id", $form_id)->first();

            $fail_reason = "";
            $number = 0;
            $result = "PASS";

            if($form_sorting->name_result == "FAIL"){
                $number++;
                $result = "FAIL";
                $fail_reason .= $number . ". " . $form_sorting->name_fail_reason . "<br>";
            }
            if($form_sorting->photo_sign_result == "FAIL"){
                $number++;
                $result = "FAIL";
                $fail_reason .= $number . ". " . $form_sorting->photo_sign_fail_reason . "<br>";
            }
            if($form_sorting->category_result == "FAIL"){
                $number++;
                $result = "FAIL";
                $fail_reason .= $number . ". " . $form_sorting->category_fail_reason . "<br>";
            }
            if($form_sorting->application_fees_result == "FAIL"){
                $number++;
                $result = "FAIL";
                $fail_reason .= $number . ". " . $form_sorting->application_fees_fail_reason . "<br>";
            }
            if($form_sorting->age_relaxation_result == "FAIL"){
                $number++;
                $result = "FAIL";
                $fail_reason .= $number . ". " . $form_sorting->age_relaxation_fail_reason . "<br>";
            }
            if($form_sorting->essential_qualification_result == "FAIL"){
                $number++;
                $result = "FAIL";
                $fail_reason .= $number . ". " . $form_sorting->essential_qualification_fail_reason . "<br>";
            }
            if($form_sorting->experience_result == "FAIL"){
                $number++;
                $result = "FAIL";
                $fail_reason .= $number . ". " . $form_sorting->experience_fail_reason . "<br>";
            }

            $pass_reason = "";
            $number = 0;

            if($form_sorting->name_result == "PASS" && $form_sorting->name_pass_reason){
                $number++;
                $pass_reason .= $number . ". " . $form_sorting->name_pass_reason . "<br>";
            }
            if($form_sorting->photo_sign_result == "PASS" && $form_sorting->photo_sign_pass_reason){
                $number++;
                $pass_reason .= $number . ". " . $form_sorting->photo_sign_pass_reason . "<br>";
            }
            if($form_sorting->category_result == "PASS" && $form_sorting->category_pass_reason){
                $number++;
                $pass_reason .= $number . ". " . $form_sorting->category_pass_reason . "<br>";
            }
            if($form_sorting->application_fees_result == "PASS" && $form_sorting->application_fees_pass_reason){
                $number++;
                $pass_reason .= $number . ". " . $form_sorting->application_fees_pass_reason . "<br>";
            }
            if($form_sorting->age_relaxation_result == "PASS" && $form_sorting->age_relaxation_pass_reason){
                $number++;
                $pass_reason .= $number . ". " . $form_sorting->age_relaxation_pass_reason . "<br>";
            }
            if($form_sorting->essential_qualification_result == "PASS" && $form_sorting->essential_qualification_pass_reason){
                $number++;
                $pass_reason .= $number . ". " . $form_sorting->essential_qualification_pass_reason . "<br>";
            }
            if($form_sorting->experience_result == "PASS" && $form_sorting->experience_pass_reason){
                $number++;
                $pass_reason .= $number . ". " . $form_sorting->experience_pass_reason . "<br>";
            }

            $formData = Form::find($form_id);

            $formData->short_status = 1;
            $formData->result = $result;
            $formData->pass_reason = $pass_reason;
            $formData->fail_reason = $fail_reason;

            if($formData->save()){
                return redirect()->route("admin.group.applicants",["group_id" => $group_id])->with('success', 'Data saved successfully!');
            }
            else{
                return redirect()->back()->with("error","Something went wrong!!");
            }

        } catch (Exception $exc) {
            
        }
    }

    public function documentnotshowingapplications(Request $request){
        try {
            $form_id = $request->form_id;
            $result = $request->result;

            if(!$result){
                $result = 'FAIL';
            }
            $query = Form::orderBy("form_id","ASC")->orderBy("application_no","ASC");

            if($form_id){
                $query = $query->where("form_id", $form_id);
            }
            if($result){
                $query = $query->where("result", $result);
            }

            $forms = $query->get();
            // $forms = $query->paginate(50);

            if(count($forms)){
                $path = public_path('') . '/../storage/app/public/';
                // $path = public_path('') . '/storage/';
                foreach ($forms as $key => $form) {
                    $status = false;

                    $form->profile_pic_not_available = false;
                    $form->signature_not_available = false;
                    $form->category_doc_not_available = false;
                    $form->pwd_doc_not_available = false;
                    $form->exsm_doc_not_available = false;
                    $form->ews_doc_not_available = false;
                    $form->tenth_doc_not_available = false;
                    $form->twelveth_doc_not_available = false;
                    $form->diploma_doc_not_available = false;
                    $form->bachelor_degree_doc_not_available = false;
                    $form->master_degree_doc_not_available = false;
                    $form->other_doc_not_available = false;
                    // $form->five_per_weightage_certificate_not_available = false;
                    $form->exp_certificate_not_available = false;
                    $form->icmr_project_certificate_not_available = false;
                    $form->previous_experiences_certificate_not_available = false;
                    $form->any_other_doc_not_available = false;

                    if($form->category_document){
                        if(!file_exists($path . $form->category_document)){
                            $status = true;
                            $form->category_doc_not_available = true;
                            // echo "<pre>";
                            // print_r($path . $form->category_document);
                            // echo "</pre>";
                        }
                    }
                    if($form->pwd_document){
                        if(!file_exists($path . $form->pwd_document)){
                            $status = true;
                            $form->pwd_doc_not_available = true;
                        }
                    }
                    if($form->exsm_document){
                        if(!file_exists($path . $form->exsm_document)){
                            $status = true;
                            $form->exsm_doc_not_available = true;
                        }
                    }
                    if($form->ews_document){
                        if(!file_exists($path . $form->ews_document)){
                            $status = true;
                            $form->ews_doc_not_available = true;
                        }
                    }
                    if($form->tenth_document){
                        if(!file_exists($path . $form->tenth_document)){
                            $status = true;
                            $form->tenth_doc_not_available = true;
                        }
                    }
                    if($form->twelveth_document){
                        if(!file_exists($path . $form->twelveth_document)){
                            $status = true;
                            $form->twelveth_doc_not_available = true;
                        }
                    }
                    if($form->diploma_document){
                        if(!file_exists($path . $form->diploma_document)){
                            $status = true;
                            $form->diploma_doc_not_available = true;
                        }
                    }
                    if($form->bachelor_degree_document){
                        if(!file_exists($path . $form->bachelor_degree_document)){
                            $status = true;
                            $form->bachelor_degree_doc_not_available = true;
                        }
                    }
                    if($form->master_degree_document){
                        if(!file_exists($path . $form->master_degree_document)){
                            $status = true;
                            $form->master_degree_doc_not_available = true;
                        }
                    }
                    if($form->other_document){
                        if(!file_exists($path . $form->other_document)){
                            $status = true;
                            $form->other_doc_not_available = true;
                        }
                    }
                    if($form->profile_pic){
                        if(!file_exists($path . $form->profile_pic)){
                            $status = true;
                            $form->profile_pic_not_available = true;
                        }
                    }
                    // if($form->five_per_weightage_certificate){
                    //     if(!file_exists($path . $form->five_per_weightage_certificate)){
                    //         $status = true;
                    //         $form->five_per_weightage_certificate_not_available = true;
                    //     }
                    // }
                    if($form->exp_certificate){
                        if(!file_exists($path . $form->exp_certificate)){
                            $status = true;
                            $form->exp_certificate_not_available = true;
                        }
                    }
                    if($form->icmr_project_certificate){
                        if(!file_exists($path . $form->icmr_project_certificate)){
                            $status = true;
                            $form->icmr_project_certificate_not_available = true;
                        }
                    }
                    if($form->signature){
                        if(!file_exists($path . $form->signature)){
                            $status = true;
                            $form->signature_not_available = true;
                        }
                    }
                    if($form->previous_experiences_certificate){
                        if(!file_exists($path . $form->previous_experiences_certificate)){
                            $status = true;
                            $form->previous_experiences_certificate_not_available = true;
                        }
                    }
                    if($form->any_other_document){
                        if(!file_exists($path . $form->any_other_document)){
                            $status = true;
                            $form->any_other_doc_not_available = true;
                        }
                    }

                    if(!$status){
                        unset($forms[$key]);
                    }
                }
            }

            return view("admin.documentnotshowingapplications", compact("forms","form_id","result"));
        } catch (\Exception $exc) {

        }
    }
    
    

    public function checklongnamedocumentcandidate(Request $request){
        try {
            $form_id = $request->form_id;
            $result = $request->result;

            if(!$result){
                $result = 'PASS';
            }
            $query = Form::orderBy("form_id","ASC")->orderBy("application_no","ASC");

            if($form_id){
                $query = $query->where("form_id", $form_id);
            }
            if($result){
                $query = $query->where("result", $result);
            }

            $forms = $query->get();

            if(count($forms)){
                $path = public_path('') . '/../storage/app/public/';
                // $path = public_path('') . '/storage/';
                foreach ($forms as $key => $form) {
                    $status = false;


                    $form->profile_pic_not_available = false;
                    $form->signature_not_available = false;
                    $form->category_doc_not_available = false;
                    $form->pwd_doc_not_available = false;
                    $form->exsm_doc_not_available = false;
                    $form->ews_doc_not_available = false;
                    $form->tenth_doc_not_available = false;
                    $form->twelveth_doc_not_available = false;
                    $form->diploma_doc_not_available = false;
                    $form->bachelor_degree_doc_not_available = false;
                    $form->master_degree_doc_not_available = false;
                    $form->other_doc_not_available = false;
                    $form->exp_certificate_not_available = false;
                    $form->icmr_project_certificate_not_available = false;
                    $form->previous_experiences_certificate_not_available = false;
                    $form->any_other_doc_not_available = false;

                    if($form->category_document){
                        if(file_exists($path . $form->category_document)){
                            $document_arr = explode("/", $form->category_document);
                            $filename = $document_arr[3];
                            
                            if(strpos($form->category_document, '%20') !== false || strlen($filename) > 80) {
                                $status = true;
                                $form->category_doc_not_available = true;
                            }
                        }
                    }
                    if($form->pwd_document){
                        if(file_exists($path . $form->pwd_document)){
                            $document_arr = explode("/", $form->pwd_document);
                            $filename = $document_arr[3];
                            
                            if(strpos($form->pwd_document, '%20') !== false || strlen($filename) > 80) {
                                $status = true;
                                $form->pwd_doc_not_available = true;
                            }
                        }
                    }
                    if($form->exsm_document){
                        if(file_exists($path . $form->exsm_document)){
                            $document_arr = explode("/", $form->exsm_document);
                            $filename = $document_arr[3];
                            
                            if(strpos($form->exsm_document, '%20') !== false || strlen($filename) > 80) {
                                $status = true;
                                $form->exsm_doc_not_available = true;
                            }
                        }
                    }
                    if($form->ews_document){
                        if(file_exists($path . $form->ews_document)){
                            $document_arr = explode("/", $form->ews_document);
                            $filename = $document_arr[3];
                            
                            if(strpos($form->ews_document, '%20') !== false || strlen($filename) > 80) {
                                $status = true;
                                $form->ews_doc_not_available = true;
                            }
                        }
                    }
                    if($form->tenth_document){
                        if(file_exists($path . $form->tenth_document)){
                            $document_arr = explode("/", $form->tenth_document);
                            $filename = $document_arr[3];
                            
                            if(strpos($form->tenth_document, '%20') !== false || strlen($filename) > 80) {
                                $status = true;
                                $form->tenth_doc_not_available = true;
                            }
                        }
                    }
                    if($form->twelveth_document){
                        if(file_exists($path . $form->twelveth_document)){
                            $document_arr = explode("/", $form->twelveth_document);
                            $filename = $document_arr[3];
                            
                            if(strpos($form->twelveth_document, '%20') !== false || strlen($filename) > 80) {
                                $status = true;
                                $form->twelveth_doc_not_available = true;
                            }
                        }
                    }
                    if($form->diploma_document){
                        if(file_exists($path . $form->diploma_document)){
                            $document_arr = explode("/", $form->diploma_document);
                            $filename = $document_arr[3];
                            
                            if(strpos($form->diploma_document, '%20') !== false || strlen($filename) > 80) {
                                $status = true;
                                $form->diploma_doc_not_available = true;
                            }
                        }
                    }
                    if($form->bachelor_degree_document){
                        if(file_exists($path . $form->bachelor_degree_document)){
                            $document_arr = explode("/", $form->bachelor_degree_document);
                            $filename = $document_arr[3];

                            if(strpos($form->bachelor_degree_document, '%20') !== false || strlen($filename) > 80) {
                                $status = true;
                                $form->bachelor_degree_doc_not_available = true;
                            }
                        }
                    }
                    if($form->master_degree_document){
                        if(file_exists($path . $form->master_degree_document)){
                            $document_arr = explode("/", $form->master_degree_document);
                            $filename = $document_arr[3];
                            
                            if(strpos($form->master_degree_document, '%20') !== false || strlen($filename) > 80) {
                                $status = true;
                                $form->master_degree_doc_not_available = true;
                            }
                        }
                    }
                    if($form->other_document){
                        if(file_exists($path . $form->other_document)){
                            $document_arr = explode("/", $form->other_document);
                            $filename = $document_arr[3];
                            
                            if(strpos($form->other_document, '%20') !== false || strlen($filename) > 80) {
                                $status = true;
                                $form->other_doc_not_available = true;
                            }
                        }
                    }
                    if($form->profile_pic){
                        if(file_exists($path . $form->profile_pic)){
                            $document_arr = explode("/", $form->profile_pic);
                            $filename = $document_arr[3];
                            
                            if(strpos($form->profile_pic, '%20') !== false || strlen($filename) > 80) {
                                $status = true;
                                $form->profile_pic_not_available = true;
                            }
                        }
                    }
                    if($form->exp_certificate){
                        if(file_exists($path . $form->exp_certificate)){
                            $document_arr = explode("/", $form->exp_certificate);
                            $filename = $document_arr[3];
                            
                            if(strpos($form->exp_certificate, '%20') !== false || strlen($filename) > 80) {
                                $status = true;
                                $form->exp_certificate_not_available = true;
                            }
                        }
                    }
                    if($form->icmr_project_certificate){
                        if(file_exists($path . $form->icmr_project_certificate)){
                            $document_arr = explode("/", $form->icmr_project_certificate);
                            $filename = $document_arr[3];
                            
                            if(strpos($form->icmr_project_certificate, '%20') !== false || strlen($filename) > 80) {
                                $status = true;
                                $form->icmr_project_certificate_not_available = true;
                            }
                        }
                    }
                    if($form->signature){
                        if(file_exists($path . $form->signature)){
                            $document_arr = explode("/", $form->signature);
                            $filename = $document_arr[3];
                            
                            if(strpos($form->signature, '%20') !== false || strlen($filename) > 80) {
                                $status = true;
                                $form->signature_not_available = true;
                            }
                        }
                    }
                    if($form->previous_experiences_certificate){
                        if(file_exists($path . $form->previous_experiences_certificate)){
                            $document_arr = explode("/", $form->previous_experiences_certificate);
                            $filename = $document_arr[3];
                            
                            if(strpos($form->previous_experiences_certificate, '%20') !== false || strlen($filename) > 80) {
                                $status = true;
                                $form->previous_experiences_certificate_not_available = true;
                            }
                        }
                    }
                    if($form->any_other_document){
                        if(file_exists($path . $form->any_other_document)){
                            $document_arr = explode("/", $form->any_other_document);
                            $filename = $document_arr[3];
                            
                            if(strpos($form->any_other_document, '%20') !== false || strlen($filename) > 80) {
                                $status = true;
                                $form->any_other_doc_not_available = true;
                            }
                        }
                    }

                    if(!$status){
                        unset($forms[$key]);
                    }
                }
            }

            return view("admin.checklongnamedocumentcandidate", compact("forms","form_id","result"));
        } catch (Exception $exc) {
            
        }
    }
    
    public function candidatelist(Request $request){
        try {
            $query = Form::select("registration_no", "form_id", "application_no", "firstname", "middlename", "lastname", "fathername", "mothername", "email", "mobile_no")->selectRaw("GROUP_CONCAT(form_id) as form_ids")->where('result','PASS')->groupBy("email")->orderBy("firstname","ASC");
            // $query = Form::select("registration_no", "form_id", "application_no", "firstname", "middlename", "lastname", "fathername", "mothername", "email", "mobile_no")->selectRaw("GROUP_CONCAT(form_id) as form_ids")->groupBy("registration_no")->groupBy("email")->orderBy("firstname","ASC");

            $forms = $query->get();

            $subjects = [
                        "TAGBBS" => "Technical Assistant Group-B (Technical) (Biological Sciences)",
                        "TAGBSS" => "Technical Assistant Group-B (Technical) (Social Sciences)",
                        "TAGBCS" => "Technical Assistant Group-B (Technical) (Computer Science Information Technology)",
                        "TAGBEC" => "Technical Assistant Group-B (Technical) (Electronics & Communication Engineering)",
                        "TAGBTE" => "Technical Assistant Group-B (Technical) (Electrical Engineering)",
                        "TAGBCE" => "Technical Assistant Group-B (Technical) (Civil Engineering)",
                        "T1GCBS" => "Technician-1 Group-C (Technical) (Biological Science)",
                        "T1GCCS" => "Technician-1 Group-C (Technical) (Computer Science)",
                        "LAGCT" => "Lab Attendant-1 Group-C (Technical)",
                        "LAGCR" => "Lab Attendant-1 Group-C (Technical) (Refrigeration and air conditioning)"
                    ];

            return view("admin.candidatelist", compact("forms","subjects"));
        } catch (Exception $exc) {
            
        }
    }

    public function change_password(){
        $id = auth()->user()->id;
        return view('admin.changepassword' ,compact('id'));
    }

    public function update_password(Request $request)
    {
        $attributes = $request->validate([
            'password' => ['required', 'min:5'],
            'confirm-password' => ['same:password']
        ]);

        if(!$request->id)
        {
            return redirect('changepassword');
        }        

        $existingUser = User::find($request->id);
        if ($existingUser) {
            $existingUser->update([
                'password' => $attributes['password'],
            ]);
            $existingUser->password_token = 0;
            $existingUser->save();
            return redirect('changepassword');
        } else {
            return back()->with('error', 'Something went wrong.');
        }
    }
}
