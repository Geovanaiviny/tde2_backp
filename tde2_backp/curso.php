<?php

namespace Faculdade;
require_once 'turma.php';
use Faculdade\turma;


class Curso {
  protected $mensalidade;
  protected $turmas;
  protected $curso;
  protected $turno;
  protected $cadeira;
  protected $id_curso;

  public function __construct($mensalidade, $turmas, $curso, $turno, $cadeira, $id_curso){
    $this->mensalidade = $mensalidade;
    $this->turmas = $turmas;
    $this->curso = $curso;
    $this->turno = $turno;
    $this->cadeira = $cadeira;
    $this->id_curso = $id_curso;
  }

  public function getCurso(){
    return $this->curso;
  }
  public function mostrarMensagem(){
    return "Mensalidade: R$ {$this->mensalidade} \n" .
           "Turmas: {$this->turmas} \n" .
           "Curso: {$this->curso} \n" .
           "Turno: {$this->turno} \n" .
           "Cadeiras: {$this->cadeira} \n" .
           "ID do Curso: {$this->id_curso} \n" .
           "------------Curso------------\n";
  }
}