<?php

class CrudController extends Controller{

    public function index()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('crud');
    }

    public function logPage()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('logPage');
    }

    public function updatePage()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('updatePage');
    }

    public function criarUsuario()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('criarUsuario');
    }

}


?>