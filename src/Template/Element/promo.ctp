<div class="card text-center" style="width: 18rem;">
    <img class="card-img-top" src=".../100px180/" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title"><?= $promo['name'] ?></h5>
        <p class="card-text"><?= $promo['body'] ?></p>
        <?= $this->Html->link(__('Comprar ya'), ['controller' => 'promotions', 'action' => 'view', $promo['id']], ['class' => 'btn btn-primary']) ?>
    </div>
</div> 