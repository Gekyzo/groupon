<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>

<main>
    <div class="container">
        <?= $this->Form->create($order, ['url' => ['action' => 'add']]) ?>
        <fieldset>
            <?= $this->Form->hidden('promotion_id', ['value' => $promotion['id']]) ?>
            <?= $this->Form->hidden('user_id', ['value' => $currentUser['id']]) ?>
            <legend><?= __('Información de tu compra') ?></legend>
            <p><?= __('Estás a punto de disfrutar de la oferta') . ": <b>{$promotion['name']}</b>" ?></p>
            <p>&nbsp;</p>
            <p><?= __('El precio original de esta oferta era de') . " " . $promotion['price_old'] . " €" ?></p>
            <p><?= __('Con el descuento sólo pagarás') . " " . $promotion['price_new'] . " €" ?> </p>
            <p>&nbsp;</p>
            <p><?= __('Gracias a Ciropon') ?><b> <?= __('has ahorrado') . " {$promotion['saving']} €" ?></b></p>
            <div class="form-actions">
                <?= $this->Form->button(__('Confirmar compra'), ['class' => 'btn btn-primary']) ?>
                <?= $this->Html->link(__('Cancelar'), ['controller' => 'orders', 'action' => 'discard'], ['class' => 'cancel']) ?>
            </div>
        </fieldset>
        <?= $this->Form->end() ?>
    </div>
</main>