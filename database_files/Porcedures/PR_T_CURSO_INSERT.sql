DROP PROCEDURE IF EXISTS PR_T_CURSO_INSERT;

DELIMITER $$
CREATE PROCEDURE PR_T_CURSO_INSERT
(
OUT _CD_CURSO int(11),
IN _CUR_TITULO VARCHAR(30),
IN _CUR_DESCRICAO TEXT,
IN _CUR_QT_AULA INT,
IN _CUR_REQUERIMENTO_01 VARCHAR(20),
IN _CUR_REQUERIMENTO_02 VARCHAR(20),
IN _CUR_REQUERIMENTO_03 VARCHAR(20),
IN _CUR_REQUERIMENTO_04 VARCHAR(20),
IN _CUR_REQUERIMENTO_05 VARCHAR(20),
IN _CUR_FL_CURSO_ATIVO_SN CHAR(1), 
IN _CUR_DT_AUDITORIA_ALTERACAO DATETIME,
IN _CUR_DS_AUDITORIA_LOGIN TEXT,
IN _CD_LINGUAGEM_PROGRAMACAO INT,
IN _CD_PROFESSOR INT
)
BEGIN
DECLARE errno INT;

DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN
	GET CURRENT DIAGNOSTICS CONDITION 1 errno = MYSQL_ERRNO;
	SELECT errno AS MYSQL_ERROR;
	ROLLBACK;
END;

START TRANSACTION;

INSERT INTO T_CURSO
(
    CUR_TITULO,
    CUR_DESCRICAO,
    CUR_QT_AULA,
    CUR_REQUERIMENTO_01,
    CUR_REQUERIMENTO_02,
    CUR_REQUERIMENTO_03,
    CUR_REQUERIMENTO_04,
    CUR_REQUERIMENTO_05,
    CUR_FL_CURSO_ATIVO_SN, 
    CUR_DT_AUDITORIA_ALTERACAO,
    CUR_DS_AUDITORIA_LOGIN,
    CD_LINGUAGEM_PROGRAMACAO,
    CD_PROFESSOR 
)
VALUES
(
    _CUR_TITULO,
    _CUR_DESCRICAO,
    _CUR_QT_AULA,
    _CUR_REQUERIMENTO_01,
    _CUR_REQUERIMENTO_02,
    _CUR_REQUERIMENTO_03,
    _CUR_REQUERIMENTO_04,
    _CUR_REQUERIMENTO_05,
    _CUR_FL_CURSO_ATIVO_SN, 
    _CUR_DT_AUDITORIA_ALTERACAO,
    _CUR_DS_AUDITORIA_LOGIN,
    _CD_LINGUAGEM_PROGRAMACAO,
    _CD_PROFESSOR
);

COMMIT WORK;
SET
	_CD_CURSO = LAST_INSERT_ID();

END$$
DELIMITER ;
