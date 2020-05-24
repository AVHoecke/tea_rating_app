<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ComponentsController extends AppController
{
    public $helpers = array('Html');
    public function htmlElement($number)
    {
        return $this->Html->element('Teas/component', [
            'number' => $number,
            ]
        );
    }
}
