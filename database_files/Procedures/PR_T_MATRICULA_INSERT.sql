DROP PROCEDURE IF EXISTS PR_T_MATRICULA_INSERT;

DELIMITER $$
CREATE PROCEDURE PR_T_MATRICULA_INSERT
(
OUT _CD_MATRICULA int(11),
IN _MA_STATUS VARCHAR(3),
IN _MA_DT_INICIO date,
IN _MA_DT_TERMINO date,
IN _MA_FL_MATRICULA_ATIVO_SN CHAR(1), 
IN _MA_DT_AUDITORIA_ALTERACAO DATETIME,
IN _MA_DS_AUDITORIA_LOGIN TEXT,
IN _CD_USUARIO INT,
IN _CD_CURSO INT
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

INSERT INTO T_MATRICULA
(
    MA_STATUS,
    MA_DT_INICIO,
    MA_DT_TERMINO,
    MA_FL_MATRICULA_ATIVO_SN, 
    MA_DT_AUDITORIA_ALTERACAO,
    MA_DS_AUDITORIA_LOGIN,
    CD_USUARIO,
    CD_CURSO
)
VALUES
(
    _MA_STATUS,
    _MA_DT_INICIO,
    _MA_DT_TERMINO,
    _MA_FL_MATRICULA_ATIVO_SN, 
    _MA_DT_AUDITORIA_ALTERACAO,
    _MA_DS_AUDITORIA_LOGIN,
    _CD_USUARIO,
    _CD_CURSO
);

COMMIT WORK;
SET
	_CD_MATRICULA = LAST_INSERT_ID();

END$$
DELIMITER ;
