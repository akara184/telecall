<?php

class CpaasController extends Controller{

    public function index()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('cpaas');
    }

    public function doisFA()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('doisFA');
    }

    public function mascara()
    {
        $this->carregarViewEstrutura('mascara');
    }

    public function calls()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('calls');
    }

    public function sms()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('sms');
    }

}


?>