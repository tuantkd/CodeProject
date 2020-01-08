<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/************RESET PASSWORD AND FORGOT PASSWORD*************/
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')
->name('password.email');

Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')
->name('password.request');

Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')
->name('password.reset');
/************RESET PASSWORD AND FORGOT PASSWORD*************/




Route::get('page_not_found', 'Login_Controller@page_not_found')->name('page_not_found');
Route::get('500_error_page', function() {
    return view ('errors.500');
});







/*************************TRANG KHÁCH***************************/
Route::get('/', 'Login_Controller@view_home')->name('trangchu');


/*************************Phần đăng ký thành viên*****************************/
Route::get('get_register', 'Register_Controller@index')->name('get_register');
Route::post('post_register', 'Register_Controller@register')->name('post_register');

/*************************Phần đăng nhập thành viên***************************/
Route::get('get_login', 'Login_Controller@view_login')->name('get_login');
Route::get('get_logout', 'Login_Controller@logout')->name('get_logout');
Route::post('post_login', 'Login_Controller@login')->name('post_login');








/*************************THÔNG TIN NGƯỜI DÙNG TRANG KHÁCH***************************/
//Xem thông tin cá nhân
Route::get('view_personal_customer{id}', 'User_Manage_Controller@view_personal_customer')
->name('view_personal_customer');

//Xem pdf tài liệu
Route::get('view_pdf_personal{id}', 'UploadFile_Controller@view_pdf_personal')
->name('view_pdf_personal');

//Xem hình ảnh 
Route::get('view_picture_personal{id}', 'UploadFile_Controller@view_picture_personal')
->name('view_picture_personal');

//Xóa tài liệu cá nhân
Route::get('delete_document_personal{id}', 'UploadFile_Controller@delete_document_personal')
->name('delete_document_personal');

//Xóa hình ảnh cá nhân
Route::get('delete_picture_personal{id}', 'UploadFile_Controller@delete_picture_personal')
->name('delete_picture_personal');

//Xóa video
Route::get('delete_video_personal{id}', 'UploadFile_Controller@delete_video_personal')
->name('delete_video_personal');

//Chỉnh sửa tài liệu cá nhân
Route::get('edit_document_personal{id}', 'UploadFile_Controller@edit_document_personal')
->name('edit_document_personal');

//Cập nhật lại tài liệu cá nhân
Route::put('update_document_personal{id}', 'UploadFile_Controller@update_document_personal')
->name('update_document_personal');

//Chỉnh sửa hình ảnh
Route::get('edit_picture_personal{id}', 'UploadFile_Controller@edit_picture_personal')
->name('edit_picture_personal');

//Cập nhật lại hình ảnh cá nhân
Route::put('update_picture_personal{id}', 'UploadFile_Controller@update_picture_personal')
->name('update_picture_personal');

//Chỉnh sửa lại video
Route::get('edit_video_personal{id}', 'UploadFile_Controller@edit_video_personal')
->name('edit_video_personal');

//Cập nhật lại video
Route::put('update_video_personal{id}', 'UploadFile_Controller@update_video_personal')
->name('update_video_personal');








/**************Danh sách về sách**************************/
Route::get('view_list_book', 'ListViewDocument_Controller@view_list_book')
->name('view_list_book');

/**************Danh sách về giáo trình********************/
Route::get('view_list_curriculum', 'ListViewDocument_Controller@view_list_curriculum')
->name('view_list_curriculum');

/**************Danh sách về bài giảng*********************/
Route::get('view_list_lesson', 'ListViewDocument_Controller@view_list_lesson')
->name('view_list_lesson');

/**************Danh sách về báo cáo tổng quan*************/
Route::get('view_list_overview', 'ListViewDocument_Controller@view_list_overview')
->name('view_list_overview');

/**************Danh sách về thông tin khoa học************/
Route::get('view_list_science', 'ListViewDocument_Controller@view_list_science')
->name('view_list_science');

/**************Danh sách về chuyên đề*********************/
Route::get('view_list_thematic', 'ListViewDocument_Controller@view_list_thematic')
->name('view_list_thematic');













//Hình ảnh
Route::get('view_list_picture', 'ListViewDocument_Controller@view_list_picture')
->name('view_list_picture');


//Hình ảnh chi tiết
Route::get('detail_picture{id}', 'ListViewDocument_Controller@detail_picture')
->name('detail_picture');


//Hiển thị video ra trang khách
Route::get('view_video', 'ListViewDocument_Controller@view_video')->name('view_video');








