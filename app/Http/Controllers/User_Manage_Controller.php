<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\User;
use App\Document_Pending;
use DB;


class User_Manage_Controller extends Controller
{
    
    //View page admin
    public function view_admin()
    {
        if (Auth::check() && Auth::user()->level>0)
        {
            return view ('Admin2.admin_home');
        }
        else 
        {
            return redirect()->route('get_login');
        }
    }

    

    /******PHẦN ADD USER ADMIN*******/
    public function get_add_user_admin()
    {   
        // if (Auth::check()){
            return view ('Admin2.manage_user.add_user_admin');
        // }
        // else {

        //     return redirect()->route('get_login');
        // }
        
    }



    /******PHẦN ADD USER ADMIN LÊN CSDL******/
    public function post_add_user_admin(Request $request)
    {

        // if (Auth::check())
        // {
            $this->validate($request, [
            'txt_fullname'=>'required',
            // 'txt_username'=>'required',

            'txt_password'=>'required',
            // ['required', 
            // 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'],


            'txt_email'=>'required|email',
            'txt_address'=>'required',
            'txt_job'=>'required',
            'txt_sex'=>'required',
            'txt_level'=>'required'

           
            ], 

            [
                'txt_fullname.required'=>'Vui lòng nhập họ tên đầy đủ!',

                // 'txt_username.required'=>'Vui lòng nhập tên tài khoản!',
        
                'txt_email.required'=>'Vui lòng nhập email!',
                'txt_email.email'=>'Đây không phải email. Vui lòng nhập lại!',

                'txt_address.required'=>'Vui lòng nhập địa chỉ cư trú!',

                'txt_job.required'=>'Vui lòng nhập nghề nghiệp!',

                'txt_sex.required'=>'Vui lòng chọn giới tính!',

                'txt_level.required'=>'Vui lòng chọn quyền truy cập!',

                'txt_password.required'=>'Vui lòng nhập mật khẩu!'
                // 'txt_password.regex'=>'Mật khẩu gồm: Chữ hoa (A-Z), chữ thường (a-z), số cơ bản (0-9), ký tự đặt biệt (#?!@$%^&*-), ít nhất 8 ký tự!'
            ]);


            $users = new User;

            
            

            $users->name = $request->input('txt_fullname');

            $users->password = bcrypt($request->input('txt_password'));

            $users->email = $request->input('txt_email');

            $users->address = $request->input('txt_address');

            $users->sex = $request->input('txt_sex');

            $users->job = $request->input('txt_job');

            $users->level = $request->input('txt_level');

            $users->save();

            return redirect()->route('view_user_admin')
            ->with('message', 'Đã thêm thành công!');
        // }
        // else {

        //     return redirect()->route('get_login');
        // }
        
    }



    /******PHẦN XÓA USER Admin2*******/
    // public function get_delete_user_admin($id)
    // {

    //     if (Auth::check()){
    //         DB::table('users')->where('id', $id)->delete();
    //         return view ('Admin2.manage_user.view_user_admin');
    //     }
    //     else {

    //         return redirect()->route('get_login');
    //     }
    
    // }



    /******PHẦN XÓA USER GUEST*******/
    public function get_delete_user_guest($id)
    {

        if (Auth::check() && Auth::user()->level>0)
        {
            DB::table('users')->where('id', $id)->delete();
            return redirect()->route('get_search_user_guest')
            ->with('message', 'Đã xóa người dùng');
        }
        else 
        {

            return redirect()->route('get_login');
        }
        
       
    }




    /******Phần TÌM KIẾM người dùng trang admin***************/
    public function get_search_user_guest(Request $request){


        if (Auth::check() && Auth::user()->level>0)
        {
            $search = $request->input('txt_timkiem');

            if ($search == "")
            {
                $users = DB::table('users')->where('level', 0)->paginate(5);
                return view ('Admin2.manage_user.view_user_guest')->with('users', $users);
            }
            else 
            {
                $users = DB::table('users')
                ->where('level', 0)
                ->orwhere('name', 'LIKE', '%'.$search.'%')
                ->orwhere('email', 'LIKE', '%'.$search.'%')
                ->orWhere('address', 'LIKE', '%'.$search.'%')
                ->paginate(2);
        
                $users->appends($request->only('txt_timkiem'));

                return view ('Admin2.manage_user.view_user_guest')->with('users', $users);
            }

        }
        else {

            return redirect()->route('get_login');
        }
        
     
        
    }



    /******Phần hiển thị thông tin dùng trang admin***************/
    public function get_infomation_user($id)
    {

        if (Auth::check() && Auth::user()->level>0)
        {
            $users = DB::table('users')->where('id', $id)->get();
            return view ('Admin2.manage_user.info_user')->with('users', $users);
        }
        else {

            return redirect()->route('get_login');
        }
        
    }




    /******Chỉnh sửa thông tin cá nhân***************/
    public function get_edit_info_user($id)
    {
        
        if (Auth::check() && Auth::user()->level>0)
        {
            $edit_info = User::findOrFail($id);
            return view ('Admin2.manage_user.edit_info_user')->with('edit_info', $edit_info);
        }
        else {

            return redirect()->route('get_login');
        }
        
    }




    /******PHẦN UPDATE thông tin cá nhân trang admin******/
    public function get_update_info_user(Request $request, $id)
    {

        if (Auth::check() && Auth::user()->level>0)
        {
            $this->validate($request, [
            'txt_fullname'=>'required',
            'txt_email'=>'required|email',
            'txt_job'=>'required',
            // ['required', 
            // 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'],
            'txt_address'=>'required'
           
            ], [
                'txt_fullname.required'=>'Vui lòng nhập họ tên đầy đủ!',
                'txt_address.required'=>'Vui lòng nhập địa chỉ!',
                'txt_job.required'=>'Vui lòng nhập nghề nghiệp!',
    
                'txt_email.required'=>'Vui lòng nhập email!',
                'txt_email.email'=>'Đây không phải email. Vui lòng nhập lại!'

            ]);


            $update_info = User::findOrFail($id);

            $update_info->name = $request->input('txt_fullname');
            $update_info->email = $request->input('txt_email');

            // $update_info->password = bcrypt($request->input('txt_password'));

            $update_info->address = $request->input('txt_address');
            $update_info->job = $request->input('txt_job');

            $update_info->save();

            return redirect()->route('get_infomation_user', $id)
            ->with('message', 'Đã chỉnh sửa thông tin cá nhân!');
        }
        else {

            return redirect()->route('get_login');
        }

             
    }



    /*Show user admin ra trang quản lý*/
    public function view_user_admin()
    {    

        if (Auth::check() && Auth::user()->level>0)
        {
            $user_admin = DB::table('users')->where('level', 1)->get();
            return view ('Admin2.manage_user.view_user_admin')->with('user_admin', $user_admin);
        }
        else {

            return redirect()->route('get_login');
        }
        
    }




    /**************THÔNG TIN NGƯỜI DÙNG TRANG KHÁCH**************/
    public function view_personal_customer($id)
    {
        if (Auth::check())
        {
            $user_customers = DB::table('users')->where('id', $id)->get();
            return view ('Customer.user.personal_info')->with('user_customers', $user_customers);
        }
        else 
        {
            return redirect()->route('get_login');
        }
    }

}
