<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    // use SendsPasswordResetEmails;

    public function ForgetPassword()
    {
        return view('auth.forgot-password');
    }

    public function ForgetPasswordStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $mail = Mail::send('auth.forgot-password-email', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
            $message->subject('Reset Password');
        });

        // dd($mail);

        return back()->with('success', 'We have emailed your password reset link!');
    }

    public function ResetPassword($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function ResetPasswordStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $update = DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->token])->first();

        if (!$update) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        // Delete password_resets record
        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect('login_view')->with('success', 'Your password has been successfully changed!');
    }
}
