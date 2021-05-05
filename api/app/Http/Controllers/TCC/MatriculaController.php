<?php

namespace App\Http\Controllers\TCC;

date_default_timezone_set('America/Sao_Paulo');

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TCC\Matricula;
use Illuminate\Support\Facades\DB;

class MatriculaController extends Controller
{
    public function index()
    {
        return Matricula::all();
    }

    public function store(Request $request)
    {
        $sql = "CALL PR_T_MATRICULA_INSERT(@CD_MATRICULA, :1, :2, :3, :4, :5, :6, :7, :8)";

        $pdo = DB::getPdo()->prepare($sql);

        $status = $request->status;
        $dt_inicio = date('Y-m-d');
        $dt_termino = date('Y-m-d');
        $dt_auditoria =  date('Y-m-d H:i:s');
        $ds_auditoria = $request->dsAuditoria;

        $cd_usuario = $request->cd_usuario;
        $cd_curso = $request->cd_curso;

        $pdo->bindValue(':1', $status);
        $pdo->bindValue(':2', $dt_inicio);
        $pdo->bindValue(':3', $dt_termino);
        $pdo->bindValue(':4', 'S');
        $pdo->bindValue(':5', $dt_auditoria);
        $pdo->bindValue(':6', $ds_auditoria);

        $pdo->bindValue(':7', $cd_usuario);
        $pdo->bindValue(':8', $cd_curso);

        $pdo->execute();

        return DB::select('SELECT @CD_MATRICULA');
    }

    public function show($id)
    {
        return Matricula::where("CD_MATRICULA", $id)->get();
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $sql = "CALL PR_T_MATRICULA_UPDATE(:1, :2, :3, :4, :5, :6, :7, :8, :9)";

        $pdo = DB::getPdo()->prepare($sql);

        $status = $request->status;
        $dt_inicio = date('Y-m-d');
        $dt_termino = date('Y-m-d');
        $dt_auditoria =  date('Y-m-d H:i:s');
        $ds_auditoria = $request->dsAuditoria;

        $cd_usuario = $request->cd_usuario;
        $cd_curso = $request->cd_curso;


        $pdo->bindValue(':1', $id);
        $pdo->bindValue(':2', $status);
        $pdo->bindValue(':3', $dt_inicio);
        $pdo->bindValue(':4', $dt_termino);
        $pdo->bindValue(':5', 'S');
        $pdo->bindValue(':6', $dt_auditoria);
        $pdo->bindValue(':7', $ds_auditoria);

        $pdo->bindValue(':8', $cd_usuario);
        $pdo->bindValue(':9', $cd_curso);

        $pdo->execute();
    }

    public function destroy($id)
    {
        $sql = "CALL PR_T_MATRICULA_DELETE(:CD_MATRICULA)";

        $pdo = DB::getPdo()->prepare($sql);

        $pdo->bindValue(":CD_MATRICULA", $id);

        $pdo->execute();
    }
}
