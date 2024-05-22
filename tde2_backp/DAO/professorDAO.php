<?php 
require_once('conexao.php');
require_once(__DIR__ . 'professor.php');

class AlunoDAO {

    public function create(Professor $professor) {
        $sql = 'INSERT INTO curso (cadeira_pro, sal_pro, forma_aca, nome, endereco, telefone, cpf) VALUES (?, ?, ?, ?, ?, ?, ?)';
        $stmt = Conexao::getConn()->prepare($sql);

        $stmt->bindValue(1, $professor->getCadeira_pro());
        $stmt->bindValue(2, $professor->getSal_pro());
        $stmt->bindValue(3, $professor->getForma_aca());
        $stmt->bindValue(4, $professor->getNome());
        $stmt->bindValue(5, $professor->getEndereco());
        $stmt->bindValue(6, $professor->getTelefone());
        $stmt->bindValue(7, $professor->getCPF());

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

public function update(Professor $professor){
    $sql = 'UPDATE professor SET cadeira_pro = ?, sal_pro = ?, forma_aca = ?, nome = ?, endereco = ?, telefone = ?, cpf = ? WHERE id = ';

    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(1, $professor->getCadeira_pro());
    $stmt->bindValue(2, $professor->getSal_pro());
    $stmt->bindValue(3, $professor->getForma_aca());
    $stmt->bindValue(4, $professor->getNome());
    $stmt->bindValue(5, $professor->getEndereco());
    $stmt->bindValue(6, $professor->getTelefone());
    $stmt->bindValue(7, $professor->getCPF());
    
    $stmt->execute();
    
}

public function delete(Professor $professor){
    $sql = 'DELETE FROM professor WHERE id = ?';
    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(1, $professor->getID());

    $stmt->execute();
}
}


?>