<?php
ini_set('display_errors', "1");

require 'conexao.php';



$nome = "";
$nomeMaterno = "";
$dataDeNascimento = "";
$sexo = "";
$cpf = "";
$telefoneCelular = "";
$telefoneFixo = "";
$endereco = "";
$cep = "";
$login = "";
$senha = "";
$confirmeSenha = "";

//VERIFICANDO OS INPUTS
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Verifica se o Nome tem as caracteristicas padrão
    if (strlen($_POST['nome']) >= 15 && strlen($_POST['nome']) <= 60 && preg_match('/^[a-zA-Z\sÀ-ü]+$/', $_POST['nome'])) {
        echo $nome;
        //Filtra usando htmlspecialchars
        $nome = htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8');
        //Converte para aceitar caracteres latinos
        $nome = mb_convert_encoding($nome, 'ISO-8859-1', 'UTF-8');
    } else {
        die("Nome incorreto!");
    }
    if (strlen($_POST["nomeMaterno"]) > 0) {
        $nomeMaterno = htmlspecialchars($_POST['nomeMaterno'], ENT_QUOTES, 'UTF-8');
        $nomeMaterno = mb_convert_encoding($nomeMaterno, 'ISO-8859-1', 'UTF-8');
    } else {
        die("Nome materno incorreto");
    }
    //Não encontrei um jeito suficiente para Sanitizar o data de nascimento 
    if (strlen($_POST["dataDeNascimento"]) > 0) {
        $dataDeNascimento = htmlspecialchars($_POST["dataDeNascimento"]);
    } else {
        die("Data de nascimento invalido");
    }
    if ($_POST["sexo"] != "Selecione") {
        $sexo = htmlspecialchars($_POST["sexo"]);
    } else {
        die("Sexo invalido");
    }
    if (strlen($_POST["cpf"]) <= 14 && preg_match('/^\d{3}\.\d{3}\.\d{3}-\d{2}$/', $_POST["cpf"])) {
        $cpf = htmlspecialchars($_POST["cpf"]);
        //tira todos os . e - 
        $cpf = preg_replace('/[.-]/', '', $cpf);
    } else {
        die("CPF invalido");
    }
    if (strlen($_POST["telefoneCelular"]) <= 17 && preg_match('/^\(\+55\)\d{2}-\d{9}/', $_POST['telefoneCelular'])) {
        $telefoneCelular = htmlspecialchars($_POST['telefoneCelular']);
        $telefoneCelular = preg_replace('/[-.()+]/', "", $telefoneCelular);
    } else {
        die("Telefone Celular inválido");
    }
    if (strlen($_POST["telefoneFixo"]) <= 16 && preg_match('/^\(\+55\)\d{2}-\d{8}/', $_POST['telefoneFixo'])) {
        $telefoneFixo = htmlspecialchars($_POST['telefoneFixo']);
        $telefoneFixo = preg_replace('/[-.()+]/', "", $telefoneFixo);
    } else {
        die("Telefone fixo inválido");
    }
    if (strlen($_POST['endereco']) > 0) {
        $endereco = htmlspecialchars($_POST['endereco'], ENT_QUOTES, 'UTF-8');
        $endereco = mb_convert_encoding($endereco, 'ISO-8859-1', 'UTF-8');
    } else {
        die("endereco incorreto!");
    }
    if (strlen($_POST["cep"]) <= 9 && preg_match('/^\d{5}-\d{3}$/', $_POST["cep"])) {
        $cep = htmlspecialchars($_POST["cep"]);
        $cep = preg_replace("/[-]/", "", $cep);
    } else {
        die("cep invalido");
    }
    if (strlen($_POST["login"]) <= 6 && preg_match("/^[a-zA-Z]{6}$/", $_POST["login"])) {
        $login = htmlspecialchars($_POST["login"]);
    } else {
        die("login invalido");
    }
    //Senha

    if (strlen($_POST["senha"]) <= 8 && preg_match('/^[a-zA-Z\sÀ-ü]+$/', $_POST['senha'])) {
        $senha = htmlspecialchars($_POST['senha']);
    } else {
        die('senha invalida');
    }

    if (strlen($_POST["confirmeSenha"]) <= 8 && preg_match('/^[a-zA-Z\sÀ-ü]+$/', $_POST['confirmeSenha'])) {
        $confirmeSenha = htmlspecialchars($_POST['confirmeSenha']);
    } else {
        die('confirmeSenha invalida');
    }
    if ($senha !== $confirmeSenha) {
        die('Ambas senhas invalidas');
    }

    //TIPOS DE PERFILS DISPONÍVEL   
    $master = 1;
    $comum = 2;

    //TRANSFORMANDO A SENHA EM HASH
    $password_hash = password_hash($senha, PASSWORD_DEFAULT);

    //https://www.php.net/manual/pt_BR/mysqli.quickstart.prepared-statements.php
    $sql = "INSERT INTO usuario (nome, 
                                 nome_materno, 
                                 data_nascimento, 
                                 sexo, 
                                 cpf, 
                                 tel_celular, 
                                 tel_fixo, 
                                 endereco, 
                                 login, 
                                 senha, 
                                 cep, 
                                 fk_id_perfil) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";


    $stmt = $mysqli->stmt_init();


    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param(
        "ssssssssssss",
        $nome,
        $nomeMaterno,
        $dataDeNascimento,
        $sexo,
        $cpf,
        $telefoneCelular,
        $telefoneFixo,
        $endereco,
        $login,
        $password_hash,
        $cep,
        $comum
    );

    if ($stmt->execute()) {
        echo "Cadastro com sucesso";
        header("Location: ../usuario/login");
    } else {
        die("login invalido ou CPF duplicado");
    }
}
