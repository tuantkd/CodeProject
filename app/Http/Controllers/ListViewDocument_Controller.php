<?php

namespace App\Http\Controllers;
use Response;
use Illuminate\Http\Request;

use App\Document;
use App\Document_Image;
use App\Document_Video;
use App\Comment;
use App\ReplyComment;
use App\Document_Pending;
use App\DocumentImagePending;
use App\DocumentVideoPending;
use DB;


class ListViewDocument_Controller extends Controller
{

	/******Phần TÌM KIẾM và hiển thị sách trang admin***************/
    public function view_list_book(Request $request){

        $search = $request->input('txt_timkiem');

        if ($search == "") {

            $books = DB::table('documents')->where('kind', 1)->paginate(12);
            return view('Customer.List_document.list_book')->with('books', $books);

        }
        else 
        {
            $books = DB::table('documents')->where('kind', 1)
            ->orwhere('title_file', 'LIKE', '%'.$search.'%')
            ->orwhere('content', 'LIKE', '%'.$search.'%')
            ->orWhere('publish', 'LIKE', '%'.$search.'%')
            ->orWhere('author', 'LIKE', '%'.$search.'%')
            ->orWhere('source', 'LIKE', '%'.$search.'%')
            ->paginate(2);
    
            $books->appends($request->only('txt_timkiem'));

            return view('Customer.List_document.list_book')->with('books', $books);
        }
    }



   



    /******Phần TÌM KIẾM và hiển thị giáo trình trang admin***************/
    public function view_list_curriculum(Request $request){

        $search = $request->input('txt_timkiem');

        if ($search == "") {

            $curriculums = DB::table('documents')->where('kind', 2)->paginate(12);
            return view('Customer.List_document.list_curriculum')->with('curriculums', $curriculums);

        }
        else 
        {
            $curriculums = DB::table('documents')->where('kind', 2)
            ->orwhere('title_file', 'LIKE', '%'.$search.'%')
            ->orwhere('content', 'LIKE', '%'.$search.'%')
            ->orWhere('publish', 'LIKE', '%'.$search.'%')
            ->orWhere('author', 'LIKE', '%'.$search.'%')
            ->orWhere('source', 'LIKE', '%'.$search.'%')
            ->paginate(2);
    
            $curriculums->appends($request->only('txt_timkiem'));

            return view('Customer.List_document.list_curriculum')->with('curriculums', $curriculums);
        }
    }





    /******Phần TÌM KIẾM và xem bài giảng trình trang admin***************/
    public function view_list_lesson(Request $request){

        $search = $request->input('txt_timkiem');

        if ($search == "") {

            $lessons = DB::table('documents')->where('kind', 5)->paginate(12);
            return view('Customer.List_document.list_lesson')->with('lessons', $lessons);

        }
        else 
        {
            $lessons = DB::table('documents')->where('kind', 5)
            ->orwhere('title_file', 'LIKE', '%'.$search.'%')
            ->orwhere('content', 'LIKE', '%'.$search.'%')
            ->orWhere('publish', 'LIKE', '%'.$search.'%')
            ->orWhere('author', 'LIKE', '%'.$search.'%')
            ->orWhere('source', 'LIKE', '%'.$search.'%')
            ->paginate(2);
    
            $lessons->appends($request->only('txt_timkiem'));

            return view('Customer.List_document.list_lesson')->with('lessons', $lessons);
        }
    }








    /******Phần TÌM KIẾM và xem báo cáo tổng quan trình trang admin***************/
    public function view_list_overview(Request $request){

        $search = $request->input('txt_timkiem');

        if ($search == "") {

            $overviews = DB::table('documents')->where('kind', 6)->paginate(12);
            return view('Customer.List_document.list_overview')->with('overviews', $overviews);

        }
        else 
        {
            $overviews = DB::table('documents')->where('kind', 6)
            ->orwhere('title_file', 'LIKE', '%'.$search.'%')
            ->orwhere('content', 'LIKE', '%'.$search.'%')
            ->orWhere('publish', 'LIKE', '%'.$search.'%')
            ->orWhere('author', 'LIKE', '%'.$search.'%')
            ->orWhere('source', 'LIKE', '%'.$search.'%')
            ->paginate(2);
    
            $overviews->appends($request->only('txt_timkiem'));

            return view('Customer.List_document.list_overview')->with('overviews', $overviews);
        }
    }






