<?php 
require_once('conexao.php');
require_once(__DIR__ . 'curso.php');

class AlunoDAO {

    public function create(Curso $curso) {
        $sql = 'INSERT INTO curso (mensalidade, turmas, curso, turno, gradeCurricular, id_curso) VALUES (?, ?, ?, ?, ?, ?)';
        $stmt = Conexao::getConn()->prepare($sql);

        $stmt->bindValue(1, $curso->getMensalidade());
        $stmt->bindValue(2, $curso->getTurmas());
        $stmt->bindValue(3, $curso->getCurso());
        $stmt->bindValue(4, $curso->getTurno());
        $stmt->bindValue(5, $curso->getGradeCurricular());
        $stmt->bindValue(6, $curso->getId_curso());

        $stmt->execute();
    }


    public function read(){
        $sql = 'SELECT * FROM curso';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado;
    } else {
        return [];
    }
}

public function update(Curso $curso){
    $sql = 'UPDATE curso SET mensalidade = ?, turmas = ?, curso = ?, turno = ?, gradeCurricular = ?, id_curso = ? WHERE id = ';

    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(1, $curso->getMensalidade());
    $stmt->bindValue(2, $curso->getTurmas());
    $stmt->bindValue(3, $curso->getCurso());
    $stmt->bindValue(4, $curso->getTurno());
    $stmt->bindValue(5, $curso->getGradeCurricular());
    $stmt->bindValue(6, $curso->getId_curso());
    
    $stmt->execute();
    
}

public function delete(Curso $curso){
    $sql = 'DELETE FROM curso WHERE id = ?';
    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(1, $curso->getID());

    $stmt->execute();
}
}


?>