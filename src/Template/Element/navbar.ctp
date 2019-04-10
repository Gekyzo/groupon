<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <?= $this->Html->link('Ciropon', ['controller' => 'pages', 'action' => 'display'], ['class' => 'navbar-brand']) ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <?= $this->Html->link(__('Promociones'), ['controller' => 'promotions', 'action' => 'index'], ['class' => 'nav-item nav-link']) ?>
            <?= $this->Html->link(__('Categorías'), ['controller' => 'categories', 'action' => 'index'], ['class' => 'nav-item nav-link']) ?>
            <?php if (isset($currentUser) && $currentUser['role'] === 'admin') : ?>
                <?= $this->Html->link(__('Usuarios'), ['controller' => 'users', 'action' => 'index'], ['class' => 'nav-item nav-link']) ?>
                <?= $this->Html->link(__('Pedidos'), ['controller' => 'orders', 'action' => 'index'], ['class' => 'nav-item nav-link']) ?>
                <?= $this->Html->link(__('Galería'), ['controller' => 'images', 'action' => 'index'], ['class' => 'nav-item nav-link active']) ?>
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