<?php


// Classe curso
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

$curso_1 = new Curso(900, "2023.1", "Sistemas", "Noite", "Lógica Matemática", 40, "bb15bbcf-9726-470e-afed-9e5b327e8e88" );

echo $curso_1->mostrarMsgCurso();





// Classse Turma
class Turma extends Curso {
  protected $id_turma;
  protected $professor;
  
  public function __construct($id_turma, $alunos, $cadeira, $professor, $turno) {
    $this->id_turma = $id_turma;
    parent::__construct(null, null, null, $turno, $cadeira, $alunos, null);
    
  }
  public function mudarProfessor($professor){
    $this->professor = $professor;
  }
  public function mostrarMsg(){
    $str = "";
    $str .= "ID de Turma:  {$this->id_turma} \n";
    $str .= "Alunos: {$this->alunos} \n";
    $str .= "Turno: {$this->turno} \n";
    $str .= "Professores: {$this->professor->getNome()}\n";
    $str .= "Cadeira: {$this->cadeira} \n";
    $str .= "-----------------Turma--------------\n";
    return $str;
      
  }

}




// Classse Professor
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
    $str .= "Salário: R$ {$this->sal_pro} \n";
    $str .= "Formação Acadêmica: {$this->forma_aca} \n";
    $str .= "Nome: {$this->nome} \n";
    $str .= "CPF: {$this->cpf} \n";
    $str .= "Endereço: {$this->endereco} \n";
    $str .= "Telefone: {$this->telefone} \n";
    $str .= "-----------------Professor--------------\n";
    return $str;
    
  }
 public function getNome(){
   return $this->nome;
 }

  public function setNome($nome){
     $this->nome = $nome;
   }
}

// Echo Professor
$professor_t = new Professor("Sistemas", 5000, "Ciências da computação - USP", "Jhonatan Pietro", "12345678900", "Rua do pé de feijão", "(88)99955-6790");

echo $professor_t->mostrarMsgProfessor();

// Echo Turma
$turma_t1 = new Turma("bb15bbcf-9726-470e-afed-9e5b327e8e88", 40, "Lógica Matemática", "2023.1", "Noite");
$turma_t1->mudarProfessor($professor_t);

echo $turma_t1->mostrarMsg();




// Classse Aluno
class Aluno extends Curso {
  protected $nome;
  protected $cpf;
  protected $matricula;
  protected $nascimento;
  protected $email;
  protected $telefone;
  protected $endereco;
  protected $notas = array();
  protected $tdes = array();
  protected $media = 0.0;
  
  public function __construct($nome, $cpf, $matricula, $mensalidade, $nascimento, $email, $telefone, $endereco, $turno, $cadeira) {
    parent::__construct($mensalidade, null, null, $turno, null, $cadeira, null, null);

    $this->nome = $nome;
    $this->cpf = $cpf;
    $this->matricula = $matricula;
    $this->mensalidade = $mensalidade;
    $this->nascimento = $nascimento;
    $this->email = $email;
    $this->telefone = $telefone;
    $this->endereco = $endereco;
    $this->turno = $turno;
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

  public function dadosInfo(){
    $str = "";
    $str .= "Nome: {$this->nome}\n";
    $str .= "CPF: {$this->cpf}\n";
    $str .= "Matricula: {$this->matricula}\n";
    $str .= "Mensalidade: R$ {$this->mensalidade}\n";
    $str .= "Nascimento: {$this->nascimento}\n";
    $str .= "Email: {$this->email}\n";
    $str .= "Telefone: {$this->telefone}\n";
    $str .= "Endereço: {$this->endereco}\n";
    $str .= "Turno: {$this->turno}\n";
    $str .= "Cadeira: {$this->cadeira}\n";
    $str .= "-----------------Aluno---------------\n";
    return $str;
    
    
  }

  
}


// Echo Aluno
$aluno_t = new Aluno("Nazaré Tedesco", "123.456.789-00", 4308975635, 450,  "21/02/2000", "nazare@gmail.com", "(88) 9 8128-2321", "Rua das Flores, 123", "Noite", "Lógica Matemática");

echo $aluno_t->dadosInfo();


// Echo Aluno nota
$aluno_t->addNota(8);
$aluno_t->addNota(10);
$aluno_t->addTdes(10);
$aluno_t->addTdes(10);
echo $aluno_t->mostrarMsg();


?>
