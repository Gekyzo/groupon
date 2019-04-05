<tr>
    <td><img src="<?= $category->image ?>" alt="Imagen para categoría <?= $category->name ?>">
    </td>
</tr>
<tr>
    <td><?= $this->Html->link(h($category->name), ['controller' => 'categories', 'action' => 'view', $category->id]) ?></td>
</tr>