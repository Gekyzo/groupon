<?php
/**
 * @var \App\View\AppView $this
 */
?>

<?= $this->Flash->render('auth') ?>
<?= $this->Form->create('', ['class' => 'form-signin']) ?>
<fieldset>
    <legend><?= __('Login') ?></legend>
    <div class="form-group">
        <?= $this->Form->control('email', ['label' => false, 'placeholder' => 'Email', 'class' => 'form-control']) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('password', ['label' => false, 'placeholder' => 'Contraseña', 'class' => 'form-control']) ?>
    </div>
</fieldset>
<?= $this->Form->button(__('Entrar'), ['class' => 'btn btn-primary']); ?>
<?= $this->Form->end() ?> 