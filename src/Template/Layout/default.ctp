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

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Ciropon</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <?= $this->Html->link(__('Inicio'), ['controller' => 'pages', 'action' => 'display'], ['class' => 'nav-item nav-link']) ?>
                    <?= $this->Html->link(__('Promociones'), ['controller' => 'promotions', 'action' => 'index'], ['class' => 'nav-item nav-link']) ?>
                    <?= $this->Html->link(__('Categorías'), ['controller' => 'categories', 'action' => 'index'], ['class' => 'nav-item nav-link']) ?>
                    <?php if (isset($currentUser) && $currentUser['role'] === 'admin') : ?>
                        <?= $this->Html->link(__('Usuarios'), ['controller' => 'users', 'action' => 'index'], ['class' => 'nav-item nav-link']) ?>
                        <?= $this->Html->link(__('Pedidos'), ['controller' => 'orders', 'action' => 'index'], ['class' => 'nav-item nav-link']) ?>
                    <?php endif; ?>
                </div>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($currentUser)) : ?>
                    <li class="nav-item nav-link">
                        <?php if ($currentUser['role'] !== 'admin') : ?>
                            Hola <?= $this->Html->link(h($currentUser['name']), ['controller' => 'users', 'action' => 'profile']) ?>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item nav-link"><?= $this->Html->link(__('Salir'), ['controller' => 'users', 'action' => 'logout'], ['confirm' => '¿Estás seguro de que quieres salir?']) ?></li>
                <?php else : ?>
                    <li class="nav-item nav-link"><?= $this->Html->link(__('Registro'), ['controller' => 'users', 'action' => 'add']) ?></li>
                    <li class="nav-item nav-link"><?= $this->Html->link(__('Entrar'), ['controller' => 'users', 'action' => 'login']) ?></li>
                <?php endif; ?>
            </ul>
        </nav>

        <?= $this->Flash->render() ?>

        <?= $this->fetch('content') ?>

    </div>

</body>

</html>