//Xem chi tiết thông tin nổi bật
Route::get('view_detail_infomation{id}', 'Info_Controller@view_detail_infomation')
->name('view_detail_infomation');











//Bình luận tài liệu trang khách
Route::post('post_comment_document{id}', 'ListViewDocument_Controller@post_comment_document')
->name('post_comment_document');

//Trả lời bình luận tài liệu trang khách
Route::post('post_reply_comment_document{id}', 'ListViewDocument_Controller@post_reply_comment_document')
->name('post_reply_comment_document');


//Bình luận tài liệu hình ảnh trang khách
Route::post('post_comment_image{id}', 'ListViewDocument_Controller@post_comment_image')
->name('post_comment_image');

//Trả lời bình luận tài liệu hình ảnh trang khách
Route::post('post_reply_comment_image{id}', 'ListViewDocument_Controller@post_reply_comment_image')
->name('post_reply_comment_image');

//Xóa bình luận trang admin
Route::get('delete_comment{id}', 'ListViewDocument_Controller@delete_comment')
->name('delete_comment');

//Xóa trả lời bình luận trang admin
Route::get('delete_reply_comment{id}', 'ListViewDocument_Controller@delete_reply_comment')
->name('delete_reply_comment');









//Đánh giá sao tài liệu trang khách
Route::post('star_rating{id}', 'RatingStar_Controller@star_rating')
->name('star_rating');

//Đếm lượt tải xuống
Route::post('count_download{id}', 'RatingStar_Controller@count_download')
->name('count_download');

//Tải xuống file
Route::get('download_file{id}', 'RatingStar_Controller@download_file')
->name('download_file');




//Xem chi tiết tài liệu
Route::get('view_detail_document{id}', 'ListViewDocument_Controller@view_detail_document')
->name('view_detail_document');







/*************************Upload file tài liệu***************************/
Route::get('get_upload_document', 'UploadFile_Controller@view_document')
->name('get_upload_document');

Route::post('post_upload_document', 'UploadFile_Controller@upload_file_document')
->name('post_upload_document');
/*************************Upload file tài liệu***************************/


/*************************Upload file hình ảnh***************************/
Route::get('get_upload_image', 'UploadFile_Controller@view_image')
->name('get_upload_image');

Route::post('post_upload_image', 'UploadFile_Controller@upload_file_image')
->name('post_upload_image');
/*************************Upload file hình ảnh***************************/


/*************************Upload file hình ảnh***************************/
Route::get('get_upload_video', 'UploadFile_Controller@view_video')
->name('get_upload_video');

Route::post('post_upload_video', 'UploadFile_Controller@upload_file_video')
->name('post_upload_video');
/*************************Upload file hình ảnh***************************/

/********************PHẦN TRANG KHÁCH***********************/












/*************************TRANG ADMIN********************************************/

//Hiển thị trang tài liệu chờ duyệt
Route::get('document_pending', 'ListViewDocument_Controller@document_pending')
->name('document_pending');

//Đưa dữ liệu lên form duyệt 
Route::get('load_form_document{id}', 'ListViewDocument_Controller@load_form_document')
->name('load_form_document');

//Duyệt tài liệu
Route::put('checked_document{id}', 'ListViewDocument_Controller@checked_document')
->name('checked_document');



//Hiển thị trang hình ảnh chờ duyệt
Route::get('picture_pending', 'ListViewDocument_Controller@picture_pending')
->name('picture_pending');

//Đưa dữ liệu lên form duyệt 
Route::get('load_form_picture{id}', 'ListViewDocument_Controller@load_form_picture')
->name('load_form_picture');

//Duyệt hình ảnh
Route::put('checked_picture{id}', 'ListViewDocument_Controller@checked_picture')
->name('checked_picture');


//Hiển thị trang videochờ duyệt
Route::get('video_pending', 'ListViewDocument_Controller@video_pending')
->name('video_pending');

//Đưa video lên form duyệt 
Route::get('load_form_video{id}', 'ListViewDocument_Controller@load_form_video')
->name('load_form_video');

//Duyệt video
Route::put('checked_video{id}', 'ListViewDocument_Controller@checked_video')
->name('checked_video');






//Xem banner web khi click vào trang admin
Route::get('display_banner{id}', 'Display_Controller@display_banner')
->name('display_banner');

//Xem tài liệu chờ duyệt khi click vào trang admin
Route::get('display_document_pending{id}', 'Display_Controller@display_document_pending')
->name('display_document_pending');

//Xem tài liệu khi click vào trang admin
Route::get('display_document{id}', 'Display_Controller@display_document')
->name('display_document');

