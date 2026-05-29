<?php

declare(strict_types=1);

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => ['sometimes', 'string', 'max:100', 'unique:categories,name,' . $this->route('category')->id],
            'description' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.max'    => 'O nome não pode ter mais de 100 caracteres.',
            'name.unique' => 'Já existe uma categoria com esse nome.',
        ];
    }
}