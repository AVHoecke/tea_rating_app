<?php
// app/View/Teas/common.ctp
$this->Html->addCrumb(
    'Teas',
    ['controller' => 'teas','action' => 'index',],
    ['prepend' => true,]
);
echo $this->fetch('content');
?>