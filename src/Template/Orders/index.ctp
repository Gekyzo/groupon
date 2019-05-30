<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order[]|\Cake\Collection\CollectionInterface $orders
 */
?>

<main>
    <div class="container">
        <h1><?= __('Pedidos') ?></h1>
        <table>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('promotion_id', __('Promoción')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id', __('Usuario')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('state', __('Estado')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', __('Realizado el')) ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($orders as $order) : ?>
                <tr>
                    <td><?= $this->Number->format($order->id) ?></td>
                    <td><?= $order->has('promotion') ? $this->Html->link($order->promotion->name, ['controller' => 'Promotions', 'action' => 'view', $order->promotion->id]) : '' ?></td>
                    <td><?= $order->has('user') ? $this->Html->link($order->user->name, ['controller' => 'Users', 'action' => 'view', $order->user->id]) : '' ?></td>
                    <td><?= h($order->state) ?></td>
                    <td><?= h($order->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $order->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div class="paginator">
            <ul>
                <?= $this->Paginator->first('<< ') ?>
                <?= $this->Paginator->prev('< ') ?>
                <li id="paginator-counter"><?= $this->Paginator->counter(['format' => __('Mostrando {{current}} de {{count}}')]) ?></li>
                <?= $this->Paginator->next(' >') ?>
                <?= $this->Paginator->last(' >>') ?>
            </ul>
        </div>

    </div>
</main>