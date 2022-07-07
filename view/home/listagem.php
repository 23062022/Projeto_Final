<hr>
<!-- Conteúdo da Página -->
<div class="container mt-2">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php foreach($produtos as $produto):?>
            <div class="col">
                <div class="card h-100">
                    <img src=" <?= $produto['foto'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-title"> <?= $produto['nome'] ?></p>
                        <a href="<?= base_url(). "?c=home&m=ver&id=" . $produto['idproduto']?>" class="text-decoration-none text-dark stretched-link">
                        <h5 class="card-text">R$<?= $produto['preco'] ?></h5>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

