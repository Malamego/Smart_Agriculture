<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Courses_DetailsRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'course_id'     => 'required',
                    'class_id'    => 'required',
                    'showdate'    => 'required',
                    'status'     => 'required|in:active,inactive',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                  'course_id'     => 'required',
                  'class_id'    => 'required',
                  'showdate'    => 'required',
                  'status'     => 'required|in:active,inactive',
                ];
            }
            default:break;
        }
    }


    public function attributes()
    {
        return [
            'course_id'     => trans('main.course_id'),
            'class_id'    => trans('main.class_id'),
            'showdate' => trans('main.showdate'),
            'status'     => trans('main.status'),
        ];
    }
}
