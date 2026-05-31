<?php

declare(strict_types=1);

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => ['nullable', 'integer', 'exists:categories,id'],
            'name'        => ['sometimes', 'string', 'max:150', 'unique:products,name,' . $this->route('product')],
            'description' => ['nullable', 'string'],
            'price'       => ['sometimes', 'numeric', 'min:0'],
            'stock'       => ['nullable', 'integer', 'min:0'],
            'active'      => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.integer'  => 'A categoria deve ser um número inteiro.',
            'category_id.exists'   => 'A categoria informada não existe.',
            'name.max'             => 'O nome do produto não pode ultrapassar 150 caracteres.',
            'name.unique'          => 'Já existe um produto com esse nome.',
            'price.numeric'        => 'O preço deve ser um valor numérico.',
            'price.min'            => 'O preço não pode ser negativo.',
            'stock.integer'        => 'O estoque deve ser um número inteiro.',
            'stock.min'            => 'O estoque não pode ser negativo.',
            'active.boolean'       => 'O campo ativo deve ser verdadeiro ou falso.',
        ];
    }
}