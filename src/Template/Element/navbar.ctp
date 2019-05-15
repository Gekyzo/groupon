<nav>
    <div class="container">

        <?= $this->Html->link('Ciropon', ['controller' => 'pages', 'action' => 'display'], ['class' => 'navbar-brand']) ?>

        <ul>
            <li><?= $this->Html->link(__('Promociones'), ['controller' => 'promotions', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Categorías'), ['controller' => 'categories', 'action' => 'index']) ?></li>
            <?php if (isset($currentUser) && $currentUser['role'] === 'admin') : ?>
                <li><?= $this->Html->link(__('Usuarios'), ['controller' => 'users', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Pedidos'), ['controller' => 'orders', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Galería'), ['controller' => 'images', 'action' => 'index']) ?></li>
            <?php endif; ?>
        </ul>

        <ul id="user-actions">
            <?php if (isset($currentUser)) : ?>
                <?php if ($currentUser['role'] !== 'admin') : ?>
                    <li>
                        Hola <?= $this->Html->link(h($currentUser['name']), ['controller' => 'users', 'action' => 'profile']) ?>
                    </li>
                <?php endif; ?>
                <li><?= $this->Html->link(__('Salir'), ['controller' => 'users', 'action' => 'logout'], ['confirm' => '¿Estás seguro de que quieres salir?']) ?></li>
            <?php else : ?>
                <li><?= $this->Html->link(__('Registro'), ['controller' => 'users', 'action' => 'add']) ?></li>
                <li><?= $this->Html->link(__('Entrar'), ['controller' => 'users', 'action' => 'login']) ?></li>
            <?php endif; ?>
        </ul>

    </div>

    <?php // Muestro acciones para admin
    if ($currentUser['role'] === 'admin') {
        echo $this->Element('navbar-admin');
    } ?>

</nav>