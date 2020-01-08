<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rating_star;
use App\Document;
use App\count_download;
use DB;

class RatingStar_Controller extends Controller
{

    //Đánh giá sao tài liệu
    public function star_rating(Request $request)
    {
        $this->validate($request, [
            'star'=>'required'
        ], 
        [
            'star.required'=>'Bạn chưa chọn sao!'
        ]);

        $star = new rating_star;

        $star->rating = $request->input('star');
        $star->id_user_fk = $request->input('txt_user');
        $star->id_document_fk = $request->input('txt_document_id');
   
        $star->save();
        return redirect()->back();

    }


    //Tải file về đúng tài liệu hiện tại
    public function download_file($id)
    {
        $downloads = DB::table('documents')->where('id', $id)->get();
        return view('Customer.download_file')->with('downloads', $downloads);
    }


    //Đếm lượt tải về
    public function count_download(Request $request, $id)
    {
        $count = new count_download;
        $count->count_download = $request->input('txt_number');
        $count->id_user_fk = $request->input('txt_id_user');
        $count->id_document_fk = $request->input('txt_id_document');
        $count->save();
        return redirect()->route('download_file', $id);
    }

}
