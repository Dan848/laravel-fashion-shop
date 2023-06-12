<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:200|min:3',
            'image_link' => 'nullable',
            'description' => 'nullable',
            'price' => ['nullable', 'numeric'],
            'brand_id' => 'nullable|exists:brands,id',
            'category_id' => 'nullable|exists:categories,id',
            'texture_id' => 'nullable|exists:textures,id',
            'old_id' => 'nullable',
            'slug' => 'nullable'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Il titolo è obbligatorio!',
            'name.unique:projects' => 'Questo titolo esiste già!',
            'name.max' => 'Il titolo deve essere lungo massimo :max caratteri!',
            'name.min' => 'Il titolo deve essere lungo almeno :min caratteri!'
        ];
    }
}