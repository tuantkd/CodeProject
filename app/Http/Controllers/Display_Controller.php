<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Display_Controller extends Controller
{
	//Xem banner web
    public function display_banner($id)
    {
    	$banners = DB::table('image_banners')->where('id', $id)->get();
    	return view('Admin2.display.display_banner')->with('banners', $banners);
    }

    //Xem tài liệu pdf tài liệu chờ duyệt
    public function display_document_pending($id)
    {
    	$document_pendings = DB::table('document__pendings')->where('id', $id)->get();
    	return view('Admin2.display.display_document_pending')
    	->with('document_pendings', $document_pendings);
    }

    //Xem tài liệu pdf tài liệu đã duyệt
    public function display_document($id)
    {
    	$documents = DB::table('documents')->where('id', $id)->get();
    	return view('Admin2.display.display_document')->with('documents', $documents);
    }

    //Xem hình ảnh chờ duyệt
    public function display_picture_pending($id)
    {
    	$picture_pendings = DB::table('document_image_pendings')->where('id', $id)->get();
    	return view('Admin2.display.display_picture_pending')
    	->with('picture_pendings', $picture_pendings);
    }


    //Xem hình ảnh duyệt xong
    public function display_picture($id)
    {
    	$pictures = DB::table('document_images')->where('id', $id)->get();
    	return view('Admin2.display.display_picture')->with('pictures', $pictures);
    }



}
