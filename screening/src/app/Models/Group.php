<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Form;

class Group extends Model
{
    use HasFactory;
    function password()
    {
        return $this->belongsTo(User::class, 'username', 'email');
    }

    public static function getTotalApplicationsLimitOffset($form_id, $offset, $limit, $result = ''){
        // $query = Form::where("form_id", $form_id)->where("short_status", '1');
        $query = Form::where("form_id", $form_id);

        if($result){
            $query = $query->where('result',$result);
        }
        if($offset && $limit){
            $query = $query->offset($offset-1)->limit($limit);
            // $query = $query->offset($offset-1)->limit($limit-($offset-1));
        }
        
        // $query = $query->orderBy("application_no","ASC");

        $forms = $query->get();
        $count = 0;

        if(!empty($forms)){
            foreach ($forms as $key => $value) {
                if($value->short_status == 1){
                    if($result){
                        if($result == $value->result){
                            $count++;
                        }
                    }
                    else{
                        $count++;
                    }
                }
            }
        }
        return $count;
        // return count($form);
    }

    

    public static function getTotalApplicationsLimitOffset2($form_id, $offset, $limit, $result = ''){
        // $query = Form::where("form_id", $form_id)->where("short_status", '1');
        $query = Form::where("form_id", $form_id);

        // if($result){
        //     $query = $query->where('result',$result);
        // }
        if($offset && $limit){
            // $query = $query->offset($offset-1)->limit($limit);
            $query = $query->offset($offset-1)->limit($limit-($offset-1));
        }
        
        // $query = $query->orderBy("application_no","ASC");

        $forms = $query->get();
        $count = 0;

        if(!empty($forms)){
            foreach ($forms as $key => $value) {
                if($value->short_status == 1){
                    if($result){
                        if($result == $value->result){
                            $count++;
                        }
                    }
                    else{
                        $count++;
                    }
                    // $count++;
                }
            }
        }
        return $count;
        // return count($form);
    }
}
