<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<main id="homepage">

    <section>
        <h1>Proyecto Groupon</h1>
        <p>versión 1.0.0</p>
    </section>

    <?= $this->Element('Categories/categories-container') ?>

    <section class="promotions-container">

        <h2><?= __('Últimas ofertas') ?></h2>

        <?php foreach ($lastPromotions as $promotion) : ?>

            <?= $this->Element('Promotions/promotion', ['promotion' => $promotion]) ?>

        <?php endforeach; ?>

    </section>

    <section class="promotions-container">

        <h2><?= __('Promociones destacadas') ?></h2>

        <?php foreach ($bestPromotions as $promotion) : ?>

            <?= $this->Element('Promotions/promotion', ['promotion' => $promotion]) ?>

        <?php endforeach; ?>

    </section>

</main>