     /******Phần TÌM KIẾM và xem thông tin bài báo khoa học***************/
    public function view_list_science(Request $request){

        $search = $request->input('txt_timkiem');

        if ($search == "") {

            $sciences = DB::table('documents')->where('kind', 3)->paginate(12);
            return view('Customer.List_document.list_science')->with('sciences', $sciences);

        }
        else 
        {
            $sciences = DB::table('documents')->where('kind', 3)
            ->orwhere('title_file', 'LIKE', '%'.$search.'%')
            ->orwhere('content', 'LIKE', '%'.$search.'%')
            ->orWhere('publish', 'LIKE', '%'.$search.'%')
            ->orWhere('author', 'LIKE', '%'.$search.'%')
            ->orWhere('source', 'LIKE', '%'.$search.'%')
            ->paginate(2);
    
            $sciences->appends($request->only('txt_timkiem'));

            return view('Customer.List_document.list_science')->with('sciences', $sciences);
        }
    }







    /******Phần TÌM KIẾM và báo cáo chuyên đề***************/
    public function view_list_thematic(Request $request){

        $search = $request->input('txt_timkiem');

        if ($search == "") {

            $thematics = DB::table('documents')->where('kind', 4)->paginate(12);
            return view('Customer.List_document.list_thematic')->with('thematics', $thematics);

        }
        else 
        {
            $thematics = DB::table('documents')->where('kind', 4)
            ->orwhere('title_file', 'LIKE', '%'.$search.'%')
            ->orwhere('content', 'LIKE', '%'.$search.'%')
            ->orWhere('publish', 'LIKE', '%'.$search.'%')
            ->orWhere('author', 'LIKE', '%'.$search.'%')
            ->orWhere('source', 'LIKE', '%'.$search.'%')
            ->paginate(2);
    
            $thematics->appends($request->only('txt_timkiem'));

            return view('Customer.List_document.list_thematic')->with('thematics', $thematics);
        }
    }





    /*HÌNH ẢNH LIÊN QUAN*/
    public function view_list_picture(Request $request)
    {
        $search = $request->input('txt_timkiem');

        if ($search == "") {

            $image_books = DB::table('document_images')->paginate(10);
            return view('Customer.List_picture_document.list_detail_picture')
            ->with('image_books', $image_books);

        }
        else 
        {
            $image_books = DB::table('document_images')
            ->where('title_file', 'LIKE', '%'.$search.'%')
            ->orwhere('content', 'LIKE', '%'.$search.'%')
            ->orWhere('kind', 'LIKE', '%'.$search.'%')
            ->orWhere('file_name', 'LIKE', '%'.$search.'%')
            ->orWhere('source', 'LIKE', '%'.$search.'%')
            ->paginate(2);
    
            $image_books->appends($request->only('txt_timkiem'));

            return view('Customer.List_picture_document.list_detail_picture')
            ->with('image_books', $image_books);
        }     
    }



    /*HÌNH ẢNH LIÊN QUAN*/
    public function detail_picture($id){
        $image_details = DB::table('document_images')->where('id', $id)->get();
        return view('Customer.List_picture_document.view_detail_picture_customer')
        ->with('image_details', $image_details);
    }

   



    /*HIỂN THỊ VIDEO*/
    public function view_video(Request $request)
    {
        $search = $request->input('txt_timkiem');

        if ($search == "") {

            $videos = DB::table('document_videos')->paginate(6);
            return view('Customer.Show_document.View_video')
            ->with('videos', $videos);

        }
        else 
        {
            $videos = DB::table('document_videos')
            ->where('title_file', 'LIKE', '%'.$search.'%')
            ->orwhere('source', 'LIKE', '%'.$search.'%')
            ->orWhere('code_iframe_youtb', 'LIKE', '%'.$search.'%')
            ->paginate(2);
    
            $videos->appends($request->only('txt_timkiem'));

            return view('Customer.Show_document.View_video')
            ->with('videos', $videos);
        }     
    }


    



    //Bình luận tài liệu 
    public function post_comment_document(Request $request, $id)
    {
        $this->validate($request,[
            'txt_binhluan'=>'required'
        ],[
            'txt_binhluan.required'=>'Vui lòng nhập bình luận bên dưới!'
        ]);

        $comment = new Comment;
        $comment->content = $request->input('txt_binhluan');
        $comment->id_document_fk = $request->input('txt_id_document');
        $comment->id_user_fk = $request->input('txt_id_user');
        $comment->save();

        return redirect()->back();
    }

