<?php

include_once('../config/url.php');
require_once('../config/db.php');

$id = $_GET['id'];

$sql = "DELETE FROM lista_compras WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

header("Location: {$BASE_URL}index.php");
exit();