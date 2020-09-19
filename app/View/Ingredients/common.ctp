<?php
// app/View/Teas/common.ctp
$this->Html->addCrumb(
    'Ingredients',
    ['controller' => 'ingredients','action' => 'index',],
    ['prepend' => true,]
);
echo $this->fetch('content');
?>