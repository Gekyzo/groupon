<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories 
 */
?>

<?= $this->element('sub-nav') ?>

<div class="container mt-3">

    <h3><?= __('Categorías actuales') ?></h3>

    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', ['label' => __('ID')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => __('Nombre')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug', ['label' => __('Slug')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('image', ['label' => __('Imagen')]) ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category) : ?>
            <tr>
                <td><?= $this->Number->format($category->id) ?></td>
                <td><?= $this->Html->link(h($category->name), ['action' => 'view', $category->id]) ?></td>
                <td><?= h($category->slug) ?></td>
                <td><?= h($category->image) ?></td>
                <td>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $category->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $category->id], ['confirm' => __('¿Seguro que quieres eliminar la categoría {0}?', $category->name)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php
            $this->Paginator->templates([
                'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>'
            ]);
            $this->Paginator->templates([
                'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
            ]);
            $this->Paginator->templates([
                'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>'
            ]);
            $this->Paginator->templates([
                'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>'
            ]);
            $this->Paginator->templates([
                'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
            ]);
            ?>
            <?= $this->Paginator->prev(__('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente')) ?>
        </ul>
    </nav>

</div> 