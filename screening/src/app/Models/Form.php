<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;
use Storage;
use PHPMailer\PHPMailer\PHPMailer;
use DB;

class Form extends Model
{
    use HasFactory;

    function postal_state1()
    {
        return $this->belongsTo(State::class, 'postal_state');
    }
    function permanent_state1()
    {
        return $this->belongsTo(State::class, 'permanent_state');
    }
    function postal_city1()
    {
        return $this->belongsTo(City::class, 'postal_city');
    }
    function permanent_city1()
    {
        return $this->belongsTo(City::class, 'permanent_city');
    }

    public static function check_form_submitted($form_id){
        $form = Form::where("registration_no", auth()->user()->registration_no)->where("form_id", $form_id)->first();

        if(!empty($form)){
            if($form->process == 3){
                return $form->id;
            }else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    public static function imageUrl($imagePath)
    {
        // return url(Storage::url($imagePath));
        return url("src/storage/app/public/" . $imagePath);

    }
    
    public static function getApplicationCountDetail($form_ids, $status = ''){
        $query = Form::whereIn("form_id", $form_ids);

        if($status){
            if($status == 'FREE'){
                $query = $query->where("process", 3);
                $query = $query->whereNull("payment_status");
            }
            elseif($status == 'NOTCOMPLETE'){
                $query = $query->where("process", "!=", 3);
            }
            else{
                $query = $query->where("payment_status", $status);
            }
        }

        $form = $query->count();

        return $form;
    }

    public static function getApplicationsLimitOffset($form_id, $offset, $limit){
        // $query = Form::where("form_id", $form_id)->where("short_status", 0);
        $query = Form::where("form_id", $form_id);

        if($offset && $limit){
            $query = $query->offset($offset-1)->limit($limit);
            // $query = $query->offset($offset-1)->limit($limit-($offset-1));
        }
        // $query = $query->orderBy("registration_no");
        $query = $query->orderBy("short_status","ASC")->orderBy("application_no","ASC");

        $form = $query->get();
        return $form;
    }

    public static function getApplicationsLimitOffset2($form_id, $offset, $limit){
        // $query = Form::where("form_id", $form_id)->where("short_status", 0);
        $query = Form::where("form_id", $form_id);

        if($offset && $limit){
            $query = $query->offset($offset-1)->limit($limit);
            // $query = $query->offset($offset-1)->limit($limit-($offset-1));
        }
        // $query = $query->orderBy("registration_no");
        $query = $query->orderBy("application_no","ASC");

        $form = $query->get();
        return $form;
    }

    public static function getAllApplicationsLimitOffset($form_id, $offset, $limit){
        $query = Form::where("form_id", $form_id);

        if($offset && $limit){
            $query = $query->offset($offset-1)->limit($limit-($offset-1));
        }
        // $query = $query->orderBy("registration_no");
        $query = $query->orderBy("application_no","ASC");

        $form = $query->get();
        return $form;
    }

    public static function getCompletedForms($form_id, $offset, $limit){
        // $query = Form::where("form_id", $form_id)->where("short_status", '1');
        $query = Form::where("form_id", $form_id);

        if($offset && $limit){
            $query = $query->offset($offset-1)->limit($limit-($offset-1));
        }
        
        $query = $query->orderBy("application_no","ASC");

        $forms = $query->get();
        return $forms;
    }

    public static function check_form_sorting_process($form_id){
        $form_sorting = FormSorting::where("form_id", $form_id)->first();

        if($form_sorting){
            return true;
        }
        return false;
    }
}
