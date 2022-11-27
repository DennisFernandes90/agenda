<?php

require_once("db_config/config.php");
require_once("models/Contatos.php");
require_once("DAO/ContatosDAO.php");

if(isset($_POST["input"])){
    $input = $_POST["input"];

    $contatoDao = new ContatosDAO($conn);

    $listaContatos = $contatoDao->searchContact($input);

    echo json_encode($listaContatos);
    //echo $valor;
}