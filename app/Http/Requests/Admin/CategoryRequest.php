<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'     =>'required',
            'slug'     =>'required|unique:category',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     =>'Vui lòng không bỏ trống tên',
            'slug.required'     =>'Vui lòng không bỏ trống slug',
            'slug.unique'       =>'trường này đã bị trùng ',
        ];
    }

}
