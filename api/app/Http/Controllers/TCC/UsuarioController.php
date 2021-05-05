<?php

namespace App\Http\Controllers\TCC;

date_default_timezone_set('America/Sao_Paulo');

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TCC\Usuario;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index()
    {
        return Usuario::all();
    }

    public function store(Request $request)
    {
        $sql = "CALL PR_T_USUARIO_INSERT(@CD_USUARIO, :1, :2, :3, :4, 'S', :5, :6)";

        $pdo = DB::getPdo()->prepare($sql);

        $login = $request->login;
        $email = $request->email;
        $senha = $request->senha;
        $dt_nasc = $request->dt_nasc;
        $dt_auditoria = date('Y-m-d H:i:s');
        $ds_auditoria = $request->dsAuditoria;

        $pdo->bindValue(':1', $login);
        $pdo->bindValue(':2', $email);
        $pdo->bindValue(':3', $senha);
        $pdo->bindValue(':4', $dt_nasc);
        $pdo->bindValue(':5', $dt_auditoria);
        $pdo->bindValue(':6', $ds_auditoria);

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
        $sql = "CALL PR_T_USUARIO_UPDATE(:1, :2, :3, :4, :5, :6, :7, :8)";

        $pdo = DB::getPdo()->prepare($sql);

        $login = $request->login;
        $email = $request->email;
        $senha = $request->senha;
        $dt_nasc = $request->dt_nasc;
        $dt_auditoria = date('Y-m-d H:i:s');
        $ds_auditoria = $request->dsAuditoria;

        $pdo->bindValue(':1', $id);
        $pdo->bindValue(':2', $login);
        $pdo->bindValue(':3', $email);
        $pdo->bindValue(':4', $senha);
        $pdo->bindValue(':5', $dt_nasc);
        $pdo->bindValue(':6', 'S');
        $pdo->bindValue(':7', $dt_auditoria);
        $pdo->bindValue(':8', $ds_auditoria);

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
