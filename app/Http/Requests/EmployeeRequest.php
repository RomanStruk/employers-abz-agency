<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        if ($this->method() == 'POST') {
            return [
                'photo' => ['required', 'mimes:png,jpg', 'max:5120', 'dimensions:min_width=150,min_height=150'],
                'name' => ['required', 'string', 'min:2', 'max:256'],
                'email' => ['required', 'email'],
                'phone' => ['required', 'phone:UA'],
                'position_id' => ['required', 'integer', 'exists:positions,id'],
                'salary' => ['required', 'numeric', 'between:0,500.00', 'regex:/^\d+(\.\d{1,3})?$/'],
                'head_id' => ['required', 'integer', 'exists:employees,id'],
                'date_of_employment' => ['required', 'date'],
            ];
        }else{
                return [
                    'photo' => ['nullable', 'mimes:jpg,png', 'max:5120', 'dimensions:min_width=150,min_height=150'],
                    'name' => ['nullable', 'string', 'min:2', 'max:256'],
                    'email' => ['nullable', 'email'],
                    'phone' => ['nullable', 'phone:UA'],
                    'position_id' => ['nullable', 'integer', 'exists:positions,id'],
                    'salary' => ['nullable', 'numeric', 'between:0,500.00', 'regex:/^\d+(\.\d{1,3})?$/'],
                    'head_id' => ['nullable', 'integer', 'exists:employees,id'],
                    'date_of_employment' => ['nullable', 'date'],
                ];
        }


    }
    public function passedValidation()
    {
    }

    public function messages()
    {
        return [
            'phone' => 'The :attribute field contains an invalid number.',
        ];
    }
}
