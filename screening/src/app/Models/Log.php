<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    public static function saveLogs($message, $func_name, $user_id)
    {

        try {
            $log = new Log;
            $log->message = json_encode($message);
            $log->func_name = $func_name;
            $log->user_id = $user_id;
            $log->save();


        } catch (\Exception $exc) {


        }



    }

}
