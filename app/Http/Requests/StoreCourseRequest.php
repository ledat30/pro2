<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_courses' => 'required',
            'start_date_courses' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name_courses.required' => 'Ten nganh khong duoc bo trong',
            'start_date_courses.required' => 'Khong duoc bo trong',
        ];
    }
}
