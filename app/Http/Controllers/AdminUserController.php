<?php

namespace App\Http\Controllers;
use App\Helper\AdminJWTToken;
use App\Mail\OTPMail;
use App\Models\AdminUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;



class AdminUserController extends Controller
{

    function AdminLoginPage():View{
        return view('pages.auth-admin.login-page');
    }

    function AdminLogin(Request $request){
        $count=AdminUser::where('email','=',$request->input('email'))
             ->where('password','=',$request->input('password'))
             ->select('id')->first();

        if($count!==null){
            // User Login-> JWT Token Issue
            $token=AdminJWTToken::CreateToken($request->input('email'),$count->id);
            return response()->json([
                'status' => 'success',
                'message' => 'Admin Login Successful',
            ],200)->cookie('token',$token,time()+60*24*30);
        }
        else{
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized'
            ],200);

        }

    }

    function SendOtpPage():View{
        return view('pages.auth.send-otp-page');
    }
    function VerifyOTPPage():View{
        return view('pages.auth.verify-otp-page');
    }

    function ResetPasswordPage():View{
        return view('pages.auth.reset-pass-page');
    }

}
