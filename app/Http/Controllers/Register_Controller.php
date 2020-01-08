<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use Crypt;

class Register_Controller extends Controller
{
   
    public function index(){
        return view('Customer.Register');
    }

    public function register(Request $request){

    	$this->validate($request, [
    		'txt_hoten' => 'required',
    		'txt_email' => 'required|email|sometimes|unique:users,email',
    		'txt_matkhau' => 'required|min:6|max:20',
    		'txt_diachi' => 'required',
    		'txt_tuoi' => 'required',
    		'txt_gioi_tinh' => 'required',
    		'txt_nghenghiep' => 'required'
    	], [
    		'txt_hoten.required' => 'Bạn chưa nhập họ tên đầy đủ!',

    		'txt_email.email' => 'Không phải dạng email. Vui lòng nhập lại!',
    		'txt_email.required' => 'Bạn chưa nhập email!',
    		'txt_email.unique' => 'Email này đã tồn tại!',

    		'txt_matkhau.required' => 'Bạn chưa đặt mật khẩu!',
    		'txt_matkhau.min' => 'Mật khẩu phải có ít nhất 6 kí tự!',
    		'txt_matkhau.max' => 'Mật khẩu chỉ được tối đa 20 kí tự!',

    		'txt_diachi.required' => 'Bạn chưa nhập địa chỉ!',

    		'txt_tuoi.required' => 'Nhập số tuổi của bạn!',

    		'txt_gioi_tinh.required' => 'Bạn chưa chọn giới tính!',
    		
    		'txt_nghenghiep.required' => 'Bạn chưa chọn nghề nghiệp'
    	]);

    	$user = new User;
    	$user->name = $request->input('txt_hoten');
    	$user->email = $request->input('txt_email');
    	$user->password = bcrypt($request->input('txt_matkhau')); //Mã hóa mật khẩu

        

    	$user->address = $request->input('txt_diachi');
    	$user->old = $request->input('txt_tuoi');
    	$user->sex = $request->input('txt_gioi_tinh');
    	$user->job = $request->input('txt_nghenghiep');
    	$user->level = 0;

    	$user->save();
    	return redirect()->route('get_login')->with('thongbao', 'Đã đăng ký thành công!');
    }
}
