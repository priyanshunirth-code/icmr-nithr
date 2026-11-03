<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Form;

class RegistrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('studentRole');
    }
    
    public function applyFor($id){

        return view('applyFor', compact('id'));
    }

    public function registration(){

        $formData = Form::where('registration_no', auth()->user()->registration_no)->get();

        return view('student.registration',compact('formData'));
    }

    public function getCityNameFunc(Request $req){


        $data = City::where('state_id',$req->state_id)->get();

        $html = "<option value=''>Select</option>";
        if($data){
            foreach ($data as $key => $city) {
                $html .= "<option value='" . $city->id . "'>" . $city->city . "</option>";
            }
        }
        
        echo $html;
    }
}
