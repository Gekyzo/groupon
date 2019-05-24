<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>

<main>

    <section>
        <h1><?= h($category->name) ?></h1>
        <?= $this->Text->autoParagraph(h($category->body)); ?>
    </section>

    <?= $this->Element('Promotions/promotions-container'); ?>

</main>