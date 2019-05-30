<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<main>

    <section>

        <?= $this->Form->create($user) ?>
        <h1><?= __('Editar usuario ') ?></h1>
        <fieldset>
            <?php
            echo $this->Form->control('name', ['label' => __('Nombre')]);
            echo $this->Form->control('email', ['label' => __('Email')]);
            echo $this->Form->control('password', ['label' => __('Contraseña')]);
            echo $this->Form->control('role', ['label' => __('Rol')]);
            echo $this->Form->control('last_active', ['empty' => true]);
            ?>
            <div class="form-actions">
                <?= $this->Form->button(__('Submit')) ?>
            </div>
        </fieldset>
        <?= $this->Form->end() ?>

    </section>

</main>