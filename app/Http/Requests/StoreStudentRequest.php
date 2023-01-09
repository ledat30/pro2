<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name_students' => 'required',
            'date_of_birth' => 'required',
            'gender'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'account'=>'required',
            'password'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name_students.required' => 'Ten mon khong duoc bo trong',
            'date_of_birth.required' => 'khong duoc bo trong',
            'gender.required' => 'khong duoc bo trong',
            'address.required' => 'khong duoc bo trong',
            'phone.required' => 'khong duoc bo trong',
            'email.required' => 'khong duoc bo trong',
            'account.required' => 'khong duoc bo trong',
            'password.required' => 'khong duoc bo trong',
        ];
    }
}
