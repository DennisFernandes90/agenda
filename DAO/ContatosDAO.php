<?php

    require_once("models/Contatos.php");

    class ContatosDAO implements ContatosDAOInterface{

        private $conn;

        public function __construct($conn){
            $this->conn = $conn;
        }

        //recupera todos os contatos do banco de dados
        public function getAllContacts(){
            $rows = [];

            $stmt = $this->conn->prepare("SELECT * FROM contatos");

            $stmt->execute();

            if($stmt->rowCount() > 0){

                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach($data as $row){
                    array_push($rows, $row);
                }

                return $rows;
            }else{
                return false;
            }
        }
    }