<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promotion[]|\Cake\Collection\CollectionInterface $promotions
 */
?>

<?= $this->element('sub-nav') ?>

<div class="container mt-3">

    <h3><?= __('Promotions') ?></h3>

    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', ['label' => 'ID']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Nombre']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug', ['label' => 'Slug']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('price_old', ['label' => '€ Original']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('price_new', ['label' => '€ Promo']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('available_since', ['label' => 'Desde...']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('available_until', ['label' => '...Hasta']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', ['label' => 'Creada']) ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($promotions as $promotion) : ?>
            <tr>
                <td><?= $this->Number->format($promotion->id) ?></td>
                <td><?= $this->Html->link(h($promotion->name), ['action' => 'view', $promotion->id]) ?></td>
                <td><?= h($promotion->slug) ?></td>
                <td><?= $this->Number->format($promotion->price_old) ?></td>
                <td><?= $this->Number->format($promotion->price_new) ?></td>
                <td><?= h($promotion->available_since) ?></td>
                <td><?= h($promotion->available_until) ?></td>
                <td><?= h($promotion->created) ?></td>
                <td>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $promotion->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $promotion->id], ['confirm' => __('¿Seguro que quieres eliminar la promoción {0}?', $promotion->name)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?= $this->element('pagination') ?>

</div> 