<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CategoriesPromotion $categoriesPromotion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Categories Promotion'), ['action' => 'edit', $categoriesPromotion->category_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Categories Promotion'), ['action' => 'delete', $categoriesPromotion->category_id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoriesPromotion->category_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories Promotions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categories Promotion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categoriesPromotions view large-9 medium-8 columns content">
    <h3><?= h($categoriesPromotion->category_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $categoriesPromotion->has('category') ? $this->Html->link($categoriesPromotion->category->name, ['controller' => 'Categories', 'action' => 'view', $categoriesPromotion->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Promotion') ?></th>
            <td><?= $categoriesPromotion->has('promotion') ? $this->Html->link($categoriesPromotion->promotion->name, ['controller' => 'Promotions', 'action' => 'view', $categoriesPromotion->promotion->id]) : '' ?></td>
        </tr>
    </table>
</div>
