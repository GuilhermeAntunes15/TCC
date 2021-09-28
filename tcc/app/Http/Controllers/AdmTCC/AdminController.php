<?php

namespace App\Http\Controllers\AdmTCC;

date_default_timezone_set('America/Sao_Paulo');

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function index()
    {
        try {
            return view('pages.Adm.Login');
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public function dash()
    {
        try {
            return view('pages.Adm.Admin');
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }


    public function create()
    {
        
       
    }

    public function store(Request $request)
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
