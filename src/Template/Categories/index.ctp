<div class="container">
    <h2><?= __('Categorías') ?></h2>
    <div class="row justify-content-md-center">
        <?php foreach ($categories as $category) : ?>
            <div class="col-md-auto">
                <?= $this->Element('category', ['category' => $category]) ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>