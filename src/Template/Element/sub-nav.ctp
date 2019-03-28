<?php
/**
 * @var $currentUser Información sobre el usuario logeado
 * @var $currentController Almacenamos el controlador activo para mostrar las acciones disponibles
 */
$currentController = strtolower($this->request->params['controller']);
?>

<?php
/**
 * Mostramos acciones adicionales para Administradores
 */
if ($currentUser['role'] === 'admin') : ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <span class="navbar-brand">Admin de <?= $currentController ?></span>
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

<?php endif; ?> 