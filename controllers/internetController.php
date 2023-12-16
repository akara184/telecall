<?php

class InternetController extends Controller{

    public function index()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('internet');
    }
    
    public function internetDedicada()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('internetDedicada');
    }

}


?>