<?= $this->Form->create('', ['class' => 'form-signin']) ?>
<?php // $this->Form->create() ?>
<fieldset>
    <legend>Login</legend>
    <div class="form-group">
    <?= $this->Form->control('email', ['label' => false, 'placeholder' => 'Email', 'class' => 'form-control']) ?>
    </div>
    <div class="form-group">
    <?= $this->Form->control('password', ['label' => false, 'placeholder' => 'Contraseña', 'class' => 'form-control']) ?>
    </div>
    <?= $this->Form->button(__('Login'), ['class' => 'btn btn-primary btn-lg 
    btn-block']) ?>
</fieldset>
<?= $this->Form->end() ?> 