<?php

namespace Faculdade;
require_once 'professor.php';



class Professor {
  protected $cadeira_pro;
  protected $sal_pro;
  protected $forma_aca;
  protected $nome;
  protected $endereco;
  protected $telefone;
  protected $cpf;

  public function __construct($cadeira_pro, $sal_pro, $forma_aca, $nome, $cpf, $endereco, $telefone) {
    $this->cadeira_pro = $cadeira_pro;
    $this->sal_pro = $sal_pro + 5000;
    $this->forma_aca = $forma_aca;
    $this->nome = $nome;
    $this->cpf = $cpf;
    $this->endereco = $endereco;
    $this->telefone = $telefone;
  }

  public function getNome(){
    return $this->nome;
  }
}