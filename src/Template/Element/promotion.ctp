<?php
/**
 * Enlace a la promoción
 */
$promoLink = ['controller' => 'promotions', 'action' => 'view', $promotion->slug];
?>

<div class="card text-center">
    <?= $this->Html->link(
        $this->Html->image(
            'promotions/' . $promotion->images[0]->name,
            ['alt' => __('Imagen promoción'), 'class' => 'card-img-top']
        ),
        $promoLink,
        ['escape' => false]
    ) ?>
    <div class="card-body">
        <h5 class="card-title"><?= $this->Html->link($promotion->name, $promoLink) ?></h5>
        <p class="card-text"><?= $promotion->body ?></p>
        <?= $this->Html->link(__('Comprar ya'), $promoLink, ['class' => 'btn btn-primary']) ?>
    </div>
</div>