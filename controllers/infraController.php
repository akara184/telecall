<?php

class InfraController extends Controller{

    public function index()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('infra');
    }
    
    public function pontoAPonto()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('pontoAPonto');
    }

}


?>