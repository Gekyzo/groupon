<?php
/**
 * Almacenamos el controlador activo para mostrar las acciones disponibles
 */
$currentController = $this->request->params['controller'];
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <span class="navbar-brand">Acciones para <?= $currentController ?></span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <?= $this->Html->link(__('Listar'), ['controller' => $currentController, 'action' => 'index'], ['class' => 'nav-item nav-link']) ?>
            <?= $this->Html->link(__('Crear'), ['controller' => $currentController, 'action' => 'add'], ['class' => 'nav-item nav-link']) ?>
        </ul>
    </div>
</nav> 