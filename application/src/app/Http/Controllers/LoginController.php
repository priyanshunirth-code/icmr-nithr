<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;
use App\Models\Form;
use App\Models\User;
use PHPMailer\PHPMailer\PHPMailer;



class LoginController extends Controller
{
    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $request->session()->regenerate();

            if (auth()->user()->role == 'student') {

                if ($user && $user->is_email_verified === 0) {
                    Auth::logout();

                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    // $this->sendOtp($user); //OTP SEND
                    $user->sendOtp($user);

                    return redirect()->route('mailVerification', ['id' => $user->id]);
                }

                // return redirect()->intended('studentReg');
                $job_form_id = Form::where('registration_no', auth()->user()->registration_no)->get();

                // return redirect('/registration') ;
                return redirect()->route('registration', ['job_form_id' => $job_form_id]);
            } else {
                return redirect()->intended('dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }



    
}
