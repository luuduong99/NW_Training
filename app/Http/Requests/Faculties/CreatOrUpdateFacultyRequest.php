<?php

namespace App\Http\Requests\Faculties;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreatOrUpdateFacultyRequest extends FormRequest
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
                'name' => ['required', 'min:1', 'max:100', Rule::unique('faculties', 'name')
                    ->whereNull('deleted_at')],
                'description' => ['max:1000']
            ];
        } else {
            return [
                'name' => ['required', 'min:1', 'max:100', Rule::unique('faculties', 'name')
                    ->ignore($this->faculty)
                    ->whereNull('deleted_at')],
                'description' => ['max:1000']
            ];
        }
    }
}
