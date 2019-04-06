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

Route::get('/', function () {
    if (auth()->check()) {

        $class = auth()->user()->class_relation;
        if ($class) {
            $data = $class->details_relation()->where('showdate', date('Y-m-d'))
                            ->where('status', 'active')
                            ->with(['course_relation' => function ($rel) {
                                // Course::with('lessons_relation')->get()
                                return $rel->with(['lessons_relation' => function ($rel2) {
                                    // Lesson::where('status', 'active')->orderBy('myorder', 'ASC');
                                    return $rel2->where('status', 'active')->orderBy('myorder', 'ASC');
                                }]);
                            }])->get()->toArray();

            if (!empty($data['course_relation']) && !empty($data['course_relation']['lessons_relation'])) {
                abort(404, "يوجد خطا برجاء مراسلة المسؤول");
            }

            return view('welcome', [
                'data' => $data,
            ]);
        } else {
            abort(404, "يوجد خطا برجاء مراسلة المسؤول");
        }
    }
});

Route::get('/lesson/{id}', function ($id) {
    if (auth()->check()) {
        $lesson = Lesson::find($id);

        if (!$lesson) {
            abort(404, "يوجد خطا برجاء مراسلة المسؤول");
        }
        dd("Stop");
        return view('lesson', [
            'data' => $data,
        ]);
    } else {
        abort(404, "يوجد خطا برجاء مراسلة المسؤول");
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
