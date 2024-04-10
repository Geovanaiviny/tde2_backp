<?php

// Classse curso
class Curso {
  protected $mensalidade;
  protected $turmas;
  protected $curso;
  protected $turno;
  protected $cadeira;
  protected $alunos;
  protected $id_curso;

  public function __construct($mensalidade, $turmas, $curso, $turno, $cadeira, $alunos, $id_curso){
    $this->mensalidade = $mensalidade;
    $this->turmas = $turmas;
    $this->curso = $curso;
    $this->turno = $turno;
    $this->cadeira = $cadeira;
    $this->alunos = $alunos;
    $this->id_curso = $id_curso;
  }

  public function mostrarMsgCurso(){
    $str = "";
    $str .= "Mensalidade: R$ {$this->mensalidade} \n";
    $str .= "Turmas: {$this->turmas} \n";
    $str .= "Curso: {$this->curso} \n";
    $str .= "Turno: {$this->turno} \n";
    $str .= "Cadeiras: {$this->cadeira} \n";
    $str .= "Alunos: {$this->alunos} \n";
    $str .= "ID do Curso: {$this->id_curso} \n";
    $str .= "------------Curso------------\n";
    return $str;
  }
}

$curso_1 = new Curso(900, "1", "Sistemas", "Noite", "Jhonatan Pietro", "Lógica de Programação e Projeto Integrador", 40, "bb15bbcf-9726-470e-afed-9e5b327e8e88" );

echo $curso_1->mostrarMsgCurso();





// Classse Turma
class Turma extends Curso {
  public $id_turma;
  public $professor;
  public function __construct($id_turma, $alunos, $cadeira, $professor, $turno) {
    $this->id_turma = $id_turma;
    parent::__construct(null, null, null, $turno, $cadeira, $alunos, null);
    
  }
  public function addProfessor($professor){
    $this->professor = $professor;
  }
  public function mostrarMsg(){
    $str = "";
    $str .= "ID de Turma:  {$this->id_turma} \n";
    $str .= "Alunos: {$this->alunos} \n";
    $str .= "Turno: {$this->turno} \n";
    $str .= "Professores: {$this->professor->nome}\n";
    $str .= "Cadeira: {$this->cadeira} \n";
    $str .= "-----------------Turma--------------\n";
    return $str;
      
  }

}




// Classse Professor
class Professor {

  public $cadeira_pro;
  public $sal_pro;
  public $forma_aca;
  public $nome;
  public $endereco;
  public $telefone;
  public $cpf;

  public function __construct($cadeira_pro, $sal_pro, $forma_aca, $nome, $cpf, $endereco, $telefone) {

    $this->cadeira_pro = $cadeira_pro;
    $this->sal_pro = $sal_pro + 2000 + 3000;
    $this->forma_aca = $forma_aca;
    $this->nome = $nome;
    $this->cpf = $cpf;
    $this->endereco = $endereco;
    $this->telefone = $telefone;
  }

  public function mostrarMsgProfessor(){
    $str = "";
    $str .= "Cadeira: {$this->cadeira_pro} \n";
    $str .= "Salário: {$this->sal_pro} \n";
    $str .= "Formação Acadêmica: {$this->forma_aca} \n";
    $str .= "Nome: {$this->nome} \n";
    $str .= "CPF: {$this->cpf} \n";
    $str .= "Endereço: {$this->endereco} \n";
    $str .= "Telefone: {$this->telefone} \n";
    $str .= "-----------------Professor--------------\n";
    return $str;
    
  }

}

// Echo Professor
$professor_t = new Professor("Português", 5000, "Ciências da computação - USP", "Jhonatan Pietro", "12345678900", "Rua do pé de feijão", "(88)99955-6790");

echo $professor_t->mostrarMsgProfessor();

// Echo Turma
$turma_t1 = new Turma("bb15bbcf-9726-470e-afed-9e5b327e8e88", 40, "Lógica Matemática", "Noite", 5000, "2023.1", "Matemática");
$turma_t1->addProfessor($professor_t);

echo $turma_t1->mostrarMsg();




// Classse Aluno
class Aluno extends Curso {
  public $nome;
  public $cpf;
  public $matricula;
  public $nascimento;
  public $email;
  public $telefone;
  public $notas = array();
  public $tdes = array();
  public $media = 0.0;
  
  public function __construct($nome, $cpf, $matricula, $mensalidade, $nascimento, $email, $telefone, $turno, $endereco, $cadeira) {
    parent::__construct($mensalidade, null, null, $turno, null, $cadeira, null, null);

    $this->nome = $nome;
    $this->cpf = $cpf;
    $this->matricula = $matricula;
    $this->mensalidade = $mensalidade;
    $this->nascimento = $nascimento;
    $this->email = $email;
    $this->telefone = $telefone;
    $this->turno = $turno;
    $this->endereco = $endereco;
    $this->cadeira = $cadeira;

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

  public function mostrarMsg(){
          $str = "";
          $str .= "Nota 1: {$this->notas[0]}\n";
          $str .= "Nota 2: {$this->notas[1]}\n";
          $str .= "TDE 1: {$this->tdes[0]}\n";
          $str .= "TDE 2: {$this->tdes[1]}\n";
          $str .= "Média: {$this->calculaNota()}\n";
          return $str;
  }

  public function toString(){
    $str = "";
    $str .= "Nome: {$this->nome}\n";
    $str .= "CPF: {$this->cpf}\n";
    $str .= "Matricula: {$this->matricula}\n";
    $str .= "Mensalidade: {$this->mensalidade}\n";
    $str .= "Nascimento: {$this->nascimento}\n";
    $str .= "Email: {$this->email}\n";
    $str .= "Telefone: {$this->telefone}\n";
    $str .= "Turno: {$this->turno}\n";
    $str .= "Endereço: {$this->endereco}\n";
    $str .= "Cadeira: {$this->cadeira}\n";
    $str .= "-----------------aLUNO---------------\n";
    return $str;
    
    
  }

  
}


// Echo Aluno
$aluno_t = new Aluno("João Silva", "123.456.789-00", "20231130043", 430,00, "21/02/2000","joao@gmail.com","(88) 9 8128-2321", "Noite", "Rua das Flores, 123", "Cadeira01");

echo $aluno_t->toString();


// Echo Aluno nota
$aluno_t->addNota(8);
$aluno_t->addNota(10);
$aluno_t->addTdes(10);
$aluno_t->addTdes(10);
echo $aluno_t->mostrarMsg();


?>
