<?php

namespace App\Http\Controllers\TCC;

date_default_timezone_set('America/Sao_Paulo');

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TCC\LinguagemProgramacao;
use Illuminate\Support\Facades\DB;

class LinguagemProgramacaoController extends Controller
{
    public function index()
    {
        return LinguagemProgramacao::all();
    }

    public function store(Request $request)
    {
        $sql = "CALL PR_T_LINGUAGEM_PROGRAMACAO_INSERT(@CD_LINGUAGEM_PROGRAMACAO, :1, :2, :3, :4)";

        $pdo = DB::getPdo()->prepare($sql);

        $nome = $request->LP_NOME;
        $dt_auditoria = date('Y-m-d H:i:s');
        $ds_auditoria = $request->dsAuditoria;

        $pdo->bindValue(':1', $nome);
        $pdo->bindValue(':2', 'S');
        $pdo->bindValue(':3', $dt_auditoria);
        $pdo->bindValue(':4', $ds_auditoria);

        $pdo->execute();

        return DB::select('SELECT @CD_LINGUAGEM_PROGRAMACAO');
    }

    public function show($id)
    {
        return LinguagemProgramacao::where("CD_LINGUAGEM_PROGRAMACAO", $id)->get();
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $sql = "CALL PR_T_LINGUAGEM_PROGRAMACAO_UPDATE(:1, :2, :3, :4, :5)";

        $pdo = DB::getPdo()->prepare($sql);

        $nome = $request->LP_NOME;
        $dt_auditoria = date('Y-m-d H:i:s');
        $ds_auditoria = $request->dsAuditoria;

        $pdo->bindValue(':1', $id);
        $pdo->bindValue(':2', $nome);
        $pdo->bindValue(':3', 'S');
        $pdo->bindValue(':4', $dt_auditoria);
        $pdo->bindValue(':5', $ds_auditoria);

        $pdo->execute();
    }

    public function destroy($id)
    {
        $sql = "CALL PR_T_LINGUAGEM_PROGRAMACAO_DELETE(:CD_LINGUAGEM_PROGRAMACAO)";

        $pdo = DB::getPdo()->prepare($sql);

        $pdo->bindValue(":CD_LINGUAGEM_PROGRAMACAO", $id);

        $pdo->execute();
    }
}
