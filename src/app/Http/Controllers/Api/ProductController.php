<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    // Lista todos os produtos
    public function index(): JsonResponse
    {
        $products = Product::with('category')->get();

        return ApiResponse::success('Produtos listados com sucesso.', ProductResource::collection($products));
    }

    // Exibe um produto específico
    public function show(Product $product): JsonResponse
    {
        $product->load('category');

        return ApiResponse::success('Produto encontrado.', new ProductResource($product));
    }

    // Cria um novo produto
    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = Product::create($request->validated());
        $product->load('category');

        return ApiResponse::success('Produto criado com sucesso.', new ProductResource($product), 201);
    }

    // Atualiza um produto existente
    public function update(UpdateProductRequest $request, Product $product): JsonResponse
    {
        $product->update($request->validated());
        $product->load('category');

        return ApiResponse::success('Produto atualizado com sucesso.', new ProductResource($product));
    }

    // Remove um produto
    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return ApiResponse::success('Produto removido com sucesso.');
    }
}