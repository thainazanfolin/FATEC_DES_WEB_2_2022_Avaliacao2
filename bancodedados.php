<?php

//conectando o banco 

class BancoDeDados{

    public $conn;
    public $users = array();
    public $password = array();

    function connect(){
        try {
            
            $this->conn = new PDO("mysql:host=localhost;dbname=livros", 'root', '');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo " ";
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
         }

    }

    function verificaUsuario() {
        try {
            $this->connect();
            $sql = "SELECT * FROM usuarios";
            $result = $this->conn->query($sql)->fetchAll();
            if ($result == false) {
                echo "Sem usuarios cadastrados";
            } else {
                foreach ($result as $index => $row) {
                    $this->users[$index] = $row['username'];
                    $this->password[$index] = $row['senha'];
                }
            }
        } catch (PDOException $e) {
            echo " Sem acesso ao banco ";
        };
        $this->conn = null;
    }


    function inserirLivros($nome, $autor, $editora){
        $this->connect();
        $sql = "INSERT INTO cadastrolivros (nome, autor, editora)
                VALUES ('$nome', '$autor', '$editora')";
        $this->conn->exec($sql);
        echo "New record created successfully";      
        $this->conn = null;
    }


    function mostraLivros(){
        $this->connect();
        $sql = "SELECT nome, autor, editora FROM cadastrolivros";
        $retorno = $this->conn->query($sql)->fetchAll();
       
        if($retorno == FALSE){
            echo "Sem livros cadastrados";

        } else {
            foreach($retorno as $row){
                echo "<br> - ". $row["nome"] . " | " . $row['autor'] . " | " . $row['editora']. "<br>"; 
            }

        }
       
        $this->conn=null;
    }


}

$banco = new BancoDeDados();
$banco->connect();

?>