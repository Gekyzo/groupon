<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promotions[]|\Cake\Collection\CollectionInterface $promotions
 */
?>

<main>

    <section class="promotions-container">

        <?php foreach ($promotions as $promotion) : ?>

            <?= $this->Element('Promotions/promotion', ['promotion' => $promotion]) ?>

        <?php endforeach; ?>

    </section>

</main>