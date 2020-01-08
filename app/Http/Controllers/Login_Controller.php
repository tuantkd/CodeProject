<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validate;
use Illuminate\Support\Facades\Auth;

class Login_Controller extends Controller
{


    /*Hiển thị trang chủ khách thành viên*/
    public function view_home()
    {
        return view('Customer.home');   
    }


    /*Hiển thị trang đăng nhập*/
	public function view_login()
    {
        if (!Auth::check())
        {
            return view('Customer.login');     
        }
        else
        {
            return redirect()->route('trangchu');
        }
        
	}


    /*Kiểm tra đang nhập trang*/
    public function login(Request $request)
    {

    	$this->validate($request, [
    		'txt_name'=>'required',
    		'txt_pass'=>'required'
    	], 
        [
    		'txt_name.required'=>'Bạn chưa nhập tài khoản email!',
    		'txt_pass.required'=>'Bạn chưa nhập mật khẩu!'
    	]);


    	$email_name = $request->input('txt_name');
    	$pass_name = $request->input('txt_pass');
        $remember = $request->has('remember');
        

    	if (Auth::attempt(['email' => $email_name, 'password' => $pass_name, 'level' => 0])) 
        {
			return view('Customer.home');
    	}
        elseif(Auth::attempt(['email' => $email_name, 'password' => $pass_name, 'level' => 1])) 
        {
            return view ('Admin2.admin_home');
        }
    	else
        { 
            return back()->with('thongbao', 'Tài khoản email hoặc mật khẩu không chính xác!');
        }

    }



    /*Đăng xuất người dùng*/
    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('get_login');
    }


    /*Hiển thị trang lỗi 404*/
    public function page_not_found()
    {
        return view('errors.404');
    }   






}
