<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;
use Validate;

class ImageBanner_Controller extends Controller {


    /********Hiển thị trang ADD banner web********/
    public function get_banner()
    {
        if (Auth::check()){
            return view('Admin2.admin_upload.add_banner_web');
        }
        else {

            return redirect()->route('get_login');
        }
    	
    }



    /***********Add banner lên csdl***********/
    public function post_banner(Request $request)
    {

        if (Auth::check())
        {
            $this->validate($request, [
            'file'=>'required|image',
            'txt_tieude'=>'required'
            ],[
                'file.required'=>'Bạn chưa chọn file!',
                'file.image'=>'Bắt buộc file thuộc dạng hình ảnh!',
                'txt_tieude.required'=>'Bạn chưa nhập tiêu đề!'
            ]);

            $image = new Image;

            $image->title = $request->input('txt_tieude');
            $image->id_user_fk = $request->input('txt_user');

            if ($request->hasfile('file')){
                $file = $request->file('file');
                $filename = $file->getClientOriginalName();
                
                $file->move(public_path('image_banner'), $filename);
                $image->image = $filename;
            }else{
                return $request;
                $image->image = '';
            }


            $image->save();

            return redirect()->route('get_display_banner')
            ->with('status', 'Đã thêm banner web!');
        }
        else {

            return redirect()->route('get_login');
        }
    	
    }




    /***************Phần chỉnh sửa banner web trang chủ************************/
    public function get_edit_banner($id)
    {
        if (Auth::check())
        {
            $banners = Image::findOrFail($id);
            return view('Admin2.edit_admin.edit_banner_web')->with('banners', $banners);
        }
        else {

            return redirect()->route('get_login');
        }
        
    }




    /***************Phần update banner web trang chủ************************/
    public function update_banner(Request $request, $id){

        if (Auth::check())
        {
            $this->validate($request, [
                'txt_tieude'=>'required'
            ],[
                'txt_tieude.required'=>'Bạn chưa nhập tiêu đề!'
            ]);

            $images = Image::findOrFail($id);

            $images->title = $request->input('txt_tieude');
            
            if ($request->hasfile('file')){
                $file = $request->file('file');
                $filename = $file->getClientOriginalName();
                
                $file->move(public_path('image_banner'), $filename);
                $images->image = $filename;
            }

            $images->save();

            return redirect()->route('get_display_banner')
            ->with('status', 'Đã cập nhật banner web!');
        }
        else {

            return redirect()->route('get_login');
        }
        
    }
   



    /***************Xóa hình ảnh banner web***********************/
    public function delete_banner($id)
    {
        if (Auth::check()){
            DB::table('image_banners')->where('id', $id)->delete();
            return redirect()->route('get_display_banner')
            ->with('status', 'Đã xóa banner web!');
        }
        else {

            return redirect()->route('get_login');
        }
        
    }



    /***************show data từ csdl hiển thị ra************************/
    public function get_display_banner()
    {

        if (Auth::check())
        {
            $image_banners = DB::table('image_banners')->paginate(5);
            return view ('Admin2.document.view_banner_web')
            ->with('image_banners', $image_banners);
        }
        else
        {

            return redirect()->route('get_login');
        }
        
    }
    


}
