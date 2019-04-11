<?php
/**
 * Enlace a la categoría
 */
$catLink = ['controller' => 'categories', 'action' => 'view', $category->slug];
?>

<div class="card text-center">
    <?= $this->Html->link(
        $this->Html->image(
            'categories/' . $category->name . '.png',
            ['alt' => __('Imagen categoría'), 'class' => 'card-img-top']
        ),
        $catLink,
        ['escape' => false]
    ) ?>
    <div class="card-body">
        <h5 class="card-title"><?= $this->Html->link(h($category->name), $catLink) ?></h5>
    </div>
</div>