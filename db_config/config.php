<?php

    $db_name = "agenda";
    $db_host = "localhost";
    $db_user = "postgres";
    $db_pass = "123456";
    $conn_str = "pgsql:dbname=". $db_name . ";host=";

    $conn = new PDO($conn_str . $db_host, $db_user, $db_pass);

    // Habilitar erros PDO

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);