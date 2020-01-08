<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Document;
use DB;

class GiaoTrinh_Controller extends Controller
{
    /**************************Phần upload file tài liệu******************************/
    public function get_add_curriculum_admin(){
        return view('Admin2.admin_upload.add_curriculum');
        if (Auth::check()) {
        	return view('Admin2.admin_upload.add_curriculum');
        } else {
        	return redirect()->route('get_login');
        }
    }
    
    public function post_add_curriculum_admin(Request $request){
    	
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

        return redirect()->route('view_curriculum_admin')
        ->with('message', 'Đã thêm giáo trình mới!');
    }


    /******************Xóa tài liệu giáo trình************************/
    public function delete_curriculum_admin($id){
        DB::table('documents')->where('id', $id)->delete();
        return redirect()->route('view_curriculum_admin')
        ->with('message', 'Đã xóa giáo trình!');
    }


    /******************Chỉnh sửa tài liệu giáo trình************************/
    public function get_edit_curriculum($id){

        $curriculum = Document::findOrFail($id);
        return view('Admin2.edit_admin.edit_curriculum')->with('curriculum', $curriculum);
    }



    /******************Cập nhật lại tài liệu giáo trình************************/
    public function update_curriculum(Request $request, $id){
        
        $curriculum = Document::findOrFail($id);

        $curriculum->title_file = $request->input('txt_tieude_tailieu');
        $curriculum->content = $request->input('txt_tomtat_tailieu');
        $curriculum->kind = $request->input('txt_loai_tailieu');
        $curriculum->publish = $request->input('txt_xuatban_tailieu');
        $curriculum->author = $request->input('txt_tacgia_tailieu');
        $curriculum->source = $request->input('txt_nguon_tailieu');
        $curriculum->id_user_fk = $request->input('txt_user');

        


        if ($request->hasfile('file_tailieu')){
            $file = $request->file('file_tailieu');
            $filename = $file->getClientOriginalName();
           
            
            $file->move(public_path('upload_file'), $filename);

            $curriculum->file_name = $filename;
            
            $curriculum->file_size = $request->file('file_tailieu')->getClientSize(); 
        }

        if ($request->hasfile('cover_image_tailieu')){
            $image = $request->file('cover_image_tailieu');
            $imagename = $image->getClientOriginalName();
  
           
            $image->move(public_path('upload_file_images'), $imagename);

            $curriculum->file_cover_image = $imagename;
        }

        $curriculum->save();
        
        return redirect()->route('view_curriculum_admin')
        ->with('message', 'Đã cập nhật giáo trình!');
        
    }




    /******Phần TÌM KIẾM và hiển thị giáo trình trang admin***************/
    public function view_curriculum_admin(Request $request){

        $search = $request->input('txt_timkiem');

        if ($search == "") {

            $data_curriculum = DB::table('documents')->where('kind', 2)->paginate(5);

            return view ('Admin2.document.view_curriculum')
            ->with('data_curriculum', $data_curriculum);

        }
        else 
        {
            $data_curriculum = DB::table('documents')->where('kind', 2)
            ->orwhere('title_file', 'LIKE', '%'.$search.'%')
            ->orwhere('content', 'LIKE', '%'.$search.'%')
            ->orWhere('publish', 'LIKE', '%'.$search.'%')
            ->orWhere('author', 'LIKE', '%'.$search.'%')
            ->paginate(2);
    
            $data_curriculum->appends($request->only('txt_timkiem'));

            return view ('Admin2.document.view_curriculum')
            ->with('data_curriculum', $data_curriculum);
        }
    }



}
