<?php

    require "conexao.php";

if (isset($_POST["alterar"])){
    ini_set('display_errors', "1");

    $id = $mysqli->real_escape_string($_GET["id_new"]);

    $nome = $_POST["nome"];
    $nomeMaterno = $_POST["nomeMaterno"];
    $dataDeNascimento = $_POST["dataDeNascimento"];
    $sexo = $_POST["sexo"];
    $cpf = $_POST["cpf"];
    $cpf = preg_replace('/[.-]/', '', $cpf);
    $telefoneCelular = $_POST["telefoneCelular"];
    $telefoneCelular = preg_replace('/[-.()+]/', "", $telefoneCelular);
    $telefoneFixo = $_POST["telefoneFixo"];
    $telefoneFixo = preg_replace('/[-.()+]/', "", $telefoneFixo);
    $endereco = $_POST["endereco"];
    $cep = $_POST["cep"];
    $cep = preg_replace("/[-]/", "", $cep);
    $login = $_POST["login"];
    $perfil = $_POST["perfil"];


    
    $query = $query = "UPDATE usuario SET 
    nome = '$nome',
    nome_materno = '$nomeMaterno',
    data_nascimento = '$dataDeNascimento',
    sexo = '$sexo',
    cpf = '$cpf',
    tel_celular = '$telefoneCelular',
    tel_fixo = '$telefoneFixo',
    endereco = '$endereco',
    cep = '$cep',
    login = '$login',
    fk_id_perfil = '$perfil'
    WHERE id_usuario = '$id'";

    $result = $mysqli->query($query);

    if(!$result){
        die ("FALOU".mysqli_error($mysqli));
    }else{
        header("Location: ../crud");
    }

}
?>