//Xem hình ảnh chờ duyệt
Route::get('display_picture_pending{id}', 'Display_Controller@display_picture_pending')
->name('display_picture_pending');

//Xem hình ảnh duyệt
Route::get('display_picture{id}', 'Display_Controller@display_picture')
->name('display_picture');














/*************************Phần trang admin***************************/
Route::get('index', 'User_Manage_Controller@view_admin')->name('admin');



/********************QUẢN LÝ USER & CREATE NEW *********************************************/
//Xóa người dùng
Route::get('get_delete_user_guest{id}', 'User_Manage_Controller@get_delete_user_guest')
->name('get_delete_user_guest'); //Khách

//Hiển thị tất cả và tìm kiếm người dùng
Route::get('get_search_user_guest', 'User_Manage_Controller@get_search_user_guest')
->name('get_search_user_guest'); //Khách hiển thị danh sách người dùng

//Xem thông tin người dùng sau khi đăng nhập admin
Route::get('get_infomation_user{id}', 'User_Manage_Controller@get_infomation_user')
->name('get_infomation_user');

//Chỉnh sửa thông tin cá nhân trang admin
Route::get('get_edit_info_user{id}', 'User_Manage_Controller@get_edit_info_user');

//Cập nhật lại sau khi chỉnh sửa thông tin cá nhân
Route::put('get_update_info_user{id}', 'User_Manage_Controller@get_update_info_user');

//Xem danh sách người dùng quản lý trang
Route::get('view_user_admin', 'User_Manage_Controller@view_user_admin')
->name('view_user_admin');//admin

//Thêm người dùng quản lý trang
Route::get('get_add_user_admin', 'User_Manage_Controller@get_add_user_admin')
->name('get_add_user_admin'); //admin

Route::post('post_add_user_admin', 'User_Manage_Controller@post_add_user_admin')
->name('post_add_user_admin'); //admin

//Xóa người dùng quản lý trang admin
// Route::get('get_delete_user_admin{id}', 'User_Manage_Controller@get_delete_user_admin')
// ->name('get_delete_user_admin'); //admin

/********************QUẢN LÝ USER & CREATE NEW *********************************************/




/*************************PHẦN UPLOAD BANNER WEB***************************/
//Lưu ý khi hiển thị biến ra màn hình nhớ xem lại phần tên route có đúng tên và đường dẫn
Route::get('get_banner', 'ImageBanner_Controller@get_banner')->name('get_banner'); 

Route::post('post_banner', 'ImageBanner_Controller@post_banner')->name('post_banner');

Route::get('get_edit_banner{id}', 'ImageBanner_Controller@get_edit_banner')
->name('get_edit_banner');

Route::put('update_banner{id}', 'ImageBanner_Controller@update_banner');

Route::get('get_delete_banner{id}', 'ImageBanner_Controller@delete_banner')
->name('get_delete_banner');

Route::get('get_display_banner', 'ImageBanner_Controller@get_display_banner')
->name('get_display_banner');

/*************************PHẦN UPLOAD BANNER WEB***************************/




/************************PHẦN UPLOAD THÔNG TIN NỔI BẬT************************************/

Route::get('get_add_infomation', 'Info_Controller@get_add_infomation')
->name('get_add_infomation');

Route::post('post_information', 'Info_Controller@store_info')->name('post_information');

Route::get('get_edit_information{id}', 'Info_Controller@get_edit_information')
->name('get_edit_information');

Route::put('update_information{id}', 'Info_Controller@update_information');

Route::get('get_delete_information{id}', 'Info_Controller@get_delete_information')
->name('get_delete_information');

Route::get('get_search_display_information', 'Info_Controller@get_search_display_information')
->name('get_search_display_information');

/************************PHẦN UPLOAD THÔNG TIN NỔI BẬT************************************/










/*************************PHẦN TÀI LIỆU TRANG ADMIN***************************/
//Thêm sách mới
Route::get('get_add_book_admin','Sach_Controller@get_add_book_admin')
->name('get_add_book_admin');

//Thêm lên csdl
Route::post('post_add_book_admin','Sach_Controller@post_add_book_admin')
->name('post_add_book_admin');

//Hiển thị và tìm kiếm sách
Route::get('view_book_admin','Sach_Controller@view_book_admin')
->name('view_book_admin');

//Chỉnh sửa sách
Route::get('get_edit_book_admin{id}','Sach_Controller@get_edit_book_admin')
->name('get_edit_book_admin');

