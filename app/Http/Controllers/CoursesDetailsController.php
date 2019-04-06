<?php
namespace App\Http\Controllers;

use App\DataTables\CoursesDetailsDataTable;
use App\Models\CoursesDetail;
use App\Models\ClassModel;
use App\Models\Course;
use App\Http\Requests\Courses_DetailsRequest;
use Illuminate\Http\Request;

class CoursesDetailsController extends Controller
{
    private $viewPath = 'backend.courses_details';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CoursesDetailsDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
          'title' => trans('main.show-all') . ' ' . trans('main.courses_details')
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cls = ClassModel::all();
        $cor = Course::all();
        return view("{$this->viewPath}.create", [
          'title' => trans('main.add') . ' ' . trans('main.courses_details'),
          'cls' => $cls,
          'cor' => $cor,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Courses_DetailsRequest $request)
    {
        $requestAll = $request->all();
        if (CoursesDetail::where('showdate', $requestAll['showdate'])->where('class_id', $requestAll['class_id'])->exists()) {
            session()->flash('error', trans('main.course_details_showdate_unique'));
            return redirect()->back()->withInput();
        }
        $course_details =  CoursesDetail::create($requestAll);

        session()->flash('success', trans('main.added-message'));
        return redirect()->route('courses_details.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course_details = CoursesDetail::findOrFail($id);
        return view("{$this->viewPath}.show", [
          'title' => trans('main.show') . ' ' . trans('main.course_details') . ' : ' . $course_details->course_id,
          'show' => $course_details,
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course_details = CoursesDetail::findOrFail($id);
        $cls = ClassModel::all();
        $cor = Course::all();
        return view("{$this->viewPath}.edit", [
          'title' => trans('main.edit') . ' ' . trans('main.course_details') . ' : ' . $course_details->course_id,
          'edit' => $course_details,
          'cor' => $cor,
          'cls' => $cls,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Courses_DetailsRequest $request, $id)
    {
        $course_details = CoursesDetail::find($id);

        if (CoursesDetail::where('id', '!=', $id)->where('showdate', $requestAll['showdate'])->where('class_id', $requestAll['class_id'])->exists()) {
            session()->flash('error', trans('main.course_details_showdate_unique'));
            return redirect()->back()->withInput();
        }

        $course_details->course_id = $request->course_id;
        $course_details->save();

        session()->flash('success', trans('main.updated'));
        return redirect()->route('courses_details.show', [$course_details->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  bool  $redirect
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $redirect = true)
    {
        $course_details = CoursesDetail::findOrFail($id);

        $course_details->delete();

        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('courses_details.index');
        }
    }


    /**
     * Remove the multible resource from storage.
     *
     * @param  array  $data
     * @return \Illuminate\Http\Response
     */
    public function multi_delete(Request $request)
    {
        if (count($request->selected_data)) {
            foreach ($request->selected_data as $id) {
                $this->destroy($id, false);
            }
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('courses_details.index');
        }
    }
}
