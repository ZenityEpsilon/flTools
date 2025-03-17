<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CommoditiesController;
use App\Http\Controllers\RecipesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/getCommodities', [CommoditiesController::class, 'getCommodities']);
Route::get('/getRecipes', [RecipesController::class, 'getRecipes']);
