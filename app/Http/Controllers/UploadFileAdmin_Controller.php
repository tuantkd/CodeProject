<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Document_Image;
use App\Document_Video;
use DB;

class UploadFileAdmin_Controller extends Controller
{

    /******Phần add file hình ảnh trang admin***************/
    public function get_add_image_admin(){
        
        if (Auth::check()) {
            return view('Admin2.admin_upload.add_image_document');
        } else {
            return redirect()->route('get_login');
        }
    }


    /******Phần post file hình ảnh trang admin***************/
    public function post_add_image_admin(Request $request){
        $this->validate($request, [
            'txt_tieude_image'=>'required|max:255',
            'txt_noidung_image'=>'required|max:255',
            'txt_loai_image'=>'required',
            'txt_nguon_image'=>'required',
            'image'=>'required|image'
        ], [
            'txt_tieude_image.required'=>'Bạn chưa nhập tiêu đề hình ảnh!',
            'txt_tieude_image.max'=>'Tiêu đề vượt quá 255 ký tự!',

            'txt_noidung_image.required'=>'Bạn chưa nhập nội dung giới thiệu về hình ảnh!',
            'txt_noidung_image.max'=>'Nội dung vượt quá 255 ký tự!',
            'txt_loai_image.required'=>'Bạn chưa chọn thể loại hình ảnh!',
            'txt_nguon_image.required'=>'Bạn chưa nhập trích dẫn nguồn hình ảnh!',

            'image.required'=>'Bạn chưa chọn tệp file!',
            'image.image'=>'Bắt buộc phải là hình ảnh!'
        
        ]);

        $item = new Document_Image;

        $item->title_file = $request->input('txt_tieude_image');
        $item->content = $request->input('txt_noidung_image');
        $item->kind = $request->input('txt_loai_image');
        $item->id_user_fk = $request->input('txt_user');
        $item->source = $request->input('txt_nguon_image');

        if ($request->hasfile('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            
            $file->move(public_path('upload_document_images'), $filename);

            $item->file_name = $filename;
        }

        $item->save();

        return redirect()->route('get_search_image_admin')
        ->with('message', 'Đã thêm tài liệu hình ảnh mới!');
    }


    /******Phần edit file hình ảnh trang admin***************/
    public function get_edit_image_admin($id){
        $image = Document_Image::findOrFail($id);
        return view('Admin2.edit_admin.edit_image_admin')->with('image', $image);
    }



    /******Phần delete file hình ảnh trang admin***************/
    public function get_delete_image_admin($id)
    {
        DB::table('document_images')->where('id', $id)->delete();
        return redirect()->route('get_search_image_admin')
        ->with('message', 'Đã xóa tài liệu hình ảnh!');
    }


    /******Phần TÌM KIẾM hình ảnh trang admin***************/
    public function get_search_image_admin(Request $request)
    {
        $search = $request->input('txt_timkiem');
        if ($search == "") {

            $datas = DB::table('document_images')->paginate(5);
            return view ('Admin2.document.view_image_document')->with('datas', $datas);
        }
        else 
        {
            $datas = DB::table('document_images')
            ->where('title_file', 'LIKE', '%'.$search.'%')
            ->orwhere('content', 'LIKE', '%'.$search.'%')
            ->orwhere('source', 'LIKE', '%'.$search.'%')
            ->orWhere('kind', 'LIKE', '%'.$search.'%')->paginate(3);

            $datas->appends($request->only('txt_timkiem'));

            return view ('Admin2.document.view_image_document')->with('datas', $datas);
        }
    }




    /******Phần UPDATE file hình ảnh trang admin***************/
    public function get_update_image_admin(Request $request, $id){

        $this->validate($request, 
        [
            'txt_tieude_image'=>'required|max:255',
            'txt_noidung_image'=>'required|max:255',
            'txt_nguon_image'=>'required'
        ], 
        [
            'txt_tieude_image.required'=>'Bạn chưa nhập tiêu đề hình ảnh!',
            'txt_tieude_image.max'=>'Tiêu đề vượt quá 255 ký tự!',

            'txt_noidung_image.required'=>'Bạn chưa nhập nội dung giới thiệu về hình ảnh!',
            'txt_noidung_image.max'=>'Nội dung vượt quá 255 ký tự!',
            
            'txt_nguon_image.required'=>'Bạn chưa nhập trích dẫn nguồn hình ảnh!'
        
        ]);

        $image = Document_Image::findOrFail($id);

        $image->title_file = $request->input('txt_tieude_image');
        $image->content = $request->input('txt_noidung_image');
        $image->kind = $request->input('txt_loai_image');
        $image->id_user_fk = $request->input('txt_user');
        $image->source = $request->input('txt_nguon_image');

        if ($request->hasfile('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            
            $file->move(public_path('upload_document_images'), $filename);

            $image->file_name = $filename;
        }

        $image->save();

        return redirect()->route('get_search_image_admin')
        ->with('message', 'Đã cập nhật tài liệu hình ảnh!');
    }



   











    /**************************UPLOAD VIDEO LEN TRANG ADMIN******************************/
    public function get_add_embed_video(){
        
        if (Auth::check()) {
            return view ('Admin2.admin_upload.add_embed_video');
        } else {
            return redirect()->route('get_login');
        }
    }


    /**************************UPLOAD VIDEO LEN CSDL******************************/
    public function post_add_embed_video(Request $request){

        $this->validate($request, [

            'txt_tieude_video'=>'required|max:255',
            'txt_nguon_video'=>'required',
            'content'=>'required|max:300',

        ], [

            'txt_tieude_video.required'=>'Bạn chưa nhập tiêu đề video!',
            'txt_tieude_video.max'=>'Ký tự tiêu đề tối đa 300 ký tự!',

            'content.required'=>'Bạn chưa nhúng mã code từ youtube!',
            'content.max'=>'Ký tự MÃ IFRAME vượt quá 300 ký tự!',
            
            'txt_nguon_video.required'=>'Bạn chưa nhập trích dẫn nguồn video!'
        ]);

        $item = new Document_Video;

        $item->title_file = $request->input('txt_tieude_video');
        $item->source = $request->input('txt_nguon_video');
        $item->id_user_fk = $request->input('txt_user');
        $item->code_iframe_youtb = $request->input('content');

        $item->save();

        return redirect()->route('view_embed_video_admin')->with('message',
            'Đã nhúng video từ youtube!');
    }


    /******************EDIT VIDEO YOUTUBE************************/
    public function get_edit_video_admin($id){
        $video = Document_Video::findOrFail($id);
        return view('Admin2.edit_admin.edit_video_admin')->with('video', $video);
    }




     /**************************UPDATE VIDEO LEN CSDL******************************/
    public function get_update_video_admin(Request $request, $id){

        $this->validate($request, [

            'txt_tieude_video'=>'required|max:255',
            'txt_nguon_video'=>'required',
            'content'=>'required|max:300',

        ], [

            'txt_tieude_video.required'=>'Bạn chưa nhập tiêu đề video!',
            'txt_tieude_video.max'=>'Ký tự tiêu đề tối đa 300 ký tự!',

            'content.required'=>'Bạn chưa nhúng mã code từ youtube!',
            'content.max'=>'Ký tự MÃ IFRAME vượt quá 300 ký tự!',
            
            'txt_nguon_video.required'=>'Bạn chưa nhập trích dẫn nguồn video!'
        ]);

        $video = Document_Video::findOrFail($id);

        $video->title_file = $request->input('txt_tieude_video');
        $video->source = $request->input('txt_nguon_video');
        $video->id_user_fk = $request->input('txt_user');
        $video->code_iframe_youtb = $request->input('content');

        $video->save();

        return redirect()->route('view_embed_video_admin')
        ->with('message', 'Đã cập nhật video youtube!');
    }



    /******************DELETE VIDEO YOUTUBE************************/
    public function get_delete_video_admin($id){
        DB::table('document_videos')->where('id', $id)->delete();
        return view ('Admin2.document.view_embed_video');
    }




     /******Phần TÌM KIẾM và hiển thị video trang admin***************/
    public function view_embed_video_admin(Request $request){

        $search = $request->input('txt_timkiem');

        if ($search == "") {

            $data_video = DB::table('document_videos')->paginate(5);
            return view ('Admin2.document.view_embed_video')
            ->with('data_video', $data_video);
        }
        else 
        {
            $data_video = DB::table('document_videos')
            ->where('title_file', 'LIKE', '%'.$search.'%')
            ->orwhere('source', 'LIKE', '%'.$search.'%')->paginate(2);

            $data_video->appends($request->only('txt_timkiem'));

            return view ('Admin2.document.view_embed_video')
            ->with('data_video', $data_video);
        }
    }

}
