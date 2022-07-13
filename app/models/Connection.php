<?php

namespace app\models;

abstract class Connection // classe abstrata - para que esta classe não seja instanciada em lugar nenhum (SEGURANÇA)
{
    // vamos criar 3 atributos para conexão com o DB
    private $dbname = "mysql:host=localhost;dbname=cursomvc";
    private $user = "root";
    private $pass = "";

    protected function connect() // método protegido
    {
        try {
            $conn = new \PDO($this->dbname, $this->user, $this->pass); // instanciei uma classe dentro de outra (Relacionamento de Composição entre Classes)
            $conn -> exec("set names utf8");
            return $conn;
        } catch (\PDOException $erro) {
            echo $erro -> getMessage();
        }
    }
}