<?php

require_once("db_config/config.php");
require_once("models/Contatos.php");
require_once("DAO/ContatosDAO.php");

if(isset($_POST["nome"])){
    $nome = $_POST["nome"];

    $contatoDao = new ContatosDAO($conn);

    $listaContatos = $contatoDao->searchContactName($nome);

    echo json_encode($listaContatos);
    //echo $valor;
}