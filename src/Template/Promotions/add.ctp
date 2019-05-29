<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promotion $promotion
 */
?>

<main>
    <div class="container">

        <?= $this->Form->create($promotion, ['type' => 'file']) ?>
        <fieldset>
            <legend><?= __('Añadir promoción') ?></legend>
            <div class="col">
                <?= $this->Form->control('name', ['label' => _('Nombre')]); ?>
                <div class="col-small">
                    <?= $this->Form->control('price_old', ['label' => _('Precio original')]); ?>
                </div>
                <div class="col-small">
                    <?= $this->Form->control('price_new', ['label' => _('Precio nuevo')]); ?>
                </div>
            </div>
            <?= $this->Form->control('state', ['label' => _('Estado'), 'default' => 'active', 'options' => ['active' => 'Activo', 'inactive' => 'Inactivo'], 'type' => 'radio']); ?>
            <?= $this->Form->control('body', ['label' => _('Descripción')]); ?>
            <div class="col">
                <div class="col-medium">
                    <?= $this->Form->control('available_since', ['label' => __('Disponible desde'), 'type' => 'datetime-local']); ?>
                </div>
                <div class="col-medium">&nbsp;</div>
                <div class="col-medium">
                    <?= $this->Form->control('available_until', ['label' => __('Disponible hasta'), 'type' => 'datetime-local']); ?>
                </div>
            </div>
            <?= $this->Form->control('categories._ids', ['label' => _('Categorías'), 'options' => $categories]); ?>
            <?= $this->Form->control('images[]', ['label' => __('Imágenes'), 'type' => 'file', 'multiple' => 'multiple']) ?>
            <div class="form-actions">
                <?= $this->Form->button(__('Crear')) ?>
                <?= $this->Form->button(__('Borrar'), ['type' => 'reset']) ?>
            </div>
        </fieldset>
        <?= $this->Form->end() ?>

    </div>
</main>