//Cập nhật lại sách
Route::put('update_book_admin{id}', 'Sach_Controller@update_book_admin');

//Xóa sách khỏi csdl
Route::get('get_delete_book{id}', 'Sach_Controller@delete_book_admin')
->name('get_delete_book'); //XÓA CHUNG CÁC TÀI LIỆU
//========SÁCH========== 





//========GIÁO TRÌNH==========
//Thêm tài liệu giáo trình
Route::get('get_add_curriculum_admin','GiaoTrinh_Controller@get_add_curriculum_admin')
->name('get_add_curriculum_admin');

//Add lên CSDL
Route::post('post_add_curriculum_admin','GiaoTrinh_Controller@post_add_curriculum_admin')
->name('post_add_curriculum_admin');

//XEM trang giáo trình và tìm kiếm giáo trình
Route::get('view_curriculum_admin', 'GiaoTrinh_Controller@view_curriculum_admin')
->name('view_curriculum_admin');

//Chỉnh sửa giáo trình
Route::get('get_edit_curriculum{id}', 'GiaoTrinh_Controller@get_edit_curriculum');

//Cập nhật mới giáo trình
Route::put('update_curriculum_admin{id}', 'GiaoTrinh_Controller@update_curriculum');

//Xóa giáo trình
Route::get('get_delete_curriculum{id}', 'GiaoTrinh_Controller@delete_curriculum_admin')
->name('get_delete_curriculum');
//========GIÁO TRÌNH========== 




//========THÔNG TIN BÀI BÁO KHOA HỌC========== 
//Thêm thông tin báo báo khoa học
Route::get('get_add_scientific_admin','TTBaiBaoKhoaHoc_Controller@get_add_scientific_admin')
->name('get_add_scientific_admin');

//Thêm lên csdl
Route::post('post_add_scientific_admin','TTBaiBaoKhoaHoc_Controller@post_add_scientific_admin')
->name('post_add_scientific_admin');

//Xem và tìm thông tin bài báo khoa học
Route::get('view_scientific_admin', 'TTBaiBaoKhoaHoc_Controller@view_scientific_admin')
->name('view_scientific_admin');

//Chỉnh sửa thông tin bài báo
Route::get('get_edit_scientific{id}', 'TTBaiBaoKhoaHoc_Controller@get_edit_scientific')
->name('get_edit_scientific');

//Cập nhật lại thông tin bài báo
Route::put('update_scientific_admin{id}', 'TTBaiBaoKhoaHoc_Controller@update_scientific_admin');

//Xóa bài báo khỏi csdl
Route::get('delete_scientific_admin{id}', 'TTBaiBaoKhoaHoc_Controller@delete_scientific_admin');
//========THÔNG TIN BÀI BÁO KHOA HỌC========== 





//========BÁO CÁO CHUYÊN ĐỀ========== 
//Thêm chuyên đề
Route::get('get_add_thematic_admin','BaoCaoChuyenDe_Controller@get_add_thematic_admin')
->name('get_add_thematic_admin');

//Thêm lên csdl
Route::post('post_add_thematic_admin','BaoCaoChuyenDe_Controller@post_add_thematic_admin')
->name('post_add_thematic_admin');

//Xem và tigm kiếm chuyên đề
Route::get('view_thematic_reports', 'BaoCaoChuyenDe_Controller@view_thematic_reports')
->name('view_thematic_reports');

//Chỉnh sửa chuyên đề
Route::get('get_edit_thematic{id}', 'BaoCaoChuyenDe_Controller@get_edit_thematic')
->name('get_edit_thematic');

//Cập nhật mới chuyên đề
Route::put('update_thematic_admin{id}', 'BaoCaoChuyenDe_Controller@update_thematic_admin');

//Xóa chuyên đề
Route::get('delete_thematic{id}', 'BaoCaoChuyenDe_Controller@delete_thematic');
//========BÁO CÁO CHUYÊN ĐỀ==========



//========BÀI GIẢNG========== 
//Thêm bài giảng mới
Route::get('get_add_lesson_admin','BaiGiang_Controller@get_add_lesson_admin')
->name('get_add_lesson_admin');

//Thêm lên csdl
Route::post('post_add_lesson_admin','BaiGiang_Controller@post_add_lesson_admin')
->name('post_add_lesson_admin');

//Xem và tìm kiếm bài giảng
Route::get('view_lesson_admin', 'BaiGiang_Controller@view_lesson_admin')
->name('view_lesson_admin');

