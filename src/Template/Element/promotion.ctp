<?php
/**
 * Enlace a la promoción
 */
$promoLink = ['controller' => 'promotions', 'action' => 'view', $promotion->slug];
?>

<div class="card-promotion">

    <div class="promotion-img-wrapper">
        <?= $this->Html->link(
            $this->Html->image(
                'promotions/' . $promotion->images[0]->name,
                ['alt' => __('Imagen promoción')]
            ),
            $promoLink,
            ['escape' => false]
        ) ?>
    </div>

    <h5><?= $this->Html->link($promotion->name, $promoLink) ?></h5>
    <p class="promotion-description"><?= $promotion->body ?></p>
    <p class="promotion-price">
        <span class="price-new"><?= $promotion->price_new ?>€</span>
        <span class="price-original"><?= $promotion->price_old ?>€</span>
    </p>
    <?= $this->Html->link(__('Comprar ya'), $promoLink, ['class' => 'button']) ?>

</div>