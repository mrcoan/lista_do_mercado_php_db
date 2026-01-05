<?php

include_once('templates/header.php');

$sql = "SELECT * FROM categorias ORDER BY nome";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container">

    <h2>Adicionar Item</h2>
    <hr>

    <form action="<?= $BASE_URL ?>process/adicionar-item.php" method="post">
        <label for="item">Item: *</label>
        <input type="text" name="item" id="item" placeholder="Nome do item" required>

        <label for="quantidade">Quantidade: *</label>
        <input type="number" name="quantidade" id="quantidade" placeholder="Ex: 1" required>

        <label for="categoria">Categoria: *</label>
        <select name="categoria" id="categoria" required>
            <option value=""></option>
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?= $categoria['id'] ?>">
                    <?= ucfirst($categoria['nome']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="observacao">Observação: </label>
        <textarea name="observacao" id="observacao" placeholder="Complemento"></textarea>
        
        <small>* Informações obrigatórias</small>

        <button type="submit" class="btn btn-azul">Adicionar</button>
    </form>

    <a href="<?= $BASE_URL ?>index.php" class="btn btn-preto">Voltar</a>

</div>

</body>

</html>