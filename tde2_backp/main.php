<?php
require_once 'aluno.php';
require_once 'curso.php';
require_once 'professor.php';
require_once 'turma.php';


use Faculdade\aluno;
use Faculdade\curso;
use Faculdade\professor;
use Faculdade\turma;

// Instâncias
// $curso_1 = new Curso(900, "240", "Sistemas", "Noite", "Lógica Matemática", "bb15bbcf-9726-470e-afed-9e5b327e8e88");

$curso_1 = new Curso(900, 40, "Sistemas de Informação", "Noite", ["Lógica Matemática", "Algoritmos", "Programação Orientada a Objetos"], 
    "bb15bbcf-9726-470e-afed-9e5b327e8e88");
  
// $professor_t = new Professor("Sistemas", 5000, "Ciências da computação - USP", "Jhonatan Pietro", "12345678900", "Rua do pé de feijão", "(88)99955-6790");

$professor_t = new Professor(
    ["2023.1" => ["Lógica Matemática", "Redes", "Back-end"]],5000,"Ciências da computação - USP", "Jhonatan Pietro", "12345678900", "Rua do pé de feijão",
    "(88)99955-6790");

$turma_t1 = new Turma("bb15bbcf-9726-470e-afed-9e5b327e8e88", $curso_1);
$turma_t1->setProfessor($professor_t);
$turma_t1->addAluno(15);

$aluno_t = new Aluno("Nazaré Tedesco", "123.456.789-00", 4308975635, 450,  "21/02/2000", "nazare@gmail.com", "(88) 9 8128-2321", "Rua das Flores, 123");



// Exibição
echo $professor_t->mostrarMensagem();
echo $curso_1->mostrarMensagem();
echo $turma_t1->mostrarMensagem();
echo $aluno_t->mostrarMensagem();

?>
