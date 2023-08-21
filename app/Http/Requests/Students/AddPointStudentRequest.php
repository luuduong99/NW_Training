<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;

class AddPointStudentRequest extends FormRequest
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
            'subject.*' => ['required'],
            'point.*' => ['required', 'numeric', 'min:0', 'max:10', 'regex:/^\d+(\.\d{1,2})?$/'],
        ];
    }

//    public function attributes()
//    {
//        $customAttributes = [];
//        foreach ($this->request->get('point', []) as $index => $value) {
//            $customAttributes["point.$index"] = "điểm số $index";
//        }
//
//        return $customAttributes;
//    }
}
