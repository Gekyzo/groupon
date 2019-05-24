<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<main>

    <h1>Proyecto Groupon</h1>
    <p>versión 0.7.0</p>

    <?= $this->Element('Categories/categories-container') ?>

    <section class="container">
        <h2><?= __('Últimas ofertas') ?></h2>
        <?php foreach ($lastPromotions as $promotion) : ?>
            <div class="col-md-3">
                <?= $this->Element('Promotions/promotion', ['promotion' => $promotion]) ?>
            </div>
        <?php endforeach; ?>
    </section>

    <section class="container">
        <h2><?= __('Promociones destacadas') ?></h2>
        <?php foreach ($bestPromotions as $promotion) : ?>
            <div class="col-md-3">
                <?= $this->Element('Promotions/promotion', ['promotion' => $promotion]) ?>
            </div>
        <?php endforeach; ?>
    </section>

</main>