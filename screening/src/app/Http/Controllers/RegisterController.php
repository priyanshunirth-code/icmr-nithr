<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\EmailVerification;
use Mail;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;



class RegisterController extends Controller
{
  public function create()
  {
    return view('auth.register');
  }


  public function store()
  {
    $reg_no = 1;

    $q = User::where('role', 'student')->orderBy('id', 'DESC')->first();

    if ($q) {
      $last_reg_user = $q->registration_no;
      $reg_no = $last_reg_user + 1;
    }

    $attributes = request()->validate([
      'full_name' => 'required|max:255|min:2',
      'mobile_no' => 'required|max:10|min:10|unique:users,mobile_no',
      'email' => 'required|email|max:255|unique:users,email',
      'password' => 'required|min:5|max:255',
      'confirm-password' => ['same:password'],
      'terms' => 'required',

    ]);

    $user = User::create($attributes);

    User::where('id', $user->id)->update(['registration_no' => $reg_no]);

    $user = User::find($user->id);

    if ($user->role == 'student') {

      // $this->sendOtp($user); //OTP SEND
      $user->sendOtp($user);

      return redirect()->route('mailVerification', ['id' => $user->id]);
    }

  }

  public function verification(Request $req)
  {
    $user = User::findOrFail($req->id);

    if ($user && $user->is_email_verified === 1) {

      auth()->login($user);
      return redirect('/registration');
    } else {
      return view('student.verification', compact('user'));
    }
  }

  public function verifiyOtp(Request $req)
  {

    $attributes = $req->validate([
      'email' => ['required'],
      'otp' => ['required', 'digits:6']
    ]);

    $user = User::where('email', $attributes['email'])->first();


    if ($user && $user->otp === $attributes['otp']) {

      $user->is_email_verified = 1;
      $user->otp = NULL;
      $user->save();

      auth()->login($user);

      return redirect('/registration');
    } else {
      // OTP verification failed
      return back()->with('error', 'OTP verification failed!');
    }
  }

  public function verifyForChangePass(Request $req)
  {

    $user = User::find($req->id);

    if (!$user) {
      return response()->json(['error' => 'User does not found'], 404);
    }

    if ($user && $user->otp === $req->otp) {

      $user->is_email_verified = 1;
      $user->otp = NULL;
      $user->password_token = 1;
      $user->save();
      return response()->json(['success' => 'OTP verification succesfully!','id'=>$user->id], 200);

      // return redirect('/registration');
    } else {
      // OTP verification failed
      return response()->json(['error' => 'OTP verification failed!'], 401);
    }
  }

  public function reSendOtp(Request $req)
    {

      if($req->id)
      {
        $user = User::find($req->id);

      }

      if($req->email_id){

         // Validate email format
      if (!filter_var($req->email_id, FILTER_VALIDATE_EMAIL)) {
          return response()->json(['error' => 'Please enter valid email'], 400);
      }

      $user = User::where('email', $req->email_id)->first();
      if (!$user) {
          return response()->json(['error' => 'Email address does not found'], 404);
      }
      }
        $user->sendOtp($user);


        return $user->id;

    }


}
