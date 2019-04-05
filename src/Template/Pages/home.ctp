<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<h1>Proyecto Groupon</h1>
<p>versión 0.3.0</p>

<h2><?= __('Categorías') ?></h2>
<div class="row justify-content-md-center">
    <?php foreach ($categories as $category) : ?>
        <div class="col-md-auto">
            <?= $this->Element('category', ['category' => $category]) ?>
        </div>
    <?php endforeach; ?>
</div>

<h2><?= __('Últimas ofertas') ?></h2>
<div class="row">
    <?php foreach ($lastPromotions as $promotion) : ?>
        <div class="col-md-auto">
            <?= $this->Element('promotion', ['promotion' => $promotion]) ?>
        </div>
    <?php endforeach; ?>
</div>

<h2><?= __('Promociones destacadas') ?></h2>
<div class="row">
    <?php foreach ($bestPromotions as $promotion) : ?>
        <div class="col-md-auto">
            <?= $this->Element('promotion', ['promotion' => $promotion]) ?>
        </div>
    <?php endforeach; ?>
</div>