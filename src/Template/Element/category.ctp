<?php
/**
 * Enlace a la categoría
 */
$catLink = ['controller' => 'categories', 'action' => 'view', $category->slug];
?>

<div class="card-category">

    <?= $this->Html->link(
        $this->Html->image(
            'categories/' . $category->name . '.png',
            ['alt' => __('Imagen categoría'), 'class' => 'card-img-top']
        ),
        $catLink,
        ['escape' => false]
    ) ?>

    <h5><?= $this->Html->link(h($category->name), $catLink) ?></h5>

</div>