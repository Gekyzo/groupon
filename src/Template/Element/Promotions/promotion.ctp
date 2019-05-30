<?php
/**
 * Enlace a la promoción
 */
$promoLink = ['controller' => 'promotions', 'action' => 'view', $promotion->slug];
?>

<article class="promotion-card">

    <div class="promotion-img-wrapper">
        <?= $this->Html->image(
            'promotions/' . $promotion->images[0]->name,
            [
                'alt' => __('Imagen promoción'),
                'url' => $promoLink
            ]
        ) ?>
    </div>

    <h5><?= $this->Html->link($promotion->name, $promoLink) ?></h5>

    <p class="promotion-description">
        <?php
        echo substr($promotion->body, 0, 45);
        if (strlen($promotion->body) > 45) echo '...';
        ?></p>
    <p class="promotion-price">
        <span class="price-new"><?= $promotion->price_new ?>€</span>
        <span class="price-original"><?= $promotion->price_old ?>€</span>
    </p>

    <button><?= $this->Html->link(__('Comprar ya'), $promoLink, ['class' => 'button']) ?></button>

</article>