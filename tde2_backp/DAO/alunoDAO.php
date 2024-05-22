<?php 
require_once('conexao.php');
require_once(__DIR__ . 'aluno.php');

class AlunoDAO {

    public function create(Aluno $aluno) {
        $sql = 'INSERT INTO aluno (nome, cpf, matricula, nascimento, email, telefone, endereco, mensalidade, notas, tdes, media) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = Conexao::getConn()->prepare($sql);

        $stmt->bindValue(1, $aluno->getNome());
        $stmt->bindValue(2, $aluno->getCPF());
        $stmt->bindValue(3, $aluno->getMatricula());
        $stmt->bindValue(4, $aluno->getNascimento());
        $stmt->bindValue(5, $aluno->getEmail());
        $stmt->bindValue(6, $aluno->getTelefone());
        $stmt->bindValue(7, $aluno->getEndereco());
        $stmt->bindValue(8, $aluno->getMensalidade());
        $stmt->bindValue(9, $aluno->getNotas());
        $stmt->bindValue(10, $aluno->getTdes());
        $stmt->bindValue(11, $aluno->getMedia());

        $stmt->execute();
    }


    public function read(){
        $sql = 'SELECT * FROM aluno';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado;
    } else {
        return [];
    }
}

public function update(Aluno $Aluno){
    $sql = 'UPDATE aluno SET nome = ?, cpf = ?, matricula = ?, email = ?, telefone = ?, endereco = ?, mensalidade = ?, notas = ?, tdes = ?, media = ? WHERE id = ';

    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(1, $aluno->getNome());
    $stmt->bindValue(2, $aluno->getCPF());
    $stmt->bindValue(3, $aluno->getMatricula());
    $stmt->bindValue(4, $aluno->getNascimento());
    $stmt->bindValue(5, $aluno->getEmail());
    $stmt->bindValue(6, $aluno->getTelefone());
    $stmt->bindValue(7, $aluno->getEndereco());
    $stmt->bindValue(8, $aluno->getMensalidade());
    $stmt->bindValue(9, $aluno->getNotas());
    $stmt->bindValue(10, $aluno->getTdes());
    $stmt->bindValue(11, $aluno->getMedia());
    
    $stmt->execute();
    
}

public function delete(Aluno $aluno){
    $sql = 'DELETE FROM aluno WHERE id = ?';
    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(1, $aluno->getID());

    $stmt->execute();
}
}


?>