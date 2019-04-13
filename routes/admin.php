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

Route::middleware(\App\Http\Middleware\LangMiddleware::class)->group(function () {

    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/logout', 'AdminController@logout')->name('admin.logout');
    Route::get('/lang/{lang}', 'AdminController@changeLang')->name('admin.changeLang');

    // users
    Route::resource('users', 'UsersController');
    Route::post('users/multi_delete', 'UsersController@multi_delete')->name('users.multi_delete');

    // roles and permissions
    Route::resource('roles', 'RoleController');
    Route::post('/roles/multi_delete', 'RoleController@multi_delete')->name('roles.multi_delete');

    Route::resource('permissions', 'PermissionController');
    Route::post('permissions/multi_delete', 'PermissionController@multi_delete')->name('permissions.multi_delete');

    // lessons
    Route::resource('lessons', 'LessonsController');
    Route::post('lessons/multi_delete', 'LessonController@multi_delete')->name('lessons.multi_delete');


    // classes
    Route::resource('classes', 'ClassesController');
    Route::post('classes/multi_delete', 'ClassController@multi_delete')->name('classes.multi_delete');

    // courses
    Route::resource('courses', 'CoursesController');
    Route::post('courses/multi_delete', 'CoursesController@multi_delete')->name('courses.multi_delete');

    // courses_Details
    Route::resource('courses_details', 'CoursesDetailsController');
    Route::post('courses_details/multi_delete', 'CoursesDetailsController@multi_delete')->name('courses_details.multi_delete');

    // Questions
    Route::resource('questions', 'QuestionsController');
    Route::post('questions/multi_delete', 'QuestionsController@multi_delete')->name('questions.multi_delete');

    // Answers
    Route::resource('answers', 'AnswersController');
    Route::post('answers/multi_delete', 'AnswersController@multi_delete')->name('answers.multi_delete');


    Route::get('get-user-answers', 'AnswersController@user_answers')->name('user_answers.index');
});
