<?php
ini_set('display_errors', "1");

require 'conexao.php';

$login = "";
$senha = "";
$novaSenha = "";
$cofirmeNovaSenha = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (strlen($_POST["login"]) <= 6 && preg_match("/^[a-zA-Z]{6}$/", $_POST["login"])) {
        $login = htmlspecialchars($_POST["login"]);
    } else {
        die("login invalido");
    }

    if (strlen($_POST["senha"]) <= 8 && preg_match('/^[a-zA-Z\sÀ-ü]+$/', $_POST['senha'])) {
        $senha = htmlspecialchars($_POST['senha']);
    } else {
        die('senha invalida');
    }
    if (strlen($_POST["novaSenha"]) <= 8 && preg_match('/^[a-zA-Z\sÀ-ü]+$/', $_POST["novaSenha"])) {
        $novaSenha = htmlspecialchars($_POST["novaSenha"]);
    } else {
        die("Nova Senha invalido");
    }
    if (strlen($_POST["cofirmeNovaSenha"]) <= 8 && preg_match('/^[a-zA-Z\sÀ-ü]+$/', $_POST['cofirmeNovaSenha'])) {
        $cofirmeNovaSenha = htmlspecialchars($_POST['cofirmeNovaSenha']);
    } else {
        echo $senha;
        echo "<br>";
        echo $novaSenha;
        echo "<br>";
        echo $cofirmeNovaSenha;
        die('confirme Nova Senha invalida');
    }

    if ($novaSenha !== $cofirmeNovaSenha) {
        die('Ambas senhas invalidas');
    }

    //Obtendo dados do usuario
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

    $sql = sprintf(
        "SELECT * FROM usuario WHERE login = '%s'",
        $mysqli->real_escape_string($login)
    );
    $result = $mysqli->query($sql);
    $usuario = $result->fetch_assoc();

    /////

    if (password_verify($senha, $usuario["senha"]) && $usuario["login"] == $login) {
        //Preparando redifinição de senha
        $sql = sprintf(
            "UPDATE usuario SET senha = '%s'  WHERE id_usuario = '%d'",
            $mysqli->real_escape_string($novaSenhaHash),
            $mysqli->real_escape_string($usuario["id_usuario"])
        );
        //REDEFININDO
        $result = $mysqli->query($sql); 
        
        //Após redefiniar a senha, ele destroy a Sessão e joga pra pagina principal
        session_start();
        session_destroy();

        header("Location: ../home");


    } else {
        die("Não existe senha do usuario");
    }



}
