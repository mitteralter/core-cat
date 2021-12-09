<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use CloudCreativity\LaravelJsonApi\Facades\JsonApi;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([
    'prefix' => 'auth'
 ], function () {
     //Route::post('login', [AuthController::class, 'login'] );
     Route::post('login', [AuthController::class, 'login'])->name('api.auth.login');
     Route::post('signup', [AuthController::class, 'signUp']);
 
     Route::group([
       'middleware' => 'auth:api'
     ], function() {
         Route::get('logout', [AuthController::class, 'logout']);
         Route::get('userA', [AuthController::class, 'user']);
      
     });
 });

  
Route::get('hiu', function(){
    return "holi";
    });


JsonApi::register('default')->middleware('auth:api')->withNamespace('api')->routes(function($api){
    // ->withNamespace('api')
        $api->resource('facs');
        $api->resource('estados');
    });
        

