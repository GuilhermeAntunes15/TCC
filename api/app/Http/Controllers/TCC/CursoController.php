<?php

namespace App\Http\Controllers\TCC;

date_default_timezone_set('America/Sao_Paulo');

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TCC\Curso;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    public function index()
    {
        return Curso::all();
    }

    public function store(Request $request)
    {
        $sql = "CALL PR_T_CURSO_INSERT(@CD_CURSO, :1, :2, :3, :4, :5, :6, :7, :8, :9, :10, :11, :12, :13)";

        $pdo = DB::getPdo()->prepare($sql);

        $titulo = $request->CUR_TITULO;
        $descricao = $request->CUR_DESCRICAO;
        $qt_aula = $request->CUR_QT_AULA;

        $req01 = $request->CUR_REQUERIMENTO_01;
        $req02 = $request->CUR_REQUERIMENTO_02;
        $req03 = $request->CUR_REQUERIMENTO_03;
        $req04 = $request->CUR_REQUERIMENTO_04;
        $req05 = $request->CUR_REQUERIMENTO_05;

        $fl_ativo = 'S';
        $dt_auditoria = date('Y-m-d H:i:s');
        $ds_auditoria = $request->dsAuditoria;

        $cd_ling = $request->cd_ling;
        $cd_prof = $request->cd_prof;

        $pdo->bindValue(':1', $titulo);
        $pdo->bindValue(':2', $descricao);
        $pdo->bindValue(':3', $qt_aula);

        $pdo->bindValue(':4', $req01);
        $pdo->bindValue(':5', $req02);
        $pdo->bindValue(':6', $req03);
        $pdo->bindValue(':7', $req04);
        $pdo->bindValue(':8', $req05);

        $pdo->bindValue(':9', $fl_ativo);
        $pdo->bindValue(':10', $dt_auditoria);
        $pdo->bindValue(':11', $ds_auditoria);
        $pdo->bindValue(':12', $cd_ling);
        $pdo->bindValue(':13', $cd_prof);

        $pdo->execute();

        return DB::select('SELECT @CD_CURSO');
    }

    public function show($id)
    {
        return Curso::where("CD_CURSO", $id)->get();
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $sql = "CALL PR_T_CURSO_UPDATE(:1, :2, :3, :4, :5, :6, :7, :8, :9, :10, :11, :12, :13, :14)";

        $pdo = DB::getPdo()->prepare($sql);

        $titulo = $request->CUR_TITULO;
        $descricao = $request->CUR_DESCRICAO;
        $qt_aula = $request->CUR_QT_AULA;

        $req01 = $request->CUR_REQUERIMENTO_01;
        $req02 = $request->CUR_REQUERIMENTO_02;
        $req03 = $request->CUR_REQUERIMENTO_03;
        $req04 = $request->CUR_REQUERIMENTO_04;
        $req05 = $request->CUR_REQUERIMENTO_05;

        $fl_ativo = 'S';
        $dt_auditoria = date('Y-m-d H:i:s');
        $ds_auditoria = $request->dsAuditoria;

        $cd_ling = $request->cd_ling;
        $cd_prof = $request->cd_prof;

        $pdo->bindValue(':1', $id);
        $pdo->bindValue(':2', $titulo);
        $pdo->bindValue(':3', $descricao);
        $pdo->bindValue(':4', $qt_aula);

        $pdo->bindValue(':5', $req01);
        $pdo->bindValue(':6', $req02);
        $pdo->bindValue(':7', $req03);
        $pdo->bindValue(':8', $req04);
        $pdo->bindValue(':9', $req05);

        $pdo->bindValue(':10', $fl_ativo);
        $pdo->bindValue(':11', $dt_auditoria);
        $pdo->bindValue(':12', $ds_auditoria);
        $pdo->bindValue(':13', $cd_ling);
        $pdo->bindValue(':14', $cd_prof);

        $pdo->execute();
    }

    public function destroy($id)
    {
        $sql = "CALL PR_T_CURSO_DELETE(:CD_CURSO)";

        $pdo = DB::getPdo()->prepare($sql);

        $pdo->bindValue(":CD_CURSO", $id);

        $pdo->execute();
    }
}
