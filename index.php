<?php 
    //RAQUETE PEGADORES DE ERROS 3.9 DOIS MILLLLL FIIONNNNNNN NAAAAHH PUFFF
    ini_set('display_errors', "1");

    // Chamadas principais
    require 'autoload.php';
    require 'models/conexao.php';
    require 'models/loginDados.php';
    require 'models/navbarModels.php';

   //QUICK REMINDER PRA MIM QUE $_SESSION sem valores retornara 0
   if(!isset($_SESSION)){
    session_start();
    }
     //Objeto app
    $app = new App();

    //Sessão de verificação, ela só fica no pé do site
?>
