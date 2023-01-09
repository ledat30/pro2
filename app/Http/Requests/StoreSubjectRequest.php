<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectRequest extends FormRequest
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
             'name_subjects' => 'required',
            'start_date_subjects' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name_subjects.required' => 'Ten mon khong duoc bo trong',
            'start_date_subjects.required' => 'khong duoc bo trong',
        ];
    }
}
