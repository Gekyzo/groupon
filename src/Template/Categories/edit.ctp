<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>

<main>
    <div class="container">

        <?= $this->Form->create($category) ?>
        <fieldset>
            <legend><?= __('Editar categoría') ?></legend>
            <?= $this->Form->control('name', ['label' => _('Nombre')]); ?>
            <?= $this->Form->control('body', ['label' => _('Descripción')]); ?>
            <?= $this->Form->control('state', ['label' => _('Estado'), 'options' => ['active' => 'Activo', 'inactive' => 'Inactivo'], 'type' => 'radio']); ?>
            <?php // Si existen promociones, se muestra el 'select' con la lista de todas las promociones para incluir en la categoría
            if ($promotions->toArray()) : ?>
                <?= $this->Form->control('promotions._ids', ['label' => _('Promociones'), 'Incluir promociones', 'options' => $promotions]) ?>
            <?php endif; ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>

    </div>
</main>