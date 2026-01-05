<?php

include_once('templates/header.php');

$sql = "SELECT
            lista_compras.id,
            lista_compras.item,
            lista_compras.quantidade,
            lista_compras.observacao,
            lista_compras.comprado,
            categorias.nome AS categoria
        FROM lista_compras
        INNER JOIN categorias
            ON lista_compras.categoria = categorias.id
        WHERE lista_compras.comprado = 0
        ORDER BY categoria ASC, lista_compras.item ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$itens_pendentes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT
            lista_compras.id,
            lista_compras.item,
            lista_compras.quantidade,
            lista_compras.observacao,
            lista_compras.comprado,
            categorias.nome AS categoria
        FROM lista_compras
        INNER JOIN categorias
            ON lista_compras.categoria = categorias.id
        WHERE lista_compras.comprado = 1
        ORDER BY categoria ASC, lista_compras.item ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$itens_comprados = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container">

    <section>

        <h2>Itens Pendentes</h2>
        <hr>

        <?php if (!$itens_pendentes): ?>
            <p>Não há itens pendentes.</p>
        <?php else: ?>
            <div class="cards">
                <?php foreach ($itens_pendentes as $item): ?>
                    <article class="card-item">
                        <h3><?= $item['item'] ?></h3>
                        <hr>
                        <small><strong>Quantidade: </strong><?= $item['quantidade'] ?></small>
                        <small><strong>Obs: </strong><?= $item['observacao'] ?></small>
                        <small><strong>Categoria: </strong><?= ucfirst($item['categoria']) ?></small>

                        <div class="acoes">
                            <a href="<?= $BASE_URL ?>process/comprar-item.php?id=<?= $item['id'] ?>">
                                <img src="<?= $BASE_URL ?>assets/img/icon/check.png" alt="Comprado">
                            </a>
                            <a href="<?= $BASE_URL ?>editar.php?id=<?= $item['id'] ?>">
                                <img src="<?= $BASE_URL ?>assets/img/icon/edit.png" alt="Editar">
                            </a>
                            <a href="<?= $BASE_URL ?>process/excluir-item.php?id=<?= $item['id'] ?>">
                                <img src="<?= $BASE_URL ?>assets/img/icon/close.png" alt="Apagar">
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </section>

    <section>

        <h2>Itens Comprados</h2>
        <hr>

        <?php if (!$itens_comprados): ?>
            <p>Não há itens comprados.</p>
        <?php else: ?>
            <div class="cards">
                <?php foreach ($itens_comprados as $item): ?>
                    <article class="card-item">
                        <h3><?= $item['item'] ?></h3>
                        <hr>
                        <small><strong>Quantidade: </strong><?= $item['quantidade'] ?></small>
                        <small><strong>Obs: </strong><?= $item['observacao'] ?></small>
                        <small><strong>Categoria: </strong><?= ucfirst($item['categoria']) ?></small>

                        <div class="acoes">
                            <a href="<?= $BASE_URL ?>process/voltar-item.php?id=<?= $item['id'] ?>">
                                <img src="<?= $BASE_URL ?>assets/img/icon/undo.png" alt="Remover">
                            </a>
                            <a href="<?= $BASE_URL ?>process/excluir-item.php?id=<?= $item['id'] ?>">
                                <img src="<?= $BASE_URL ?>assets/img/icon/close.png" alt="Apagar">
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </section>

</div>

</body>

</html>