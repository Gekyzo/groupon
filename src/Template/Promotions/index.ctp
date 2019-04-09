<h2><?= __('Todas las ofertas') ?></h2>
<div class="row">
    <?php foreach ($promotions as $promotion) : ?>
        <div class="col-md-auto">
            <?= $this->Element('promotion', ['promotion' => $promotion]) ?>
        </div>
    <?php endforeach; ?>
</div>