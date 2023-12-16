<?php

class MobilidadeController extends Controller{

    public function index()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('mobilidade');
    }

    public function celularEmp()
    {
        // Carrega a estrutura básica do site, passando a view
        $this->carregarViewEstrutura('celularEmp');
    }

}


?>