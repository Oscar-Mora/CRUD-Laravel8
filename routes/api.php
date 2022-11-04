<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Contact;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/contact', [ContactController::class, 'store']);
Route::get ('/contacts', [ContactController::class, 'index']);
Route::get('/get-contact/{contact_id}', [ContactController::class, 'edit']);
Route::put('/update-contact', [ContactController::class, 'update']);
Route::delete ('/contacts/{contact_id}', [ContactController::class, 'destroy']);





// Route::resource ('/contacts', ContactController::class);