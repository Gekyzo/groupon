<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($category->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($category->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($category->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Promotions') ?></h4>
        <?php if (!empty($category->promotions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Price Old') ?></th>
                <th scope="col"><?= __('Price New') ?></th>
                <th scope="col"><?= __('Body') ?></th>
                <th scope="col"><?= __('Available Since') ?></th>
                <th scope="col"><?= __('Available Until') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->promotions as $promotions): ?>
            <tr>
                <td><?= h($promotions->id) ?></td>
                <td><?= h($promotions->name) ?></td>
                <td><?= h($promotions->slug) ?></td>
                <td><?= h($promotions->price_old) ?></td>
                <td><?= h($promotions->price_new) ?></td>
                <td><?= h($promotions->body) ?></td>
                <td><?= h($promotions->available_since) ?></td>
                <td><?= h($promotions->available_until) ?></td>
                <td><?= h($promotions->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Promotions', 'action' => 'view', $promotions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Promotions', 'action' => 'edit', $promotions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Promotions', 'action' => 'delete', $promotions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
