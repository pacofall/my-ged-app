<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DocumentFilterRequest extends FormRequest
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
            "name" => "required",
            "slug" => "required"
//            "source" => "required",
//            "category_id" => "required",
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            "slug" => $this->input("slug") ?: Str::slug($this->input("name"))
        ]);
    }
}
