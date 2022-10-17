<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
//scopes kalau banyak scope
// Route::middleware('auth:api', 'scope:view-user')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api', 'scope:view-user')->get('/user/get', [UserController::class, 'get']);

Route::middleware('auth:api')->get('/logmeout', function (Request $request) {
    $user = $request->user();
    $accessToken = $user->token();
    DB::table("oauth_refresh_tokens")->where("access_token_id", $accessToken->id)->delete();
    $accessToken->delete();

    return response()->json([
        "message" => "revoked",
    ]);

});
