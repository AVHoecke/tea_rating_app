<nav class="navbar navbar-light bg-light navbar-expand-lg">
    <?php echo $this->Html->link(
        $this->Html->image(
            'teaCup.gif'
        ),
        ['controller' => 'index', 'action' => 'index'],
        [
            'class' => 'navbar-brand',
            'escape' => false,
            'id' => 'tea-powered',
            'width' => '48',
            'height' => '48',
        ]
    );
    ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/teas">Teas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/ingredients">Ingredients</a>
            </li>
        </ul>
    </div>
</nav>