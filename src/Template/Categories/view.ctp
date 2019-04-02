<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>

<div class="container">

    <h1><?= h($category->name) ?></h1>
    <?= $this->Text->autoParagraph(h($category->body)); ?>

    <h4><?= __('Todas las ofertas') ?></h4>
    <?php if (!empty($category->promotions)) : ?>

    <?php foreach ($category->promotions as $promotions) : ?>
    <?= $this->Element('promo', ['promo' => $promotions->toArray()]) ?>

    <?php endforeach; ?>
    <?php endif; ?>
</div> 