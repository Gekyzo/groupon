<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category 
 */
?>

<?= $this->element('sub-nav') ?>

<div class="container mt-3">

    <?= $this->Form->create($category, ['class' => 'form-signin']) ?>
    <fieldset>
        <legend><?= __('Crear categoría') ?></legend>
        <div class="form-group">
            <?= $this->Form->control('name', ['label' => false, 'placeholder' => __('Nombre'), 'class' => 'form-control']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('image', ['label' => false, 'placeholder' => __('Imagen'), 'class' => 'form-control', 'type' => 'file']) ?>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Crear'), ['class' => 'btn btn-primary btn-block']) ?>
    <?= $this->Form->end() ?>

</div> 