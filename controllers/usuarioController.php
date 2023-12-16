<?php

class UsuarioController extends Controller{

    public function login()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('login');
    }

    public function cadastro()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('cadastro');
    }

    public function loginDoisFA()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('loginDoisFA');
    }

    public function redefinirSenha()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('redefinirSenha');
    }

}


?>