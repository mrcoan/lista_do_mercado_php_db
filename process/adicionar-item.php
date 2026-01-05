<?php

include_once('../config/url.php');
require_once('../config/db.php');

$item = $_POST['item'];
$quantidade = $_POST['quantidade'];
$categoria = $_POST['categoria'];
$observacao = $_POST['observacao'] ?? '';

$sql = "INSERT INTO lista_compras (item, quantidade, categoria, observacao)
        VALUES (:item, :quantidade, :categoria, :observacao)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':item', $item);
$stmt->bindParam(':quantidade', $quantidade);
$stmt->bindParam(':categoria', $categoria);
$stmt->bindParam(':observacao', $observacao);
$stmt->execute();

header("Location: {$BASE_URL}index.php");
exit();