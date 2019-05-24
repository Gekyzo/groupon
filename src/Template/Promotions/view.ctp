<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promotion $promotion
 */
?>

<main id="promotion-detailed">

    <section class="breadcrumb">Home / Categorías / Restaurantes / Cena en Kiro Sushi</section>

    <section class="promotion-gallery">

        <?= $this->Html->image(
            'promotions/' . $promotion->images[0]->name,
            ['alt' => __('Imagen promoción'), 'class' => 'promotion-image-main']
        ) ?>

        <?php
        /**
         * Elimino la primera imagen del array para mostrar una galería con todas las demás.
         */
        unset($promotion->images[0]);

        /* Muestro la galería */
        if (!empty($promotion->images)) : ?>
            <?php foreach ($promotion->images as $image) : ?>
                <?= $this->Html->image(
                    'promotions/' . $image->name,
                    ['alt' => __('Imagen promoción')]
                ) ?>
            <?php endforeach; ?>
        <?php endif; ?>

    </section>

    <section class="promotion-info">

        <h1><?= h($promotion->name) ?></h1>

        <?= $this->Text->autoParagraph(h($promotion->body)); ?>

        <h2><?= __('Detalles') ?></h2>
        <p>
            <?= __('Disponible hasta') . ' ' . h($promotion->available_until) ?>
        </p>
        <p><?= __('Categorías') ?>:
            <?php
            /**
             * Printeamos todas las categorías a las que pertenece la promo
             */
            $promotionCategories = [];
            foreach ($promotion->categories as $category) {
                array_push($promotionCategories, $category->name);
            }

            $lastInArr = end($promotionCategories);

            // Imprimo la lista de categorías asociadas a la promoción
            foreach ($promotionCategories as $cat) : ?>

                <?= $this->Html->link(h($cat), ['controller' => 'categories', 'action' => 'view', strtolower($cat)]) ?>

                <?php // Imprimir una coma entre los elementos
                if ($cat !== $lastInArr) {
                    echo ', ';
                }

            endforeach;
            ?>
        </p>

        <div id="promotion-price">

            <p><?= h($promotion->price_new) . '€' ?></p>
            <p><i><?= __('Precio original') . ' ' . h($promotion->price_old) . '€.' ?></i></p>
            <button><?= $this->Html->link(__('Comprar'), ['controller' => 'orders', 'action' => 'confirm', $promotion->id], ['class' => 'button']) ?> </button>

        </div>

        <?php if (!empty($promotion->orders)) : ?>
            <h2><?= __('Ofertas relacionadas') ?></h2>
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

    </section>

</main>