<div class="card text-center">
    <img class="card-img-top" src="<?= $promotion->images[0]->path ?>" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title"><?= $promotion->name ?></h5>
        <p class="card-text"><?= $promotion->body ?></p>
        <?= $this->Html->link(__('Comprar ya'), ['controller' => 'promotions', 'action' => 'view', $promotion->id], ['class' => 'btn btn-primary']) ?>
    </div>
</div>