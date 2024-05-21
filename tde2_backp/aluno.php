<?php
namespace Faculdade;
require_once 'turma.php';
require_once 'curso.php';
require_once 'professor.php';

use Faculdade\turma;
use Faculdade\curso;
use Faculdade\professsor;


class Aluno {
  protected $nome;
  protected $cpf;
  protected $matricula;
  protected $nascimento;
  protected $email;
  protected $telefone;
  protected $endereco;
  protected $mensalidade;
  protected $notas = array();
  protected $tdes = array();
  protected $media = 0.0;

  public function __construct($nome, $cpf, $matricula, $mensalidade, $nascimento, $email, $telefone, $endereco) {
    $this->nome = $nome;
    $this->cpf = $cpf;
    $this->matricula = $matricula;
    $this->mensalidade = $mensalidade;
    $this->nascimento = $nascimento;
    $this->email = $email;
    $this->telefone = $telefone;
    $this->endereco = $endereco;
  }

  public function mostrarMensagem(){
    return "Nome: {$this->nome}\n" .
           "CPF: {$this->cpf}\n" .
           "Matricula: {$this->matricula}\n" .
           "Mensalidade: R$ {$this->mensalidade}\n" .
           "Nascimento: {$this->nascimento}\n" .
           "Email: {$this->email}\n" .
           "Telefone: {$this->telefone}\n" .
           "Endereço: {$this->endereco}\n" .
           "-----------------Aluno---------------\n";
  }

  public function addNota($nota){
    array_push($this->notas, $nota);
  }

  public function addTdes($tde){
    array_push($this->tdes, $tde);
  }

  public function mediaNotas(){
    return $this->notas;
  }

  public function calculaNota(){
    $mediaTdes = ($this->tdes[0] + $this->tdes[1]) / 2; 
    $mediaNotas = (($this->notas[0] * 0.4) + ($this->notas[1] * 0.4) + ($mediaTdes * 0.2));

    return $mediaNotas;
  }

  public function mostrarNota(){ 
    return "Nota 1: {$this->notas[0]}\n" .
           "Nota 2: {$this->notas[1]}\n" .
           "TDE 1: {$this->tdes[0]}\n" .
           "TDE 2: {$this->tdes[1]}\n" .
           "Média: {$this->calculaNota()}\n";
  }
}