<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->layout = 'small';
?>

<main>

    <section>

        <?= $this->Form->create($user, ['class' => 'user-form']) ?>
        <fieldset>
            <legend><?= __('Registro') ?></legend>
            <?= $this->Form->control('name', ['label' => __('Nombre')]); ?>
            <?= $this->Form->control('email', ['label' => __('Email')]); ?>
            <?php /*
             * En los siguientes dos campos incluyo la opción 'required' => true, porque no son campos que existan en la BD.
             * En la BD el campo se llama 'password', en este formulario mando 'password1' y 'password2'.
             */ ?>
            <?= $this->Form->control('password1', ['type' => 'password', 'label' => __('Contraseña'), 'required' => true]); ?>
            <?= $this->Form->control('password2', ['type' => 'password', 'label' => __('Repetir contraseña'), 'required' => true]); ?>
            <p style="text-align: center; margin-top: 20px"><?= __('¿Ya tienes cuenta?') ?> <?= $this->Html->link(__('Haz login'), ['controller' => 'users', 'action' => 'login']) ?></p>
        </fieldset>
        <div class="form-actions">
            <?= $this->Form->button(__('Registrar')) ?>
        </div>
        <?= $this->Form->end() ?>

    </section>

</main>