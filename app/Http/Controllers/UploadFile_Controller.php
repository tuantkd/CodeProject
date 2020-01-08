<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Document_Pending;
use App\DocumentImagePending;
use App\DocumentVideoPending;
use DB;


class UploadFile_Controller extends Controller
{


/**************************Phần upload file tài liệu******************************/
    public function view_document(){
        
        if (Auth::check()) {
            return view('Customer.upload_document');
        } else {
            return view('Customer.home');
        }
    }
    
    public function upload_file_document(Request $request){
    	
        $this->validate($request, [
            'txt_tieude'=>'required|max:255',
            'txt_noidungtt'=>'required|max:255',
            'txt_loai'=>'required',
            'txt_tacgia'=>'required',
            'txt_nguon'=>'required',
            'file'=>'required|mimes:pdf,xls,doc,docx,pptx,pps'
        ], [
            'txt_tieude.required'=>'Bạn chưa nhập tên file!',
            'txt_tieude.max'=>'Ký tự tiêu đề tối đa 255 ký tự!',
            'txt_noidungtt.required'=>'Bạn chưa nhập nội dung!',
            'txt_noidungtt.max'=>'Ký tự trong nội dung quá 255 ký tự!',
            'txt_loai.required'=>'Bạn chưa chọn loại!',
            'txt_tacgia.required'=>'Bạn chưa nhập tên tác giả!',
            'txt_nguon.required'=>'Bạn chưa trích dẫn nguồn!',

            'file.required'=>'Bạn chưa chọn file tài liệu!',
            'file.mimes'=>'File thuộc dạng: pdf,xls,doc,docx,pptx,pps',

            'image.required'=>'Bạn chưa chọn ảnh bìa tài liệu!'
        ]);


        $item = new Document_Pending;

        $item->title_file = $request->input('txt_tieude');
        $item->content = $request->input('txt_noidungtt');
        $item->kind = $request->input('txt_loai');
        $item->publish = $request->input('txt_xuatban');
        $item->author = $request->input('txt_tacgia');
        $item->source = $request->input('txt_nguon');
        $item->id_user_fk = $request->input('txt_user');

        


    	if ($request->hasfile('file'))
        {
            $file = $request->file('file');
            $filename = $request->file('file')->getClientOriginalName();

            $file->move(public_path('upload_file'), $filename);

            $item->file_name = $filename;
            
            $item->file_size = $request->file('file')->getClientSize(); 
        }

        if ($request->hasfile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalName();
            
            $image->move(public_path('upload_file_images'), $extension);

            $item->file_cover_image = $extension;
        }

        $item->save();

        return redirect()->back()->with('message',
            'Đã tải lên thành công. Vui lòng đợi xét duyệt!');
    }










/**************************Phần upload file hình ảnh******************************/
    public function view_image()
    {
        if (Auth::check()) {
            return view('Customer.upload_image');
        } else {
            return view('Customer.home');
        }
    }


