<?php

namespace Faculdade;
require_once 'professor.php';



// class Professor {
//   protected $cadeira_pro;
//   protected $sal_pro;
//   protected $forma_aca;
//   protected $nome;
//   protected $endereco;
//   protected $telefone;
//   protected $cpf;

//   public function __construct($cadeira_pro, $sal_pro, $forma_aca, $nome, $cpf, $endereco, $telefone) {
//     $this->cadeira_pro = $cadeira_pro;
//     $this->sal_pro = $sal_pro + 5000;
//     $this->forma_aca = $forma_aca;
//     $this->nome = $nome;
//     $this->cpf = $cpf;
//     $this->endereco = $endereco;
//     $this->telefone = $telefone;
//   }

//   public function getNome(){
//     return $this->nome;
//   }
// }


namespace Faculdade;

class Professor {
  protected $cadeira_pro = [];
  protected $sal_pro;
  protected $forma_aca;
  protected $nome;
  protected $endereco;
  protected $telefone;
  protected $cpf;

  public function __construct($cadeiras_por_turma, $sal_pro, $forma_aca, $nome, $cpf, $endereco, $telefone) {
    $this->sal_pro = $sal_pro + 5000;
    $this->forma_aca = $forma_aca;
    $this->nome = $nome;
    $this->cpf = $cpf;
    $this->endereco = $endereco;
    $this->telefone = $telefone;
    $this->cadeira_pro = $cadeiras_por_turma;}

  //   foreach ($cadeiras_por_turma as $turma => $cadeiras) {
  //     $this->cadeira_pro[$turma] = $cadeiras;
  //   }
  // }

  public function getNome(){
    return $this->nome;
  }

  public function getCadeirasPorTurma() {
    return $this->cadeira_pro;
  }

  public function mostrarMensagem(){
    $mensagem = "Nome do Professor: {$this->nome} \n" .
                "Salário: R$ {$this->sal_pro} \n" .
                "Formação Acadêmica: {$this->forma_aca} \n" .
                "CPF: {$this->cpf} \n" .
                "Endereço: {$this->endereco} \n" .
                "Telefone: {$this->telefone} \n";

    foreach ($this->cadeira_pro as $turma => $cadeiras) {
      $mensagem .= "Turma: $turma\n";
      $mensagem .= "Cadeiras: " . implode(", ", $cadeiras) . "\n";
    }

    $mensagem .= "-----------------Professor--------------\n";

    return $mensagem;
}

}




