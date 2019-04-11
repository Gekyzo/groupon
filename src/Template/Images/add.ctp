<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
?>

<div class="container">
    <?= $this->Form->create($image) ?>
    <fieldset>
        <legend><?= __('Subir imagen') ?></legend>
        <div class="form-group row">
            <div class="col">
                <?= $this->Form->control('name', ['class' => 'form-control']) ?>
            </div>
            <div class="col">
                <?= $this->Form->control('url', ['type' => 'file', 'class' => 'form-control']) ?>
            </div>
        </div>
        <div class="form-group">
            <?= $this->Form->control('promotions._ids', ['label' => 'Asignar a', 'options' => $promotions, 'class' => 'form-control']) ?>
        </div>
        <div class="btn-group col-sm-12 mt-2" role="group">
            <?= $this->Form->button(__('Crear'), ['class' => 'btn btn-primary mr-2']) ?>
            <?= $this->Form->button(__('Borrar'), ['type' => 'reset', 'class' => 'btn btn-secondary ml-2']) ?>
        </div>
    </fieldset>
    <?= $this->Form->end() ?>
</div>