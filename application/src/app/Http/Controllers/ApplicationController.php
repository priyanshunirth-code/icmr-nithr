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
use Dompdf\Dompdf;
use Dompdf\Options;
use Storage;
use File;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminRole');
    }

    public function jobapplications(Request $request){
        try {
            $keyword = $request->keyword;

            $prefix = env('REGISTRATION_PREFIX');
            $str = $keyword;

            if (substr($str, 0, strlen($prefix)) == $prefix) {
                $str = substr($str, strlen($prefix));
            }

            $query = Form::orderBy("created_at","DESC");

            if($keyword){
                $query = $query->where(function($qry) use ($keyword, $str){
                        $qry->where("firstname", $keyword)
                        ->orWhere("middlename", $keyword)
                        ->orWhere("lastname", $keyword)
                        ->orWhere("payment_status", $keyword)
                        ->orWhere("registration_no", $str);
                    });
            }

            $forms = $query->get();
            // $forms = $query->paginate(50);

            return view("admin.applications", compact("forms","keyword"));
        } catch (\Exception $exc) {

        }
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

    public function checkpaymentstatus(Request $request){
        try {
            $id = $request->id;

            $response = Paymentgateway::check_payment_status($id);

            return $response;
        } catch (\Exception $exc) {
        }
    }

    public function updatepaymentstatus(Request $request){
        try {
            $id = $request->id;

            $form = Form::find($id);

            $form->process = 3;
            $form->payment_status = $form->enquiry_payment_status;
            if($form->save()){

                $user = User::where("registration_no", $form->registration_no)->first();

                Form::sendSuccessStatusMail($user, $form);
            }

            echo true;
        } catch (\Exception $exc) {
        }
    }

    public function sendfailedstatusmail(Request $request){
        try {
            $id = $request->id;

            $form = Form::find($id);
            $form->payment_status = $form->enquiry_payment_status;
            if($form->save()){

                $user = User::where("registration_no", $form->registration_no)->first();

                Form::sendFailedStatusMail($user, $form);
            }


            echo true;
        } catch (\Exception $exc) {
        }
    }

    public function downloadapplicationpdf(){
        try {
            $forms = Form::where('application_download_status', '=', '')->orWhereNull('application_download_status')->orWhere('application_download_status',0)->get();
            $total_student = Form::where('application_download_status', '=', '')->orWhereNull('application_download_status')->orWhere('application_download_status',0)->count();
            $total_application_downloaded = 0;

            if(!empty($forms)){
                foreach ($forms as $key => $formData) {
                    // $formData = Form::find(11);

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
                    $total_application_downloaded++;
                }
            }
            
            return view("admin.downloadlanding", compact("total_student","total_application_downloaded"));
        } catch (Exception $exc) {
            
        }
    }

    public function short_completed_application_document(Request $request){
        $form_ids = [env('FORMID1'), env('FORMID2'), env('FORMID3'), env('FORMID4'), env('FORMID5'), env('FORMID6'),env('FORMID7'), env('FORMID8'),env('FORMID9'), env('FORMID10')];

        $form_id = $request->form_id;

        if($form_id){
            ini_set('max_execution_time', '3000');
            $forms = Form::where("form_id", $form_id)->where("process",3)->whereNull("short")->get();
            
            if(!empty($forms)){
                foreach ($forms as $key => $form) {
                    $sourceDir = base_path() . '/src/storage/app/public/formdocument/' . env('REGISTRATION_PREFIX') . $form->registration_no . '/' . $form->form_id;
                    $destinationDir = base_path() . '/src/storage/app/public/formdocument_bck/' . $form->form_id . '/' . env('REGISTRATION_PREFIX') . $form->registration_no . '/' . $form->form_id;
                    File::copyDirectory($sourceDir, $destinationDir);

                    $files = Storage::files("public/formdocument_bck/" . $form->form_id . '/' . env('REGISTRATION_PREFIX') . $form->registration_no . '/' . $form->form_id);

                    if($files){
                        foreach ($files as $key => $value) {
                            $arr = explode("/", $value);
                            $arr_value = $arr[count($arr)-1];

                            $sourcePath = base_path() . '/src/storage/app/' . $value;
                            $destPath = base_path() . '/src/storage/app/public/formdocument_bck/' . $form->form_id . '/' . env('REGISTRATION_PREFIX') . $form->registration_no . "/" . $arr_value;
                            File::move($sourcePath, $destPath);

                            // Storage::deleteDirectory('public/formdocument_bck/' . $form->form_id . '/' . env('REGISTRATION_PREFIX') . $form->registration_no);
                        }
                    }

                    $form->short = 1;
                    $form->save();
                }
            }
        }

        return view("admin.short_completed_application_document", compact("form_ids"));
    }
}
