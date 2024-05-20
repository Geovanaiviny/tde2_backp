<?php

namespace Faculdade;
require_once 'professor.php';
require_once 'curso.php';
require_once 'turma.php';
require_once 'aluno.php';


use Faculdade\professor;
use Faculdade\curso;
use Faculdade\aluno;




class Turma {
  protected $id_turma;
  protected $professor;
  protected $curso;
  protected $qtddalunos = 0;

  public function __construct($id_turma, $curso) {
    $this->id_turma = $id_turma;
    $this->curso = $curso;
  }

  public function AddCurso($curso) {
    $this->curso = $curso;
  }

  public function setProfessor($professor) {
    $this->professor = $professor;
  }

  public function mostrarMensagem(){
    return "ID de Turma:  {$this->id_turma} \n" .
           "Curso: {$this->curso->getCurso()} \n" .
           "Professores: {$this->professor->getNome()}\n" .
           "Alunos: {$this->getQtddAlunos()}\n" .  
           "-----------------Turma--------------\n";
  }

  public function addAluno($qtddalunos){
    if($qtddalunos > 0){
      $this->qtddalunos += $qtddalunos;
    }
  }
  public function getQtddAlunos(){
    return $this->qtddalunos;
  }

}