    //Bình luận tài liệu 
    public function post_reply_comment_document(Request $request, $id)
    {
        $this->validate($request,[
            'txt_binhluan'=>'required'
        ],[
            'txt_binhluan.required'=>'Vui lòng nhập bình luận bên dưới!'
        ]);

        $reply_documents = new ReplyComment;

        $reply_documents->content_reply = $request->input('txt_binhluan');

        $reply_documents->id_document_fk = $request->input('txt_id_document');

        $reply_documents->id_comment_fk = $request->input('txt_id_comment');

        $reply_documents->id_user_fk = $request->input('txt_id_user');

        $reply_documents->save();

        return redirect()->back();
    }



    /************Xóa bình luận***************/
    public function delete_comment($id)
    {
        DB::table('comments')->where('id', '=', $id)->delete();
        return redirect()->route('admin');
    }

    /************Xóa bình luận***************/
    public function delete_reply_comment($id)
    {
        DB::table('reply_comments')->where('id', '=', $id)->delete();
        return redirect()->route('admin');
    }





    //Bình luận tài liệu hình ảnh
    public function post_comment_image(Request $request, $id)
    {
        $this->validate($request,[
            'txt_binhluan'=>'required'
        ],[
            'txt_binhluan.required'=>'Vui lòng nhập bình luận bên dưới!'
        ]);

        $comment = new Comment;
        $comment->content = $request->input('txt_binhluan');
        $comment->id_image_fk = $request->input('txt_id_image');
        $comment->id_user_fk = $request->input('txt_id_user');
        $comment->save();

        return redirect()->back();
    }

    //Trả lời bình luận tài liệu hình ảnh
    public function post_reply_comment_image(Request $request, $id)
    {
        $this->validate($request,[
            'txt_binhluan'=>'required'
        ],[
            'txt_binhluan.required'=>'Vui lòng nhập bình luận bên dưới!'
        ]);

        $reply_images = new ReplyComment;

        $reply_images->content_reply = $request->input('txt_binhluan');
        $reply_images->id_image_fk = $request->input('txt_id_image');
        $reply_images->id_comment_fk = $request->input('txt_id_comment');
        $reply_images->id_user_fk = $request->input('txt_id_user');
        $reply_images->save();

        return redirect()->back();
    }




    //Xem chi tiết tài liệu
    public function view_detail_document($id)
    {
        $documents = DB::table('documents')->where('id', $id)->get();
        return view('Customer.Show_document.View_detail_document')
        ->with('documents', $documents);
    }









    /*******************PHẦN TÀI LIỆU CHỜ XỬ LÝ*******************/
    public function document_pending(Request $request)
    {
        $search = $request->input('txt_timkiem');

        if ($search == "") {

            $document_pendings = DB::table('document__pendings')->paginate(10);
            return view('Admin2.document_pending.document')
            ->with('document_pendings', $document_pendings);

        }
        else 
        {
            $document_pendings = DB::table('document__pendings')
            ->where('title_file', 'LIKE', '%'.$search.'%')
            ->orwhere('content', 'LIKE', '%'.$search.'%')
            ->orWhere('kind', 'LIKE', '%'.$search.'%')
            ->orWhere('file_name', 'LIKE', '%'.$search.'%')
            ->orWhere('source', 'LIKE', '%'.$search.'%')
            ->paginate(2);
    
            $document_pendings->appends($request->only('txt_timkiem'));

            return view('Admin2.document_pending.document')
            ->with('document_pendings', $document_pendings);
        }     
    }
    
    //Đưa tài liệu lên form để duyệt
    public function load_form_document($id){
        $loads = Document_Pending::findOrFail($id);
        return view('Admin2.document_pending.check_document')->with('loads', $loads);
    }

    //Duyệt tài liệu
    public function checked_document(Request $request, $id)
    {
       
        $move = new Document();

        $move->title_file = $request->input('txt_tieude_tailieu');
        $move->content = $request->input('txt_tomtat_tailieu');
        $move->kind = $request->input('txt_loai_tailieu');
        $move->publish = $request->input('txt_xuatban_tailieu');
        $move->author = $request->input('txt_tacgia_tailieu');
        $move->source = $request->input('txt_nguon_tailieu');
        $move->id_user_fk = $request->input('txt_user');

        $move->file_name = $request->input('file_tailieu');
            
        $move->file_cover_image = $request->input('cover_image_tailieu');
       

        $move->save();


        //Sau khi duyệt sẻ tự động xóa
        $first = Document_Pending::where('id', $id)->first();
        $first->delete();

        return redirect()->route('document_pending')
        ->with('message', 'Đã duyệt!');
        
    }






