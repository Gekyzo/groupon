<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<h1>Proyecto Groupon</h1>
<p>versión 0.3.0</p>

<h2><?= __('Categorías') ?></h2>
<table>
    <?php foreach ($categories as $cat) : ?>
    <tr>
        <td><img src="<?= $cat['image'] ?>" alt="Imagen para categoría <?= $cat['name'] ?>">
        </td>
    </tr>
    <?php endforeach; ?>
    <?php foreach ($categories as $cat) : ?>
    <tr>
        <td><?= $this->Html->link(h($cat['name']), ['controller' => 'categories', 'action' => 'view', $cat['id']]) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<h2><?= __('Últimas ofertas') ?></h2>
<?php foreach ($promotions as $promo) : ?>
<div class="card text-center" style="width: 18rem;">
    <img class="card-img-top" src=".../100px180/" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title"><?= $promo['name'] ?></h5>
        <p class="card-text"><?= $promo['body'] ?></p>
        <?= $this->Html->link(__('Comprar ya'), ['controller' => 'promotions', 'action' => 'view', $promo['id']], ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php endforeach; ?>

<h2><?= __('Promociones destacadas') ?></h2>
<?php foreach ($promotions as $promo) : ?>
<div class="card text-center" style="width: 18rem;">
    <img class="card-img-top" src=".../100px180/" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title"><?= $promo['name'] ?></h5>
        <p class="card-text"><?= $promo['body'] ?></p>
        <?= $this->Html->link(__('Comprar ya'), ['controller' => 'promotions', 'action' => 'view', $promo['id']], ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php endforeach; ?> 