<?php

use App\Http\Controllers\api\ReceitaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('API')->group(function () {
    Route::prefix('receitas')->group(function() {
        Route::get('/', [ReceitaController::class, 'index'])->name('receitas');
        Route::get('/{id}', [ReceitaController::class, 'show'])->name('show');

        Route::post('/', [ReceitaController::class, 'store'])->name('store');
        Route::put('/{id}', [ReceitaController::class, 'update'])->name('update');
        Route::delete('/{id}', [ReceitaController::class, 'destroy'])->name('destroy');

    });

});
