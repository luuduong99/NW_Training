<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateOrUpdateStudentRequest extends FormRequest
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
        $method = request()->method();
        if ($method == 'POST') {
            return [
                'name' => ['required', 'min:1', 'max:125'],
                'email' => ['required', 'email', 'unique:users,deleted_at,NULL'],
                'phone' => ['required', Rule::unique('students', 'phone')->whereNull('deleted_at'),
                    'regex:/^(0[0-9]{9,10})$/'],
                'gender' => ['required'],
                'address' => ['required'],
                'avatar' => ['image', 'mimes:jpeg,png,jpg,gif|max:2048'],
                'birthday' => ['required'],
                'faculty_id' => ['required'],
            ];
        } else {
            return [
                'name' => ['required', 'min:1', 'max:125'],
                'phone' => ['required', Rule::unique('students', 'phone')
                    ->ignore($this->student)
                    ->whereNull('deleted_at'),
                    'regex:/^(0[0-9]{9,10})$/'],
                'gender' => ['required'],
                'address' => ['required'],
                'avatar' => ['image', 'mimes:jpeg,png,jpg,gif|max:2048'],
                'birthday' => ['required'],
                'faculty_id' => ['required'],
            ];
        }
    }
}
