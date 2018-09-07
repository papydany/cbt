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

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});


//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

Auth::routes();
/*Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });*/
Route::get('subject', ['uses' =>'HomeController@subject','middleware' => 'roles','roles'=>'superadmin'])->name('subject');
Route::post('post_subject', ['uses' =>'HomeController@post_subject','middleware' => 'roles','roles'=>'superadmin'])->name('post_subject');
Route::get('edit_subject/{id}', ['uses' =>'HomeController@edit_subject','middleware' => 'roles','roles'=>'superadmin'])->name('edit_subject');
Route::post('update_subject', ['uses' =>'HomeController@update_subject','middleware' => 'roles','roles'=>'superadmin']);
//=============================school =================================================
Route::get('school', ['uses' =>'HomeController@school','middleware' => 'roles','roles'=>'superadmin'])->name('school');
Route::post('post_school', ['uses' =>'HomeController@post_school','middleware' => 'roles','roles'=>'superadmin']);
Route::get('view_school', ['uses' =>'HomeController@view_school','middleware' => 'roles','roles'=>'superadmin'])->name('view_school');
Route::get('edit_school/{id}', ['uses' =>'HomeController@edit_school','middleware' => 'roles','roles'=>'superadmin']);
Route::post('update_school', ['uses' =>'HomeController@update_school','middleware' => 'roles','roles'=>'superadmin']);
Route::get('deactivate_school/{id}', ['uses' =>'HomeController@deactivate_school','middleware' => 'roles','roles'=>'superadmin']);

//=================================== basic info ===========================================================

Route::get('basicinfo', ['uses' =>'HomeController@basicinfo','middleware' => 'roles','roles'=>'superadmin'])->name('basicinfo');
Route::post('post_basicinfo', ['uses' =>'HomeController@post_basicinfo','middleware' => 'roles','roles'=>'superadmin']);
Route::get('view_basicinfo', ['uses' =>'HomeController@view_basicinfo','middleware' => 'roles','roles'=>'superadmin'])->name('view_basicinfo');
Route::get('edit_basicinfo/{id}', ['uses' =>'HomeController@edit_basicinfo','middleware' => 'roles','roles'=>'superadmin']);
Route::post('update_basicinfo', ['uses' =>'HomeController@update_basicinfo','middleware' => 'roles','roles'=>'superadmin']);
//========================================== new teacher ===============================================
Route::get('new_teacher', ['uses' =>'HomeController@new_teacher','middleware' => 'roles','roles'=>'superadmin'])->name('new_teacher');
Route::get('approved_teacher/{id}', ['uses' =>'HomeController@approved_teacher','middleware' => 'roles','roles'=>'superadmin'])->name('approved_teacher');
//================================= post =========================================================
Route::get('post', ['uses' =>'HomeController@post','middleware' => 'roles','roles'=>'superadmin'])->name('post');
Route::post('post2', ['uses' =>'HomeController@post2','middleware' => 'roles','roles'=>'superadmin']);
Route::get('view_post', ['uses' =>'HomeController@view_post','middleware' => 'roles','roles'=>'superadmin'])->name('view_post');
Route::get('edit_post/{id}', ['uses' =>'HomeController@edit_post','middleware' => 'roles','roles'=>'superadmin']);
Route::post('update_post', ['uses' =>'HomeController@update_post','middleware' => 'roles','roles'=>'superadmin']);
Route::get('delete_post/{id}', ['uses' =>'HomeController@delete_post','middleware' => 'roles','roles'=>'superadmin']);


