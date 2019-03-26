<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promotion $promotion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="promotions form large-9 medium-8 columns content">
    <?= $this->Form->create($promotion) ?>
    <fieldset>
        <legend><?= __('Add Promotion') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('slug');
            echo $this->Form->control('price_old');
            echo $this->Form->control('price_new');
            echo $this->Form->control('body');
            echo $this->Form->control('available_since', ['empty' => true]);
            echo $this->Form->control('available_until', ['empty' => true]);
            echo $this->Form->control('categories._ids', ['options' => $categories]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
