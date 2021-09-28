<?php

namespace App\Http\Controllers\TCC;

date_default_timezone_set('America/Sao_Paulo');

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TCC\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        return Usuario::all();
    }

    public function store(Request $request)
    {
        $sql = "CALL PR_T_USUARIO_INSERT(@CD_USUARIO, :1, :2, :3, :4, :5, :6, :7, :8)";

        $pdo = DB::getPdo()->prepare($sql);

        $login = $request->login;
        $nome = $request->nome;
        $email = $request->email;
        $senha = $request->senha;
        $dt_nasc = $request->dt_nasc;
        $fl_ativo = 'S';
        $dt_auditoria = date('Y-m-d H:i:s');
        $ds_auditoria = $request->dsAuditoria;

        $senha = Hash::make($senha);

        $pdo->bindValue(':1', $nome);
        $pdo->bindValue(':2', $login);
        $pdo->bindValue(':3', $email);
        $pdo->bindValue(':4', $senha);
        $pdo->bindValue(':5', $dt_nasc);
        $pdo->bindValue(':6', $fl_ativo);
        $pdo->bindValue(':7', $dt_auditoria);
        $pdo->bindValue(':8', $ds_auditoria);

        $pdo->execute();

        return DB::select('SELECT @CD_USUARIO');
    }

    public function show($id)
    {
        return Usuario::where("CD_USUARIO", $id)->get();
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $sql = "CALL PR_T_USUARIO_UPDATE(:1, :2, :3, :4, :5, :6, :7, :8, :9)";

        $pdo = DB::getPdo()->prepare($sql);

        $login = $request->login;
        $nome = $request->nome;
        $email = $request->email;
        $senha = $request->senha;
        $dt_nasc = $request->dt_nasc;
        $dt_auditoria = date('Y-m-d H:i:s');
        $ds_auditoria = $request->dsAuditoria;

        $senha = Hash::make($senha);

        $pdo->bindValue(':1', $id);
        $pdo->bindValue(':2', $nome);
        $pdo->bindValue(':3', $login);
        $pdo->bindValue(':4', $email);
        $pdo->bindValue(':5', $senha);
        $pdo->bindValue(':6', $dt_nasc);
        $pdo->bindValue(':7', 'S');
        $pdo->bindValue(':8', $dt_auditoria);
        $pdo->bindValue(':9', $ds_auditoria);

        $pdo->execute();
    }

    public function destroy($id)
    {
        $sql = "CALL PR_T_USUARIO_DELETE(:CD_USUARIO)";

        $pdo = DB::getPdo()->prepare($sql);

        $pdo->bindValue(":CD_USUARIO", $id);

        $pdo->execute();
    }

}
