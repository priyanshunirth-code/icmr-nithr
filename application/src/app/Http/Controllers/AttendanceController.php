<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Form;

use Dompdf\Dompdf;
use Dompdf\Options;

use DB;

class AttendanceController extends Controller
{
    public function attendance_sheet(){
        try {
            $exam_centers = Exam::select('exam_center')->orderBy("exam_center","ASC")->groupBy('exam_center')->get();

            return view("admin.attendance_sheet", compact("exam_centers"));
        } catch (\Exception $exc) {

        }
    }

    public function get_exam_center_date_time(Request $request){
        try {
            $exam_date_times = Exam::select('exam_date_and_time')->where('exam_center', $request->exam_center)->orderBy("exam_date_and_time","ASC")->groupBy('exam_date_and_time')->get();
            $html = '<option value="">Select</option>';
            if($exam_date_times){
                foreach ($exam_date_times as $key => $value) {
                    $html .= '<option value="' . $value->exam_date_and_time . '">' . $value->exam_date_and_time . '</option>';
                }
            }
            echo $html;
        } catch (\Exception $exc) {

        }
    }

    public function get_exam_center_date_time_post(Request $request){
        try {
            $posts = Exam::select('post')->where('exam_center', $request->exam_center)->where('exam_date_and_time', $request->exam_date_and_time)->orderBy("post","ASC")->groupBy('post')->get();

            $html = '<option value="">Select</option>';
            if($posts){
                foreach ($posts as $key => $value) {
                    $html .= '<option value="' . $value->post . '">' . $value->post . '</option>';
                }
            }
            echo $html;
        } catch (\Exception $exc) {

        }
    }

    public function generate_attendance_sheet(Request $request){
        try {
            $exam_center = $request->exam_center;
            $exam_date_and_time = $request->exam_date_and_time;
            $post = $request->post;

            $exam = Exam::select('reporting_time')->where('exam_center', $exam_center)->where('exam_date_and_time', $exam_date_and_time)->where('post', $post)->orderBy("reporting_time","ASC")->groupBy('reporting_time')->first();

            $forms = DB::select("SELECT forms.firstname, forms.middlename, forms.lastname, forms.form_id, forms.application_no as fapplication_no, forms.profile_pic, forms.signature, exams.application_no as eapplication_no FROM exams join forms on concat(forms.form_id, forms.application_no)=exams.application_no WHERE exams.exam_center='" . $exam_center . "' AND exams.exam_date_and_time = '" . $exam_date_and_time . "' AND exams.post = '" . $post . "'");
            
            // return view("admin.generate_attendance_sheet", compact("exam_center", "exam_date_and_time", "post", "exam", "forms"));
            $options = new Options();
            $options->set('isRemoteEnabled', true);
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml(view("admin.generate_attendance_sheet", compact("exam_center", "exam_date_and_time", "post", "exam", "forms"))->render());

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'landscape');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream($post . ".pdf");
        } catch (\Exception $exc) {

        }
    }
}
