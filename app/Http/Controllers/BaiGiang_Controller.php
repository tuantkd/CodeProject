<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Document;
use DB;

class BaiGiang_Controller extends Controller
{
    /**************************Phần add báo cáo chuyên đề******************************/
    public function get_add_lesson_admin(){
        
        if (Auth::check()) {
        	return view('Admin2.admin_upload.add_lesson');
        } else {
        	return view ('Admin2.admin_home');
        }
    }




    /********************Phần add báo cáo chuyên đề lên csdl database******************/
    public function post_add_lesson_admin(Request $request){
    	
        $this->validate($request, [
            'txt_tieude_tailieu'=>'required|max:255',
            'txt_tomtat_tailieu'=>'required|max:255',
            'txt_loai_tailieu'=>'required',
            'txt_tacgia_tailieu'=>'required',
            'txt_xuatban_tailieu'=>'required',
            'txt_nguon_tailieu'=>'required',
            'file_tailieu'=>'mimes:pdf,xls,doc,docx,pptx,pps'
        ], [
            'txt_tieude_tailieu.required'=>'Bạn chưa nhập tiêu đề tài liệu!',
            'txt_tieude_tailieu.max'=>'Ký tự vượt quá 255 ký tự!',

            'txt_tomtat_tailieu.required'=>'Bạn chưa nhập nội dung tóm tắt tài liệu!',
            'txt_tomtat_tailieu.max'=>'Ký tự vượt quá 255 ký tự!',

            'txt_loai_tailieu.required'=>'Bạn chưa chọn thể loại tài liệu!',
            'txt_xuatban_tailieu.required'=>'Bạn chưa nhập năm xuất bản tài liệu!',
            'txt_tacgia_tailieu.required'=>'Bạn chưa nhập tên tác giả tài liệu!',
            'txt_nguon_tailieu.required'=>'Bạn chưa trích dẫn nguồn tài liệu!',

          
            'file_tailieu.mimes'=>'File tài liệu phải thuộc dạng: pdf,xls,doc,docx,pptx,pps',

            'cover_image_tailieu.required'=>'Bạn chưa chọn ảnh bìa tài liệu!'
        ]);


        $item = new Document;

        $item->title_file = $request->input('txt_tieude_tailieu');
        $item->content = $request->input('txt_tomtat_tailieu');
        $item->kind = $request->input('txt_loai_tailieu');
        $item->publish = $request->input('txt_xuatban_tailieu');
        $item->author = $request->input('txt_tacgia_tailieu');
        $item->source = $request->input('txt_nguon_tailieu');
        $item->id_user_fk = $request->input('txt_user');

        


    	if ($request->hasfile('file_tailieu')){
            $file = $request->file('file_tailieu');
            $filename = $file->getClientOriginalName();
           
            
            $file->move(public_path('upload_file'), $filename);

            $item->file_name = $filename;
            
            $item->file_size = $request->file('file_tailieu')->getClientSize(); 
        }

        if ($request->hasfile('cover_image_tailieu')){
            $image = $request->file('cover_image_tailieu');
            $imagename = $image->getClientOriginalName();
  
            
            $image->move(public_path('upload_file_images'), $imagename);

            $item->file_cover_image = $imagename;
        }

        $item->save();

        return redirect()->route('view_lesson_admin')
        ->with('message', 'Đã thêm bài giảng mới!');
    }



    /******************Chỉnh sửa tài liệu bài giảng************************/
    public function get_edit_lesson($id){
        $lesson = Document::findOrFail($id);
        return view('Admin2.edit_admin.edit_lesson')->with('lesson', $lesson);
    }



    /******************Cập nhật lại tài liệu bài giảng************************/
    public function update_lesson_admin(Request $request, $id){
        $lesson = Document::findOrFail($id);

        $lesson->title_file = $request->input('txt_tieude_tailieu');
        $lesson->content = $request->input('txt_tomtat_tailieu');
        $lesson->kind = $request->input('txt_loai_tailieu');
        $lesson->publish = $request->input('txt_xuatban_tailieu');
        $lesson->author = $request->input('txt_tacgia_tailieu');
        $lesson->source = $request->input('txt_nguon_tailieu');
        $lesson->id_user_fk = $request->input('txt_user');

        


        if ($request->hasfile('file_tailieu')){
            $file = $request->file('file_tailieu');
            $filename = $file->getClientOriginalName();
           
            
            $file->move(public_path('upload_file'), $filename);

            $lesson->file_name = $filename;
            
            $lesson->file_size = $request->file('file_tailieu')->getClientSize(); 
        }

        if ($request->hasfile('cover_image_tailieu')){
            $image = $request->file('cover_image_tailieu');
            $imagename = $image->getClientOriginalName();
  
           
            $image->move(public_path('upload_file_images'), $imagename);

            $lesson->file_cover_image = $imagename;
        }

        $lesson->save();

        return redirect()->route('view_lesson_admin')
        ->with('message', 'Đã cập nhật bài giảng!');
        
    }



    /******************Xóa bài giảng************************/
    public function get_delete_lesson($id){
        DB::table('documents')->where('id', $id)->delete();
        return redirect()->route('view_lesson_admin')->with('message', 'Đã xóa bài giảng!');
    }



    /******Phần TÌM KIẾM và hiển thị sách trang admin***************/
    public function view_lesson_admin(Request $request)
    {

        if (Auth::check())
        {
            $search = $request->input('txt_timkiem');

            if ($search == "") {

                $data_lesson = DB::table('documents')->where('kind', 5)->paginate(5);
                return view ('Admin2.document.view_lesson')->with('data_lesson', $data_lesson);

            }
            else 
            {
                $data_lesson = DB::table('documents')->where('kind', 5)
                ->orwhere('title_file', 'LIKE', '%'.$search.'%')
                ->orwhere('content', 'LIKE', '%'.$search.'%')
                ->orWhere('publish', 'LIKE', '%'.$search.'%')
                ->orWhere('author', 'LIKE', '%'.$search.'%')
                ->paginate(2);
        
                $data_lesson->appends($request->only('txt_timkiem'));

                return view ('Admin2.document.view_lesson')->with('data_lesson', $data_lesson);
            }
        }
        else {

            return redirect()->route('get_login');
        }


    }






}
