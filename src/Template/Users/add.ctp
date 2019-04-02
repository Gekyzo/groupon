<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?= $this->Form->create($user, ['class' => 'form-signin']) ?>
<fieldset>
    <legend><?= __('Nuevo usuario') ?></legend>
    <div class="form-group">
        <?= $this->Form->control('name', ['label' => false, 'placeholder' => __('Nombre'), 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('email', ['label' => false, 'placeholder' => __('Email'), 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('password1', ['type' => 'password', 'label' => false, 'placeholder' => __('Contraseña'), 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('password2', ['type' => 'password', 'label' => false, 'placeholder' => __('Repetir contraseña'), 'class' => 'form-control']); ?>
    </div>
</fieldset>
<?= $this->Form->button(__('Registrar'), ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?> 