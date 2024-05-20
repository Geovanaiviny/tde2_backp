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
}