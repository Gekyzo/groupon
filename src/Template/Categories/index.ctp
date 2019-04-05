<div class="container">
    <h2><?= __('Categorías') ?></h2>
    <table>
        <?php foreach ($categories as $category) : ?>
            <?= $this->Element('category', ['category' => $category]) ?>
        <?php endforeach; ?>
    </table>
</div>