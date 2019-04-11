<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promotion $promotion
 */
?>

<div class="container">

    <div class="row">

        <div class="col">
            <h1><?= h($promotion->name) ?></h1>
            <div class="promo-gallery">
                <div class="col">
                    <?= $this->Html->image(
                        'promotions/' . $promotion->images[0]->name,
                        ['alt' => __('Imagen promoción'), 'class' => 'promotion-image-main', 'style' => 'width: 100%']
                    ) ?>
                </div>
                <div class="col">
                    <?php
                    /**
                     * Elimino la primera imagen del array para mostrar una galería con todas las demás.
                     */
                    unset($promotion->images[0]);

                    /* Galería */
                    if (!empty($promotion->images)) : ?>
                        <?php foreach ($promotion->images as $image) : ?>
                            <?= $this->Html->image(
                                'promotions/' . $image->name,
                                ['alt' => __('Imagen promoción')]
                            ) ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col">
            <?= $this->Html->link(__('Comprar'), ['controller' => 'orders', 'action' => 'confirm', $promotion->id], ['class' => 'btn btn-primary btn-block']) ?>
            <h2><?= __('Detalles') ?></h2>
            <p>
                <?= __('Disponible hasta') . ' ' . h($promotion->available_until) ?>
            </p>
            <p>
                <b><?= __('Consíguelo por') . ' ' . h($promotion->price_new) . '€.' ?></b>
                <?= __('Precio original') . ' ' . h($promotion->price_old) . '€.' ?>
            </p>
            <p><?= __('Categorías') ?>:
                <?php
                /**
                 * Printeamos todas las categorías a las que pertenece la promo
                 */
                foreach ($promotion->categories as $categories) {
                    echo h($categories->name) . ', ';
                }
                ?>
            </p>
        </div>

    </div>

    <?= $this->Text->autoParagraph(h($promotion->body)); ?>

    <h2><?= __('Ofertas relacionadas') ?></h2>
    <?php if (!empty($promotion->orders)) : ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Promotion Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('State') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($promotion->orders as $orders) : ?>
                <tr>
                    <td><?= h($orders->id) ?></td>
                    <td><?= h($orders->promotion_id) ?></td>
                    <td><?= h($orders->user_id) ?></td>
                    <td><?= h($orders->state) ?></td>
                    <td><?= h($orders->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

</div>