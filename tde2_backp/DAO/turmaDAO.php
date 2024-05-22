<?php 
require_once('conexao.php');
require_once(__DIR__ . 'professor.php');

class AlunoDAO {

    public function create(Turma $turma) {
        $sql = 'INSERT INTO curso (id_turma, professor, curso, qtddalunos) VALUES (?, ?, ?, ?)';
        $stmt = Conexao::getConn()->prepare($sql);

        $stmt->bindValue(1, $turma->getId_turma());
        $stmt->bindValue(2, $turma->getProfessor());
        $stmt->bindValue(3, $turma->getCurso());
        $stmt->bindValue(4, $turma->getQtddalunos());

        $stmt->execute();
    }


    public function read(){
        $sql = 'SELECT * FROM turma';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado;
    } else {
        return [];
    }
}

public function update(Turma $turma){
    $sql = 'UPDATE professor SET id_turma = ?, professor = ?, curso = ?, qtddalunos = ? WHERE id = ';

    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(1, $turma->getId_turma());
    $stmt->bindValue(2, $turma->getProfessor());
    $stmt->bindValue(3, $turma->getCurso());
    $stmt->bindValue(4, $turma->getQtddalunos());
    
    $stmt->execute();
    
}

public function delete(Turma $turma){
    $sql = 'DELETE FROM turma WHERE id = ?';
    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(1, $turma->getID());

    $stmt->execute();
}
}


?>