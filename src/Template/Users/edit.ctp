<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?= $this->Form->create($user, ['class' => 'form-signin']) ?>
<fieldset>
    <legend><?= __('Editar información') ?></legend>
    <div class="form-group">
    <?= $this->Form->control('name', ['label' => false, 'placeholder' => __('Nombre'), 'class' => 'form-control']) ?>    
    </div>
    <div class="form-group">
    <?= $this->Form->control('email', ['label' => false, 'placeholder' => __('Email'), 'class' => 'form-control']) ?>    
    </div>
    <div class="form-group">
    <?= $this->Form->control('newPass1', ['type' => 'password', 'label' => false, 'placeholder' => __('Nueva contraseña'), 'class' => 'form-control', 'value' => false]) ?>
    <?= $this->Form->control('newPass2', ['type' => 'password', 'label' => false, 'placeholder' => __('Repetir nueva contraseña'), 'class' => 'form-control', 'value' => false]) ?>
    </div>
<?= $this->Form->button(__('Guardar cambios'), ['class' => 'btn btn-primary btn-lg btn-block']) ?>
<?= $this->Form->end() ?> 