    /*******************PHẦN HÌNH ẢNH CHỜ XỬ LÝ*******************/
    public function picture_pending(Request $request)
    {
        $search = $request->input('txt_timkiem');

        if ($search == "") {

            $picture_pendings = DB::table('document_image_pendings')->paginate(10);
            return view('Admin2.document_pending.picture')
            ->with('picture_pendings', $picture_pendings);

        }
        else 
        {
            $picture_pendings = DB::table('document_image_pendings')
            ->where('title_file', 'LIKE', '%'.$search.'%')
            ->orwhere('content', 'LIKE', '%'.$search.'%')
            ->orWhere('kind', 'LIKE', '%'.$search.'%')
            ->orWhere('file_name', 'LIKE', '%'.$search.'%')
            ->orWhere('source', 'LIKE', '%'.$search.'%')
            ->paginate(2);
    
            $picture_pendings->appends($request->only('txt_timkiem'));

            return view('Admin2.document_pending.picture')
            ->with('picture_pendings', $picture_pendings);
        }     
    }


    //Đưa hình ảnh lên form để duyệt
    public function load_form_picture($id){
        $load_pictures = DocumentImagePending::findOrFail($id);
        return view('Admin2.document_pending.check_picture')->with('load_pictures', $load_pictures);
    }



    //Duyệt hình ảnh chờ xử lý
    public function checked_picture(Request $request, $id)
    {

        $update_picture = new Document_Image();

        $update_picture->title_file = $request->input('txt_tieude_image');
        $update_picture->content = $request->input('txt_noidung_image');
        $update_picture->kind = $request->input('txt_loai_image');
        $update_picture->id_user_fk = $request->input('txt_user');

        $update_picture->source = $request->input('txt_nguon_image');
        
        $update_picture->file_name = $request->input('image');
        
        $update_picture->save();

        //Sau khi duyệt sẻ tự động xóa
        $images = DocumentImagePending::where('id', $id)->first();
        $images->delete();

        return redirect()->route('picture_pending')
        ->with('message', 'Đã duyệt');
    }





    /*HIỂN THỊ VIDEO CHỜ DUYỆT*/
    public function video_pending(Request $request)
    {
        $search = $request->input('txt_timkiem');

        if ($search == "") {

            $video_pendings = DB::table('document_video_pendings')->paginate(6);
            return view('Admin2.document_pending.video')
            ->with('video_pendings', $video_pendings);

        }
        else 
        {
            $video_pendings = DB::table('document_video_pendings')
            ->where('title_file', 'LIKE', '%'.$search.'%')
            ->orwhere('source', 'LIKE', '%'.$search.'%')
            ->orWhere('code_iframe_youtb', 'LIKE', '%'.$search.'%')
            ->paginate(2);
    
            $video_pendings->appends($request->only('txt_timkiem'));

            return view('Admin2.document_pending.video')
            ->with('video_pendings', $video_pendings);
        }     
    }


    //Đưa video lên form để duyệt
    public function load_form_video($id)
    {
        $load_videos = DocumentVideoPending::findOrFail($id);
        return view('Admin2.document_pending.check_video')->with('load_videos', $load_videos);
    }


    //Duyệt video 
    public function checked_video(Request $request, $id)
    {
        $this->validate($request, [
            'txt_tieude_video'=>'required|max:255',
            'txt_nguon_video'=>'required',
            'content'=>'required|max:255'
        ], [
            'txt_tieude_video.required'=>'Bạn chưa nhập tiêu đề!',
            'txt_tieude_video.max'=>'Ký tự tiêu đề tối đa 255 ký tự!',

            'content.required'=>'Bạn chưa nhúng mã code!',
            'content.max'=>'Ký tự vượt quá 255 ký tự!',
            
            'txt_nguon_video.required'=>'Bạn chưa nhập trích dẫn nguồn!'
        ]);


        $update_video = new Document_Video();

        $update_video->title_file = $request->input('txt_tieude_video');

        $update_video->source = $request->input('txt_nguon_video');

        $update_video->id_user_fk = $request->input('txt_user');

        $update_video->code_iframe_youtb = $request->input('content');

        $update_video->save();

        //Sau khi duyệt sẻ tự động xóa
        $videos = DocumentVideoPending::where('id', $id)->first();
        $videos->delete();

        return redirect()->route('video_pending')
        ->with('message', 'Đã duyệt');
    }








}
