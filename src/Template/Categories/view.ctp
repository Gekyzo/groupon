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
        <div class="row">
            <?php foreach ($category->promotions as $promotion) : ?>
                <div class="col-md-auto">
                    <?= $this->Element('promotion', ['promotion' => $promotion]) ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>