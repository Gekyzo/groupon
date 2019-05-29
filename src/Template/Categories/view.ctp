<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>

<main>

    <section id="category-view">
        <div class="cat-image">
            <?= $this->Html->Image($category->image) ?>
        </div>
        <div class="cat-description">
            <h1><?= h($category->name) ?></h1>
            <?= $this->Text->autoParagraph(h($category->body)); ?>
        </div>
    </section>

    <?= $this->Element('Promotions/promotions-container'); ?>

</main>