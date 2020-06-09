<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/

///////////frontpage/////////////////////////////////////
Route::group(['middleware' => ['web']], function () {
        Route::get('/', 'HomeController@index');
        Route::get('/aboutus', 'HomeController@aboutus');
        Route::get('/careers', 'HomeController@careers');
        Route::get('/portfolio', 'HomeController@portfolio');
        Route::get('/blog', 'HomeController@blog');
        Route::get('/blog/{name}', 'HomeController@blogshow');
        Route::get('/contact', 'HomeController@contact');
        Route::post('/contacts', 'HomeController@add');
        Route::get('/search', 'HomeController@getsearch');
        Route::get('/privacy', 'HomeController@privacy');
        Route::get('/login', 'HomeController@login');
        Route::get('/register', 'HomeController@register');
        Route::get('/password/forgot', 'HomeController@email');
        Route::post('/password/email', 'HomeController@resetpass');
        Route::get('/password/reset', 'HomeController@reset');
        Route::post('/password/reset', 'HomeController@change');
});
/////////////////////////////////////////////////////////////////////////////////////////
///////////tasks/////////////////////////////////
/*Route::get('/contacts',  [
    'middleware' => 'auth',
    'uses' =>'ContactController@index']); 
Route::get('/contacts/view', [
    'middleware' => 'auth',
    'uses' => 'ContactController@view']);*/

    Route::get('/teacher-login', 'Auth\AuthController@AdminLogin');
    Route::post('/teacher-login', ['as'=>'Teacher-login','uses'=>'Auth\AuthController@Adminsignup']);
    Route::get('/student-login', 'StudentAuth\AuthController@StudentLogin');
    Route::post('/student-login', ['as'=>'Student-login','uses'=>'StudentAuth\AuthController@Studentsignup']);
    Route::get('/account-login', 'AccountAuth\AuthController@AccountLogin');
    Route::post('/account-login', ['as'=>'Student-login','uses'=>'AccountAuth\AuthController@Accountsignup']);
    Route::get('/teacher-logout', 'Auth\AuthController@logout');
    Route::get('/student-logout', 'StudentAuth\AuthController@logout');
    Route::get('/account-logout', 'AccountAuth\AuthController@logout');

//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////member////////////////////////////////////
///////////////////////
//Route::get('/member/login',  'MemberController@signin');
//Route::post('/member/login', 'MemberController@login');

Route::group(['middleware' => ['web' ,'student']], function () {
  //      Route::get('/logout',  'MemberController@logout');
        Route::get('/member/academic', 'MemberController@academic');
        Route::post('/member/results',   'MemberController@results');
        Route::get('/member/messages',   'MemberController@messages');
        Route::get('/member/messages/view',   'MemberController@view');
        Route::get('/member/schoolfee1',   'MemberController@schoolfee1');
        Route::get('/member/invoice/{name}',   'MemberController@invoice');
        Route::get('/member/profile',   'MemberController@profile');
});

//////////////////////////protect all admin area///////////////////

///////////////////////////////////////////////////////////////////////////////
///////////////////superadmin//////////////////////////////////////////////////


