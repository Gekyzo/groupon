<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="container">
    <?= $this->Form->create($category, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Añadir categoría') ?></legend>
        <div class="form-group row">
            <div class="col">
                <?= $this->Form->control('name', ['label' => false, 'placeholder' => 'Nombre', 'class' => 'form-control']); ?>
            </div>
            <div class="col">
                <?= $this->Form->control('slug', ['label' => false, 'placeholder' => 'Slug', 'class' => 'form-control']); ?>
            </div>
        </div>
        <div class="form-group">
            <?= $this->Form->control('state', ['label' => false, 'empty' => '- Estado', 'default' => 'active', 'options' => ['active' => 'Activo', 'inactive' => 'Inactivo'], 'class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('body', ['label' => false, 'placeholder' => 'Descripción', 'class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('image', ['type' => 'file', 'class' => 'form-control']) ?>
        </div>
        <?= $this->Form->control('promotions._ids', ['label' => 'Incluir promociones', 'options' => $promotions, 'class' => 'form-control']) ?>
        <div class="btn-group col-sm-12 mt-2" role="group">
            <?= $this->Form->button(__('Crear'), ['class' => 'btn btn-primary mr-2']) ?>
            <?= $this->Form->button(__('Borrar'), ['type' => 'reset', 'class' => 'btn btn-secondary ml-2']) ?>
        </div>
    </fieldset>
    <?= $this->Form->end() ?>
</div>