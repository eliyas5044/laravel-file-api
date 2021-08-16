<?php

use Eliyas5044\LaravelFileApi\Http\Controllers\FileController;
use Eliyas5044\LaravelFileApi\Http\Controllers\FolderController;
use Illuminate\Support\Facades\Route;

Route::prefix(config('laravel-file-api.routePrefix'))->middleware(config('laravel-file-api.routeMiddleware'))->group(function () {
    // folder routes
    Route::get('folder', [FolderController::class, 'index']);
    Route::post('folder', [FolderController::class, 'store']);
    Route::post('folder/{folder}', [FolderController::class, 'update']);
    Route::post('folder/move/{folder}', [FolderController::class, 'moveFolder']);
    Route::get('folder/{folder}', [FolderController::class, 'show']);
    Route::delete('folder/{folder}', [FolderController::class, 'destroy']);

    // file routes
    Route::get('file/download', [FileController::class, 'download']);
    Route::post('file', [FileController::class, 'store']);
    Route::delete('file/{file}', [FileController::class, 'destroy']);
});
