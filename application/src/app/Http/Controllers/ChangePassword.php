<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ChangePassword extends Controller
{

    protected $user;

    public function __construct()
    {
        Auth::logout();

        $id = intval(request()->id);
        $this->user = User::find($id);
    }

    public function show(Request $req)
    {
        $user = User::findOrFail($req->id);
        if($user && $user->password_token == 1){
            $id = $user->id;
            $email = $user->email;
            return view('auth.change-password' ,compact('id','email'));
        }else{
            return redirect('/');
        }
    }

    public function update(Request $request)
    {
        $attributes = $request->validate([
            'password' => ['required', 'min:5'],
            'confirm-password' => ['same:password']
        ]);

        if(!$request->id)
        {
            return redirect('login');

        }        

        $existingUser = User::find($request->id);
        if ($existingUser) {
            $existingUser->update([
                'password' => $attributes['password'],
            ]);
            $existingUser->password_token = 0;
            $existingUser->save();
            return redirect('login');
        } else {
            return back()->with('error', 'Your email does not match the email who requested the password change');
        }
    }
}
