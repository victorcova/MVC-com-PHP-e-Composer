<?php

namespace core;

class Router
{

    // Classe e metodo carregados inicialmente: Site e home.
    private $controller = 'Site'; // que vai armazenar o nome da classe principal
    private $method = 'home'; //que vai armazenar o nome da página que quero acessar
    private $param = []; //que vai armazenar o um parâmetro (se for necessário)

    public function __construct()
    {
        $router = $this->url();
        
        // ---------------------------------------------------------------------------------------
        // vamos verificar se a classe 'Site' (ou outra) existe.
        if (file_exists('app/controllers/' . ucfirst($router[0]) . '.php')):
            $this->controller = $router[0]; // passamos para a variavel o nome da classe
            unset($router[0]); // limpamos a variavel
        endif;            
        
        $class = "\\app\\controllers\\" . ucfirst($this->controller); // vamos instanciar a classe        
        $object = new $class; // vamos criar o objeto

        // ---------------------------------------------------------------------------------------
        // vamos verificar se o metodo chamado 'home' (ou outro) existe.
        if (isset($router[1]) and method_exists($class, $router[1])):
            $this->method = $router[1]; // passamos para a variavel o nome do metodo
            unset($router[1]); // limpamos a variavel
        endif;

        // ---------------------------------------------------------------------------------------
        // vamos determinar o parametro.
        $this->param = $router ? array_values($router) : [];

        // vamos chamar a função
        call_user_func_array([$object, $this->method], $this-> param);
            
    }

    private function url() // dados que serão passados via url
    { 
        $parse_url = explode("/",filter_input(INPUT_GET, 'router', FILTER_SANITIZE_URL)); // vamos dividir o conteúdo da url (Site/editar/49)
        return $parse_url; // retorna num array a classe[0], o método[1] e o parâmetro[2].
    }
}