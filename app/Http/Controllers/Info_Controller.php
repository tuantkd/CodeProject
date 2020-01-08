<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validate;
use DB;
use App\Info;

class Info_Controller extends Controller
{

    /*Hiển thị trang thêm thông tin mới*/
    public function get_add_infomation()
    {
        if (Auth::check()){
            return view ('Admin2.admin_upload.add_infomation');
        }
        else {

            return redirect()->route('get_login');
        }
        
    }



    /*Phần truy vấn lưu trữ dữ liệu vào CSDL*/
    public function store_info(Request $request)
    {

        if (Auth::check())
        {
            $this->validate($request, [
            'txt_tieude'=>'required',
            'content'=>'required'
            ], [
                'txt_tieude.required'=>'Vui lòng nhập tiêu đề!',
                'content.required'=>'Vui lòng nhập nội dung!'
            ]);

            $info = new Info;
            $info->title = $request->input('txt_tieude');
            $info->content = $request->input('content');
            $info->id_user_fk = $request->input('txt_user');
            $info->save();

            return redirect()->route('get_search_display_information')
            ->with('status', 'Đã thêm thông tin mới!');
        }
        else {

            return redirect()->route('get_login');
        }
    	
    }



    /*Phần chỉnh sửa thêm thông tin*/
    public function get_edit_information($id)
    {
        if (Auth::check())
        {
            $infos = Info::findOrFail($id);
            return view('Admin2.edit_admin.edit_infomation')->with('infos', $infos);
        }
        else {

            return redirect()->route('get_login');
        }
        
    }



    /*Phần update lên csdl*/
    public function update_information(Request $request, $id)
    {

        if (Auth::check())
        {
            $this->validate($request, 
            [
                'txt_tieude'=>'required',
                'content'=>'required'
            ], [
                'txt_tieude.required'=>'Vui lòng nhập tiêu đề!',
                'content.required'=>'Vui lòng nhập nội dung!'
            ]);

            $info = Info::findOrFail($id);

            $info->title = $request->input('txt_tieude');
            $info->content = $request->input('content');

            $info->save();

            return redirect()->route('get_search_display_information')
            ->with('status', 'Đã cập nhật thông tin!');
        }
        else {

            return redirect()->route('get_login');
        }
        
    }




    /*Phần xóa thông tin CSDL*/
    public function get_delete_information($id)
    {
        if (Auth::check())
        {
            DB::table('infomations')->where('id', $id)->delete();
            return redirect()->route('get_search_display_information')
            ->with('status', 'Đã xóa thông tin!');
        }
        else {

            return redirect()->route('get_login');
        }
    	
    }




    /******Phần TÌM KIẾM và hiển thị thông tin trang admin***************/
    public function get_search_display_information(Request $request)
    {
        if (Auth::check())
        {
            $search = $request->input('txt_timkiem');

            if ($search == "") 
            {
                $data_info = $data_info = DB::table('infomations')->paginate(5);
                return view ('Admin2.document.view_infomation')
                ->with('data_info', $data_info);
            }
            else 
            {
                $data_info = DB::table('infomations')
                ->where('content', 'LIKE', '%'.$search.'%')
                ->orwhere('title', 'LIKE', '%'.$search.'%')
                ->orwhere('created_at', 'LIKE', '%'.$search.'%')
                ->orwhere('updated_at', 'LIKE', '%'.$search.'%')
                ->paginate(2);
        
                $data_info->appends($request->only('txt_timkiem'));

                return view ('Admin2.document.view_infomation')->with('data_info', $data_info);
            }

        }
        else {

            return redirect()->route('get_login');
        }

        
    }




    //Hiển thị thông trang chủ khách
    public function view_detail_infomation($id)
    {
      
        $infos = DB::table('infomations')->where('id', $id)->get();
        return view('Customer.view_info')->with('infos', $infos);
       
    }


}
