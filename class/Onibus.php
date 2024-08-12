<?php

include_once 'Conectar.php';
include_once 'Controles.php';

class Onibus {

    private $id;
    private $placa;
    private $modelo;
    private $con;

    public function getId() {
        return $this->id;
    }

    public function getPlaca() {
        return $this->placa;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setPlaca($placa): void {
        $this->placa = $placa;
    }

    public function setModelo($modelo): void {
        $this->modelo = $modelo;
    }

    public function listar($id) {
        try {
            $this->con = new Conectar();
            $sql = "CALL listar_onibus (?)";
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
            $sql = "CALL crud_onibus(?, ?, ?, ?)";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $this->id);
            $executar->bindValue(2, $this->placa);
            $executar->bindValue(3, $this->modelo);
            $executar->bindValue(4, $opcao);
            return $executar->execute() == 1 ? "Procedimento ok" : "Erro";
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    public function inserir() {
        try {
            $this->con = new Conectar();
            $sql = "INSERT INTO onibus VALUES(NULL, ?, ?)";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $this->placa);
            $executar->bindValue(2, $this->modelo);
            return $executar->execute() == 1 ? "Inserir ok" : "Erro";
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    //fim do crud

}

//fim da class
?>
