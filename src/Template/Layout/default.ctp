<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = 'Ciropon';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap/bootstrap') ?>
    <?= $this->Html->css('bootstrap.extended') ?>
    <?= $this->Html->css('fontawesome/fontawesome') ?>
    <?= $this->Html->css('fontawesome/solid') ?>
    <?= $this->Html->css('main') ?>
    <?= $this->fetch('css') ?>

    <?= $this->Html->script('bootstrap/bootstrap') ?>
    <?= $this->Html->script('fontawesome/fontawesome') ?>
    <?= $this->Html->script('jquery/jquery-3.3.1.min') ?>
    <?= $this->fetch('script') ?>

    <?= $this->fetch('meta') ?>
</head>

<body>

    <div class="container">

        <?= $this->Element('navbar') ?>

        <?= $this->Flash->render() ?>

        <?= $this->fetch('content') ?>

    </div>

</body>

</html>