Route::group(['middleware' => ['web' ,'teacher','super']], function () {
    
    ///////////////////////////////////////////////////////////////
    
Route::get('/admin/student/lists','StudentController@lists');
Route::get('/admin/student/personal','StudentController@personal');
Route::get('/admin/student/academic',  'StudentController@academic');
Route::get('/admin/student/extra','StudentController@extra');
Route::get('/admin/student/extracurriculum/{name}',  'StudentController@extracurriculum');
Route::post('/admin/student/examresults',  'StudentController@examresults');
Route::get('/admin/student/search',  'StudentController@search');
Route::post('/admin/student/getsearch',  'StudentController@getsearch');

    Route::get('/admin/finances', 'FinanceController@index');
Route::post('/admin/finances', 'FinanceController@add');
Route::get('/admin/finances/view',  'FinanceController@view');
Route::get('/admin/finances/fees',  'FinanceController@fees');
Route::get('/admin/finances/studentfees/{name}',  'FinanceController@studentfees');
Route::get('/admin/finances/studentfees/view',  'FinanceController@view');
Route::post('/admin/finances/confirm',  'FinanceController@confirm');
Route::post('/admin/finances/deploy',  'FinanceController@deploy');
Route::get('/admin/finances/paymentflow',  'FinanceController@paymentflow');
Route::post('/admin/finances/paymentflow2',  'FinanceController@paymentflow2');
Route::get('/admin/finances/individualinvo/{name}',  'FinanceController@individualinvo');

  /////////////////////////expences///////////////////////////////////
    Route::get('/admin/expence', 'ExpenceController@index');
Route::post('/admin/expence', 'ExpenceController@add');
Route::get('/admin/expence/view',  'ExpenceController@view');
Route::post('/admin/expence/update','ExpenceController@update');
Route::post('/admin/expence/delete','ExpenceController@delete');
Route::get('/admin/expence/upload','ExpenceController@upload');
    ///////////////////////////////////////////////////////////////////
    /////////////////////////expenceflows///////////////////////////////////
    Route::get('/admin/expenceflows', 'ExpenceflowController@index');
Route::post('/admin/expenceflows', 'ExpenceflowController@add');
Route::get('/admin/expenceflows/view',  'ExpenceflowController@view');
Route::post('/admin/expenceflows/update','ExpenceflowController@update');
Route::post('/admin/expenceflows/delete','ExpenceflowController@delete');
Route::get('/admin/fee','ExpenceflowController@fee');
Route::get('/admin/finances/part1','ExpenceflowController@part1');
Route::post('/admin/finances/part2','ExpenceflowController@part2');
Route::post('/admin/finances/part3','ExpenceflowController@part3');
Route::post('/admin/finances/Infor','ExpenceflowController@infor');
Route::post('/admin/finances/forced','ExpenceflowController@forced');
Route::get('/admin/finances/invoicelist','ExpenceflowController@invoicelist');
Route::get('/admin/finance/invoice/{name}','ExpenceflowController@invoice');
    ///////////////////////////////////////////////////////////////////



Route::get('/admin/yos/promotion1','YosController@promotion1');
Route::post('/admin/yos/promotion4','YosController@promotion4');
Route::post('/admin/yos/promotion2','YosController@promotion2');
Route::post('/admin/yos/promote','YosController@promote');
Route::post('/admin/yos/graduate','YosController@graduate');
Route::post('/admin/exam/promotion3','YosController@promotion3');
Route::post('/admin/yos/danger','YosController@danger');
Route::post('/admin/yos/dangerexp','YosController@dangerexp');
Route::get('/admin/yos/expulsionlsit','YosController@expulsionlist');
Route::get('/admin/yos/expulsionlsit/view','YosController@view');
    ///////////////////////////////////////////////////////////////////


    //////////////////////Teacher//////////////////////////
    Route::get('/admin/teacher', 'TeacherController@index');
Route::post('/admin/teacher', 'TeacherController@add');
Route::get('/admin/teacher/view',  'TeacherController@view');
Route::post('/admin/teacher/update','TeacherController@update');
Route::post('/admin/teacher/delete','TeacherController@delete');
Route::post('/admin/teacher/upload','TeacherController@upload');
Route::get('/admin/teacher/personal','TeacherController@personal');
Route::get('/admin/teacher/extra','TeacherController@extra');
Route::get('/admin/teacher/extracurriculum/{name}',  'TeacherController@extracurriculum');
Route::get('/admin/teacher/persona/{name}',  'TeacherController@persona');
Route::get('/admin/teacher/Apersona/{name}',  'TeacherController@Apersona');
Route::post('/admin/yos/fire',  'TeacherController@fire');
Route::post('/admin/yos/hire',  'TeacherController@hire');
Route::post('/admin/yos/Afire',  'TeacherController@Afire');
Route::post('/admin/yos/Ahire',  'TeacherController@Ahire');


Route::get('/admin/message',  'MessageController@messager');
Route::post('/admin/messages/messager2',  'MessageController@messager2');
Route::post('/admin/messages/send',  'MessageController@send');


    ///////////////////////////////////////////////////////////////////
    //////////////////////Accountant//////////////////////////
    Route::get('/admin/accountant', 'AccountantController@index');
Route::post('/admin/accountant', 'AccountantController@add');
Route::get('/admin/accountant/view',  'AccountantController@view');
Route::post('/admin/accountant/update','AccountantController@update');
Route::post('/admin/accountant/delete','AccountantController@delete');
Route::post('/admin/accountant/upload','AccountantController@upload');
Route::get('/admin/accountant/lists','AccountantController@lists');
Route::get('/admin/accountant/personal','AccountantController@personal');

    //////////////////////Student//////////////////////////
    Route::get('/admin/student', 'StudentController@index');
Route::post('/admin/student', 'StudentController@add');
Route::get('/admin/student/view',  'StudentController@view');
Route::post('/admin/student/update','StudentController@update');
Route::post('/admin/student/delete','StudentController@delete');
Route::post('/admin/student/upload','StudentController@upload');
////////////Category///////////////////////////////////////
});
Route::group(['middleware' => ['web' ,'teacher']], function () {
Route::get('/admin/teacher/lists','TeacherController@lists');
Route::get('/admin/teacher/Alists','TeacherController@Alists');
/////////////////////////////////////////////////////////////////////////////////////////
////////////general cotroller//////////////////////////
Route::get('/admin/dashboard', 'GeneralController@index');
Route::get('/admin/students', 'GeneralController@student');
Route::get('/admin/teachers', 'GeneralController@teacher');
Route::get('/admin/classe', 'GeneralController@classes');
Route::get('/admin/subjects', 'GeneralController@subjects');
Route::get('/admin/exams', 'GeneralController@exam');
Route::get('/admin/sport', 'GeneralController@sport');
Route::get('/admin/finance', 'GeneralController@finance');

///////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////student.//////////////////////////////////////////////////
Route::get('/student/index', 'studentController@index');
///////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////Teacherclass.//////////////////////////////////////////////////
Route::get('/student/index', 'studentController@index');

    ///////////////////////////////////////////////////////////////////
    //////////////////////subteacher//////////////////////////////
    Route::get('/admin/subjects/{name}', 'SubteacherController@index');
Route::post('/admin/subjects', 'SubteacherController@add');
Route::get('/admin/subjects/{name}/view',  'SubteacherController@view');
Route::post('/admin/subjects/{name}/update','SubteacherController@update');
Route::post('/admin/subjects/{name}/delete','SubteacherController@delete');
Route::get('/admin/subjects/upload','SubteacherController@upload');
    ///////////////////////////////////////////////////////////////////
    Route::get('/admin/portfolio', 'PortfolioController@index');
Route::post('/admin/portfolio', 'PortfolioController@add');
Route::get('/admin/portfolio/view',  'PortfolioController@view');
Route::post('/admin/portfolio/update','PortfolioController@update');
Route::post('/admin/portfolio/delete','PortfolioController@delete');
Route::get('/admin/portfolio/upload','PortfolioController@upload');
    ///////////////////////////////////////////////////////////////////
    Route::get('/admin/yearclass', 'YearclassController@index');
Route::post('/admin/yearclass', 'YearclassController@add');
Route::get('/admin/yearclass/view',  'YearclassController@view');
Route::post('/admin/yearclass/update','YearclassController@update');
Route::post('/admin/yearclass/delete','YearclassController@delete');
Route::get('/admin/yearclass/upload','YearclassController@upload');
    ///////////////////////////////////////////////////////////////////
    /////////////////////library////////////////////////////////////////
    Route::get('/admin/library', 'LibraryController@index');
Route::get('/admin/library/view',  'LibraryController@view');
Route::post('/admin/library/upload','LibraryController@upload');
    ///////////////////////////////////////////////////////////////////
    /////////////////////////expences///////////////////////////////////

    ///////////////////////////////////////////////////////////////////
    /////////////////////////Yos///////////////////////////////////
    Route::get('/admin/yos', 'YosController@index');
Route::post('/admin/yos', 'YosController@add');
Route::get('/admin/yos/view',  'YosController@view');
Route::post('/admin/yos/update','YosController@update');
Route::post('/admin/yos/delete','YosController@delete');
Route::get('/admin/yos/checkclass','YosController@checkclass');
Route::get('/admin/yos/viewclass/{name}','YosController@viewclass');
    /////////////////////////extras///////////////////////////////////
    Route::get('/admin/extra', 'ExtraController@index');
Route::post('/admin/extra', 'ExtraController@add');
Route::get('/admin/extra/view',  'ExtraController@view');
Route::post('/admin/extra/update','ExtraController@update');
Route::post('/admin/extra/delete','ExtraController@delete');
Route::get('/admin/extra/upload','ExtraController@upload');
    ///////////////////////////////////////////////////////////////////
  
    ////////////////////timetable///////////////////////////////////
    Route::get('/admin/timetable', 'TeacherclassController@index');
Route::post('/admin/timetable', 'TeacherclassController@add');
Route::get('/admin/timetable/view',  'TeacherclassController@view');
Route::post('/admin/timetable/update','TeacherclassController@update');
Route::post('/admin/timetable/delete','TeacherclassController@delete');
Route::get('/admin/timetable/upload','TeacherclassController@upload');
Route::get('/admin/timetable/daywise','TeacherclassController@daywise');
Route::get('/admin/timetable/daywise/{name}','TeacherclassController@dato');
Route::get('/admin/timetable/classwise/{name}','TeacherclassController@claso');
    ///////////////////////////////////////////////////////////////////
    ////////////////////messages///////////////////////////////////
    Route::get('/admin/messages', 'MessageController@index');
    Route::get('/admin/general', 'MessageController@general');
Route::post('/admin/messages', 'MessageController@add');
Route::get('/admin/messages/view',  'MessageController@view');
Route::get('/admin/general/view',  'MessageController@genview');
Route::post('/admin/messages/delete','MessageController@delete');

    ///////////////////////////////////////////////////////////////////
    //////////////////////subjetcs//////////////////////////
    Route::get('/admin/subject', 'SubjectController@index');
Route::post('/admin/subject', 'SubjectController@add');
Route::get('/admin/subject/view',  'SubjectController@view');
Route::post('/admin/subject/update','SubjectController@update');
Route::post('/admin/subject/delete','SubjectController@delete');
Route::post('/admin/subject/upload','SubjectController@upload');
Route::get('/admin/subject/lists','SubjectController@lists');
Route::get('/admin/subject/tests','SubjectController@tests');
Route::get('/admin/subject/subjects','SubjectController@subjects');
    ///////////////////////////////////////////////////////////////////
    //////////////////////exam//////////////////////////
    Route::get('/admin/exam/part1/{name}', 'ExamController@part1');
//Route::post('/admin/exam/partone', 'ExamController@infor');
Route::post('/admin/exam/part2',  'ExamController@part2');
Route::post('/admin/exam/part3',  'ExamController@part3');
Route::post('/admin/exam/Information',  'ExamController@Information');
Route::post('/admin/exam/forced',  'ExamController@forced');
Route::get('/admin/exam/results',  'ExamController@allresult');
Route::get('/admin/exam/result',  'ExamController@result');
Route::post('/admin/exam/answers',  'ExamController@answers');
Route::get('/admin/exam/test2',  'ExamController@test2');
Route::post('/admin/exam/studentwise',  'ExamController@studentwise');
Route::post('/admin/exam/Infor',  'ExamController@info');
Route::post('/admin/exam/rewrite',  'ExamController@rewrite');
Route::post('/admin/exam/write',  'ExamController@write');
    //////////////////////exam//////////////////////////
    Route::get('/admin/exam', 'ExamController@index');
Route::post('/admin/exam', 'ExamController@add'); 
Route::get('/admin/exam/view',  'ExamController@view');
Route::post('/admin/exam/update','ExamController@update');
Route::post('/admin/exam/delete','ExamController@delete');
Route::get('/admin/exam/upload','ExamController@upload');
    ///////////////////////////////////////////////////////////////////
    //////////////////////classes//////////////////////////
    Route::get('/admin/classes', 'ClassesController@index');
Route::post('/admin/classes', 'ClassesController@add');
Route::get('/admin/classes/view',  'ClassesController@view');
Route::post('/admin/classes/update','ClassesController@update');
Route::post('/admin/classes/delete','ClassesController@delete');
Route::get('/admin/classes/upload','ClassesController@upload');
    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    //////////////////////subjetcs//////////////////////////
    Route::get('/admin/curriculum', 'CurriculumController@index');
Route::post('/admin/curriculum', 'CurriculumController@add');
Route::get('/admin/curriculum/view',  'CurriculumController@view');
Route::post('/admin/curriculum/update','CurriculumController@update');
Route::post('/admin/curriculum/delete','CurriculumController@delete');
Route::post('/admin/curriculum/upload','CurriculumController@upload');
    ///////////////////////////////////////////////////////////////////
  Route::get('/admin/blog', 'BlogController@index');
Route::post('/admin/blog', 'BlogController@add');
Route::get('/admin/blog/view','BlogController@view');
Route::post('/admin/blog/update', 'BlogController@update');
Route::post('/admin/blog/delete', 'BlogController@delete');
Route::post('/admin/blog/upload', 'BlogController@upload');
    ///////////////////////////////////////////////////////////////////
Route::get('/admin/career', 'CareerController@index');
Route::post('/admin/career', 'CareerController@add');
Route::get('/admin/career/view', 'CareerController@view');
Route::post('/admin/career/update',  'CareerController@update');
Route::post('/admin/career/delete', 'CareerController@delete');
Route::post('/admin/career/upload', 'CareerController@upload');
});