//================================= simulation =========================================================
Route::get('simulation', ['uses' =>'HomeController@simulation','middleware' => 'roles','roles'=>'superadmin'])->name('simulation');
Route::post('simulation2', ['uses' =>'HomeController@simulation2','middleware' => 'roles','roles'=>'superadmin']);
Route::get('view_simulation', ['uses' =>'HomeController@view_simulation','middleware' => 'roles','roles'=>'superadmin'])->name('view_simulation');
Route::get('edit_simulation/{id}', ['uses' =>'HomeController@edit_simulation','middleware' => 'roles','roles'=>'superadmin']);
Route::post('update_simulation', ['uses' =>'HomeController@update_simulation','middleware' => 'roles','roles'=>'superadmin']);
Route::get('delete_simulation/{id}', ['uses' =>'HomeController@delete_simulation','middleware' => 'roles','roles'=>'superadmin']);
//================================= Question =======================================================
Route::get('question', ['uses' =>'HomeController@question','middleware' => 'roles','roles'=>['superadmin','admin']])->name('question');
Route::post('post_question', ['uses' =>'HomeController@post_question','middleware' => 'roles','roles'=>['superadmin','admin']])->name('post_question');
Route::get('view_question', ['uses' =>'HomeController@view_question','middleware' => 'roles','roles'=>['superadmin','admin']]);
Route::post('view_question', ['uses' =>'HomeController@post_view_question','middleware' => 'roles','roles'=>['superadmin','admin']]);
Route::get('edit_question/{id}', ['uses' =>'HomeController@edit_question','middleware' => 'roles','roles'=>['superadmin','admin']])->name('edit_question');
Route::post('update_question', ['uses' =>'HomeController@update_question','middleware' => 'roles','roles'=>['superadmin','admin']]);
Route::get('remove_question/{id}', ['uses' =>'HomeController@remove_question','middleware' => 'roles','roles'=>['superadmin','admin']]);
//============================== students ================================================
Route::get('view_students', ['uses' =>'HomeController@view_students','middleware' => 'roles','roles'=>['superadmin','admin']])->name('view_students');
Route::post('view_students', ['uses' =>'HomeController@post_view_students','middleware' => 'roles','roles'=>['superadmin','admin']]);
Route::get('students_score', ['uses' =>'HomeController@students_score','middleware' => 'roles','roles'=>['superadmin','admin']])->name('students_score');
Route::post('students_score', ['uses' =>'HomeController@post_students_score','middleware' => 'roles','roles'=>['superadmin','admin']]);
//============================school -===============================================
Route::get('profile', ['uses' =>'HomeController@profile','middleware' => 'roles','roles'=>['superadmin','admin','teacher']]);
Route::get('edit_profile', ['uses' =>'HomeController@edit_profile','middleware' => 'roles','roles'=>['superadmin','admin','teacher']]);
Route::post('update_profile', ['uses' =>'HomeController@update_profile','middleware' => 'roles','roles'=>['superadmin','admin','teacher']]);

Route::get('edit_logo', ['uses' =>'HomeController@edit_logo','middleware' => 'roles','roles'=>['superadmin','admin']]);
Route::post('update_logo', ['uses' =>'HomeController@update_logo','middleware' => 'roles','roles'=>['superadmin','admin']]);

Route::get('edit_profile_pic', ['uses' =>'HomeController@edit_profile_pic','middleware' => 'roles','roles'=>'teacher']);
Route::post('update_profile_pic', ['uses' =>'HomeController@update_profile_pic','middleware' => 'roles','roles'=>'teacher']);
Route::get('view_cv', ['uses' =>'HomeController@view_cv','middleware' => 'roles','roles'=>'teacher']);
Route::get('update_cv', ['uses' =>'HomeController@update_cv','middleware' => 'roles','roles'=>'teacher']);
Route::post('update_cv', ['uses' =>'HomeController@post_update_cv','middleware' => 'roles','roles'=>'teacher']);
//=============================== change password =========================================================
Route::get('change_password', ['uses' =>'HomeController@change_password'])->name('change_password');
Route::post('change_password', ['uses' =>'HomeController@update_password']);

