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
//admin
Route::get('/', function () {
    return view('welcome');
});
Route::get('/gv','GiaoVienController@show_index');
Route::get('/gvlogin','GiaoVienController@login');
Route::get('/gv-logout','GiaoVienController@gv_logout');
Route::get('/sv','SinhVienController@show_index');
Route::get('/svlogin','SinhVienController@login');
Route::get('/sv-logout','SinhVienController@sv_logout');

Route::post('/sv-dashboard','SinhVienController@dashboard');
Route::post('/gv-dashboard','GiaoVienController@dashboard');
//gv
     //baikiemtra
Route::get('/add-test','TestController@add_test');
Route::post('/save-test','TestController@save_test');
Route::get('/all-test','TestController@all_test');
Route::get('/edit-test/{test_id}','TestController@edit_test');
Route::post('/update-test/{test_id}','TestController@update_test');
Route::get('/delete-test/{test_id}','TestController@delete_test');
Route::get('/plus-question/{test_id}','TestController@plus_question');
Route::get('/save-plus-question/{test_id}/{question_id}','TestController@save_plus_question');
Route::get('/delete-plus-question/{test_id}/{question_id}','TestController@delete_plus_question');
Route::get('/all-detail-test','TestController@all_detail_test');
Route::get('/show-test','TestController@show_test');
Route::post('/update-number-test/{test_id}','TestController@update_number_test');
Route::get('/search-test','TestController@search_test');



      //cauhoi
Route::get('/add-question','QuestionController@add_question');
Route::get('/all-question','QuestionController@all_question');
Route::post('/save-question','QuestionController@save_question');
Route::get('/edit-question/{question_id}','QuestionController@edit_question');
Route::post('/update-question/{question_id}','QuestionController@update_question');
Route::get('/delete-question/{question_id}','QuestionController@delete_question');
Route::get('/search-question','QuestionController@search_question');


       //baitap
Route::get('/add-exam','ExamController@add_exam');
Route::get('/all-exam','ExamController@all_exam');
Route::get('/show-exam','ExamController@show_exam');
Route::post('/save-exam','ExamController@save_exam');
Route::get('/edit-exam/{exam_id}','ExamController@edit_exam');
Route::post('/update-exam/{exam_id}','ExamController@update_exam');
Route::get('/delete-exam/{exam_id}','ExamController@delete_exam');
       

        //monhoc
 Route::get('/add-subject','SubjectsController@add_subject');  
 Route::get('/all-subject','SubjectsController@all_subject');
 Route::post('/save-subject','SubjectsController@save_subject');
 Route::get('/edit-subject/{subject_id}','SubjectsController@edit_subject');
 Route::post('/update-subject/{subject_id}','SubjectsController@update_subject');
 Route::get('/delete-subject/{subject_id}','SubjectsController@delete_subject');
 Route::get('/plus-lecturer/{subject_id}','SubjectsController@plus_lecturer');
 Route::get('/plus-save-lecturer/{subject_id}/{lecturer_id}','SubjectsController@plus_save_lecturer');
 Route::get('/all-detail-lecturer/{subject_id}','SubjectController@all_detail_lecturer');
 Route::get('/delete-plus-lecturer/{subject_id}/{lecturer_id}','SubjectsController@delete_plus_lecturer');
 Route::get('/search-lecturer','SubjectsController@search_lecturer');
       
        //lop
    Route::get('/add-class','ClassController@add_class');  
    Route::get('/all-class','ClassController@all_class');
    Route::post('/save-class','ClassController@save_class');
    Route::get('/edit-class/{class_id}','ClassController@edit_class');
    Route::post('/update-class/{class_id}','ClassController@update_class');
    Route::get('/delete-class/{class_id}','ClassController@delete_class');
    Route::post('/update-number-class/{class_id}','ClassController@update_number_class');
    
    Route::post('/save-plus-subject/{class_id}','ClassController@save_plus_subject');
    Route::get('/plus-subject/{class_id}','ClassController@plus_subject');
    Route::get('/show-all-subject/{class_id}','ClassController@show_all_subject');

        //doan

    Route::get('/add-project','ProjectController@add_project');  
    Route::get('/all-project','ProjectController@all_project');
    Route::post('/save-project','ProjectController@save_project');
    Route::get('/edit-project/{project_id}','ProjectController@edit_project');
    Route::post('/update-project/{project_id}','ProjectController@update_project');
    Route::get('/delete-project/{project_id}','ProjectController@delete_project');
    //nhomdoan
    Route::get('/add-team','TeamController@add_team');
    Route::get('/all-team','TeamController@all_team');
    Route::post('/save-team','TeamController@save_team');
    Route::get('/edit-team/{team_id}','TeamController@edit_team');
    Route::post('/update-team/{team_id}','TeamController@update_team');
    Route::get('/delete-team/{team_id}','TeamController@delete_team');
    Route::get('/save-plus-student/{team_id}/{student_id}','TeamController@save_plus_student');
    Route::get('/plus-student/{team_id}','TeamController@plus_student');

   
    //taosinhvien
    Route::get('/add-student','SinhVienController@add_student');  
    Route::get('/all-student','SinhVienController@all_student');
    Route::post('/save-student','SinhVienController@save_student');
     Route::get('/edit-student/{student_id}','SinhVienController@edit_student');
    Route::post('/update-student/{student_id}','SinhVienController@update_student');
    Route::get('/delete-student/{student_id}','SinhVienController@delete_student');
    //yeucau
    Route::get('/add-yc','YeuCauController@add_yc');  
    Route::get('/all-yc','YeuCauController@all_yc');
    Route::post('/save-yc','YeuCauController@save_yc');
    Route::get('/phanhoi/{yeucau_id}','YeuCauController@phanhoi');
    Route::get('/all-phanhoi','YeuCauController@all_phanhoi');
    Route::get('/ds-phanhoi','YeuCauController@ds_phanhoi');
    Route::post('/save-phanhoi/{yeucau_id}','YeuCauController@save_phanhoi');


//sv

		//baitap

Route::get('upload-exam/{exam_id}','ExamController@upload_exam');
Route::post('upload-exam/{exam_id}','ExamController@do_upload_exam');

Route::get('download-exam/{exam_id}','ExamController@download_exam');


Route::get('/do-exam','ExamController@do_exam');
Route::get('/detail-exam/{exam_id}','ExamController@detail_exam');
Route::post('/save-do-exam/{exam_id}','ExamController@save_do_exam');

Route::get('/search-exam','ExamController@search_exam');

		//baikiemtra
Route::get('/do-test','TestController@do_test');
Route::get('/detail-question/{detail_question_id}','QuestionController@detail_question');
    Route::post('/save-do-question','QuestionController@save_do_question');
        //doan
    Route::get('/show-project','ProjectController@show_project');
    //monhoc
    Route::get('/all-subject-class','ClassController@all_subject_class');
    //team
    Route::get('/show-all-team','TeamController@show_all_team');
    //lop
    Route::get('/show-all-student','ClassController@show_all_student');