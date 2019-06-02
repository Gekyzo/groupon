<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>

<main>

    <section>

        <h1><?= __('Información de pedido') ?></h1>
        <table>
            <tr>
                <th scope="row"><?= __('Nombre de la promoción') ?></th>
                <td><?= $order->has('promotion') ? $this->Html->link($order->promotion->name, ['controller' => 'Promotions', 'action' => 'view', $order->promotion->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Estado') ?></th>
                <td><?= h($order->state) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Fecha de compra') ?></th>
                <td><?= h($order->created) ?></td>
            </tr>
        </table>

    </section>

    <section>

        <?php if ($currentUser['role'] === 'admin') : ?>
            <h2><?= __('Información para Administrador') ?></h2>
            <table>
                <tr>
                    <th scope="row"><?= __('ID del pedido') ?></th>
                    <td><?= $this->Number->format($order->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Usuario') ?></th>
                    <td><?= $order->has('user') ? $this->Html->link($order->user->name, ['controller' => 'Users', 'action' => 'view', $order->user->id]) : '' ?></td>
                </tr>
            </table>
        <?php endif; ?>

    </section>

</main>