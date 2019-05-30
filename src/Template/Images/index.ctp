<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image[]|\Cake\Collection\CollectionInterface $images
 */
?>

<main>

    <section class="container">

        <h1><?= __('Imágenes') ?></h1>
        <table>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('url') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($images as $image) : ?>
                <tr>
                    <td><?= $this->Number->format($image->id) ?></td>
                    <td><?= h($image->name) ?></td>
                    <td><?= h($image->url) ?></td>
                    <td><?= h($image->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $image->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $image->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id)]) ?>
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

    </section>

</main>