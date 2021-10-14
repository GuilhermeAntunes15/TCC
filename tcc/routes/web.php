<?php

use App\Http\Controllers\AdmTCC\AdminController;
use App\Http\Controllers\AdmTCC\CursoAulaController;
use App\Http\Controllers\AdmTCC\CursoController as AdmTCCCursoController;
use App\Http\Controllers\TCC\CursoController;
use App\Http\Controllers\TCC\UsuarioController;
use App\Http\Controllers\TCC\HomeController;
use App\Http\Controllers\AdmTCC\LinguagemProgramacaoController;
use App\Http\Controllers\AdmTCC\UsuariosController;
use App\Http\Controllers\AdmTCC\ProfessorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages/Home');
})->name('index');


Route::get('signup', [UsuarioController::class, 'create'])->name('signup.create');
Route::get('signin', [UsuarioController::class, 'create'])->name('signin.signin');

Route::resource('cursos', CursoController::class);
Route::get('cursos/lista', [CursoController::class, 'lista'])->name('cursos.lista');
Route::get('curso/aula', [CursoController::class, 'aula'])->name('cursos.aula');


Route::middleware(['auth', 'auth.prof'])->group(function () {
    Route::resource('professor', ProfessorController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('home', HomeController::class);
    Route::resource('curso', CursoController::class);
    Route::get('dash', [AdminController::class, 'dash'])->name('admin.dash');

    Route::resource('admin/linguagemProgramacao', LinguagemProgramacaoController::class);
    Route::resource('admin/curso', AdmTCCCursoController::class);
    Route::resource('admin/aulas', CursoAulaController::class);
    Route::resource('admin/usuarios', UsuariosController::class);
});

// Route::get('login', [UsuarioController::class, 'index'])->name('login.index');

Route::post('admin/login', [UsuariosController::class, 'login'])->name('admin.login');
Route::get('admin/logout', [UsuariosController::class, 'logout'])->name('admin.logout');

Route::resource('admin', AdminController::class);


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