////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////accounting department


Route::group(['middleware' => ['web' ,'account']], function () {
    /////////////////////////expences///////////////////////////////////
    Route::get('/Accounts/expence', 'ExpencesController@index');
Route::post('/Accounts/expence', 'ExpencesController@add');
Route::get('/Accounts/expence/view',  'ExpencesController@view');
Route::post('/Accounts/expence/update','ExpencesController@update');
Route::post('/Accounts/expence/delete','ExpencesController@delete');
Route::get('/Accounts/expence/upload','ExpencesController@upload');
    ///////////////////////////////////////////////////////////////////
    /////////////////////////expenceflows///////////////////////////////////
    Route::get('/Accounts/expenceflows', 'ExpenceflowsController@index');
Route::post('/Accounts/expenceflows', 'ExpenceflowsController@add');
Route::get('/Accounts/expenceflows/view',  'ExpenceflowsController@view');
Route::post('/Accounts/expenceflows/update','ExpenceflowsController@update');
Route::post('/Accounts/expenceflows/delete','ExpenceflowsController@delete');
Route::get('/Accounts/fee','ExpenceflowsController@fee');
Route::get('/Accounts/finances/part1','ExpenceflowsController@part1');
Route::post('/Accounts/finances/part2','ExpenceflowsController@part2');
Route::post('/Accounts/finances/part3','ExpenceflowsController@part3');
Route::post('/Accounts/finances/Infor','ExpenceflowsController@infor');
Route::post('/Accounts/finances/forced','ExpenceflowsController@forced');
Route::get('/Accounts/finances/invoicelist','ExpenceflowsController@invoicelist');
Route::get('/Accounts/finance/invoice/{name}','ExpenceflowsController@invoice');

    Route::get('/Accounts/Dashboard', 'AccountsController@Dashboard');
    Route::get('/Accounts/finances', 'AccountsController@index');
Route::post('/Accounts/finances', 'AccountsController@add');
Route::get('/Accounts/finances/view',  'AccountsController@view');
Route::get('/Accounts/finances/fees',  'AccountsController@fees');
Route::get('/Accounts/finances/studentfees/{name}',  'AccountsController@studentfees');
Route::get('/Accounts/finances/studentfees/view',  'AccountsController@view');
Route::post('/Accounts/finances/confirm',  'AccountsController@confirm');
Route::post('/Accounts/finances/deploy',  'AccountsController@deploy');
Route::get('/Accounts/finances/paymentflow',  'AccountsController@paymentflow');
Route::post('/Accounts/finances/paymentflow2',  'AccountsController@paymentflow2');
Route::get('/Accounts/finances/individualinvo/{name}',  'AccountsController@individualinvo');
//////////////////////////////////////////////////////////////////////////
});

