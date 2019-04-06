<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'      => 'required',
            'course_id'  => 'required',
            'content'    => 'required',
            'myorder'    => 'required|integer',
            'type'       => 'required|in:video,image,text,game',
            'status'     => 'required|in:active,inactive',
            'image'      => 'required|image',
        ];
    }


    public function attributes()
    {
        return [
            'title'       => trans('main.title'),
            'course_id'   => trans('main.course'),
            'content'     => trans('main.content'),
            'myorder'     => trans('main.myorder'),
            'type'        => trans('main.type'),
            'status'      => trans('main.status'),
            'image'       => trans('main.image'),
        ];
    }
}
