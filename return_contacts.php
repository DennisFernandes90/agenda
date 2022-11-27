<?php
    require_once("db_config/config.php");
    require_once("models/Contatos.php");
    require_once("DAO/ContatosDAO.php");

    $contatoDao = new ContatosDAO($conn);

    $listaContatos = $contatoDao->getAllContacts();

    echo json_encode($listaContatos);
