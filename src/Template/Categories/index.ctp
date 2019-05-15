<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categories[]|\Cake\Collection\CollectionInterface $categories
 */
?>

<main id="page-categories" class="categories-carousel">

    <div class="container container-categories">

        <?php foreach ($categories as $category) : ?>
            <div class="card-category">
                <?= $this->Element('category', ['category' => $category]) ?>
            </div>
        <?php endforeach; ?>

    </div>

</main>