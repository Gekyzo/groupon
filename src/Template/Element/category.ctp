<div class="card text-center" style="width: 10rem;">
    <img class="card-img-top" src="<?= $category->image ?>" alt="Imagen para categoría <?= $category->name ?>">
    <div class="card-body">
        <h5 class="card-title"><?= $this->Html->link(h($category->name), ['controller' => 'categories', 'action' => 'view', $category->id]) ?></h5>
    </div>
</div>