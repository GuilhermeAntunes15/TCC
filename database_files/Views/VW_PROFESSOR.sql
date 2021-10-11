DROP VIEW IF EXISTS VW_PROFESSOR;
CREATE VIEW VW_PROFESSOR
AS
SELECT
PRO.CD_PROFESSOR,
PRO.PRO_RG,
PRO.PRO_CPF,
PRO.CD_USUARIO,
PRO.PRO_FL_PROFESSOR_ATIVO_SN,
PRO.PRO_DT_AUDITORIA_ALTERACAO,
PRO.PRO_DS_AUDITORIA_LOGIN,

USU.US_NOME,
USU.US_EMAIL,
USU.US_SENHA

FROM
T_PROFESSOR as PRO

INNER JOIN T_USUARIO as USU 
ON USU.CD_USUARIO = PRO.CD_USUARIO;



