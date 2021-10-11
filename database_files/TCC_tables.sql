create database tcc;

use tcc;

CREATE TABLE T_USUARIO(
    CD_USUARIO INT(11) Primary key auto_increment,
    US_NOME VARCHAR(60),
    US_LOGIN VARCHAR(20),
    US_EMAIL VARCHAR(60),
    US_SENHA VARCHAR(260),
    US_DT_NASCIMENTO date,
    US_FL_USUARIO_ATIVO_SN CHAR(1), 
    US_DT_AUDITORIA_ALTERACAO DATETIME,
    US_AUDITORIA_LOGIN TEXT,
    US_FL_PROFESSOR_SN CHAR(1) DEFAULT 'N'
);

CREATE TABLE T_LINGUAGEM_PROGRAMACAO(
    CD_LINGUAGEM_PROGRAMACAO INT(11) Primary key auto_increment,
    LP_NOME VARCHAR(20),
    LP_FL_LINGUAGEM_PROGRAMACAO_ATIVO_SN CHAR(1), 
    LP_DT_AUDITORIA_ALTERACAO DATETIME,
    LP_DS_AUDITORIA_LOGIN TEXT
);

CREATE TABLE T_PROFESSOR(
    CD_PROFESSOR INT(11) Primary key auto_increment,
    PRO_CPF VARCHAR(20),
    PRO_RG varchar(30),
    PRO_FL_PROFESSOR_ATIVO_SN CHAR(1), 
    PRO_DT_AUDITORIA_ALTERACAO DATETIME,
    PRO_DS_AUDITORIA_LOGIN TEXT,
    CD_USUARIO INT,

    FOREIGN KEY (CD_USUARIO) REFERENCES T_USUARIO(CD_USUARIO)

);

CREATE TABLE T_CURSO(
    CD_CURSO INT(11) Primary key auto_increment,
    CUR_TITULO VARCHAR(30),
    CUR_DESCRICAO TEXT,
    CUR_QT_AULA INT,
    CUR_REQUERIMENTO_01 VARCHAR(20),
    CUR_REQUERIMENTO_02 VARCHAR(20),
    CUR_REQUERIMENTO_03 VARCHAR(20),
    CUR_REQUERIMENTO_04 VARCHAR(20),
    CUR_REQUERIMENTO_05 VARCHAR(20),
    CUR_FL_CURSO_ATIVO_SN CHAR(1), 
    CUR_DT_AUDITORIA_ALTERACAO DATETIME,
    CUR_DS_AUDITORIA_LOGIN TEXT,
    CUR_BL_IMG longblob,
    CUR_NM_IMG varchar(100),

    CD_LINGUAGEM_PROGRAMACAO INT,
    CD_PROFESSOR INT,

    FOREIGN KEY (CD_LINGUAGEM_PROGRAMACAO) REFERENCES T_LINGUAGEM_PROGRAMACAO(CD_LINGUAGEM_PROGRAMACAO),
    FOREIGN KEY (CD_PROFESSOR) REFERENCES T_PROFESSOR(CD_PROFESSOR)
);

CREATE TABLE T_MATRICULA(
    CD_MATRICULA INT(11) Primary key auto_increment,
    MA_STATUS VARCHAR(3),
    MA_DT_INICIO date,
    MA_DT_TERMINO date,
    MA_FL_MATRICULA_ATIVO_SN CHAR(1), 
    MA_DT_AUDITORIA_ALTERACAO DATETIME,
    MA_DS_AUDITORIA_LOGIN TEXT,
    CD_USUARIO INT,
    CD_CURSO INT,

    FOREIGN KEY (CD_USUARIO) REFERENCES T_USUARIO(CD_USUARIO),
    FOREIGN KEY (CD_CURSO) REFERENCES T_CURSO(CD_CURSO)

);

CREATE TABLE T_CURSO_AULA(
    CD_CURSO_AULA INT(11) Primary key auto_increment,
    CURAU_TITULO VARCHAR(30),
    CURAU_DESCRICAO TEXT,
    CURAU_AULA longblob,
    CURAU_TEMPO int,
    CURAU_FL_CURSO_AULA_ATIVO_SN varchar(1), 
    CURAU_DT_AUDITORIA_ALTERACAO DATETIME,
    CURAU_DS_AUDITORIA_LOGIN TEXT,
    CURAU_BL_VIDEO longblob,
    CURAU_NM_VIDEO varchar(100),

    CD_CURSO INT,

    FOREIGN KEY (CD_CURSO) REFERENCES T_CURSO(CD_CURSO)
);