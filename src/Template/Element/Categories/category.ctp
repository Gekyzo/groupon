<?php
/**
 * Enlace a la categoría
 */
$catLink = ['controller' => 'categories', 'action' => 'view', $category->slug];
?>

<article class="category-card">

    <?= $this->Html->link(
        $this->Html->image(
            'categories/' . $category->name . '.png',
            ['alt' => __('Imagen categoría')]
        ),
        $catLink,
        ['escape' => false]
    ) ?>

    <h5><?= $this->Html->link(h($category->name), $catLink) ?></h5>

</article>