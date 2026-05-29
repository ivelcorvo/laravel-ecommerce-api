<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    // Lista todas as categorias
    public function index(): JsonResponse
    {
        $categories = Category::all();

        return ApiResponse::success('Categorias listadas com sucesso.', CategoryResource::collection($categories));
    }

    // Exibe uma categoria específica
    public function show(Category $category): JsonResponse
    {
        return ApiResponse::success('Categoria encontrada.', new CategoryResource($category));
    }

    // Cria uma nova categoria
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $category = Category::create($request->validated());

        return ApiResponse::success('Categoria criada com sucesso.', new CategoryResource($category), 201);
    }

    // Atualiza uma categoria existente
    public function update(UpdateCategoryRequest $request, Category $category): JsonResponse
    {
        $category->update($request->validated());

        return ApiResponse::success('Categoria atualizada com sucesso.', new CategoryResource($category));
    }

    // Remove uma categoria
    public function destroy(Category $category): JsonResponse
    {
        $category->delete();

        return ApiResponse::success('Categoria removida com sucesso.');
    }
}