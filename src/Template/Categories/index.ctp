<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categories[]|\Cake\Collection\CollectionInterface $categories
 */
?>

<main id="page-categories" class="categories-carousel">

    <div class="container container-categories">

        <?php foreach ($categories as $category) : ?>

            <?= $this->Element('category', ['category' => $category]) ?>

        <?php endforeach; ?>

    </div>

</main>