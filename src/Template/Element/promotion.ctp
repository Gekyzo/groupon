<div class="card text-center" style="width: 18rem;">
    <img class="card-img-top" src="https://via.placeholder.com/100x180/" alt="Card image cap" style="width: auto">
    <div class="card-body">
        <h5 class="card-title"><?= $promotion->name ?></h5>
        <p class="card-text"><?= $promotion->body ?></p>
        <?= $this->Html->link(__('Comprar ya'), ['controller' => 'promotions', 'action' => 'view', $promotion->id], ['class' => 'btn btn-primary']) ?>
    </div>
</div>