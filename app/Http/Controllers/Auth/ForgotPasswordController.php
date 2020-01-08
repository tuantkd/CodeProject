<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Password;

class ForgotPasswordController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:'); //Route không có tên tức là trang chủ chỉ có dấu /
    }


    public function broker()
    {
        return Password::broker('users'); //Bảng users trong csdl
    }


    //Hiển thị trang gửi email đi
    public function showLinkRequestForm()
    {
        return view('Customer.passwords.email');
    }


    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        // Chúng tôi sẽ gửi liên kết đặt lại mật khẩu cho người dùng này. Một khi chúng tôi đã cố gắng
        // để gửi liên kết, chúng tôi sẽ kiểm tra phản hồi sau đó xem tin nhắn chúng tôi
        // cần hiển thị cho người dùng. Cuối cùng, chúng tôi sẽ gửi phản hồi thích hợp.
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }

    

   
}
