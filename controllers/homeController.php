<?php

class HomeController extends Controller{

    public function index()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('home');
    }

}


?>