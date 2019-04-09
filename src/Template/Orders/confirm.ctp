<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>

<div class="container">
    <?= $this->Form->create($order, ['url' => ['action' => 'add']]) ?>
    <fieldset>
        <?= $this->Form->hidden('promotion_id', ['value' => $promotion['id']]) ?>
        <?= $this->Form->hidden('user_id', ['value' => $currentUser['id']]) ?>
        <legend><?= __('Información de tu compra') ?></legend>
        <p><?= __('Estás a punto de disfrutar de la oferta') . ": {$promotion['name']}" ?></p>
        <p><?= __('Con esta promoción has ahorrado') . " {$promotion['saving']} €" ?></p>
    </fieldset>
    <?= $this->Form->button(__('Confirmar compra'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('Cancelar'), ['controller' => 'orders', 'action' => 'discard']) ?>
    <?= $this->Form->end() ?>
</div>