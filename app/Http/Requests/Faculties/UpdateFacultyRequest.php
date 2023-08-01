<?php

namespace App\Http\Requests\Faculties;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFacultyRequest extends FormRequest
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
            'name' => ['required', 'min:1', Rule::unique('faculties', 'name')->ignore($this->id)->whereNull('deleted_at')],
            'description' => ['max:1000']
        ];
    }
}
