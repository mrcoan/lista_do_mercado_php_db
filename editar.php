<?php

include_once('templates/header.php');

$id = $_GET['id'];

$sql = "SELECT * FROM lista_compras WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$item_encontrado = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM categorias ORDER BY nome";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container">

    <h2>Editar Item</h2>
    <hr>

    <?php if (!$item_encontrado): ?>
        <p>Item não encontrado.</p>
    <?php else: ?>
        <form action="<?= $BASE_URL ?>process/editar-item.php?id=<?= $id ?>" method="post">
            <label for="item">Item: </label>
            <input type="text" name="item" id="item" value="<?= $item_encontrado['item'] ?>" required>

            <label for="quantidade">Quantidade: </label>
            <input type="number" name="quantidade" id="quantidade" value="<?= $item_encontrado['quantidade'] ?>" required>

            <label for="categoria">Categoria: </label>
            <select name="categoria" id="categoria" required>
                <option value=""></option>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria['id'] ?>">
                        <?= ucfirst($categoria['nome']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="observacao">Observação: </label>
            <textarea name="observacao" id="observacao"><?= $item_encontrado['observacao'] ?></textarea>

            <button type="submit" class="btn btn-azul">Atualizar</button>
        </form>
    <?php endif; ?>

    <a href="<?= $BASE_URL ?>index.php" class="btn btn-preto">Voltar</a>

</div>

</body>

</html>