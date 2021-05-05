create database tcc;

use tcc;

CREATE TABLE T_USUARIO(
    CD_USUARIO INT(11) Primary key auto_increment,
    US_LOGIN VARCHAR(20),
    US_EMAIL VARCHAR(60),
    US_SENHA VARCHAR(260),
    US_DT_NASCIMENTO date,
    US_FL_USUARIO_ATIVO_SN CHAR(1), 
    US_DT_AUDITORIA_ALTERACAO DATETIME,
    US_AUDITORIA_LOGIN TEXT
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
    PRO_LOGIN VARCHAR(20),
    PRO_EMAIL VARCHAR(60),
    PRO_SENHA VARCHAR(260),
    PRO_CPF VARCHAR(20),
    PRO_DT_NASCIMENTO date,
    PRO_FL_PROFESSOR_ATIVO_SN CHAR(1), 
    PRO_DT_AUDITORIA_ALTERACAO DATETIME,
    PRO_DS_AUDITORIA_LOGIN TEXT
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