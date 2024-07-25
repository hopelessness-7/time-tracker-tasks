<?php

use App\Http\Controllers\Api\v1\Auth\LoginController;
use App\Http\Controllers\Api\v1\Auth\RegisterController;
use App\Http\Controllers\Api\v1\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::post('/login', [LoginController::class, '__invoke']);
    Route::post('/register', [RegisterController::class, '__invoke']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::controller(ProjectController::class)->group(function () {
            Route::get('/projects', 'index');
            Route::get('/projects/show/{id}', 'show');
            Route::post('/projects/create', 'create');
            Route::post('/projects/update/{id}', 'update');
            Route::delete('projects/delete/{id}', 'delete');
        });
    });
});


Route::fallback(function(){
    return response()->json([
        'errors' => [
            "error" => [
                'code' => '404',
                'message' => 'Not found'
            ],
        ]
    ], 404);
});
