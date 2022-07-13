<?php

namespace app\models;

class Crud extends Connection // aqui vamos conectar com o BD
{
    // aqui fazemos o nosso CRUD:

    // C-r-u-d
    public function create()
    {
        // vamos pegar as informações dos campos do form/cadastro
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        $conn = $this->connect(); // método connect (lá do Connection.php) armazenado na variavel $conn
        $sql = "insert into tb_person values(default,:nome,:email)"; // inserimos na variavel $sql o comando e os dados que serão inseridos lá no BD

        $stmt = $conn->prepare($sql); // statement (ou declaração). Vai preparar o BD para receber a query SQL.
        $stmt -> bindParam(':nome', $nome); // agora o método bindParam vai levar as variaveis
        $stmt -> bindParam(':email', $email);
        $stmt -> execute();

        return $stmt; // lembre-se: models retorna para controllers. Logo o return aqui será enviado para o controllers que vai chamar esta função em algum momento
    }

    // c-R-u-d
    public function read()
    {
        $conn = $this->connect(); // método connect (lá do Connection.php) armazenado na variavel $conn
        $sql = "select * from tb_person order by nome";

        $stmt = $conn -> prepare($sql);
        $stmt -> execute();

        $result = $stmt -> fetchAll(); //fetchAll traz todos os resultados

        return $result; // lembre-se: models retorna para controllers. Logo o return aqui será enviado para o controllers que vai chamar esta função em algum momento
    }

    // c-r-U-d
    public function update()
    {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

        $conn = $this->connect();
        
        $sql = "update tb_person set nome=:nome, email=:email where id=:id";
        
        $stmt = $conn->prepare($sql);
        $stmt -> bindParam(':nome', $nome);
        $stmt -> bindParam(':email', $email);
        $stmt -> bindParam(':id', $id);
        $stmt->execute();

        return $stmt;       

    }

    // c-r-u-D
    public function delete()
    {
        // descriptografar o id (base64_decode)
        $id = base64_decode(filter_input(INPUT_GET,'id',FILTER_SANITIZE_SPECIAL_CHARS));
        
        $conn = $this->connect();        
        $sql = "delete from tb_person WHERE id=:id";
        
        $stmt = $conn->prepare($sql);        
        $stmt -> bindParam(':id', $id); // define o valor
        $stmt-> execute();

        return $stmt;       
    }

    // consulta no BD para pegar os dados do id e colocá-los nos campos do form de edição
    public function editForm()
    {
        $id = base64_decode(filter_input(INPUT_GET,'id',FILTER_SANITIZE_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "select * from tb_person where id = :id";

        $stmt = $conn->prepare($sql);
        $stmt -> bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }   

}