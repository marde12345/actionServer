<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Resources\InfluencerResource;

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

// Testing API
Route::get('/user', function () {
    return User::all();
});

Route::get('/userInf', function () {
    return User::where('role', 'inf')->get();
});

Route::post('/userEmail', function (Request $request) {
    return User::where('email', $request->post('email'))->first();
});

Route::post('/login', function (Request $request) {

    return User::where('email', $request->email)->where('password', bcrypt($request->password))->first();
});

// Route::get('/user/{id}', function ($id) {
//     return new InfluencerResource(User::findOrFail($id));
// });

// Route::get('/userEmail/{email}', function ($email) {
//     return User::where('email', $email)->get();
// });

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
