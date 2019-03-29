<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CategoriesPromotion $categoriesPromotion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $categoriesPromotion->category_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $categoriesPromotion->category_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Categories Promotions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categoriesPromotions form large-9 medium-8 columns content">
    <?= $this->Form->create($categoriesPromotion) ?>
    <fieldset>
        <legend><?= __('Edit Categories Promotion') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
