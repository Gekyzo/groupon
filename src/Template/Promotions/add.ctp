<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promotion $promotion
 */
?>

<?= $this->element('sub-nav') ?>

<div class="container mt-3">

    <?= $this->Form->create($promotion) ?>
    <fieldset>
        <legend><?= __('Crear promoción') ?></legend>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <?= $this->Form->control('name', ['label' => false, 'placeholder' => 'Nombre', 'class' => 'form-control']) ?>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <?= $this->Form->control('slug', ['label' =>  false, 'placeholder' => 'Slug', 'class' => 'form-control']) ?>
                </div>
            </div>            
        </div>
        <div class="form-group">     
            <div class="form-check form-check-inline">
            <?= $this->Form->control('categories._ids', ['type' => 'select', 'multiple' => 'checkbox', 'label' => 'Categorías', 'options' => $categories, 'class' => 'form-check-input']) ?>            
            <?php // $this->Form->control('categories._ids', ['type' => 'select', 'multiple' => 'checkbox', 'label' => 'Categorías', 'options' => $categories, 'class' => 'form-check-input']) ?>
            </div>
        </div>
        <div class="form-group">
        <?php foreach ($categories as $catVal=>$catName): ?>            
            <div class="form-check form-check-inline">                
                <input type="checkbox" name="categories[_ids][]" class="form-check-input" value="<?= $catVal ?>">
                <label class="form-check-label"><?= $catName ?></label>
            </div>
        <?php endforeach; ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('body', ['label' => false, 'placeholder' => 'Descripción', 'class'  =>  'form-control']) ?>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <?= $this->Form->control('price_old', ['label' => false, 'placeholder' => 'Precio original', 'class' => 'form-control']) ?>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <?= $this->Form->control('price_new', ['label' => false, 'placeholder' => 'Precio con oferta', 'class' => 'form-control']) ?>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <?= $this->Form->control('Disponible desde', ['name' => 'available_since', 'type' => 'datetime-local'], ['empty' => true, 'class' => 'form-control']) ?>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <?= $this->Form->control('available_until', ['label' => __('... hasta'), 'type' => 'datetime-local'], ['empty' => true, 'class' => 'form-control']) ?>
                </div>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Crear'), ['class' => 'btn btn-primary btn-block']) ?>
    <?= $this->Form->end() ?>

</div> 