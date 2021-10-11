<?php

namespace App\Http\Controllers\TCC;

date_default_timezone_set('America/Sao_Paulo');

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TCC\Professor;
use Illuminate\Support\Facades\DB;

class ProfessorController extends Controller
{
    public function index()
    {
        return Professor::all();
    }

    public function store(Request $request)
    {   
        $sql = "CALL PR_T_PROFESSOR_INSERT(@CD_PROFESSOR, :1, :2, :3, :4, :5, :6)";

        $pdo = DB::getPdo()->prepare($sql);

        $cpf = $request->cpf;
        $rg = $request->rg;
        $cd_usuario = $request->cd_usuario;
        $cpf = $request->cpf;
        $dt_auditoria = date('Y-m-d H:i:s');
        $ds_auditoria = $request->dsAuditoria;


        $pdo->bindValue(':1', $cpf);
        $pdo->bindValue(':2', $rg);
        $pdo->bindValue(':3', 'S');
        $pdo->bindValue(':4', $dt_auditoria);
        $pdo->bindValue(':5', $ds_auditoria);
        $pdo->bindValue(':6', $cd_usuario);

        $pdo->execute();

        return DB::select('SELECT @CD_PROFESSOR');
    }

    public function show($id)
    {
        return Professor::where("CD_PROFESSOR", $id)->get();
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $sql = "CALL PR_T_PROFESSOR_UPDATE(:1, :2, :3, :4, :5, :6, :7, :8, :9)";

        $pdo = DB::getPdo()->prepare($sql);

        $cpf = $request->cpf;
        $rg = $request->rg;
        $cd_usuario = $request->cd_usuario;
        $cpf = $request->cpf;
        $dt_auditoria = date('Y-m-d H:i:s');
        $ds_auditoria = $request->dsAuditoria;

        $pdo->bindValue(':1', $id);
        $pdo->bindValue(':2', $cpf);
        $pdo->bindValue(':3', $rg);
        $pdo->bindValue(':4', 'S');
        $pdo->bindValue(':5', $dt_auditoria);
        $pdo->bindValue(':6', $ds_auditoria);
        $pdo->bindValue(':7', $cd_usuario);

        $pdo->execute();
    }

    public function destroy($id)
    {
        $sql = "CALL PR_T_PROFESSOR_DELETE(:CD_PROFESSOR)";

        $pdo = DB::getPdo()->prepare($sql);

        $pdo->bindValue(":CD_PROFESSOR", $id);

        $pdo->execute();
    }
}
