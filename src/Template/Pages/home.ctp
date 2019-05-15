<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<main>
    <h1>Proyecto Groupon</h1>
    <p>versión 0.7.0</p>

    <div class="container categories-carousel">
        <div class="container-categories">
            <?php foreach ($categories as $category) : ?>
                <div class="card-category">
                    <?= $this->Element('category', ['category' => $category]) ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <h2><?= __('Últimas ofertas') ?></h2>
    <div class="row">
        <?php foreach ($lastPromotions as $promotion) : ?>
            <div class="col-md-3">
                <?= $this->Element('promotion', ['promotion' => $promotion]) ?>
            </div>
        <?php endforeach; ?>
    </div>

    <h2><?= __('Promociones destacadas') ?></h2>
    <div class="row">
        <?php foreach ($bestPromotions as $promotion) : ?>
            <div class="col-md-3">
                <?= $this->Element('promotion', ['promotion' => $promotion]) ?>
            </div>
        <?php endforeach; ?>
    </div>
</main>