<?php

include_once('../config/url.php');
require_once('../config/db.php');

$id = $_GET['id'];
$item = $_POST['item'];
$quantidade = $_POST['quantidade'];
$categoria = $_POST['categoria'];
$observacao = $_POST['observacao'] ?? '';

$sql = "UPDATE lista_compras
        SET item = :item, quantidade = :quantidade, categoria = :categoria, observacao = :observacao
        WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':item', $item);
$stmt->bindParam(':quantidade', $quantidade);
$stmt->bindParam(':categoria', $categoria);
$stmt->bindParam(':observacao', $observacao);
$stmt->execute();

header("Location: {$BASE_URL}index.php");
exit();