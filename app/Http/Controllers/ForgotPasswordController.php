<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    // Send OTP to email
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();
        $otp = rand(100000, 999999); // Generate 6-digit OTP

        // Store OTP in session
        Session::put('otp', $otp);
        Session::put('email', $request->email);

        // Send OTP via email
        Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
            $message->to($request->email)
                ->subject('Password Reset OTP');
        });

        return redirect()->route('password.otp.verify')->with('success', 'OTP has been sent to your email.');
    }

    // Show OTP Verification Form
    public function showVerifyOtpForm()
    {
        return view('auth.verify-otp');
    }

    // Verify OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        if ($request->otp == Session::get('otp')) {
            return view('auth.reset-password');
        } else {
            return back()->with('error', 'Invalid OTP. Try again.');
        }
    }

    // Reset Password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('email', Session::get('email'))->first();
        $user->password = Hash::make($request->password);
        $user->save();

        Session::forget('otp');
        Session::forget('email');

        return redirect()->route('login')->with('success', 'Password updated successfully. You can now login.');
    }

}
