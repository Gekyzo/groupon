<?php
/**
 * @var \App\View\AppView $this
 */
$this->layout = 'small';
?>

<main>

    <section>

        <?= $this->Form->create('', ['class' => 'user-form']) ?>
        <fieldset>
            <legend><?= __('Login') ?></legend>
            <?= $this->Form->control('email', ['label' => __('Email'), 'required' => 'required']) ?>
            <?= $this->Form->control('password', ['label' => __('Contraseña'), 'required' => 'required']) ?>
        </fieldset>
        <div class="form-actions">
            <?= $this->Form->button(__('Entrar')); ?>
        </div>
        <?= $this->Form->end() ?>

    </section>

</main>