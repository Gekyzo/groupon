<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Nuevo usuario') ?></legend>
        <?php
            echo $this->Form->control('name', ['label' => 'Nombre']);
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('role');
            echo $this->Form->control('deleted', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
