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
        $tempo = $request->CURAU_TEMPO;

        $fl_ativo = 'S';
        $dt_auditoria = date('Y-m-d H:i:s');
        $ds_auditoria = $request->dsAuditoria;

        $cd_curso = $request->cd_curso;

        $curau_video = $request->curau_video;

        $pdo->bindValue(':1', $titulo);
        $pdo->bindValue(':2', $descricao);
        $pdo->bindValue(':3', $qt_aula);
        $pdo->bindValue(':4', $tempo);

        $pdo->bindValue(':5', $fl_ativo);
        $pdo->bindValue(':6', $dt_auditoria);
        $pdo->bindValue(':7', $ds_auditoria);
        $pdo->bindValue(':8', $curau_video);
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
        $sql = "CALL PR_T_CURSO_AULA_UPDATE(:id, :1, :2, :3, :4, :5, :6, :7, :8, :9, :10)";

        $pdo = DB::getPdo()->prepare($sql);

        $titulo = $request->CURAU_TITULO;
        $descricao = $request->CURAU_DESCRICAO;
        $qt_aula = $request->CURAU_QT_AULA;
        $tempo = $request->CURAU_TEMPO;

        $fl_ativo = 'S';
        $dt_auditoria = date('Y-m-d H:i:s');
        $ds_auditoria = $request->dsAuditoria;

        $cd_curso = $request->cd_curso;

        $curau_video = $request->curau_video;

        $pdo->bindValue(':id', $id);
        $pdo->bindValue(':1', $titulo);
        $pdo->bindValue(':2', $descricao);
        $pdo->bindValue(':3', $qt_aula);
        $pdo->bindValue(':4', $tempo);

        $pdo->bindValue(':5', $fl_ativo);
        $pdo->bindValue(':6', $dt_auditoria);
        $pdo->bindValue(':7', $ds_auditoria);
        $pdo->bindValue(':8', $curau_video);
        $pdo->bindValue(':9', $cd_curso);

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
