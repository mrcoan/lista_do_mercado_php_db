<?php

include_once('../config/url.php');
require_once('../config/db.php');

$id = $_GET['id'];

$sql = "UPDATE lista_compras
        SET comprado = 1
        WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

header("Location: {$BASE_URL}index.php");
exit();