<?php

declare(strict_types=1);

use Illuminate\Http\JsonResponse;
use App\Helpers\ApiResponse;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Http\Middleware\CheckAbilities;
use Laravel\Sanctum\Http\Middleware\CheckForAnyAbility;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'abilities' => CheckAbilities::class,
            'ability'   => CheckForAnyAbility::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {

        $exceptions->render(function (ValidationException $e): JsonResponse {
            return ApiResponse::errors('Os dados informados são inválidos.', $e->errors(), 422);
        });

        $exceptions->render(function (NotFoundHttpException $e): JsonResponse {
            return ApiResponse::errors('Recurso não encontrado.', null, 404);
        });

        $exceptions->render(function (HttpExceptionInterface $e): JsonResponse {
            return ApiResponse::errors($e->getMessage() ?: 'Erro HTTP.', null, $e->getStatusCode());
        });

        $exceptions->render(function (QueryException $e): JsonResponse {
            report($e);
            return ApiResponse::errors('Erro ao acessar o banco de dados.', null, 500);
        });

        $exceptions->render(function (\Throwable $e): JsonResponse {
            report($e);
            return ApiResponse::errors('Erro interno no servidor.', null, 500);
        });

    })->create();