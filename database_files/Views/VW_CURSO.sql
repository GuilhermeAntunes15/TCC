DROP VIEW IF EXISTS VW_CURSO;
CREATE VIEW VW_CURSO
AS
SELECT
CUR.CD_CURSO,
CUR.CUR_TITULO,
CUR.CUR_DESCRICAO,
CUR.CUR_QT_AULA,
CUR.CUR_REQUERIMENTO_01,
CUR.CUR_REQUERIMENTO_02,
CUR.CUR_REQUERIMENTO_03,
CUR.CUR_REQUERIMENTO_04,
CUR.CUR_REQUERIMENTO_05,
CUR.CUR_FL_CURSO_ATIVO_SN, 
CUR.CUR_DT_AUDITORIA_ALTERACAO,
CUR.CUR_AUDITORIA_LOGIN,

LP.CD_LINGUAGEM_PROGRAMACAO,
LP.LP_NOME,

PRO.CD_PROFESSOR,
PRO.PRO_NOME

FROM
T_CURSO as CUR

INNER JOIN T_LINGUAGEM_PROGRAMACAO AS LP
ON LP.CD_LINGUAGEM_PROGRAMACAO = CUR.CD_LINGUAGEM_PROGRAMACAO

INNER JOIN T_PROFESSOR AS PRO
ON PRO.CD_PROFESSOR = CUR.CD_PROFESSOR;
