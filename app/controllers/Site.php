<?php

namespace app\controllers;

use app\models\Crud;

class Site extends Crud // aqui vamos estender nossos métodos da classe Crud (lá de models/Crud.php)
{
    public function home()
    {
        require_once __DIR__ . '/../views/home.php';
    
    }
   
    public function cadastro() 
    {        
        $cadastro = $this->create();
        require_once __DIR__ . '/../views/cadastro.php';
    }
    
    public function consulta()
    {
        $consulta = $this->read();
        require_once __DIR__ . '/../views/consulta.php';
    }
    
    public function editar() // método para apenas digitar novos valores no formulário
    {        
        $editarForm = $this->editForm();
        require_once __DIR__ . '/../views/editar.php';
    }
    
    public function alterar() // método para executar realmente o update / não exibe uma página - apenas redirecionamos
    {        
        $alterar = $this->update();
        header("Location:?router=Site/consulta");
    }

    public function confirmaDelete() // método para confirmar se o user quer mesmo deletar o registro (apenas a tela)
    {        
        $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_SPECIAL_CHARS);
        require_once __DIR__ . '/../views/confirmaDelete.php';
    }

    public function deletar() // método para executar realmente o delete / não exibe uma página - apenas redirecionamos
    {        
        $deletar = $this->delete();
        header("Location:?router=Site/consulta");
    }



}