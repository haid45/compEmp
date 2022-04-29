<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => [
                'email',
                'max:254',
                Rule::unique('companies','email')->ignore($this->route('company')),
            ],
            'website' => 'url',
            'logo' => 'dimensions:min_width='.config('media.company_logo.min_width').',min_height='.config('media.company_logo.min_height')
        ];
    }
}
