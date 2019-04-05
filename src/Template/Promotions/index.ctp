<h2><?= __('Todas las ofertas') ?></h2>
<?php foreach ($promotions as $promotion) : ?>
    <?= $this->Element('promotion', ['promotion' => $promotion]) ?>
<?php endforeach; ?>