<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>

<div class="container">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend><?= __('Información de tu compra') ?></legend>
        <p><?= __('Estás a punto de disfrutar de la oferta') ?>: </p>
        <p><?= __('Con esta promoción has ahorrado') ?> €</p>
    </fieldset>
    <?= $this->Form->button(__('Confirmar compra'), ['class' => 'btn btn-primary'], ['controller' => 'orders', 'action' => 'confirm']) ?>
    <?= $this->Html->link(__('Cancelar'), ['controller' => 'orders', 'action' => 'discard']) ?>
    <?= $this->Form->end() ?>
</div> 