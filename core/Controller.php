<?php
// Todas as classes de controle, herdarão dessa classe
class Controller{
    public function carregarViewEstrutura($nomeView)
    {
        require 'views/'.$nomeView.'.php';
    }

}
?>