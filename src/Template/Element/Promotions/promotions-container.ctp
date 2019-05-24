<section class="promotions-container">

    <h2><?= __('Todas las ofertas') ?></h2>

    <?php // Muestro todas las ofertas disponibles en la categoría
    if (!empty($category->promotions)) :
        foreach ($category->promotions as $promotion) :
            echo $this->Element('Promotions/promotion', ['promotion' => $promotion]);
        endforeach;
    endif; ?>

</section>