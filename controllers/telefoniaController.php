<?php

class TelefoniaController extends Controller{

    public function index()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('telefonia');
    }
    
    public function pabx()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('pabx');
    }

}


?>