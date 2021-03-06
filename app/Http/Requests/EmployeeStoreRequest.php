<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeStoreRequest extends FormRequest
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
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => [
                'email',
                'max:254',
                Rule::unique('employees','email')->ignore($this->route('employee')),
            ],
            'company_id' => 'exists:companies,id'
        ];
        if($this->method() == 'POST')
            $rules['company_id'] = 'required|exists:companies,id';

        return $rules;
    }
}
