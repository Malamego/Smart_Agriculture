<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lesson;
use App\Models\Question;
use App\Models\UserAnswer;
use App\Models\Answer;

class FrontendController extends Controller
{
    public function index()
    {
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
                if ($data == []) {
                abort(404, "يوجد خطا برجاء مراسلة المسؤول");
                }
                else {
                    session()->put('user_course', $data[0]['course_relation']['id']);
                        return view('frontend.index', [
                            'data' => $data,
                        ]);
                }

            } else {
                abort(404, "يوجد خطا برجاء مراسلة المسؤول");
            }
        }

        return redirect('/login');
    }

    public function lesson($id)
    {
        if (auth()->check()) {
            $lesson = Lesson::where('id', $id)->with(['questions_relation' => function ($q) {
                return $q->with('answers_relation');
            }])->first();

            if (!$lesson) {
                abort(404, "يوجد خطا برجاء مراسلة المسؤول");
            }

            return view('frontend.lesson', [
                'data' => $lesson,
            ]);
        } else {
            return redirect('/login');
        }
    }

    public function sendAnswers(Request $request)
    {
        if (auth()->check()) {
            if (count($request->answers)) {
                foreach ($request->answers as $key => $a) {
                    if (Question::find($key) && Answer::find($a)) {
                        UserAnswer::create([
                            'user_id' => auth()->id(),
                            'question_id' => $key,
                            'answer_id' => $a,
                            'answer_status' => Answer::find($a)->status,
                        ]);
                    }
                }

                $redirect_url = '/';

                // get the current lesson
                $lesson = Lesson::find($request->lesson_id);

                if ($lesson) {
                    // get next lesson id
                    $next = Lesson::where('status', 'active')->where('course_id', session()->get('user_course'))->where('myorder', '>', $lesson->myorder)->first();

                    if ($next) {
                        $redirect_url = "/lesson/{$next->id}";
                    }
                }
                return redirect($redirect_url);
            }
        }

        return redirect('/login');
    }


    public function changeLang($lang)
    {
        if (in_array($lang, ['ar', 'en'])) {
            session()->put('lang', $lang);
        }
        return redirect()->back();
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
