<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promotion $promotion
 */
?>

<div class="container">
    <?= $this->Form->create($promotion, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Añadir promoción') ?></legend>
        <div class="form-group row">
            <div class="col">
                <?= $this->Form->control('name', ['label' => false, 'placeholder' => 'Nombre', 'class' => 'form-control']); ?>
            </div>
            <div class="col">
                <?= $this->Form->control('slug', ['label' => false, 'placeholder' => 'Slug', 'class' => 'form-control']); ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col">
                <?= $this->Form->control('price_old', ['label' => false, 'placeholder' => 'Precio original', 'class' => 'form-control']); ?>
            </div>
            <div class="col">
                <?= $this->Form->control('price_new', ['label' => false, 'default' => 'Estado', 'placeholder' => 'Precio nuevo', 'class' => 'form-control']); ?>
            </div>
            <div class="col">
                <?= $this->Form->control('state', ['label' => false, 'empty' => '- Estado', 'default' => 'active', 'options' => ['active' => 'Activo', 'inactive' => 'Inactivo'], 'class' => 'form-control']); ?>
            </div>
        </div>
        <div class="form-group">
            <?= $this->Form->control('body', ['label' => false, 'placeholder' => 'Descripción', 'class' => 'form-control']); ?>
        </div>
        <div class="form-group row">
            <div class="col">
                <?= $this->Form->input('available_since', ['type' => 'datetime-local', 'class' => 'form-control']); ?>
            </div>
            <div class="col">
                <?= $this->Form->control('available_until', ['type' => 'datetime-local', 'class' => 'form-control']); ?>
            </div>
        </div>
        <?= $this->Form->control('categories._ids', ['options' => $categories, 'class' => 'form-control']); ?>
        <?= $this->Form->control('images._ids', ['options' => $images]); ?>
        <div class="btn-group col-sm-12" role="group">
            <?= $this->Form->button(__('Crear'), ['class' => 'btn btn-primary mr-2']) ?>
            <?= $this->Form->button(__('Borrar'), ['class' => 'btn btn-secondary ml-2']) ?>
        </div>
    </fieldset>
    <?= $this->Form->end() ?>
</div>