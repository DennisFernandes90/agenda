<?php
    require_once("db_config/config.php");
    require_once("models/Contatos.php");
    require_once("DAO/ContatosDAO.php");

    header('Content-Type: application/json; charset=utf-8');

    $contatoDao = new ContatosDAO($conn);

    $type = $_POST["type"];
    
    if($type == "register"){
        
        $nome = $_POST["nome"];
        $ddd = $_POST["ddd"];
        $telefone = $_POST["telefone"];

        $contato = new Contatos();

        $contato->setNome($nome);
        $contato->setDdd($ddd);
        $contato->setTelefone($telefone);

        $contatoDao->createContact($contato);

        echo json_encode(["sucesso"]);

    }else if($type == "delete"){
        $id = $_POST["id"];

        $contatoDao->deleteContact($id);
        //header("Location: index.php");
    }