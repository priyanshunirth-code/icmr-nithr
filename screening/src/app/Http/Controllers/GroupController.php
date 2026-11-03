<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\User;
use App\Models\Group;
use App\Models\FormSorting;
use App\Models\PostSubject;
use DB;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('groupRole');
    }

    public function changepassword(){
        return view("group.changepassword");
    }

    public function updatepassword(Request $request){
        try {
            $user = User::find(auth()->user()->id);

            $user->password = $request->password;
            $user->password_string = $request->password;
            $user->password_changed = 1;

            if($user->save()){
                return redirect()->route('groupdashboard');
            }
            else{
                return back()->withErrors([
                    'err' => 'Something wend wrong.',
                ]);
            }
        } catch (Exception $exc) {
            
        }
    }

    public function groupdashboard(){
        try {
            if(auth()->user()->password_changed == 0){
                return redirect()->route('group.changepassword');
            }

            $group = Group::where("username", auth()->user()->email)->first();
            
            $total_form = $group->to_sno - $group->from_sno + 1;
            $subject_group = $group->subject_group;

            $complete_shorting = Group::getTotalApplicationsLimitOffset2($group->form_id, $group->from_sno, $group->to_sno, '');
            
            // $forms = Form::getApplicationsLimitOffset($group->form_id, $group->from_sno, ($group->to_sno-$complete_shorting));
            // $pending_shorting = count($forms);
            $pending_shorting = $total_form - $complete_shorting;

            return view("group.dashboard", compact("subject_group","total_form","pending_shorting","complete_shorting","group"));
        } catch (Exception $exc) {
            
        }
    }

    public function shorting(){
        try{
            if(auth()->user()->password_changed == 0){
                return redirect()->route('group.changepassword');
            }

            $group = Group::where("username", auth()->user()->email)->first();

            $total_form = $group->to_sno - $group->from_sno + 1;
            $subject_group = $group->subject_group;

            $complete_shorting = Group::getTotalApplicationsLimitOffset2($group->form_id, $group->from_sno, $group->to_sno, '');

            // $forms = Form::getApplicationsLimitOffset($group->form_id, $group->from_sno, ($group->to_sno-$complete_shorting));
            // $pending_shorting = count($forms);
            $pending_shorting = $total_form - $complete_shorting;

            $total_tab = ceil($total_form/env('LIMIT'));
            
            return view("group.shorting", compact("subject_group","total_form","total_tab","pending_shorting","complete_shorting","group"));
        } catch (Exception $exc){

        }
    }

    public function slotshortinglist(Request $request){
        try {
            if(auth()->user()->password_changed == 0){
                return redirect()->route('group.changepassword');
            }

            $slot = $request->slot;

            $group = Group::where("username", auth()->user()->email)->first();

            if($group->status == 1){
                return redirect()->route('group.shorting');
            }

            $total_form = $group->to_sno - $group->from_sno + 1;
            $subject_group = $group->subject_group;

            $complete_shorting = Group::getTotalApplicationsLimitOffset2($group->form_id, $group->from_sno, $group->to_sno, '');

            $all_forms = Form::getApplicationsLimitOffset2($group->form_id, $group->from_sno, ($group->to_sno-$complete_shorting));
            $pending_shorting = count($all_forms);

            $total_tab = ceil($total_form/env('LIMIT'));

            $count = $slot*env('LIMIT');
            $total = ($count < $total_form) ? env('LIMIT') : ($total_form - (($slot-1)*env('LIMIT')));

            $limit = env("LIMIT");

            $offset = $group->from_sno + (($slot-1)*env("LIMIT"));

            $diff = $group->to_sno - $offset + 1;

            if($diff<$limit){
                $limit = $diff;
            }
            
            $forms = Form::getApplicationsLimitOffset2($group->form_id, $offset, $limit);

            return view("group.screeninglist", compact("subject_group","total_form","slot","total","group","forms"));
        } catch (Exception $exc) {
            
        }
    }

    public function processshorting(Request $request){
        try {
            if(auth()->user()->password_changed == 0){
                return redirect()->route('group.changepassword');
            }

            $slot = $request->slot;

            $group = Group::where("username", auth()->user()->email)->first();

            if($group->status == 1){
                return redirect()->route('group.shorting');
            }

            $total_form = $group->to_sno - $group->from_sno + 1;
            $subject_group = $group->subject_group;

            $complete_shorting = Group::getTotalApplicationsLimitOffset2($group->form_id, $group->from_sno, $group->to_sno, '');

            $all_forms = Form::getApplicationsLimitOffset($group->form_id, $group->from_sno, ($group->to_sno-$complete_shorting));
            $pending_shorting = count($all_forms);

            $total_tab = ceil($total_form/env('LIMIT'));

            $count = $slot*env('LIMIT');
            $total = ($count < $total_form) ? env('LIMIT') : ($total_form - (($slot-1)*env('LIMIT')));

            $limit = env("LIMIT");

            $offset = $group->from_sno + (($slot-1)*env("LIMIT"));

            $slot_complete_shorting = Group::getTotalApplicationsLimitOffset($group->form_id, $offset, $limit, '');
            if($slot > 1){
                for ($i=$slot; $i > 1; $i--) { 
                    $pre_offset = $group->from_sno + (($i-2)*env("LIMIT"));
                    $pre_slot_complete_shorting = Group::getTotalApplicationsLimitOffset($group->form_id, $pre_offset, $limit, '');
                    $offset -= $pre_slot_complete_shorting;
                }
            }
            
            $forms = Form::getApplicationsLimitOffset($group->form_id, $offset, ($limit-$slot_complete_shorting));
            
            if(!empty($forms)){
                $formData = $forms[0];
            }
            else{
                return route("group.shorting");
            }

            $form_sorting = FormSorting::where("form_id", $formData->id)->first();
            $sorting_update_status = false;

            $age_limit = $group->age_limit;
            $age_relaxation_types = [];
            $exp_message = "";
            $subjects = PostSubject::where("form_id", $group->form_id)->get();
            if(!empty($form_sorting)){
                $sorting_update_status = true;

                $checked_age_relaxation = [];
                // if($form_sorting->category_result == "PASS"){
                //     $checked_age_relaxation = ['category'];
                // }
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

            return view("group.processshorting", compact("subject_group","total_form","slot","total","formData","group","form_sorting","sorting_update_status","age_limit","subjects","age_relaxation_types","exp_message","pending_shorting","complete_shorting"));
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
            $slot = $request->slot;
            $formData = Form::find($form_id);
            $form_sorting = FormSorting::where("form_id", $form_id)->first();
            $stepComplete = FormSorting::getCompleteStepCount($form_sorting->id);

            if($form_sorting->essential_qualification_subject){
                $subject = PostSubject::where("id", $form_sorting->essential_qualification_subject)->first();
                $form_sorting->subject = $subject->subject;
                $form_sorting->exp_message = $subject->experience;
            }
            
            return view("group.processshortingreview", compact("formData","form_sorting","slot","stepComplete"));
        } catch (Exception $exc) {
            
        }
    }

    public function savefinalsorting(Request $request){
        try {
            $form_id = $request->form_id;
            $slot = $request->slot;
            
            $form_sorting = FormSorting::where("form_id", $form_id)->first();

            $result = "PASS";
            $fail_reason = "";
            $number = 0;

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
                if(trim($slot)){
                    return redirect()->route("group.slotshortinglist",["slot"=>$slot])->with('success', 'Data saved successfully!');
                }
                else{
                    return redirect()->route("group.completedscreening")->with('success', 'Data saved successfully!');
                }
            }
            else{
                return redirect()->back()->with("error","Something went wrong!!");
            }

        } catch (Exception $exc) {
            
        }
    }

    public function completedscreening(){
        try {
            if(auth()->user()->password_changed == 0){
                return redirect()->route('group.changepassword');
            }

            $group = Group::where("username", auth()->user()->email)->first();
            $forms = Form::getCompletedForms($group->form_id, $group->from_sno, $group->to_sno);

            return view("group.completedscreening", compact("group","forms"));
        } catch (Exception $exc) {
            
        }
    }

    public function editscreening(Request $request){
        try {
            if(auth()->user()->password_changed == 0){
                return redirect()->route('group.changepassword');
            }

            $slot = "";
            if($request->slot){
                $slot = $request->slot;
            }
            $group = Group::where("username", auth()->user()->email)->first();

            if($group->status == 1){
                return redirect()->route('group.shorting');
            }

            $total_form = $group->to_sno - $group->from_sno + 1;
            $subject_group = $group->subject_group;

            $complete_shorting = Group::getTotalApplicationsLimitOffset2($group->form_id, $group->from_sno, $group->to_sno, '');

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

            return view("group.editscreening", compact("subject_group","total_form","formData","group","form_sorting","sorting_update_status","age_limit","subjects","age_relaxation_types","exp_message","pending_shorting","complete_shorting","slot"));
        } catch (Exception $exc) {
            
        }
    }

    public function markallscreeingcomplete(){
        try {
            $group = Group::where("username", auth()->user()->email)->first();

            $group->status = 1;

            if($group->save()){
                return redirect()->route("group.shorting");
            }
        } catch (Exception $exc) {
            
        }
    }
}
