<?php

namespace App\Http\Requests\Panel;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'category_id' => ['required', 'integer', 'min:1', 'exists:categories,id'],
            'title'       => ['required', 'string', 'min:3', 'max:250'],
            'slug'        => [
                'required',
                'string',
                'min:3',
                'max:250',
                Rule::unique('products')->ignore($this->route('product')?->id)
            ],
            'img'         => ['string', 'max:250'],
            'description' => ['string', 'max:500'],
            'body'        => ['required', 'string']
        ];
    }
}
