<?php

include_once 'Conectar.php';
include_once 'Controles.php';

class Passageiro {

    private $id;
    private $nome;
    private $email;
    private $con;

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function listar($id) {
        try {
            $this->con = new Conectar();
            $sql = "CALL listar_passageiro (?)";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $id);
            return $executar->execute() == 1 ? $executar->fetchAll() : false;
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    public function crud($opcao) {
        try {
            $this->con = new Conectar();
            $sql = "CALL crud_passageiro(?, ?, ?, ?)";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $this->id);
            $executar->bindValue(2, $this->nome);
            $executar->bindValue(3, $this->email);
            $executar->bindValue(4, $opcao);
            return $executar->execute() == 1 ? "Procedimento ok" : "Erro";
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    public function inserir() {
        try {
            $this->con = new Conectar();
            $sql = "INSERT INTO passageiro VALUES(NULL, ?, ?)";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $this->nome);
            $executar->bindValue(2, $this->email);
            return $executar->execute() == 1 ? "Inserir ok" : "Erro";
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    //fim do crud

}

//fim da class
?>
