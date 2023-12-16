<?php

//NOTE QUE O ACESSO AO BANCO DE DADOS DEPENDE DE MAQUINA E MAQUINA,
//CERTIFIQUISE SE O BANCO FUNCIONA ANTES DE RODAR



$host = "localhost";  // <--- o padrão é 'localhost' 
$user = "root";
$dataBase = "telecall"; 
$password = "";

$mysqli = new mysqli($host, $user, $password, $dataBase);
if($mysqli->connect_errno){
 echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
      




//NÃO SEI SE O AUTOLOAD VAI CARREGAR O CONEXAO. PHP POR NÃO EXISTIR UM CLASSE, 
//PORÉM PRECISA HAVER VERIFICAÇÃO SE ELE DAR UM INCLUDE EM ALGUMA PARTE AUTOMATICAMNETE
//PORÉM EU CONSEGUIR FAZER FUNCIONAR CHAMANDO O BANCO DE DADOS USANDO 'REQUIRE' NO INDEX.PHP
// ONDE O OBJETO PHP IRÁ TAMBÉM HERDAR ESSE 'REQUIRE' DO BANCO.
/* class conexao
{
  public static function getConexao()
  {
    
    $host = "localhost:3307"; // <--- o padrão é 'localhost'
    $user = "root";
    $dataBase = "telecall";
    $password = "";
    
    $mysqli = new mysqli($host, $user, $password, $dataBase);
    if ($mysqli->connect_errno) {
      echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
      echo "deu certo chefia";
    }
  }
} */

?>
