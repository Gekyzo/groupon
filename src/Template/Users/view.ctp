<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="container">
    <h1><?= __('Detalles de cliente') ?></h1>
    <table class="table vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rol') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= h($user->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha última actividad') ?></th>
            <td><?= h($user->last_active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha creación') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha borrado') ?></th>
            <td><?= h($user->deleted) ?></td>
        </tr>
    </table>

    <h2><?= __('Pedidos realizados') ?></h2>
    <?php if (!empty($user->orders)) : ?>
        <table class="table">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Promoción') ?></th>
                <th scope="col"><?= __('Estado') ?></th>
                <th scope="col"><?= __('Realizado el') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->orders as $orders) : ?>
                <tr>
                    <td><?= h($orders->id) ?></td>
                    <!--<td><?= h($cleanOrdersPromoInfo[$orders->promotion_id]) ?></td>-->
                    <td><?= h($orders->promotion->name) ?></td>
                    <td><?= h($orders->state) ?></td>
                    <td><?= h($orders->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

</div>