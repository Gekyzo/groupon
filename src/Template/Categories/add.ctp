<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>

<main>
    <div class="container">

        <?= $this->Form->create($category, ['type' => 'file']) ?>
        <fieldset>
            <legend><?= __('Añadir categoría') ?></legend>
            <?= $this->Form->control('name', ['label' => _('Nombre')]); ?>
            <?= $this->Form->control('body', ['label' => _('Descripción')]); ?>
            <?= $this->Form->control('image', ['label' => _('Imagen'), 'type' => 'file']) ?>
            <?php // Si existen promociones, se muestra el 'select' con la lista de todas las promociones para incluir en la categoría
            if ($promotions->toArray()) : ?>
                <?= $this->Form->control('promotions._ids', ['label' => _('Promociones'), 'Incluir promociones', 'options' => $promotions]) ?>
            <?php endif; ?>
            <?= $this->Form->control('state', ['label' => _('Estado'), 'default' => 'active', 'options' => ['active' => 'Activo', 'inactive' => 'Inactivo'], 'type' => 'radio']); ?>
            <div class="form-actions">
                <?= $this->Form->button(__('Crear')) ?>
                <?= $this->Form->button(__('Borrar'), ['type' => 'reset']) ?>
            </div>
        </fieldset>
        <?= $this->Form->end() ?>

    </div>
</main>