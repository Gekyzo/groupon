<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promotions[]|\Cake\Collection\CollectionInterface $promotions
 */
?>

<main>

    <div class="container container-promotions">

        <?php foreach ($promotions as $promotion) : ?>

            <?= $this->Element('promotion', ['promotion' => $promotion]) ?>

        <?php endforeach; ?>

    </div>

</main>