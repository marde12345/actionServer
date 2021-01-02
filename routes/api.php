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
// idk why
Route::get('/', function () {
    return "Nice";
});
// Testing API
Route::get('/user', function () {
    return User::all();
});
Route::post('/user', function (Request $request) {
    return User::find($request->id);
});

Route::get('/userInf', function () {
    return InfluencerResource::collection(User::where('role', 'inf')->get());
});

Route::post('/userInf', function (Request $request) {
    return new InfluencerResource(User::find($request->id));
});

Route::post('/userEmail', function (Request $request) {
    return User::where('email', $request->post('email'))->first();
});

Route::post('/login', function (Request $request) {
    return User::where('email', $request->email)->where('password', bcrypt($request->password))->first();
});

Route::post('/platform', [PlatformController::class, 'store']);

Route::post('/endorse', [EndorseController::class, 'getEndorseByInfId']);
Route::post('/createEndorse', [EndorseController::class, 'storeEndorse']);

// Route::get('/user/{id}', function ($id) {
//     return new InfluencerResource(User::findOrFail($id));
// });

// Route::get('/userEmail/{email}', function ($email) {
//     return User::where('email', $email)->get();
// });

Route::post('/register', [AuthController::class, 'register']);
Route::post('/update', [AuthController::class, 'update']);
Route::post('/login', [AuthController::class, 'login']);

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
