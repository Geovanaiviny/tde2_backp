<?php 
    include("conexao.php");

    if(isset($_POST["email"]) || isset($_POST["senha"])) {
        
        if(strlen($_POST['email']) == 0) {
            echo'Preencha seu e-mail';
        } else if(strlen($_POST['senha']) == 0) {
            echo 'Preencha sua senha';
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die ("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

            $usuario = $sql_query->num_rows;

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['user'] = $usuario['id'];
            $_SESSION['name'] = $usuario ['nome'];

            header("Location: aluno.php");
        
        } else {
            echo "Falha ao logar! E-mail ou senha incorretos.";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>

    <link rel="stylesheet" href="./FRONT-END/LOGIN/login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">

</head>
<body>
    <div class="login-container">
        <h1>Entrar</h1>
        <form action="" method="POST">
            <label for="userType">Tipo de Usuário</label>
            <select id="userType" name="userType">
                <option value="student">Aluno</option>
                <option value="teacher">Professor</option>
            </select>

            <label for="email">Email</label>
            <input type="text" id="email" name="email" required>

            <label for="password">Senha</label>
            <input type="password" id="senha" name="senha" required>

            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
