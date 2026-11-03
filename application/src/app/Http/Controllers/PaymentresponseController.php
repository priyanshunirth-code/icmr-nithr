<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\State;
use App\Models\Paymentgateway;
use App\Models\PreviousExperience;
use App\Models\FivePerWeightage;
use App\Models\IcmrProject;
use App\Models\WorkingExperience;

// use PDF;
// use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;




class PaymentresponseController extends Controller
{
    public function __construct()
    {
        // $this->middleware('studentRole');
    }

    public function paymentresponse(Request $request){
        $id = Paymentgateway::payment_response($request);

        $form = Form::find($id);

        return view("student.paymentresponse",compact("form"));
    }

    public function printapplication(Request $request){
        $id = $request->id;

        // $formData = Form::find($id);
        $formData = Form::where('registration_no',auth()->user()->registration_no)->where('id',$id)->first();

        $prevexps = PreviousExperience::where("form_id",$request->id)->get();
        $workExperience = WorkingExperience::where("form_id",$request->id)->get();
        $icmrExperience = IcmrProject::where("form_id",$request->id)->get();
        $fivePerWei = FivePerWeightage::where("form_id",$request->id)->get();

        $page = view("student.printapplication",compact("formData","prevexps","workExperience","icmrExperience","fivePerWei"))->render();

        echo json_encode(['page' => "$page"]);

    }

    public function downloadapplication(Request $request){
        $id = $request->id;

        // $formData = Form::find($id);
        $formData = Form::where('registration_no',auth()->user()->registration_no)->where('id',$id)->first();

        $prevexps = PreviousExperience::where("form_id",$request->id)->get();
        $workExperience = WorkingExperience::where("form_id",$request->id)->get();
        $icmrExperience = IcmrProject::where("form_id",$request->id)->get();
        $fivePerWei = FivePerWeightage::where("form_id",$request->id)->get();

        // return view("student.printapplication",compact("formData","prevexps","workExperience","icmrExperience","fivePerWei"));


        // $pdf = pdf::loadView("student.printapplication",compact("formData","prevexps","workExperience","icmrExperience","fivePerWei"));

        // return $pdf->download('application.pdf');

        // return $pdf->download('invoice.pdf');


        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(view("student.printapplication",compact("formData","prevexps","workExperience","icmrExperience","fivePerWei"))->render());

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("NIRTH-Registration.pdf");


    }
}
