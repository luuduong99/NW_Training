<?php

namespace App\Http\Requests\Subjects;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateOrUpdateSubjectRequest extends FormRequest
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
                'name' => ['required', 'min:1', 'max:100', Rule::unique('subjects', 'name')
                    ->where('faculty_id', $this->input('faculty_id'))],
            ];
        } else {
            return [
                'name' => ['required', 'min:1', 'max:100', Rule::unique('subjects', 'name')
                    ->where('faculty_id', $this->input('faculty_id'))->ignore($this->subject)],
            ];
        }
    }
}
