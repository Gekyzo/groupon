<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promotion $promotion
 */
?>

<?= $this->element('sub-nav') ?>

<div class="container mt-3">

    <h3><?= h($promotion->name) ?></h3>
    <dl class="row">
        <dt class="col-sm-3"><?= __('Nombre') ?></dt>
        <dd class="col-sm-9"><?= h($promotion->name) ?></dd>
    </dl>
    <dl class="row">
        <dt class="col-sm-3"><?= __('Slug') ?></dt>
        <dd class="col-sm-9"><?= h($promotion->slug) ?></dd>
    </dl>
    <dl class="row">
        <dt class="col-sm-3"><?= __('ID') ?></dt>
        <dd class="col-sm-9"><?= $this->Number->format($promotion->id) ?></dd>
    </dl>
    <dl class="row">
        <dt class="col-sm-3"><?= __('Precio original') ?></dt>
        <dd class="col-sm-9"><?= $this->Number->format($promotion->price_old) ?></dd>
    </dl>
    <dl class="row">
        <dt class="col-sm-3"><?= __('Price con oferta') ?></dt>
        <dd class="col-sm-9"><?= $this->Number->format($promotion->price_new) ?></dd>
    </dl>
    <dl class="row">
        <dt class="col-sm-3"><?= __('Disponible desde...') ?></dt>
        <dd class="col-sm-9"><?= h($promotion->available_since) ?></dd>
    </dl>
    <dl class="row">
        <dt class="col-sm-3"><?= __('... hasta') ?></dt>
        <dd class="col-sm-9"><?= h($promotion->available_until) ?></dd>
    </dl>
    <dl class="row">
        <dt class="col-sm-3"><?= __('Creada') ?></dt>
        <dd class="col-sm-9"><?= h($promotion->created) ?></dd>
    </dl>

    <h4><?= __('Contenido') ?></h4>
    <?= $this->Text->autoParagraph(h($promotion->body)); ?>

    <h4><?= __('Asignada a las categorías') ?></h4>
    <?php if (!empty($promotion->categories)) : ?>
    <table class="table">
        <tr>
            <th scope="col"><?= __('ID') ?></th>
            <th scope="col"><?= __('Nombre') ?></th>
            <th scope="col"><?= __('Slug') ?></th>
            <th scope="col"><?= __('Imagen') ?></th>
            <th scope="col" class="actions"><?= __('Acciones') ?></th>
        </tr>
        <?php foreach ($promotion->categories as $categories) : ?>
        <tr>
            <td><?= h($categories->id) ?></td>
            <td><?= $this->Html->link(h($categories->name), ['controller' => 'Categories', 'action' => 'view', $categories->id]) ?></td>
            <td><?= h($categories->slug) ?></td>
            <td><?= h($categories->image) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Editar'), ['controller' => 'Categories', 'action' => 'edit', $categories->id]) ?>
                <?= $this->Form->postLink(__('Borrar'), ['controller' => 'Categories', 'action' => 'delete', $categories->id], ['confirm' => __('Seguro que quieres eliminar la categoría {0}?', $categories->name)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>

    <h4><?= __('Pedidos sobre la promoción') ?></h4>
    <?php if (!empty($promotion->orders)) : ?>
    <table class="table">
        <tr>
            <th scope="col"><?= __('Id') ?></th>
            <th scope="col"><?= __('Promotion Id') ?></th>
            <th scope="col"><?= __('User Id') ?></th>
            <th scope="col"><?= __('Created') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($promotion->orders as $orders) : ?>
        <tr>
            <td><?= h($orders->id) ?></td>
            <td><?= h($orders->promotion_id) ?></td>
            <td><?= h($orders->user_id) ?></td>
            <td><?= h($orders->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Editar'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
                <?= $this->Form->postLink(__('Borrar'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('¿Seguro que quieres eliminar el pedido {0}?', $orders->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>

</div> 