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


Route::get('/courses', 'HomeController@courses');
Route::get('/', 'HomeController@index');
Route::get('/plans', 'HomeController@plans');

Route::controller('notifications', 'NotificationController');

Route::group(['prefix'=>'/admin','middleware' => ['roles'],'roles'=>['admin','teacher']],function(){
    //course
    Route::resource('/course','CourseController');
    //Sections
    Route::post('/course/section','SectionController@store');
    Route::put('/course/section/{id}','SectionController@update');
    Route::delete('/course/section/{section}','SectionController@destroy');
    Route::get('/course/section/{section}/edit','SectionController@edit');
    Route::get('/course/{course}/show_sections','SectionController@index');
    Route::get('/course/{course}/add_section','SectionController@create');
    //Lecture
    Route::post('/course/section/lecture','LectureController@store');
    Route::get('/course/section/lecture/{lecture}/edit','LectureController@edit');
    Route::put('/course/section/lecture/{id}','LectureController@update');
    Route::delete('/course/section/lecture/{lecture}','LectureController@destroy');
    Route::get('/course/section/{section}/show_lectures','LectureController@index');
    Route::get('/course/section/{section}/add_lecture','LectureController@create');
});

Route::group(['prefix'=>'/admin','middleware' => ['roles'],'roles'=>['teacher']],function(){
    //course
    Route::resource('/course','CourseController');
    //Sections
    Route::post('/course/section','SectionController@store');
    Route::put('/course/section/{id}','SectionController@update');
    Route::delete('/course/section/{section}','SectionController@destroy');
    Route::get('/course/section/{section}/edit','SectionController@edit');
    Route::get('/course/{course}/show_sections','SectionController@index');
    Route::get('/course/{course}/add_section','SectionController@create');
    //Lecture
    Route::post('/course/section/lecture','LectureController@store');
    Route::get('/course/section/lecture/{lecture}/edit','LectureController@edit');
    Route::put('/course/section/lecture/{id}','LectureController@update');
    Route::delete('/course/section/lecture/{lecture}','LectureController@destroy');
    Route::get('/course/section/{section}/show_lectures','LectureController@index');
    Route::get('/course/section/{section}/add_lecture','LectureController@create');
});


Route::group(['prefix'=>'/admin','middleware' => ['roles'],'roles'=>['admin']],function(){

    Route::get('/', 'AdminController@index');
    //users
    Route::get('/users', 'AdminController@usersList');
    Route::put('/users/{user}/roles', 'AdminController@update_role');
    //tags
    Route::resource('/tags','TagController');
    //blog
    Route::resource('/blog','BlogController');

});

Route::group(['prefix'=>'/teacher','middleware' => ['roles'],'roles'=>['teacher']],function(){
    //dashboard
    Route::get('/dashboard','TeacherController@index');
    Route::get('/course/{course}/users/list','TeacherController@users');

});

Route::group(['prefix'=>'/user'],function(){


    //authentication
    Route::post('/signin','UserController@signin');
    //courses
    Route::get('/course/{course}/show','UserController@show_course');
    Route::get('/course/{course}/course-view','UserController@view_course');
    Route::get('/my-courses','UserController@myCourses');
    //tags
    Route::get('/tags/{tag}/show','UserController@show_tag');
    //show lecture
    Route::get('/course/{course}/lecture/{lecture}','UserController@show_lecture');

    //Payment
    Route::get('/plans/{plan}','UserController@payment');
    Route::post('/stripe','UserController@stripe');
    Route::get('/plans','UserController@plans');

    //subscription
    Route::get('/profile/upgrade_subscription','UserController@upgrade_subscription');
    Route::get('/profile/cancel_subscription','UserController@cancel_subscription');
    Route::get('/profile/active_subscription','UserController@active_subscription');

    //Review
    Route::post('/course/{course}/show','ReviewController@store');

    //blog
    Route::get('/blog','UserController@blogs');
    Route::get('/blog/{blog}','UserController@singleBlog');
    //profile
    Route::put('/profile','UserController@update');
    Route::get('/profile','UserController@profile');


});

Route::get('/user', function () {
    return view('user.index');
});



Route::auth();



