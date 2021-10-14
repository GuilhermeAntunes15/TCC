<?php

namespace App\Http\Controllers\TCC;

date_default_timezone_set('America/Sao_Paulo');

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        try {
            return view('pages.Home');
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }


    public function create()
    {

    }

    public function store(UsuarioRequest $request)
    {

    }

    public function show($id)
    {
    }


    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
    
    }

    public function destroy($id)
    {
    }
}
