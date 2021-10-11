<?php

namespace App\Http\Controllers\TCC;

date_default_timezone_set('America/Sao_Paulo');

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TCC\Curso;
use Illuminate\Support\Facades\DB;

class CursoAulaController extends Controller
{
    public function index()
    {
        return Curso::all();
    }

    public function store(Request $request)
    {
        $sql = "CALL PR_T_CURSO_AULA_INSERT(@CD_CURSO_AULA, :1, :2, :3, :4, :5, :6, :7, :8, :9)";

        $pdo = DB::getPdo()->prepare($sql);

        $titulo = $request->CURAU_TITULO;
        $descricao = $request->CURAU_DESCRICAO;
        $qt_aula = $request->CURAU_QT_AULA;

        $fl_ativo = 'S';
        $dt_auditoria = date('Y-m-d H:i:s');
        $ds_auditoria = $request->dsAuditoria;

        $cd_ling = $request->cd_ling;
        $cd_prof = $request->cd_prof;
        $cd_curso = $request->cd_curso;

        $pdo->bindValue(':1', $titulo);
        $pdo->bindValue(':2', $descricao);
        $pdo->bindValue(':3', $qt_aula);

        $pdo->bindValue(':4', $fl_ativo);
        $pdo->bindValue(':5', $dt_auditoria);
        $pdo->bindValue(':6', $ds_auditoria);
        $pdo->bindValue(':7', $cd_ling);
        $pdo->bindValue(':8', $cd_prof);
        $pdo->bindValue(':9', $cd_curso);

        $pdo->execute();

        return DB::select('SELECT @CD_CURSO_AULA');
    }

    public function show($id)
    {
        return Curso::where("CD_CURSO_AULA", $id)->get();
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $sql = "CALL PR_T_CURSO_AULA_UPDATE(:1, :2, :3, :4, :5, :6, :7, :8, :9, :10, :12)";

        $pdo = DB::getPdo()->prepare($sql);

        $titulo = $request->CURAU_TITULO;
        $descricao = $request->CURAU_DESCRICAO;
        $qt_aula = $request->CURAU_QT_AULA;

        $fl_ativo = 'S';
        $dt_auditoria = date('Y-m-d H:i:s');
        $ds_auditoria = $request->dsAuditoria;

        $cd_ling = $request->cd_ling;
        $cd_prof = $request->cd_prof;
        $cd_curso = $request->cd_curso;
        $curau_bl_video = base64_decode($request->curau_bl_video);
        $curau_nm_video = $request->curau_nm_video;


        $pdo->bindValue(':1', $id);
        $pdo->bindValue(':2', $titulo);
        $pdo->bindValue(':3', $descricao);
        $pdo->bindValue(':4', $qt_aula);

        $pdo->bindValue(':5', $fl_ativo);
        $pdo->bindValue(':6', $dt_auditoria);
        $pdo->bindValue(':7', $ds_auditoria);
        $pdo->bindValue(':8', $cd_ling);
        $pdo->bindValue(':9', $cd_prof);
        $pdo->bindValue(':10', $cd_curso);
        $pdo->bindValue(':11', $curau_bl_video);
        $pdo->bindValue(':12', $curau_nm_video);

        $pdo->execute();
    }

    public function destroy($id)
    {
        $sql = "CALL PR_T_CURSO_AULA_DELETE(:CD_CURSO_AULA)";

        $pdo = DB::getPdo()->prepare($sql);

        $pdo->bindValue(":CD_CURSO_AULA", $id);

        $pdo->execute();
    }
}
