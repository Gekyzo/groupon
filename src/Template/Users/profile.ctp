<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<main>
    <section>
        <div class="container">
            <h1><?= __('Detalles de cliente') ?></h1>
            <table class="table">
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($user->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
            </table>
        </div>
    </section>

    <section>
        <div class="container">
            <h2><?= __('Pedidos realizados') ?></h2>
            <?php if (!empty($user->orders)) : ?>
                <table>
                    <tr>
                        <?php if ($currentUser['role'] === 'admin') : ?>
                            <th><?= __('Id') ?></th>
                        <?php endif; ?>
                        <th><?= __('Promoción') ?></th>
                        <th><?= __('Estado') ?></th>
                        <th><?= __('Realizado el') ?></th>
                        <?php if ($currentUser['role'] === 'admin') : ?>
                            <th class="actions"><?= __('Actions') ?></th>
                        <?php endif; ?>
                    </tr>
                    <?php foreach ($user->orders as $orders) : ?>
                        <tr>
                            <?php if ($currentUser['role'] === 'admin') : ?>
                                <td><?= h($orders->id) ?></td>
                            <?php endif; ?>
                            <td><?= $this->Html->link(h($orders->promotion->name), ['controller' => 'Promotions', 'action' => 'view', $orders->promotion->slug]) ?></td>
                            <td><?= h($orders->state) ?></td>
                            <td><?= h($orders->created) ?></td>
                            <?php if ($currentUser['role'] === 'admin') : ?>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
    </section>
    </div>
</main>