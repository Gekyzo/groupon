<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>

<?= $this->element('sub-nav') ?>


<div class="container mt-3">

    <h3><?= h($category->name) ?></h3>

    <h4><?= __('Promociones disponibles') ?></h4>
    <?php if (!empty($category->promotions)) : ?>
    <table class="table">
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
        <?php foreach ($category->promotions as $promotions) : ?>
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
    <?php else : ?>
    <p>Actualmente no existen promociones en esta categoría.</p>
    <?php endif; ?>
</div> 