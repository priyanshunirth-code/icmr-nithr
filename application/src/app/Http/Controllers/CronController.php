<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\FormResult;
use App\Models\State;
use App\Models\Paymentgateway;
use App\Models\User;
use App\Models\PreviousExperience;
use App\Models\WorkingExperience;
use App\Models\IcmrProject;
use App\Models\FivePerWeightage;
use App\Models\Log;
use Dompdf\Dompdf;
use Dompdf\Options;
use Storage;

class CronController extends Controller
{
    // public function check_payment_status_and_update_db(Request $request){
    public function check_pending_payment_status_and_update_status_send_mail(Request $request){
        $query = Form::orderBy("payment_status","ASC");
        $query = $query->where("payment_status","Pending");

        $forms = $query->get();
        
        if(!empty($forms)){
            foreach ($forms as $key => $formData) {
                $response = Paymentgateway::check_payment_status($formData->id);

                $response_arr = json_decode($response);
                
                switch ($response_arr->status) {
                    case 'Paymentpending':
                        $user = User::where("registration_no", $formData->registration_no)->first();

                        // Form::sendMailForCompleteApplication($user,$form)
                        break;
                    case 'SUCCESS':
                        $form = Form::find($formData->id);
                        $form->process = 3;
                        $form->payment_status = $form->enquiry_payment_status;
                        if($form->save()){

                            $user = User::where("registration_no", $formData->registration_no)->first();

                            Form::sendSuccessStatusMail($user, $formData);
                        }
                        break;
                    case 'FAILED':
                        $form = Form::find($formData->id);
                        $form->payment_status = $form->enquiry_payment_status;
                        if($form->save()){

                            $user = User::where("registration_no", $formData->registration_no)->first();

                            Form::sendFailedStatusMail($user, $formData);
                        }

                        break;
                    
                    default:
                        break;
                }
            }
        }
    }

    public function downloadapplicationpdf(){
        try {
            // $forms = Form::where('application_download_status', '=', '')->orWhereNull('application_download_status')->orWhere('application_download_status',0)->limit(10)->get();
            $forms = Form::where('id', '!=', '2772')->where('id', '!=', '2903')->where('id', '!=', '3905')->where('process', '=', '3')
                ->where(function($query){
                    $query->where('application_download_status', '=', '')
                    ->orWhereNull('application_download_status')
                    ->orWhere('application_download_status',0);
                })->limit(15)->get();
            
            if(!empty($forms)){
                foreach ($forms as $key => $formData) {
                    // $formData = Form::find(11);
                    $log_count = Log::where("message",$formData->id)->count();
                    if($log_count < 3){
                        Log::saveLogs($formData->id, 'cron/downloadapplicationpdf', 0);
                        $prevexps = PreviousExperience::where("form_id",$formData->id)->get();
                        $workExperience = WorkingExperience::where("form_id",$formData->id)->get();
                        $icmrExperience = IcmrProject::where("form_id",$formData->id)->get();
                        $fivePerWei = FivePerWeightage::where("form_id",$formData->id)->get();
    
                        $options = new Options();
                        $options->set('isRemoteEnabled', true);
                        $dompdf = new Dompdf($options);
                        $dompdf->loadHtml(view("student.printapplication",compact("formData","prevexps","workExperience","icmrExperience","fivePerWei"))->render());
    
                        // (Optional) Setup the paper size and orientation
                        $dompdf->setPaper('A4', 'landscape');
    
                        // Render the HTML as PDF
                        $dompdf->render();
    
                        Storage::put('public/formdocument/' . env('REGISTRATION_PREFIX') . $formData->registration_no . '/' . $formData->form_id . '/application.pdf', $dompdf->output());
    
                        $formData->application_download_status = 1;
                        $formData->save();
                    }
                }
            }
        } catch (Exception $exc) {
            
        }
    }

    public function send_result_mail(){
        try {
            $forms = FormResult::whereNull('sent_result_mail')
                    ->get();
                    
            if(!empty($forms)){
                foreach ($forms as $key => $form) {
                    $form_data = Form::whereRaw("CONCAT(form_id,application_no)= ?", $form->application_no)->first();
                    FormResult::sendResultMail($form, $form_data);
                }
            }

        } catch (Exception $exc) {
            Log::saveLogs($exc->getMessage(), 'cron/cronsendresultmail', 0);
        }
    }
}
