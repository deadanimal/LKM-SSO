<?php

use App\Http\Controllers\ApiController;
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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::middleware('auth:api')->get('/user/get', [UserController::class, 'get']);

Route::middleware('auth:api')->get('/logmeout', function (Request $request) {
    $user = $request->user();
    $accessToken = $user->token();
    DB::table("oauth_refresh_tokens")->where("access_token_id", $accessToken->id)->delete();
    $accessToken->delete();

    return response()->json([
        "message" => "revoked",
    ]);

});

Route::get('/I_tmpweb', [ApiController::class, 'I_tmpweb']);
Route::get('/HHarian', [ApiController::class, 'HHarian']);
Route::get('/HHbulan', [ApiController::class, 'HHbulan']);
Route::get('/HTahunan', [ApiController::class, 'HTahunan']);

Route::get('/L_grind', [ApiController::class, 'I_grind']);
Route::get('/CN_prod', [ApiController::class, 'CN_prod']);
Route::get('/Exsumm1_E', [ApiController::class, 'Exsumm1_E']);
Route::get('/Exsumm1_I', [ApiController::class, 'Exsumm1_I']);
Route::get('/L_area1', [ApiController::class, 'L_area1']);

Route::post('/carian_I_tmpweb', [ApiController::class, 'carian_I_tmpweb']);
Route::post('/carian_HHarian', [ApiController::class, 'carian_HHarian']);
Route::post('/carian_HHbulan', [ApiController::class, 'carian_HHbulan']);
Route::post('/carian_HTahunan', [ApiController::class, 'carian_HTahunan']);

Route::get('/cari_harian_harga_pusat', [ApiController::class, 'cariHarian']);

Route::get('/testConnection', [ApiController::class, 'test']);

Route::get('/carian_HHarian', [ApiController::class, 'carian_HHarian']);

Route::get('/carian_HHbulan', [ApiController::class, 'carian_HHbulan']);

Route::get('/carian_HTahunan', [ApiController::class, 'carian_HTahunan']);

Route::get('/carian_I_tmpweb', [ApiController::class, 'carian_I_tmpweb']);

Route::get('/hharian_latest', [ApiController::class, 'hharian_latest']);
Route::get('/hhbulan_latest', [ApiController::class, 'hhbulan_latest']);
Route::get('/htahunan_latest', [ApiController::class, 'htahunan_latest']);
Route::get('/iTempWeb_latest', [ApiController::class, 'iTempWeb_latest']);

Route::get('/header', [ApiController::class, 'header']);
