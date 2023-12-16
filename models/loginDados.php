<?php
ini_set('display_errors', "1");

require 'conexao.php';

$login = '';
$senha = '';
$master = 1;
$comum = 2;

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

    $sql =  sprintf(
        "SELECT * FROM usuario 
                    WHERE login = '%s'",
        $mysqli->real_escape_string($login)
    );

    $result = $mysqli->query($sql);

    //$usuario recebe toda tabela do usuario associada ao LOGIN
    $usuario = $result->fetch_assoc();
    if (password_verify($senha, $usuario["senha"]) && $usuario["login"] == $login && $usuario["fk_id_perfil"] == $master)  {
        //Verificar se a Senha de HASH
        if (password_verify($senha, $usuario["senha"])) {
            //Se caso passar a verificação da senha
            if (!isset($_SESSION)) {
                session_start();
            }
            //Sessão agora recebe tals e tals
            $_SESSION["usuario"] = $usuario["id_usuario"];
            $_SESSION["nome"] = $usuario["nome"];
            $_SESSION["login"] = $usuario["login"];
            $_SESSION["perfil"] = $usuario["fk_id_perfil"];
            
            header("Location: ../home");
        }
    }
    if(password_verify($senha, $usuario["senha"]) && $usuario["login"] == $login && $usuario["fk_id_perfil"] == $comum){

        header("Location: ../usuario/loginDoisFA?usuario=" . urlencode($usuario["login"]));    
    
        $vasco =$usuario["login"];
    }else{
        die("USUARIO NÃO ENCONTRADO");
    }
}
