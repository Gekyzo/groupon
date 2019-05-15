<?php
/**
 * @var \App\View\AppView $this
 */
?>

<main id="page-login">
    <div class="container">
        <?= $this->Flash->render() ?>
        <?php /*$this->Flash->render('auth')*/ ?>
        <?= $this->Form->create('', ['class' => 'form-login']) ?>
        <fieldset>
            <legend><?= __('Login') ?></legend>
            <?= $this->Form->control('email', ['required' => 'required', 'class' => 'required']) ?>
            <?= $this->Form->control('password', ['required' => 'required', 'class' => 'required']) ?>
        </fieldset>
        <div class="form-actions">
            <?= $this->Form->button(__('Entrar')); ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</main>