<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promotion $promotion
 */
?>

<main>
    <div class="container">
        <?= $this->Form->create($promotion) ?>
        <fieldset>
            <legend><?= __('Editar promoción') ?></legend>
            <div class="col">
                <?= $this->Form->control('name', ['label' => _('Nombre')]); ?>
                <div class="col-small">
                    <?= $this->Form->control('price_old', ['label' => _('Precio original')]); ?>
                </div>
                <div class="col-small">
                    <?= $this->Form->control('price_new', ['label' => _('Precio nuevo')]); ?>
                </div>
            </div>
            <?= $this->Form->control('state', ['label' => _('Estado'), 'options' => ['active' => 'Activo', 'inactive' => 'Inactivo'], 'type' => 'radio']); ?>
            <?= $this->Form->control('body', ['label' => _('Descripción')]); ?>
            <?php
            echo $this->Form->control('available_since');
            echo $this->Form->control('available_until');
            ?>
            <?= $this->Form->control('categories._ids', ['label' => _('Categorías'), 'options' => $categories]); ?>
            <div class="form-actions">
                <?= $this->Form->button(__('Guardar cambios')) ?>
                <?= $this->Form->button(__('Borrar cambios'), ['type' => 'reset']) ?>
            </div>
        </fieldset>
        <?= $this->Form->end() ?>
    </div>
</main>