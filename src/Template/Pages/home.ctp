<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<h1>Proyecto Groupon</h1>
<p>versión 0.3.0</p>

<h2><?= __('Categorías') ?></h2>
<table>
    <?php foreach ($categories as $category) : ?>
        <?= $this->Element('category', ['category' => $category]) ?>
    <?php endforeach; ?>
</table>

<h2><?= __('Últimas ofertas') ?></h2>
<?php foreach ($promotions as $promotion) : ?>
    <?= $this->Element('promotion', ['promotion' => $promotion]) ?>
<?php endforeach; ?>

<h2><?= __('Promociones destacadas') ?></h2>
<?php foreach ($promotions as $promotion) : ?>
    <?= $this->Element('promotion', ['promotion' => $promotion]) ?>
<?php endforeach; ?>