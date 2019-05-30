<?php
/**
 * Enlace a la categoría
 */
$catLink = ['controller' => 'categories', 'action' => 'view', $category->slug];
?>

<article class="category-card">

    <?= $this->Html->image(
        $category->image,
        [
            'alt' => __('Imagen categoría'),
            'url' => $catLink
        ]
    ) ?>

    <h5><?= $this->Html->link(h($category->name), $catLink) ?></h5>

</article>