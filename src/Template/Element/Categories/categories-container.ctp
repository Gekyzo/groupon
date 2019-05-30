<section class="categories-container">

    <?php foreach ($categories as $category) : ?>

        <?= $this->Element('Categories/category', ['category' => $category]) ?>

    <?php endforeach; ?>

</section>