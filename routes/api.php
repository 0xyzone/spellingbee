<?php

use App\Models\Sponsor;
use App\Models\Supporter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\EventApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::apiResource('/event', EventApiController::class);
});
Route::get('/sponsors', function () {
    // We return them all, or you could use ->paginate() if the list gets huge
    return Sponsor::all(); 
});
Route::get('/supporters', function () {
    // We return them all, or you could use ->paginate() if the list gets huge
    return Supporter::all();
});