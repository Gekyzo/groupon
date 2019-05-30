<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<main>

    <div class="container">

        <h1><?= __('Usuarios') ?></h1>
        <table>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name', __('Nombre')) ?></th>
                <th><?= $this->Paginator->sort('email', __('Email')) ?></th>
                <th><?= $this->Paginator->sort('role', __('Rol')) ?></th>
                <th><?= $this->Paginator->sort('last_active', __('Última actividad')) ?></th>
                <th><?= $this->Paginator->sort('created', __('Creado el')) ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->name) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->role) ?></td>
                    <td><?= h($user->last_active) ?></td>
                    <td><?= h($user->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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