<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category 
 */
?>

<?= $this->element('sub-nav') ?>

<?= $this->Form->create($category, ['class' => 'form-signin']) ?>
<fieldset>
    <legend><?= __('Editar categoría') ?></legend>
    <div class="form-group">
        <?= $this->Form->control('name', ['class' => 'form-control']); ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('image', ['class' => 'form-control']); ?>
    </div>
    <?php
    // echo $this->Form->control('promotions._ids', ['options' => $promotions]);
    ?>
</fieldset>
<?= $this->Form->button(__('Guardar cambios'), ['class' => 'btn btn-primary btn-block']) ?>
<?= $this->Form->end() ?> 