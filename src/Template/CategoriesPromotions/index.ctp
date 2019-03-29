<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CategoriesPromotion[]|\Cake\Collection\CollectionInterface $categoriesPromotions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Categories Promotion'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categoriesPromotions index large-9 medium-8 columns content">
    <h3><?= __('Categories Promotions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('promotion_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categoriesPromotions as $categoriesPromotion): ?>
            <tr>
                <td><?= $categoriesPromotion->has('category') ? $this->Html->link($categoriesPromotion->category->name, ['controller' => 'Categories', 'action' => 'view', $categoriesPromotion->category->id]) : '' ?></td>
                <td><?= $categoriesPromotion->has('promotion') ? $this->Html->link($categoriesPromotion->promotion->name, ['controller' => 'Promotions', 'action' => 'view', $categoriesPromotion->promotion->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $categoriesPromotion->category_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $categoriesPromotion->category_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $categoriesPromotion->category_id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoriesPromotion->category_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
