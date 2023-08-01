<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
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
            'name' => ['required', 'min:1', 'max:50'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->id)],
            'phone' => [Rule::unique('students', 'phone')->ignore($this->id), 'regex:"^[0-9\-\+]{9,15}$"'],
            'birthday' => ['required']
        ];
    }
}
