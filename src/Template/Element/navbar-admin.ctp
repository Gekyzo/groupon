<?php
// Almaceno el controlador actual para crear enlace de las acciones
$currentController = $this->request->params['controller'];
?>

<div style="position: absolute; bottom: 10px; left: 40%; color: black; background-color: #fff; border: 1px solid #ccc;">
    <ul>
        <li>Acciones admin:</li>
        <li><?= $this->Html->link(_('Listar'), ['controller' => $currentController, 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(_('Crear'), ['controller' => $currentController, 'action' => 'add']) ?></li>
    </ul>
</div>