<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductRequest extends FormRequest
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
        $id = $this->product?$this->product:0;
        return [
            'name' => 'required|max:255|unique:categories,name,'.$id,
            'category_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name field is required',
            'category_id.required' => 'Category field is unique',
        ];
    }
}
