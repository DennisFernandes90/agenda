<?php

    require_once("models/Contatos.php");

    class ContatosDAO implements ContatosDAOInterface{

        private $conn;

        public function __construct($conn){
            $this->conn = $conn;
        }

        //instancia um objeto com base em dados de um vetor
        public function buildData($data){

            $contato = new Contato();

            $contato->setId($data["id"]);
            $contato->setNome($data["nome"]);
            $contato->setDdd($data["ddd"]);
            $contato->setTelefone($data["telefone"]);

            return $contato;

        }

        //recupera todos os contatos do banco de dados
        public function getAllContacts(){
            $rows = [];

            $stmt = $this->conn->prepare("SELECT * FROM contatos ORDER BY id DESC");

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

        //grava um contato no banco de dados a partir de um objeto do tipo Contatos
        public function createContact(Contatos $contact){

            $nome = $contact->getNome();
            $ddd = $contact->getDdd();
            $telefone = $contact->getTelefone();

            $stmt = $this->conn->prepare("INSERT INTO contatos (nome, ddd, telefone) VALUES (:nome, :ddd, :telefone)");

            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":ddd", $ddd);
            $stmt->bindParam(":telefone", $telefone);

            $stmt->execute();
            
        }

        //deleta um registro do banco de dados a partir de um id
        public function deleteContact($id){

            $stmt = $this->conn->prepare("DELETE FROM contatos WHERE id = :id");

            $stmt->bindParam(":id", $id);

            $stmt->execute();

        }
    }