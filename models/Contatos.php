<?php

    class Contatos{

        private $id;
        private $nome;
        private $ddd;
        private $telefone;

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setDdd($ddd){
            $this->ddd = $ddd;
        }

        public function getDdd(){
            return $this->ddd;
        }

        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }

        public function getTelefone(){
            return $this->telefone;
        }
    }

    interface ContatosDAOInterface{

        public function buildData($data);
        public function getAllContacts();
        public function createContact(Contatos $contact);
        public function deleteContact($id);
    }