<?php
class App{
    // Construtor chamado ao instanciar a classe App
    public function __construct()
    {
        $this->inicio();
    }

    public function inicio()
    {
        //Todo metodo séra index
        $metodo = 'index';
        $parametros = array();

        // Busca o que está na barra de endereço do navegador,e armazena na variável $url
        if(isset($_GET['pagina']))
        {
            $url = $_GET['pagina'];
        }
        
        // Se a variável $url não estiver vazia, a condição abaixo identica qual será o caminho que será executado
        if(!empty($url))
        {
            //transforma a url em um array, separando em controle, métodos e parâmetros
            $url = explode('/', $url);
            //guarda o controller na variável $controller
             $controller = $url[0].'Controller';

            //Identifica se tem método
            if(isset($url[1]))
            {
                $metodo = $url[1];
            }

            array_shift($url);
            

            //Identifica se tem parâmetros
            if(count($url) > 0)
            {
               $parametros = $url;
            }
            
        }
        else{
            //Se a url estiver vazia, chama a página principal
            $controller = 'homeController';
        }
        
        //Armazena o caminho que será chamado, o 'php' garante que ele será php
        $caminho = 'controllers/'.$controller. '.php';

        //Se o caminho não existir, chame o controle que informa que a página não existe
        //method_exist(classe, metodo)

        if(!file_exists($caminho) || !method_exists($controller, $metodo))
        {
            $controller = 'erroController';
            $metodo = 'index';
        }
        //Instancie o controle nas condições acima

        //Execute o controle que poderá ser a página principal ou outra página, ou ainda o controle criado para página não existente;
        //Passe o método da url, caso não seja passado método, será executado o método index;
        //E caso haja parâmetros, também será passado os parâmetros (que poderão ser dados).

        // call_user_func_array(array('myClass', 'myCallBackFunction'))
        // Detalhe que a primeiro momento eu posso usar call_user_func,
        // Mas a flexibilidade da incerteza de quantos valor irá ser dado de entrada
        // no $parametro, func_array se torna uma melhor escolha 
        call_user_func_array(array(new $controller,$metodo), $parametros);
                                // c -> classe, 
                                //metodo -> index(nome do metodo)
                                
    }
}
