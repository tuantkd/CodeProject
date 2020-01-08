<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Document;
use DB;

class BaoCaoChuyenDe_Controller extends Controller
{
    /**************************Phần add báo cáo chuyên đề******************************/
    public function get_add_thematic_admin()
    {
        
        if (Auth::check())
        {
        	return view('Admin2.admin_upload.add_thematic');
        } else {
        	return redirect()->route('get_login');
        }
    }



    /********************Phần add báo cáo chuyên đề lên csdl database******************/
    public function post_add_thematic_admin(Request $request){
    	
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

        


    	if ($request->hasfile('file_tailieu'))
        {
            $file = $request->file('file_tailieu');

            $filename = $file->getClientOriginalName();
           
            $file->move(public_path('upload_file'), $filename);

            $item->file_name = $filename;
            
            $item->file_size = $request->file('file_tailieu')->getClientSize(); 
        }



        if ($request->hasfile('cover_image_tailieu'))
        {
            $image = $request->file('cover_image_tailieu');

            $imagename = $image->getClientOriginalName();
  
            $image->move(public_path('upload_file_images'), $imagename);

            $item->file_cover_image = $imagename;
        }

        $item->save();

        return redirect()->route('view_thematic_reports')
        ->with('message', 'Đã thêm báo cáo chuyên đề mới!');
    }





    /******************Xóa tài liệu************************/
    public function delete_thematic($id){
        DB::table('documents')->where('id', $id)->delete();
        return redirect()->route('view_thematic_reports')
        ->with('message', 'Đã xóa báo cáo chuyên đề!');
    }


    /******************Chỉnh sửa tài liệu sách************************/
    public function get_edit_thematic($id){
        $thematic = Document::findOrFail($id);
        return view('Admin2.edit_admin.edit_thematic')->with('thematic', $thematic);
    }






    /******************Cập nhật lại tài liệu sách************************/
    public function update_thematic_admin(Request $request, $id){
        $thematic = Document::findOrFail($id);

        $thematic->title_file = $request->input('txt_tieude_tailieu');
        $thematic->content = $request->input('txt_tomtat_tailieu');
        $thematic->kind = $request->input('txt_loai_tailieu');
        $thematic->publish = $request->input('txt_xuatban_tailieu');
        $thematic->author = $request->input('txt_tacgia_tailieu');
        $thematic->source = $request->input('txt_nguon_tailieu');
        $thematic->id_user_fk = $request->input('txt_user');

        


        if ($request->hasfile('file_tailieu')){
            $file = $request->file('file_tailieu');
            $filename = $file->getClientOriginalName();
           
            
            $file->move(public_path('upload_file'), $filename);

            $thematic->file_name = $filename;
            
            $thematic->file_size = $request->file('file_tailieu')->getClientSize(); 
        }

        if ($request->hasfile('cover_image_tailieu')){
            $image = $request->file('cover_image_tailieu');
            $extension = $image->getClientOriginalName();
  
            
            $image->move(public_path('upload_file_images'), $extension);

            $thematic->file_cover_image = $imagename;
        }

        $thematic->save();

        return redirect()->route('view_thematic_reports')
        ->with('message', 'Đã cập nhật báo cáo chuyên đề!');
        
    }



    /******Phần TÌM KIẾM và hiển thị sách trang admin***************/
    public function view_thematic_reports(Request $request){

        $search = $request->input('txt_timkiem');

        if ($search == "") {

            $data_thematic = DB::table('documents')->where('kind', 4)->paginate(5);
            return view ('Admin2.document.view_thematic_reports')
            ->with('data_thematic', $data_thematic);

        }
        else 
        {
            $data_thematic = DB::table('documents')->where('kind', 4)
            ->orwhere('title_file', 'LIKE', '%'.$search.'%')
            ->orwhere('content', 'LIKE', '%'.$search.'%')
            ->orWhere('publish', 'LIKE', '%'.$search.'%')
            ->orWhere('author', 'LIKE', '%'.$search.'%')
            ->paginate(2);
    
            $data_thematic->appends($request->only('txt_timkiem'));

            return view ('Admin2.document.view_thematic_reports')
            ->with('data_thematic', $data_thematic);
        }
    }
}
