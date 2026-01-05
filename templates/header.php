<?php

include_once('config/db.php');
include_once('config/url.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Compras</title>

    <link rel="stylesheet" href="<?= $BASE_URL ?>css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <img src="<?= $BASE_URL ?>assets/img/logo.png" alt="Lista de Compras Logo">
        <h1>Lista de Compras</h1>

        <nav id="navbar">
            <a href="<?= $BASE_URL ?>index.php"><img src="<?= $BASE_URL ?>assets/img/icon/list.png" alt="Lista do Mercado"></a>
            <a href="<?= $BASE_URL ?>adicionar.php"><img src="<?= $BASE_URL ?>assets/img/icon/add.png" alt="Adicionar Item"></a>
        </nav>

    </header>