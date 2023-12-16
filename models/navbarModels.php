<?php
session_start();

if(isset($_SESSION)){
    //Se Session não tiver usuario
    if(array_sum($_SESSION) == 0){
        include_once 'assets/includes/nav.php';
    }
    //Se a Session tiver usuario
    if(array_sum($_SESSION) && $_SESSION['perfil'] == "2"){
        include_once 'assets/includes/navUsuarioComum.php';
    }
    //Se a session for o login MESTRE do banco de dados
    if(array_sum($_SESSION) > 0 && $_SESSION['perfil'] == "1"){
        include_once 'assets/includes/navUsuarioMaster.php';
    }
}

?>