    public function upload_file_image(Request $request)
    {
        $this->validate($request, [
            'txt_tieude'=>'required|max:255',
            'txt_nd'=>'required|max:255',
            'txt_loai'=>'required',
   
            'txt_nguon'=>'required',
            'image'=>'required|image'
        ], [
            'txt_tieude.required'=>'Bạn chưa nhập tên file!',
            'txt_tieude.max'=>'Ký tự tiêu đề tối đa 255 ký tự!',
            'txt_nd.required'=>'Bạn chưa nhập nội dung!',
            'txt_nd.max'=>'Ký tự trong nội dung quá 255 ký tự!',
            'txt_loai.required'=>'Bạn chưa chọn loại!',
         
            'txt_nguon.required'=>'Bạn chưa trích dẫn nguồn!',
            'image.required'=>'Bạn chưa chọn file!',
            'image.image'=>'File bắt buộc là hình ảnh!'
        ]);

        $item = new DocumentImagePending;

        $item->title_file = $request->input('txt_tieude');
        $item->content = $request->input('txt_nd');
        $item->kind = $request->input('txt_loai');
        $item->id_user_fk = $request->input('txt_user');

        $item->source = $request->input('txt_nguon');
        
        if ($request->hasfile('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            
            $file->move(public_path('upload_document_images'), $filename);

            $item->file_name = $filename;
        }

        $item->save();

        return redirect()->back()->with('message',
            'Đã tải lên thành công. Vui lòng đợi xét duyệt!');
    }





    /**************************Phần upload file video******************************/
    public function view_video()
    {
        if (Auth::check()) {
            return view('Customer.upload_video');
        } else {
            return view('Customer.home');
        }
    }


    public function upload_file_video(Request $request)
    {
        $this->validate($request, [
            'txt_tieude'=>'required|max:255',
            'txt_nguon'=>'required',
            'txt_noidung'=>'required|max:255',
        ], [
            'txt_tieude.required'=>'Bạn chưa nhập tiêu đề!',
            'txt_tieude.max'=>'Ký tự tiêu đề tối đa 255 ký tự!',

            'txt_noidung.required'=>'Bạn chưa nhúng mã code!',
            'txt_noidung.max'=>'Ký tự vượt quá 255 ký tự!',
            
            'txt_nguon.required'=>'Bạn chưa nhập trích dẫn nguồn!',
        ]);

        $item = new DocumentVideoPending;

        $item->title_file = $request->input('txt_tieude');
        $item->source = $request->input('txt_nguon');
        $item->id_user_fk = $request->input('txt_user');
        $item->code_iframe_youtb = $request->input('txt_noidung');
        $item->save();

        return redirect()->back()
        ->with('message', 'Đã nhúng video thành công. Vui lòng đợi xét duyệt!');
    }




    /**************XEM PDF TRANG CÁ NHÂN**************/
    public function view_pdf_personal($id)
    {
        if (Auth::check())
        {
            $pdfs = DB::table('document__pendings')->where('id', $id)->get();
            return view ('Customer.user.view_pdf_personal')->with('pdfs', $pdfs);
        }
        else {
            return redirect()->route('get_login');
        }
    }

    /**************XEM HÌNH ẢNH TÀI LIỆU**************/
    public function view_picture_personal($id)
    {
        if (Auth::check())
        {
            $images = DB::table('document_image_pendings')->where('id', $id)->get();
            return view ('Customer.user.view_image_personal')->with('images', $images);
        }
        else 
        {
            return redirect()->route('get_login');
        }
    }

    /**************XÓA TÀI LIỆU CÁ NHÂN**************/
    public function delete_document_personal($id)
    {
        if (Auth::check())
        {
            DB::table('document__pendings')->where('id', $id)->delete();
            return redirect()->route('view_personal_customer', Auth::user()->id)
            ->with('message', 'Đã xóa tài liệu');
        }
        else
        {
            return redirect()->route('get_login');
        }
    }


    /**************XÓA TÀI LIỆU CÁ NHÂN**************/
    public function delete_picture_personal($id)
    {
        if (Auth::check())
        {
            DB::table('document_image_pendings')->where('id', $id)->delete();
            return redirect()->route('view_personal_customer', Auth::user()->id)
            ->with('message_image', 'Đã xóa hình ảnh');
        }
        else
        {
            return redirect()->route('get_login');
        }
    }


    /**************XÓA VIDEO**************/
    public function delete_video_personal($id)
    {
        if (Auth::check())
        {
            DB::table('document_video_pendings')->where('id', $id)->delete();
            return redirect()->route('view_personal_customer', Auth::user()->id)
            ->with('message_image', 'Đã xóa video');
        }
        else
        {
            return redirect()->route('get_login');
        }
    }


    /**************CHỈNH SỬA TÀI LIỆU CÁ NHÂN**************/
    public function edit_document_personal($id)
    {
        if (Auth::check())
        {
            $edit_document_personal = Document_Pending::findOrFail($id);
            return view ('Customer.user.edit_document_personal')
            ->with('edit_document_personal', $edit_document_personal);
        }
        else
        {
            return redirect()->route('get_login');
        }
    }


    /**************CẬP NHẬT TÀI LIỆU CÁ NHÂN**************/
    public function update_document_personal(Request $request, $id){
        
        $this->validate($request, [
            'txt_tieude'=>'required|max:255',
            'txt_noidungtt'=>'required|max:255',
            'txt_loai'=>'required',
            'txt_tacgia'=>'required',
            'txt_nguon'=>'required'
        ], [
            'txt_tieude.required'=>'Bạn chưa nhập tên file!',
            'txt_tieude.max'=>'Ký tự tiêu đề tối đa 255 ký tự!',
            'txt_noidungtt.required'=>'Bạn chưa nhập nội dung!',
            'txt_noidungtt.max'=>'Ký tự trong nội dung quá 255 ký tự!',
            'txt_loai.required'=>'Bạn chưa chọn loại!',
            'txt_tacgia.required'=>'Bạn chưa nhập tên tác giả!',
            'txt_nguon.required'=>'Bạn chưa trích dẫn nguồn!'
        ]);


        $update_document = Document_Pending::findOrFail($id);

        $update_document->title_file = $request->input('txt_tieude');
        $update_document->content = $request->input('txt_noidungtt');
        $update_document->kind = $request->input('txt_loai');
        $update_document->publish = $request->input('txt_xuatban');
        $update_document->author = $request->input('txt_tacgia');
        $update_document->source = $request->input('txt_nguon');
        $update_document->id_user_fk = $request->input('txt_user');

        


        if ($request->hasfile('file'))
        {
            $file = $request->file('file');
            $filename = $request->file('file')->getClientOriginalName();

            $file->move(public_path('upload_file'), $filename);

            $update_document->file_name = $filename;
            
            $update_document->file_size = $request->file('file')->getClientSize(); 
        }

        if ($request->hasfile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalName();
            
            $image->move(public_path('upload_file_images'), $extension);

            $update_document->file_cover_image = $extension;
        }

        $update_document->save();

        return redirect()->route('view_personal_customer', Auth::user()->id)
        ->with('message', 'Đã cập nhật tài liệu');
    }




    /**************CHỈNH SỬA HÌNH ẢNH**************/
    public function edit_picture_personal($id)
    {
        if (Auth::check())
        {
            $edit_picture_personal = DocumentImagePending::findOrFail($id);
            return view ('Customer.user.edit_picture_personal')
            ->with('edit_picture_personal', $edit_picture_personal);
        }
        else
        {
            return redirect()->route('get_login');
        }
    }

    

    //UPDATE HÌNH ẢNH
    public function update_picture_personal(Request $request, $id)
    {
        $this->validate($request, [
            'txt_tieude'=>'required|max:255',
            'txt_nd'=>'required|max:255',
            'txt_loai'=>'required',
            'txt_nguon'=>'required'
        ], [
            'txt_tieude.required'=>'Bạn chưa nhập tên file!',
            'txt_tieude.max'=>'Ký tự tiêu đề tối đa 255 ký tự!',
            'txt_nd.required'=>'Bạn chưa nhập nội dung!',
            'txt_nd.max'=>'Ký tự trong nội dung quá 255 ký tự!',
            'txt_loai.required'=>'Bạn chưa chọn loại!',
            'txt_nguon.required'=>'Bạn chưa trích dẫn nguồn!'
        ]);

        $update_picture = DocumentImagePending::findOrFail($id);

        $update_picture->title_file = $request->input('txt_tieude');
        $update_picture->content = $request->input('txt_nd');
        $update_picture->kind = $request->input('txt_loai');
        $update_picture->id_user_fk = $request->input('txt_user');

        $update_picture->source = $request->input('txt_nguon');
        
        if ($request->hasfile('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            
            $file->move(public_path('upload_document_images'), $filename);

            $update_picture->file_name = $filename;
        }

        $update_picture->save();

        return redirect()->route('view_personal_customer', Auth::user()->id)
        ->with('message_image', 'Đã cập nhật hình ảnh');
    }



    /**************CHỈNH SỬA VIDEO**************/
    public function edit_video_personal($id)
    {
        if (Auth::check())
        {
            $edit_video_personal = DocumentVideoPending::findOrFail($id);
            return view ('Customer.user.edit_video_personal')
            ->with('edit_video_personal', $edit_video_personal);
        }
        else
        {
            return redirect()->route('get_login');
        }
    }

    //UPDATE VIDEO
    public function update_video_personal(Request $request, $id)
    {
        $this->validate($request, [
            'txt_tieude'=>'required|max:255',
            'txt_nguon'=>'required',
            'txt_noidung'=>'required|max:255'
        ], [
            'txt_tieude.required'=>'Bạn chưa nhập tiêu đề!',
            'txt_tieude.max'=>'Ký tự tiêu đề tối đa 255 ký tự!',

            'txt_noidung.required'=>'Bạn chưa nhúng mã code!',
            'txt_noidung.max'=>'Ký tự vượt quá 255 ký tự!',
            
            'txt_nguon.required'=>'Bạn chưa nhập trích dẫn nguồn!'
        ]);

        $update_video = DocumentVideoPending::findOrFail($id);

        $update_video->title_file = $request->input('txt_tieude');

        $update_video->source = $request->input('txt_nguon');

        $update_video->id_user_fk = $request->input('txt_user');

        $update_video->code_iframe_youtb = $request->input('txt_noidung');

        $update_video->save();

        return redirect()->route('view_personal_customer', Auth::user()->id)
        ->with('message_video', 'Đã cập nhật video');
    }



}
