<?php
// Almaceno el controlador actual para crear enlace de las acciones
$currentController = $this->request->getParam('controller');
?>

<div class="container" id="admin_panel">
    <ul>
        <li>Acciones admin:</li>
        <li><?= $this->Html->link(__('Listar'), ['controller' => $currentController, 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Crear'), ['controller' => $currentController, 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Editar'), ['controller' => $currentController, 'action' => 'edit', 3]) ?></li>
    </ul>
</div>