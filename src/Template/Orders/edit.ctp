<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>

<main>

    <section>

        <?= $this->Form->create($order) ?>
        <h1><?= __('Editar pedido') ?></h1>
        <fieldset>
            <?php
            echo $this->Form->control('promotion_id', ['label' => __('Promoción'), 'options' => $promotions]);
            echo $this->Form->control('user_id', ['label' => __('Usuario'), 'options' => $users]);
            echo $this->Form->control('state', ['label' => 'Estado']);
            ?>
            <div class="form-actions">
                <?= $this->Form->button(__('Guardar')) ?>
            </div>
        </fieldset>
        <?= $this->Form->end() ?>

    </section>

</main>