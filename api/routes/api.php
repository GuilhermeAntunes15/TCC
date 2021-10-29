<?php

use App\Http\Controllers\JwtAuthController;
use App\Http\Controllers\TCC\CursoController;
use App\Http\Controllers\TCC\LinguagemProgramacaoController;
use App\Http\Controllers\TCC\CursoAulaController;
use App\Http\Controllers\TCC\MatriculaController;
use App\Http\Controllers\TCC\ProfessorController;
use App\Http\Controllers\TCC\UsuarioController;
use Illuminate\Http\Request;
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

Route::post('loginMobile', [UsuarioController::class, 'loginMobile']);
Route::post('login', [JwtAuthController::class, 'login']);
Route::post('register', [UsuarioController::class, 'store']);

Route::group(['middleware' => ['apiJwt']], function () {
    Route::apiResource('professores', ProfessorController::class);
    Route::apiResource('usuarios', UsuarioController::class);
    Route::apiResource('matriculas', MatriculaController::class);
    Route::apiResource('linguagens', LinguagemProgramacaoController::class);
    Route::apiResource('cursos', CursoController::class);
    Route::apiResource('aulas', CursoAulaController::class);
});
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
