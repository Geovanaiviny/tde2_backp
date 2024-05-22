CREATE DATABASE faculdade;
USE faculdade;

CREATE TABLE aluno (
  id INTEGER PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  cpf VARCHAR(11) NOT NULL,
  matricula VARCHAR(10) NOT NULL,
  nascimento DATE NOT NULL,
  email VARCHAR(50) NOT NULL,
  telefone VARCHAR(20) NOT NULL,
  endereco VARCHAR(200) NOT NULL, 
  curso_id INTEGER NOT NULL,
  media DECIMAL (3,1) NOT NULL,
  FOREIGN KEY curso_id REFERENCES curso(id)
)

CREATE TABLE curso (
  id INTEGER PRIMARY KEY,
  nome_curso VARCHAR(100) NOT NULL,
  mensalidade DECIMAL(5,2) NOT NULL,
  turno VARCHAR(10) NOT NULL,
  grade_curricular VARCHAR(200) NOT NULL,
  quantidade_turma INTEGER NOT NULL
)

CREATE TABLE turma (
  id INTEGER PRIMARY KEY,
  professor_id INTEGER NOT NULL,
  curso_id INTEGER NOT NULL,
  qtddalunos INTEGER NOT NULL,
  FOREIGN KEY (curso_id) REFERENCES curso(id),
  FOREIGN KEY (professor_id) REFERENCES professor(id)
)

CREATE TABLE professor (
  id INTEGER NOT NULL,
  nome VARCHAR(100) NOT NULL,
  cpf  VARCHAR(11) NOT NULL,
  telefone VARCHAR(20) NOT NULL,
  endereco VARCHAR(100) NOT NULL,
  forma_aca VARCHAR(100) NOT NULL,
  sal_pro DECIMAL(6,2) NOT NULL
)

CREATE TABLE notas (
  id INTEGER PRIMARY KEY,  
  aluno_id INTEGER NOT NULL,
  disciplina_id INTEGER NOT NULL,
  turma_id INTEGER NOT NULL,
  tde1 NUMERIC(3, 1),
  tde2 NUMERIC(3, 1),
  tde3 NUMERIC(3, 1),
  tde4 NUMERIC(3, 1),
  avp1 NUMERIC(3, 1),
  avp2 NUMERIC(3, 1),
  media NUMERIC(3,1),
  FOREIGN KEY (aluno_id) REFERENCES aluno(id),
  FOREIGN KEY (disciplina_id) REFERENCES disciplina(id),
  FOREIGN KEY (turma_id) REFERENCES turma(id)
);

CREATE TABLE disciplina (
  id INTEGER PRIMARY KEY,
  nome_disciplina VARCHAR(100) NOT NULL
)

CREATE TABLE professor_disciplina (
  professor_id INTEGER NOT NULL,
  disciplina_id INTEGER NOT NULL,
  PRIMARY KEY (professor_id, disciplina_id),
  FOREIGN KEY (professor_id) REFERENCES professor(id),
  FOREIGN KEY (disciplina_id) REFERENCES disciplina(id)  
);