//=================================== pin ===================================================
Route::get('pin', ['uses' =>'HomeController@pin','middleware' => 'roles','roles'=>'superadmin'])->name('pin');
Route::post('pin', ['uses' =>'HomeController@post_pin','middleware' => 'roles','roles'=>'superadmin']);
Route::get('unusedpin', ['uses' =>'HomeController@view_pin','middleware' => 'roles','roles'=>['superadmin','admin']]);
Route::post('unusedpin', ['uses' =>'HomeController@view_pin2','middleware' => 'roles','roles'=>['superadmin','admin']]);
Route::get('usedpin', ['uses' =>'HomeController@view_used_pin','middleware' => 'roles','roles'=>['superadmin','admin']]);
Route::post('usedpin', ['uses' =>'HomeController@view_used_pin2','middleware' => 'roles','roles'=>['superadmin','admin']]);
Route::get('export_pin/{id}', ['uses' =>'HomeController@export_pin','middleware' => 'roles','roles'=>['superadmin','admin']]);
//============================ cbt setup ========================================================
Route::get('startbutton', ['uses' =>'HomeController@startbutton','middleware' => 'roles','roles'=>['superadmin','admin']])->name('startbutton');
Route::post('startbutton', ['uses' =>'HomeController@post_startbutton','middleware' => 'roles','roles'=>['superadmin','admin']]);

Route::get('no_of_question', ['uses' =>'HomeController@number_of_question','middleware' => 'roles','roles'=>['superadmin','admin']])->name('number_of_question');
Route::post('no_of_question', ['uses' =>'HomeController@post_number_of_question','middleware' => 'roles','roles'=>['superadmin','admin']]);

Route::get('time_per_question', ['uses' =>'HomeController@time_per_question','middleware' => 'roles','roles'=>['superadmin','admin']])->name('time_per_question');
Route::post('time_per_question', ['uses' =>'HomeController@post_time_per_question','middleware' => 'roles','roles'=>['superadmin','admin']]);

Route::get('subject_setup', ['uses' =>'HomeController@subject_setup','middleware' => 'roles','roles'=>'superadmin'])->name('subject_setup');
Route::post('subject_setup', ['uses' =>'HomeController@post_subject_setup','middleware' => 'roles','roles'=>'superadmin']);
//======================== teacher ==========================================================
Route::get('searchcreterial', ['uses' =>'HomeController@searchcreterial','middleware' => 'roles','roles'=>'teacher'])->name('searchcreterial');
Route::post('searchcreterial', ['uses' =>'HomeController@post_searchcreterial','middleware' => 'roles','roles'=>'teacher'])->name('searchcreterial');
Route::get('subjectteacher', ['uses' =>'HomeController@subjectteacher','middleware' => 'roles','roles'=>'teacher'])->name('subjectteacher');
Route::post('subjectteacher', ['uses' =>'HomeController@post_subjectteacher','middleware' => 'roles','roles'=>'teacher'])->name('subjectteacher');
//========================================== students scores ========================================================


Route::get('/getlga/{id}', 'FrontController@getlga');
//============================== front controller ===============================================
Route::get('/', 'FrontController@index');
Route::get('aboutus', 'FrontController@aboutus');
Route::get('service', 'FrontController@service');
Route::get('teacher', 'FrontController@teacher');
Route::post('teacher', 'FrontController@post_teacher');
Route::get('contact', 'FrontController@contact');
Route::post('contact', 'FrontController@post_contact');
Route::get('findteacher', 'FrontController@findteacher');
Route::get('findteacher2', 'FrontController@post_findteacher');
Route::get('teacher_cv/{id}', 'FrontController@teacher_cv');
Route::get('getpost', 'FrontController@getpost');
Route::get('getpost_detail/{id}', 'FrontController@getpost_detail');
Route::get('sc_simulation', 'FrontController@sc_simulation');
Route::post('sc_simulation2', 'FrontController@sc_simulation2');
//----------------------- students ------------------------------------
Route::get('student', 'FrontController@student');
Route::post('student', 'FrontController@post_student');

Route::post('student_reg', 'FrontController@student_reg');
// student controller
Route::get('student_home', 'StudentController@index');
Route::get('student_login', 'Auth\LoginController@std_login');
Route::post('student_login', 'Auth\LoginController@student_login');
Route::get('startexams', 'StudentController@startexams');
Route::post('student_result', 'StudentController@student_result');
Route::get('success', 'StudentController@success');
Route::get('viewresult', 'StudentController@viewresult');
Route::get('/home', 'HomeController@index')->name('home');
