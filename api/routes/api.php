<?php

use App\Http\Controllers\TCC\CursoController;
use App\Http\Controllers\TCC\LinguagemProgramacaoController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('api/professores', ProfessorController::class);
Route::apiResource('api/usuarios', UsuarioController::class);
Route::apiResource('api/matriculas', MatriculaController::class);
Route::apiResource('api/linguagens', LinguagemProgramacaoController::class);
Route::apiResource('api/cursos', CursoController::class);
