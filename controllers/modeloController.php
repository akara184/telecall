<?php

class ModeloController extends Controller{

    public function index()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('logico');
    }

    public function logico()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('logico');
    }

    public function fisico()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('fisico');
    }

    public function conceitual()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('conceitual');
    }

}


?>