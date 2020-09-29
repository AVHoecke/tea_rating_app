<nav class="navbar navbar-light bg-light navbar-expand-lg">
    <?php echo $this->Html->image(
        'teaCup.gif',
        [
            'url' => [
                'controller' => 'index',
                'action' => 'index',
            ] ,
            'class' => 'navbar-brand',
        ]
    );
    ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <?= $this->Html->link(
                    'Teas',
                    [
                        'controller' => 'Teas',
                        'action' => 'index'
                    ],
                    ['class' => 'nav-link',]
                )
                ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(
                    'Ingredients',
                    [
                        'controller' => 'Ingredients',
                        'action' => 'index'
                    ],
                    ['class' => 'nav-link',]
                )
                ?>
            </li>
        </ul>
    </div>
</nav>