//Chỉnh sửa bài giảng
Route::get('get_edit_lesson{id}', 'BaiGiang_Controller@get_edit_lesson')
->name('get_edit_lesson');

//Cập nhật lại bài giảng
Route::put('update_lesson_admin{id}', 'BaiGiang_Controller@update_lesson_admin');

//Xóa bài giảng khỏi csdl
Route::get('get_delete_lesson{id}', 'BaiGiang_Controller@get_delete_lesson')
->name('get_delete_lesson');
//========BÀI GIẢNG==========




//========BÁO CÁO TỔNG QUAN==========
//Thêm báo cáo tổng quan
Route::get('get_add_overview_admin','BaoCaoTongQuan_Controller@get_add_overview_admin')
->name('get_add_overview_admin');

//Thêm lên csdl
Route::post('post_add_overview_admin','BaoCaoTongQuan_Controller@post_add_overview_admin')
->name('post_add_overview_admin');

//Xem và tim kiếm báo cáo tổng quan
Route::get('view_overview_admin', 'BaoCaoTongQuan_Controller@view_overview_admin')
->name('view_overview_admin');

//Chình sửa báo cáo tổng quan
Route::get('get_edit_overview{id}', 'BaoCaoTongQuan_Controller@get_edit_overview')
->name('get_edit_overview');

//Cập nhật lại tổng quan
Route::put('update_overview_admin{id}', 'BaoCaoTongQuan_Controller@update_overview_admin');

//Xóa báo cáo tổng quan
Route::get('get_delete_overview{id}', 'BaoCaoTongQuan_Controller@get_delete_overview')
->name('get_delete_overview');
//========BÁO CÁO TỔNG QUAN========== 





/*************************PHẦN ADD HÌNH ẢNH VÀO TRONG TRANG ADMIN***************************/
//Thêm hình mới
Route::get('get_add_image_admin', 'UploadFileAdmin_Controller@get_add_image_admin')
->name('get_add_image_admin'); 

//Thêm lên csdl
Route::post('post_add_image_admin', 'UploadFileAdmin_Controller@post_add_image_admin')
->name('post_add_image_admin');

//Chỉnh sửa hình ảnh
Route::get('get_edit_image_admin{id}', 'UploadFileAdmin_Controller@get_edit_image_admin')
->name('get_edit_image_admin'); 

//Cập nhật lại hình ản
Route::put('get_update_image_admin{id}', 'UploadFileAdmin_Controller@get_update_image_admin'); 

//Xóa hình ảnh
Route::get('get_delete_image_admin{id}', 'UploadFileAdmin_Controller@get_delete_image_admin')
->name('get_delete_image_admin'); 

//Xem và tìm hình ảnh
Route::get('get_search_image_admin', 'UploadFileAdmin_Controller@get_search_image_admin')
->name('get_search_image_admin'); //Tìm kiếm hình ảnh theo thể loại và hiển thị phân trang

/*************************PHẦN ADD HÌNH ẢNH VÀO TRONG TRANG ADMIN***************************/






/*************************Phần nhúng video trang Admin***************************/
//Nhúng video từ youtube
Route::get('get_add_embed_video', 'UploadFileAdmin_Controller@get_add_embed_video')
->name('get_add_embed_video'); 

//Thêm nhúng lên csdl
Route::post('post_add_embed_video', 'UploadFileAdmin_Controller@post_add_embed_video')
->name('post_add_embed_video');

//Xem video và tìm kiếm video
Route::get('view_embed_video_admin', 'UploadFileAdmin_Controller@view_embed_video_admin')
->name('view_embed_video_admin');

//Chỉnh sửa nhúng mới lại video
Route::get('get_edit_video_admin{id}', 'UploadFileAdmin_Controller@get_edit_video_admin')
->name('get_edit_video_admin');

//Cập nhật mới video
Route::put('get_update_video_admin{id}', 'UploadFileAdmin_Controller@get_update_video_admin')
->name('get_update_video_admin');

//Xóa video khỏi csdl
Route::get('get_delete_video_admin{id}', 'UploadFileAdmin_Controller@get_delete_video_admin')
->name('get_delete_video_admin');
/*************************Phần nhúng video trang Admin***************************/


/*************************HƯỚNG DẪN nhúng video trang Admin***************************/
//Xem hướng dẫn nhúng video từ youtube admin
Route::get('tutorial_embed_video_youtube', function() {
    return view ('Admin2.tutorial_embed_video');
});

//Xem hướng dẫn nhúng video từ youtube customer
Route::get('tutorial_embed', function() {
    return view ('Customer.tutorial_embed');
});


